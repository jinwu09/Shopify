<script setup lang="ts">
import NavbarComponent from '@/components/NavbarComponent.vue'
import MessageStats from '@/components/MessageStats.vue'
import ModalEditProduct from '@/components/modal/ModalEditProduct.vue'
import { onMounted, ref } from 'vue'
import axios from 'axios'
import { loadavg } from 'os'

const products = ref([
  { id: 1, name: 'sample', description: '', pictureLink: 'asd', price: 1234, weight: 123 }
])
const token = `Bearer ${localStorage.getItem('a')}`

const index = ref<number>(0)
const modalActive = ref(false)
const closeModal = () => {
  modalActive.value = false
}
const poplist = (index: number) => {
  products.value.splice(index, 1)
  modalActive.value = false
}
const LoadData = () => {
  axios
    .get('working/item', {
      headers: {
        Authorization: token
      }
    })
    .then((res) => {
      console.log(res.data.data)
      products.value = res.data.data
    })
    .catch((e) => {
      console.log('error')
    })
}
onMounted(() => {
  LoadData()
})
</script>

<template>
  <div class="flex flex-row gap-14">
    <ModalEditProduct
      :modal-active="modalActive"
      :index="index"
      @close-modal="closeModal"
      @delete-modal="poplist(index)"
    ></ModalEditProduct>
    <NavbarComponent />
    <div class="container flex flex-col mt-12">
      <MessageStats />
      <div class="flex flex-row gap-4 mt-4 flex-wrap">
        <transition-group enter-from-class="opacity-0" enter-active-class="transition duration-300">
          <div
            v-for="(product, index) in products"
            :key="index"
            class="shadow-md rounded-3xl overflow-hidden flex flex-col w-72 bg-pink-300"
          >
            <div class="h-16 text-center">
              <img class="" src="" alt="image here" />
            </div>
            <div class="flex flex-row justify-between p-7 bg-white">
              <div class="flex flex-col">
                <p>{{ product.name }}</p>
                <p>Sales: {{ product.price }}</p>
              </div>
              <button class="px-10 rounded-full shadow-lg" @click="modalActive = true">Edit</button>
            </div>
          </div>
        </transition-group>
      </div>
    </div>
  </div>
</template>

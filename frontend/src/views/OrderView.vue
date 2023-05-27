<script setup lang="ts">
import NavbarComponent from '@/components/NavbarComponent.vue'
import MessageStats from '@/components/MessageStats.vue'
import { onMounted, ref } from 'vue'
import { useRoute } from 'vue-router'
import axios from 'axios'
import { loadavg } from 'os'
import { ITransaction } from '@/components/interface/InterfaceTypes'

const items = ref([
  { id: 1, status: 'ongoing', total: 11, location_logs: [{ location_address: 'somewhere' }] }
])

const token = `Bearer ${localStorage.getItem('a')}`

const route = useRoute()

const loadData = (sort: String = '') => {
  console.log(`working/transaction/${route.params.sort != 'all' ? route.params.sort : ''}`)
  axios
    .get(`working/transaction/${route.params.sort != 'all' ? route.params.sort : ''}`, {
      headers: {
        Authorization: token
      }
    })
    .then((res) => {
      console.log(res.data)
      items.value = res.data.data
    })
    .catch((e) => {
      console.log('error')
    })
}

onMounted(() => {
  console.log(items.value)
  loadData()
})
</script>

<template>
  <div class="flex flex-row gap-14">
    <NavbarComponent />
    <div class="container flex flex-col mt-12">
      <!-- some messages stuff -->
      <MessageStats />
      <!-- order stats -->
      <div class="flex flex-row mt-3 gap-3">
        <button class="px-3 py-2 rounded-lg bottom-1 shadow-md">Pending Order</button>
        <button class="px-3 py-2 rounded-lg bottom-1 shadow-md">Recent Order</button>
        <button class="px-3 py-2 rounded-lg bottom-1 shadow-md">Done</button>
        <button class="px-3 py-2 rounded-lg bottom-1 shadow-md">Ongoing</button>
      </div>
      <div class="flex flex-col mt-4 p-2 border-2 h-full">
        <div class="grid grid-cols-4 text-center">
          <p class="border-2">ORder ID</p>
          <p class="border-2">Status</p>
          <p class="border-2">Price</p>
          <p class="border-2">Location</p>
        </div>
        <div v-for="(item, index) in items" :key="index" class="grid grid-cols-4 text-center">
          <p class="border-2">{{ item.id }}</p>
          <p class="border-2">{{ item.status }}</p>
          <p class="border-2">{{ item.total }}</p>
          <p class="border-2">
            {{
              item.location_logs[0].location_address !== undefined
                ? item.location_logs[0].location_address
                : 'no info'
            }}
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

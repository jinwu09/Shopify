<script setup lang="ts">
import { defineProps, ref } from 'vue'
defineEmits(['close-modal', 'accept-modal', 'delete-modal'])
defineProps({
  modalActive: { type: Boolean, default: true },
  index: Number
})

const ProductName = ref<string>()
const Description = ref<string>()
const weight = ref<number>()
const price = ref<number>()
</script>

<template>
  <Transition
    enter-from-class="opacity-0 "
    enter-active-class="transition duration-300"
    leave-to-class="opacity-0"
    leave-active-class="transition duration-300"
  >
    <div
      v-if="modalActive"
      class="absolute w-full bg-black bg-opacity-30 h-screen justify-center top-0 left-0 flex px-8"
    >
      <div
        class="mt-36 w-2/3 h-3/5 rounded-3xl flex flex-row bg-white overflow-hidden gap-14 relative z-10"
      >
        <div class="w-1/3 relative bg-pink-300">
          <p class="absolute text-center w-full h-full top-16">Picture here</p>
          <div class="absolute bottom-0 w-full justify-center flex mb-9">
            <button
              class="hover:border-blue-300 bg-white rounded-2xl px-4 border-4 border-white shadow-lg text-center text-base text"
            >
              Edit
            </button>
          </div>
          <img class="h-full w-full" src="" alt="img here" />
        </div>

        <div class="flex flex-col mt-10 gap-6 relative">
          <div class="flex flex-col gap-1">
            <p>Product Name</p>
            <input class="bg-gray-300 shadow-md p-1 rounded-lg" type="text" v-model="ProductName" />
          </div>
          <div class="flex flex-col gap-1">
            <p>Description</p>
            <input class="bg-gray-300 shadow-md p-1 rounded-lg" type="text" v-model="Description" />
          </div>

          <div class="flex flex-col gap-1">
            <div class="flex flex-row gap-5">
              <div class="flex flex-col">
                <p>weight</p>
                <input class="bg-gray-300 shadow-md p-1 rounded-lg" type="text" v-model="weight" />
              </div>
              <div class="flex flex-col">
                <p>Price</p>
                <input class="bg-gray-300 shadow-md p-1 rounded-lg" type="text" v-model="price" />
              </div>
            </div>
          </div>

          <div class="absolute bottom-0 w-full justify-center flex mb-9">
            <button
              class="hover:border-blue-300 bg-white rounded-2xl px-4 border-4 border-white shadow-lg text-center text-base text"
              @click="$emit('delete-modal')"
            >
              delete
            </button>

            <button
              class="hover:border-blue-300 bg-white rounded-2xl px-4 border-4 border-white shadow-lg text-center text-base text"
            >
              Save
            </button>
            <button
              class="hover:border-blue-300 bg-white rounded-2xl px-4 border-4 border-white shadow-lg text-center text-base text"
              @click="$emit('close-modal')"
            >
              Close
            </button>
          </div>
        </div>
      </div>
      <div class="absolute z-0 h-full w-full" @click="$emit('close-modal')"></div>
    </div>
  </Transition>
</template>

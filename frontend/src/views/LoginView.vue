<script setup lang="ts">
import { onMounted, Ref, ref } from 'vue'
import axios from 'axios'
import { ILogin } from '@/components/interface/InterfaceTypes'
import { useRouter } from 'vue-router'

const email = ref<String>('')
const password = ref<String>('')

const router = useRouter()

const login = () => {
  const Login: ILogin = {
    email: email.value,
    password: password.value
  }
  axios
    .post('login', Login)
    .then((res) => {
      localStorage.setItem('a', res.data.token)
      router.push({
        name: 'home'
      })
    })
    .catch((e) => {
      console.log(e)
    })
}

onMounted(() => {})
</script>

<template>
  <div class="absolute justify-center flex h-full w-full items-center">
    <div
      class="flex flex-col shadow-lg py-16 w-2/4 px-10 rounded-2xl border-gray-50 border-2 gap-4"
    >
      <p class="text-center text-3xl">Login</p>
      <div class="flex flex-col">
        <p>Email</p>
        <input
          class="px-4 rounded-lg py-1 bg-gray-300"
          v-model="email"
          type="email"
          placeholder="Email"
        />
      </div>
      <div class="flex flex-col">
        <p>Password</p>
        <input
          class="px-4 rounded-lg py-1 bg-gray-300"
          v-model="password"
          type="password"
          placeholder="Password"
        />
      </div>
      <div class="flex gap-3 justify-center">
        <button class="px-4 py-2 hover:border-blue-200 border-2 rounded-2xl" @click="login">
          Login
        </button>
      </div>
    </div>
  </div>
</template>

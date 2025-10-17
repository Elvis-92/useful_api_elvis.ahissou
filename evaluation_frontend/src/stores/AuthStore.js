import { ref} from 'vue'
import { defineStore } from 'pinia'
import api from '@/api/api'

export const useAuthStore = defineStore('auth', () => {
  const form = ref({
    name: '',
    email: '',
    password: '',
    password_confirmation: ''
  })

  const loading = ref(false)

  async function register() {
    this.loading = true;
    try {
      const response = await api.post('/register', {
      name: form.value.name,
      email: form.value.email,
      password: form.value.password,
      password_confirmation: form.value.password_confirmation
     })
     return response.data

    } catch (error) {
      console.error(error)
    } finally {
      this.loading = false
    }
  }

  async function login() {
    this.loading = true;
    try {
      const response = await api.post('/login', {
        email: form.value.email,
        password: form.value.password
      })
      const token = response.data.token
      localStorage.setItem('token', token)
      return response.data

    } catch (error) {
      console.error(error)
    }finally {
      this.loading = false
    }
  }

  return {  }
})

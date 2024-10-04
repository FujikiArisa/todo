import { createApp, ref, provide } from 'vue'
import TodoList from './components/TodoList.vue'
import TodoModal from './components/TodoModal.vue'
import Loading from './components/Loading.vue'
import api from './plugins/api'

const app = createApp({
  setup() {
    const isLoading = ref(false)
    provide('isLoading', isLoading)

    // Ajaxインターセプターの設定
    api.interceptors.request.use(
      (config) => {
        isLoading.value = true
        return config
      },
      (error) => {
        isLoading.value = false
        return Promise.reject(error)
      }
    )

    api.interceptors.response.use(
      (response) => {
        isLoading.value = false
        return response
      },
      (error) => {
        isLoading.value = false
        return Promise.reject(error)
      }
    )

    return { isLoading }
  }
})

app.config.globalProperties.$api = api

app.component('todo-list', TodoList)
app.component('todo-modal', TodoModal)
app.component('loading-modal', Loading)

app.mount('#todo-app')

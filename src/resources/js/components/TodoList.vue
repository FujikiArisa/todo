<template>
  <div class="todo-list">
    <!-- 追加 -->
    <form action="" method="post" @submit.prevent="addTodo()" class="d-flex gap-2 w-50 mt-5 mx-auto">
      <input type="text" name="content" placeholder="新しいタスクを入力" v-model="newTodo"
        class="form-control bg-body-secondary">
      <button type="button" @click="addTodo()" class="btn btn-primary px-3">追加</button>
    </form>

    <ul class="mt-5 mx-auto list-unstyled" style="width: 85%;">
      <li v-for="todo in todos" :key="todo.id" class="d-flex gap-3 border-bottom">

        <!-- 内容 -->
        <label class="flex-grow-1 d-flex align-items-center py-3 ps-4">
          <input
            type="checkbox"
            name="complated"
            v-model="todo.completed"
            true-value="1"
            false-value="0"
            class="form-check-input"
            @change.prevent="checked(todo.id)"
            style="min-width: 20px; min-height: 20px;">
          <span class="ps-3 fs-5">{{ todo.title }}</span>
        </label>

        <!-- ボタン -->
        <div class="d-flex justify-content-between align-items-center gap-2 pe-3">
          <!-- 編集 -->
          <button class="text-success p-1" data-bs-toggle="modal" data-bs-target="#todoModal" @click="openModal(todo)">
            <span class="material-symbols-outlined">edit</span>
          </button>
          <!-- 削除 -->
          <button type="button" class="text-danger p-1" @click="deleteTodo(todo.id)">
            <span class="material-symbols-outlined">close</span>
          </button>
        </div>
      </li>
    </ul>
    <todo-modal :todo="selectedTodo" @close="closeModal" @update="updateTodo"></todo-modal>
  </div>
</template>

<script setup>
import { ref, onMounted, getCurrentInstance } from 'vue'
const { proxy } = getCurrentInstance()
const api = proxy.$api

const todos = ref([])
const newTodo = ref('')
const selectedTodo = ref({})

const fetchTodos = async () => {
  try {
    const response = await api.get('/todos')
    todos.value = response.data.todos ?? []
  } catch (error) {
    console.error('Error fetching todos:', error)
  }
}

const checked = async (id) => {
  const response = await api.put(`/todos/complated/${id}`, {})
  todos.value = response.data.todos ?? []
  return false
}

const addTodo = async () => {
  if (newTodo.value.trim()) {
    try {
      const response = await api.post('/todos', { title: newTodo.value })
      todos.value = response.data.todos ?? []
      newTodo.value = ''
    } catch (error) {
      console.error('Error adding todo:', error)
    }
  }
  return false
}

const deleteTodo = async (id) => {
  try {
    const response = await api.delete(`/todos/${id}`)
    todos.value = response.data.todos ?? []
  } catch (error) {
    console.error('Error deleting todo:', error)
  }
}

const openModal = (todo) => {
  selectedTodo.value = { ...todo }
}

const closeModal = () => {
  selectedTodo.value = null
}

const updateTodo = async (updatedTodo) => {
  try {
    const response = await api.put(`/todos/${updatedTodo.id}`, updatedTodo)
    todos.value = response.data.todos ?? []
    closeModal()
  } catch (error) {
    console.error('Error updating todo:', error)
  }
}


onMounted(() => {
  fetchTodos()
})
</script>
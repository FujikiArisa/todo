<template>
  <div class="modal fade" id="todoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <form class="modal-content p-4" @submit.prevent="updateTodo()">
        <!-- 内容 -->
        <div class="modal-body">
          <input type="text" name="content" class="form-control bg-body-secondary fs-5" placeholder="タスク内容を編集" v-model="editedTodo.title">
        </div>
        <!-- キャンセル・完了 -->
        <div class="modal-footer border-0 gap-2">
          <button type="button" class="btn btn-outline-secondary" @click="close" style="min-width: 100px;" data-bs-dismiss="modal">キャンセル</button>
          <button type="submit" class="btn btn-primary" style="min-width: 100px;">完了</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup>
import { ref, defineEmits, watch, onMounted } from 'vue'

const props = defineProps({
  todo: Object
})

const emit = defineEmits(['close', 'update'])

const editedTodo = ref({ ...props.todo })
let modalInstance = null

watch(() => props.todo, (newTodo) => {
  if (newTodo) {
    editedTodo.value = { ...newTodo }
  }
}, { deep: true })

const close = () => {
  modalInstance.hide()
  emit('close')
}

const updateTodo = () => {
  emit('update', editedTodo.value)
  close()
}

onMounted(() => {
  modalInstance = new bootstrap.Modal(document.getElementById('todoModal'))
})
</script>
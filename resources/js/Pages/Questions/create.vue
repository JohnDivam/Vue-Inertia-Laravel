<template>
  <div>
    dvdqvd
    <teleport to="body">
        <modal :show="showModal" @close="showModal = false">
        <template #header>
            <h3>custom header</h3>
        </template>
        </modal>
    </teleport>
  </div>
</template>

<script>
import { ref } from 'vue';
export default {
  name:"QuestionsCreate",
  props:['showModal'],
  setup(props, { emit }) {
     const closeModal = () => {
      emit('close');
    };


     return {
      closeModal,
    };

  }
}
</script>

<style>

</style>
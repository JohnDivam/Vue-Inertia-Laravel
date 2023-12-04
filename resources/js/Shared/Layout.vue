<template>
  <div>
    <Header/>
        <slot></slot>
    <Footer/>
  </div>
</template>

<script>
import Header from '@/Shared/Header.vue'
import Footer from '@/Shared/Footer.vue'

export default {
  components: {
    Header,
    Footer,
  },
}
</script>

<style>

</style>
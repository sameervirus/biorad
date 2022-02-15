<template>
  <div>
    <Nav />
    <slot />
    <Footer />
  </div>
</template>

<script>
import Nav from '@/Components/Nav'
import Footer from '@/Components/Footer'
export default {
  components: {
    Nav,
    Footer,
  },
}
</script>

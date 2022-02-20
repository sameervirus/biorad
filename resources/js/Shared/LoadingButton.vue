<template>
  <button :disabled="loading" class="d-flex align-items-center">
    <div v-if="loading" class="btn-spinner mr-2 me-2" />
    <slot />
  </button>
</template>

<script>
export default {
  props: {
    loading: Boolean,
  },
}
</script>

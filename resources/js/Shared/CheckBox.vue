<template>
  <div class="form-check" :class="$attrs.class">
    <input :id="id" ref="checkbox" v-bind="{ ...$attrs, class: null }" class="form-check form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" :class="{ error: error }" type="checkbox" @input="$emit('update:modelValue', $event.target.value)" />
    <label v-if="label" class="check-label inline-block text-gray-800" :for="id">{{ label }}</label>
  </div>
</template>

<script>
import { v4 as uuid } from 'uuid'

export default {
  inheritAttrs: false,
  props: {
    id: {
      type: String,
      default() {
        return `check-box-${uuid()}`
      },
    },
    type: {
      type: String,
      default: 'text',
    },
    error: String,
    label: String,
    modelValue: Array,
  },
  emits: ['update:modelValue'],
  methods: {
    focus() {
      this.$refs.checkbox.focus()
    },
    select() {
      this.$refs.checkbox.select()
    },
    setSelectionRange(start, end) {
      this.$refs.checkbox.setSelectionRange(start, end)
    },
  },
}
</script>

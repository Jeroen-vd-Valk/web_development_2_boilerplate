<template>
  <span :class="classes">
    <span v-if="change > 0">↑</span>
    <span v-else-if="change < 0">↓</span>
    <span v-else>—</span>
  </span>
</template>

<script setup>
import { computed } from 'vue'

const props = defineProps({
  price: {
    type: Number,
    required: true
  },
  previousPrice: {
    type: Number,
    required: true
  }
})

const change = computed(() => {
  return props.price - props.previousPrice
})

const classes = computed(() => {
  if (change.value > 0) {
    return 'text-green-600 font-bold'
  } else if (change.value < 0) {
    return 'text-red-600 font-bold'
  }
  return 'text-gray-500'
})
</script>

<template>
  <span :class="classes">
    ${{ formattedPrice }}
  </span>
</template>

<script setup>
import { computed } from 'vue'

const props = defineProps({
  price: {
    type: Number,
    required: true
  },
  size: {
    type: String,
    default: 'base',
    validator: (value) => ['sm', 'base', 'lg'].includes(value)
  },
  weight: {
    type: String,
    default: 'semibold',
    validator: (value) => ['normal', 'medium', 'semibold', 'bold'].includes(value)
  }
})

const formattedPrice = computed(() => {
  return props.price.toFixed(2)
})

const classes = computed(() => {
  const sizeClasses = {
    sm: 'text-sm',
    base: 'text-base',
    lg: 'text-lg'
  }
  
  const weightClasses = {
    normal: 'font-normal',
    medium: 'font-medium',
    semibold: 'font-semibold',
    bold: 'font-bold'
  }
  
  return `${sizeClasses[props.size]} ${weightClasses[props.weight]} text-gray-900`
})
</script>

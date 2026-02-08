<template>
  <div class="flex items-center gap-2">
    <PriceDisplay :price="stock.price" :size="size" />
    <PriceChangeIndicator :price="stock.price" :previousPrice="stock.previousPrice" />
  </div>
</template>

<script setup>
import PriceDisplay from '../../atoms/PriceDisplay/PriceDisplay.vue'
import PriceChangeIndicator from '../../atoms/PriceChangeIndicator/PriceChangeIndicator.vue'

const props = defineProps({
  stock: {
    type: Object,
    required: true,
    validator: (value) => {
      return value.name && typeof value.price === 'number' && typeof value.previousPrice === 'number'
    }
  },
  size: {
    type: String,
    default: 'base'
  }
})
</script>

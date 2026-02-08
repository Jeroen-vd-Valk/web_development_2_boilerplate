<template>
  <div class="flex flex-col">
    <Text :size="size" :weight="'bold'" :color="'gray-900'">
      {{ stock.name }}
    </Text>
    <PriceDisplay :price="stock.price" :size="priceSize" />
  </div>
</template>

<script setup>
import Text from '../../atoms/Text/Text.vue'
import PriceDisplay from '../../atoms/PriceDisplay/PriceDisplay.vue'

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
  },
  priceSize: {
    type: String,
    default: 'sm'
  }
})
</script>

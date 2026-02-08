<template>
  <RouterLink 
    :to="`/stock/${stock.name}`"
    class="bg-white rounded-lg shadow-md p-4 border border-gray-200 hover:shadow-lg transition-shadow cursor-pointer block"
  >
    <div class="flex justify-between items-center">
      <StockInfo :stock="stock" />
      <StockPrice :stock="stock" />
    </div>
  </RouterLink>
</template>

<script setup>
import { RouterLink } from 'vue-router'
import StockInfo from '../../molecules/StockInfo/StockInfo.vue'
import StockPrice from '../../molecules/StockPrice/StockPrice.vue'

const props = defineProps({
  stock: {
    type: Object,
    required: true,
    validator: (value) => {
      return value.name && typeof value.price === 'number' && typeof value.previousPrice === 'number'
    }
  }
})
</script>

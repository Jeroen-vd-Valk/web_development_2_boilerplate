<template>
  <div class="grid gap-4" :class="gridClasses">
    <StockCard
      v-for="stock in stocks"
      :key="stock.name"
      :stock="stock"
    />
  </div>
</template>

<script setup>
import { computed } from 'vue'
import StockCard from '../StockCard/StockCard.vue'

const props = defineProps({
  stocks: {
    type: Array,
    required: true,
    validator: (value) => {
      return value.every(stock => 
        stock.name && 
        typeof stock.price === 'number' && 
        typeof stock.previousPrice === 'number'
      )
    }
  },
  columns: {
    type: Number,
    default: 1,
    validator: (value) => value >= 1 && value <= 4
  }
})

const gridClasses = computed(() => {
  const columnClasses = {
    1: 'grid-cols-1',
    2: 'grid-cols-1 md:grid-cols-2',
    3: 'grid-cols-1 md:grid-cols-2 lg:grid-cols-3',
    4: 'grid-cols-1 md:grid-cols-2 lg:grid-cols-4'
  }
  return columnClasses[props.columns] || columnClasses[1]
})
</script>

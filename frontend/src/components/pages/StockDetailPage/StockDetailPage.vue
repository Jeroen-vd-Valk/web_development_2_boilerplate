<template>
  <StockTickerTemplate>
    <div class="max-w-4xl mx-auto">
      <RouterLink
        to="/"
        class="text-blue-600 hover:text-blue-800 font-medium mb-6 inline-flex items-center gap-2"
      >
        ← Back to Stock List
      </RouterLink>
      
      <div class="bg-white rounded-lg shadow-lg p-8 border border-gray-200">
        <Text :size="'3xl'" :weight="'bold'" :color="'gray-900'" class="mb-4">
          {{ stockName }}
        </Text>
        
        <StockPrice :stock="stock" />
      </div>
    </div>
  </StockTickerTemplate>
</template>

<script setup>
import { computed } from 'vue'
import { useRoute, RouterLink } from 'vue-router'
import StockTickerTemplate from '../../templates/StockTickerTemplate/StockTickerTemplate.vue'
import StockPrice from '../../molecules/StockPrice/StockPrice.vue'
import Text from '../../atoms/Text/Text.vue'

const route = useRoute()

// Get stock name from route parameter
const stockName = route.params.name

// Simple static stock data - in a real app, this would come from an API
const stock = computed(() => ({
  name: stockName,
  price: 100.50,
  previousPrice: 99.75
}))
</script>

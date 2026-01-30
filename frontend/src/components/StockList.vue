<!--
  StockList Component - Stock Ticker Application
  
  This component demonstrates:
  - Reactive data with ref()
  - Lifecycle hooks (onMounted, onUnmounted)
  - Dynamic styling with class binding
  - Automatic updates with setInterval
  - Array manipulation in Vue
  
-->

<script setup>
// ============================================
// IMPORTS - Vue Composition API functions
// ============================================
import { ref, onMounted, onUnmounted } from 'vue'

// ============================================
// REACTIVE DATA - ref() makes data reactive
// ============================================
// When these values change, Vue automatically updates the UI
// Each stock object contains:
//   - name: Stock symbol/name
//   - price: Current price (reactive)
//   - previousPrice: Previous price (to compare for color changes)

const stocks = ref([
  { name: 'AAPL', price: 150.25, previousPrice: 150.25 },
  { name: 'GOOGL', price: 2800.50, previousPrice: 2800.50 },
  { name: 'MSFT', price: 350.75, previousPrice: 350.75 },
  { name: 'AMZN', price: 3200.00, previousPrice: 3200.00 },
  { name: 'TSLA', price: 850.30, previousPrice: 850.30 }
])

// Store the interval ID so we can clear it when component is destroyed
let priceUpdateInterval = null

// ============================================
// FUNCTIONS (METHODS)
// ============================================

/**
 * Updates all stock prices by adding a random value between -1 and 1
 * This function:
 * 1. Loops through each stock
 * 2. Saves the current price as previousPrice
 * 3. Generates a random change between -1 and 1
 * 4. Updates the price
 * 
 * Because stocks is reactive (ref), Vue automatically updates the UI
 * when we modify the prices!
 */
function updatePrices() {
  stocks.value.forEach(stock => {
    // Save current price before updating (for color comparison)
    stock.previousPrice = stock.price
    
    // Generate random change between -1 and 1
    // Math.random() returns 0-1, so we multiply by 2 and subtract 1 to get -1 to 1
    const change = (Math.random() * 2) - 1
    
    // Round to 2 decimal places for currency display
    stock.price = Math.round((stock.price + change) * 100) / 100
  })
}

// ============================================
// LIFECYCLE HOOKS
// ============================================

/**
 * onMounted() runs once when the component is added to the page
 * This is the perfect place to:
 * - Set up timers/intervals
 * - Fetch data from APIs
 * - Initialize third-party libraries
 */
onMounted(() => {
  console.log('StockList component mounted - starting price updates')
  
  // Set up automatic price updates every 1000 milliseconds (1 second)
  // setInterval returns an ID that we store so we can stop it later
  priceUpdateInterval = setInterval(() => {
    updatePrices()
  }, 1000)
  
  // Start with one update immediately (optional)
  updatePrices()
})

/**
 * onUnmounted() runs when the component is removed from the page
 * This is important for cleanup:
 * - Clear intervals to prevent memory leaks
 * - Cancel API requests
 * - Remove event listeners
 */
onUnmounted(() => {
  console.log('StockList component unmounted - cleaning up')
  
  // Clear the interval to prevent memory leaks
  // If we don't do this, the interval keeps running even after component is removed!
  if (priceUpdateInterval) {
    clearInterval(priceUpdateInterval)
  }
})
</script>

<template>
  <div class="stock-list-container">
    <h1>📈 Stock Ticker</h1>
    <p class="subtitle">Real-time stock price updates (updates every second)</p>
    
    <!-- 
      TABLE STRUCTURE
      We use v-for to loop through the stocks array and create a row for each stock
      v-for="stock in stocks" means: for each item in the stocks array, create a <tr>
      :key="stock.name" helps Vue track which row is which (required for performance)
    -->
    <table class="stock-table">
      <thead>
        <tr>
          <th>Symbol</th>
          <th>Price</th>
          <th>Change</th>
        </tr>
      </thead>
      <tbody>
        <!-- 
          v-for DIRECTIVE - Loops through reactive array
          When stocks array changes, Vue automatically updates the table rows
        -->
        <tr v-for="stock in stocks" :key="stock.name">
          <!-- Display stock name -->
          <td class="symbol">{{ stock.name }}</td>
          
          <!-- 
            DYNAMIC CLASS BINDING - :class
            This adds CSS classes conditionally based on price comparison:
            - 'price-up' class if price > previousPrice (green)
            - 'price-down' class if price < previousPrice (red)
            - No class if price == previousPrice (no change)
            
            Syntax: :class="{ 'class-name': condition }
            This is equivalent to v-bind:class
          -->
          <td 
            :class="{
              'price-up': stock.price > stock.previousPrice,
              'price-down': stock.price < stock.previousPrice
            }"
            class="price"
          >
            ${{ stock.price.toFixed(2) }}
          </td>
          
          <!-- Display the change amount -->
          <td class="change">
            <!-- 
              CONDITIONAL RENDERING - v-if / v-else-if / v-else
              Shows different content based on conditions
            -->
            <span v-if="stock.price > stock.previousPrice" class="change-up">
              +${{ (stock.price - stock.previousPrice).toFixed(2) }}
            </span>
            <span v-else-if="stock.price < stock.previousPrice" class="change-down">
              -${{ (stock.previousPrice - stock.price).toFixed(2) }}
            </span>
            <span v-else class="change-neutral">
              $0.00
            </span>
          </td>
        </tr>
      </tbody>
    </table>
    
    <!-- Educational note -->
    <div class="info-box">
      <h3>💡 How it works:</h3>
      <ul>
        <li><strong>Reactive Data:</strong> The stocks array uses ref(), so changes automatically update the UI</li>
        <li><strong>Lifecycle Hooks:</strong> onMounted() starts the timer, onUnmounted() cleans it up</li>
        <li><strong>Dynamic Styling:</strong> :class binding adds green/red colors based on price changes</li>
        <li><strong>Automatic Updates:</strong> setInterval() calls updatePrices() every second</li>
      </ul>
    </div>
  </div>
</template>

<style scoped>
/* 
  SCOPED STYLES
  The 'scoped' attribute means these styles only apply to this component
  They won't affect other components or global styles
*/

.stock-list-container {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

h1 {
  text-align: center;
  color: #2c3e50;
  margin-bottom: 10px;
}

.subtitle {
  text-align: center;
  color: #7f8c8d;
  margin-bottom: 30px;
  font-style: italic;
}

/* Table Styles */
.stock-table {
  width: 100%;
  border-collapse: collapse;
  background: white;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
  border-radius: 8px;
  overflow: hidden;
  margin-bottom: 30px;
}

.stock-table thead {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  color: white;
}

.stock-table th {
  padding: 15px;
  text-align: left;
  font-weight: 600;
  text-transform: uppercase;
  font-size: 0.85em;
  letter-spacing: 1px;
}

.stock-table tbody tr {
  border-bottom: 1px solid #e0e0e0;
  transition: background-color 0.2s;
}

.stock-table tbody tr:hover {
  background-color: #f5f5f5;
}

.stock-table tbody tr:last-child {
  border-bottom: none;
}

.stock-table td {
  padding: 15px;
}

.symbol {
  font-weight: bold;
  font-size: 1.1em;
  color: #2c3e50;
}

.price {
  font-size: 1.2em;
  font-weight: 600;
  transition: color 0.3s;
}

/* Dynamic Price Colors */
.price-up {
  color: #27ae60; /* Green for price increase */
}

.price-down {
  color: #e74c3c; /* Red for price decrease */
}

.change {
  font-weight: 500;
}

.change-up {
  color: #27ae60;
}

.change-down {
  color: #e74c3c;
}

.change-neutral {
  color: #7f8c8d;
}

/* Info Box */
.info-box {
  background: #f8f9fa;
  border-left: 4px solid #667eea;
  padding: 20px;
  border-radius: 5px;
  margin-top: 20px;
}

.info-box h3 {
  margin-top: 0;
  color: #2c3e50;
}

.info-box ul {
  margin: 10px 0;
  padding-left: 20px;
}

.info-box li {
  margin: 8px 0;
  color: #555;
  line-height: 1.6;
}

.info-box strong {
  color: #2c3e50;
}
</style>

<!--
  App.vue - Main Application Component
  
  This is the root component of the Vue application.
  It imports and displays the StockList component.
  
  Educational Purpose: Demonstrates component composition in Vue.js
-->

<script setup>
// ============================================
// COMPONENT IMPORTS
// ============================================
// Import the StockList component so we can use it in the template
import StockList from './components/StockList.vue'
</script>

<template>
  <!-- 
    ROOT TEMPLATE
    This is where we place our main application content.
    The StockList component will be rendered here.
  -->
  <div id="app">
    <StockList />
  </div>
</template>

<style>
/* 
  GLOBAL STYLES
  These styles apply to the entire application.
  Note: No 'scoped' attribute means these are global styles.
*/

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
  min-height: 100vh;
  padding: 20px;
}

#app {
  width: 100%;
}
</style>

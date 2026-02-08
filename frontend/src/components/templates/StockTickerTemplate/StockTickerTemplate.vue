<template>
  <div class="min-h-screen bg-gray-50 py-8 px-4">
    <div class="max-w-7xl mx-auto">
      <header class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Stock Ticker</h1>
        <p class="text-gray-600 mt-2">Real-time stock prices</p>
      </header>
      <main>
        <slot />
      </main>
    </div>
  </div>
</template>

<script setup>
// Template component - no props needed
</script>

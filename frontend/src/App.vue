<!--
  Vue Single-File Component (.vue file)
  Contains 3 sections:
  1. <template> - HTML with Vue directives
  2. <script setup> - JavaScript (Composition API)
  3. <style scoped> - CSS (scoped = only applies to this component)
-->

<script setup>
// Import Vue functions
import { ref, computed, onMounted } from 'vue'
import UserCard from './components/UserCard.vue'

// ============================================
// REACTIVITY - ref() makes data reactive
// ============================================
// When you change these values, Vue automatically updates the page
const count = ref(0)  // Use .value in JavaScript, but not in templates
const message = ref('Hello Vue!')
const userName = ref('')

// ============================================
// COMPUTED PROPERTIES - automatically recalculate
// ============================================
// These only recalculate when their dependencies change (efficient!)
const doubleCount = computed(() => count.value * 2)
const greeting = computed(() => {
  return userName.value ? `Hello, ${userName.value}!` : 'Enter your name above'
})

// ============================================
// FUNCTIONS (METHODS)
// ============================================
function increment() {
  count.value++  // Use .value to modify reactive data in JavaScript
}

function decrement() {
  count.value--
}

// ============================================
// LIFECYCLE HOOKS - run code at specific times
// ============================================
// onMounted runs once when component is added to the page
onMounted(() => {
  console.log('Component loaded!')
  // This is where you'd typically load data from an API
})
</script>

<template>
  <div class="container">
    <h1>Vue.js Learning Demo</h1>

    <!-- 1. TEXT INTERPOLATION - {{ }} displays data -->
    <section class="demo">
      <h2>1. Text Interpolation & Reactivity</h2>
      <p>Message: <strong>{{ message }}</strong></p>
      <p>Count: <strong>{{ count }}</strong></p>
      <p class="note">💡 The count updates automatically when you click buttons!</p>
    </section>

    <!-- 2. EVENT HANDLING - @click calls functions -->
    <section class="demo">
      <h2>2. Event Handling (@click)</h2>
      <button @click="increment">➕ Increment</button>
      <button @click="decrement">➖ Decrement</button>
      <p>Count: {{ count }}</p>
    </section>

    <!-- 3. COMPUTED PROPERTIES - automatically calculated -->
    <section class="demo">
      <h2>3. Computed Properties</h2>
      <p>Count: {{ count }}</p>
      <p>Double count: <strong>{{ doubleCount }}</strong></p>
      <p class="note">💡 This is calculated automatically and only updates when count changes!</p>
    </section>

    <!-- 4. TWO-WAY BINDING - v-model connects input to data -->
    <section class="demo">
      <h2>4. Two-Way Data Binding (v-model)</h2>
      <input 
        type="text" 
        v-model="userName" 
        placeholder="Type your name..."
      />
      <p>{{ greeting }}</p>
    </section>

    <!-- 5. CONDITIONAL RENDERING - v-if shows/hides elements -->
    <section class="demo">
      <h2>5. Conditional Rendering (v-if)</h2>
      <p v-if="count > 5">✅ Count is greater than 5!</p>
      <p v-else>❌ Count is 5 or less</p>
    </section>

    <!-- 6. PROPS - passing data to child components -->
    <section class="demo">
      <h2>6. Props (Passing Data to Components)</h2>
      <UserCard 
        v-if="userName"
        :user-name="userName"
        :count="count"
      />
      <p v-else class="hint">Enter your name above to see the UserCard component!</p>
    </section>
  </div>
</template>

<style scoped>
/* Scoped styles only apply to this component */
.container {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
  font-family: Arial, sans-serif;
}

h1 {
  text-align: center;
  color: #42b983;
}

.demo {
  background: #f5f5f5;
  padding: 20px;
  margin: 20px 0;
  border-radius: 8px;
  border-left: 4px solid #42b983;
}

.demo h2 {
  margin-top: 0;
  color: #333;
}

button {
  padding: 10px 20px;
  margin: 5px;
  background: #42b983;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
}

button:hover {
  background: #35a372;
}

input {
  padding: 10px;
  font-size: 16px;
  border: 2px solid #ddd;
  border-radius: 5px;
  width: 300px;
}

input:focus {
  outline: none;
  border-color: #42b983;
}

.note {
  background: #e7f3ff;
  padding: 10px;
  border-radius: 5px;
  color: #0d47a1;
  margin-top: 10px;
}

.hint {
  color: #666;
  font-style: italic;
}
</style>

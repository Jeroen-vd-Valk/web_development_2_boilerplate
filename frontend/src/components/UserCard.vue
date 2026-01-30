<!--
  UserCard Component - Demonstrates Props
  Props allow parent components to pass data to child components
-->

<script setup>
// ============================================
// DEFINING PROPS
// ============================================
// defineProps() declares what data this component accepts from parent
const props = defineProps({
  userName: {
    type: String,
    required: true  // Parent must provide this
  },
  count: {
    type: Number,
    default: 0  // Optional, defaults to 0 if not provided
  }
})

// You can use props in computed properties
import { computed } from 'vue'

const message = computed(() => {
  if (props.count === 0) {
    return "You haven't clicked yet!"
  } else if (props.count < 5) {
    return "Keep clicking!"
  } else {
    return "You're clicking a lot! 🎉"
  }
})
</script>

<template>
  <div class="card">
    <h3>👤 User Card</h3>
    <p>Name: <strong>{{ userName }}</strong></p>
    <p>Click count: <strong>{{ count }}</strong></p>
    <p class="message">{{ message }}</p>
    <p class="note">💡 This component received userName and count as props from the parent!</p>
  </div>
</template>

<style scoped>
.card {
  background: white;
  border: 2px solid #42b983;
  border-radius: 8px;
  padding: 20px;
  margin-top: 15px;
}

.card h3 {
  margin-top: 0;
  color: #42b983;
}

.message {
  color: #28a745;
  font-style: italic;
}

.note {
  background: #e7f3ff;
  padding: 10px;
  border-radius: 5px;
  color: #0d47a1;
  font-size: 0.9em;
  margin-top: 15px;
}
</style>

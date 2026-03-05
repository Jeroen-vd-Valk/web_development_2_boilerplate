<!--
  Note: This component is simplified for demonstration purposes.
  In a production application, this would typically be broken down into smaller,
  reusable components (e.g., Card, LoadingSpinner, UserInfo, etc.).
-->
<template>
  <div class="min-h-screen flex items-center justify-center bg-gray-50">
    <div class="max-w-md w-full bg-white shadow-md rounded-lg p-8">
      <h1 class="text-2xl font-bold mb-6 text-center">Welcome</h1>
      <div v-if="loading" class="text-center">
        <p>Checking authentication...</p>
      </div>
      <div v-else-if="user" class="text-center">
        <p class="text-green-600 font-semibold">You are logged in!</p>
        <p class="mt-2 text-gray-600">{{ user.email || 'User authenticated' }}</p>
      </div>
      <div v-else class="text-center">
        <p class="text-gray-600">You are not logged in.</p>
        <router-link
          to="/login"
          class="mt-4 inline-block text-blue-600 hover:text-blue-800 underline"
        >
          Go to Login
        </router-link>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from '../utils/axios.js';

const loading = ref(true);
const user = ref(null);

onMounted(async () => {
  try {
    const response = await axios.get('/auth/me');
    user.value = response.data;
  } catch (error) {
    // If 401 or no token, user is not authenticated
    user.value = null;
  } finally {
    loading.value = false;
  }
});
</script>

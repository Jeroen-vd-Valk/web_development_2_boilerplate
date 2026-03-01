<template>
  <div>
    <!-- Loading State -->
    <div v-if="loading" class="min-h-screen flex items-center justify-center">
      <div class="text-center">
        <div
          class="inline-block animate-spin rounded-full h-12 w-12 border-b-2 border-blue-600 mb-4"
        ></div>
        <p class="text-gray-600">Loading products...</p>
      </div>
    </div>

    <!-- Error State -->
    <div
      v-else-if="error"
      class="min-h-screen flex items-center justify-center"
    >
      <div class="text-center max-w-md">
        <div class="text-red-600 text-5xl mb-4">⚠️</div>
        <h2 class="text-2xl font-bold text-gray-900 mb-2">
          Error Loading Products
        </h2>
        <p class="text-gray-600 mb-4">{{ error }}</p>
        <button
          @click="fetchProducts"
          class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors"
        >
          Try Again
        </button>
      </div>
    </div>

    <!-- Product List -->
    <div v-else class="min-h-screen bg-gray-50 py-8">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-8 flex justify-between items-center">
          <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Products</h1>
            <p class="text-gray-600">Manage your product inventory</p>
          </div>
          <router-link
            to="/createproduct"
            class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors font-medium"
          >
            Add New Product
          </router-link>
        </div>

        <!-- Products Grid -->
        <div
          v-if="products && products.length > 0"
          class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"
        >
          <ProductListItem
            v-for="product in products"
            :key="product.id"
            :product="product"
            @delete="handleDelete"
          />
        </div>

        <!-- Empty State -->
        <div v-else class="text-center py-12 bg-white rounded-lg shadow">
          <p class="text-gray-600 text-lg mb-4">No products found.</p>
          <router-link
            to="/createproduct"
            class="inline-block px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors"
          >
            Create Your First Product
          </router-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import { useRouter } from "vue-router";
import axios from "axios";
import config from "../../../config.js";
import ProductListItem from "../../organisms/ProductListItem/ProductListItem.vue";

const router = useRouter();
const products = ref([]);
const loading = ref(true);
const error = ref(null);

/**
 * Fetch products from the API
 */
const fetchProducts = async () => {
  loading.value = true;
  error.value = null;

  try {
    // fetch products from API
    // update data
  } catch (err) {
    console.error("Error fetching products:", err);
    error.value =
      err.response?.data?.message ||
      err.message ||
      "Failed to load products. Please try again later.";
    products.value = [];
  } finally {
    loading.value = false;
  }
};

/**
 * Handle product deletion
 */
const handleDelete = async (productId) => {
  // TODO: send DELETE request to API
  // on success, refetch products
};

// Fetch products when component is mounted
onMounted(() => {
  fetchProducts();
});
</script>

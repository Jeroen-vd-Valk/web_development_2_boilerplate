<template>
  <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200 overflow-hidden">
    <div class="p-6">
      <div class="flex items-start justify-between mb-3">
        <CategoryBadge 
          v-if="product.category" 
          :category="product.category.name" 
        />
        <span v-else class="text-sm text-gray-500">No Category</span>
      </div>
      
      <h3 class="text-xl font-bold text-gray-900 mb-2">
        {{ product.name }}
      </h3>
      
      <p class="text-2xl font-semibold text-blue-600 mb-3">
        ${{ product.price.toFixed(2) }}
      </p>
      
      <p 
        class="text-sm text-gray-600 mb-4 line-clamp-3"
      >
        {{ product.description }}
      </p>
      
      <div class="flex gap-2">
        <router-link
          :to="`/editproduct/${product.id}`"
          class="flex-1 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-center text-sm font-medium"
        >
          Edit
        </router-link>
        <button
          @click="handleDelete"
          class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors text-sm font-medium"
        >
          Delete
        </button>
      </div>
    </div>
  </div>
</template>

<script setup>
import CategoryBadge from '../../molecules/CategoryBadge/CategoryBadge.vue';

const props = defineProps({
  product: {
    type: Object,
    required: true,
    validator: (value) => {
      return value.id && value.name && value.price !== undefined && value.description;
    },
  },
});

const emit = defineEmits(['delete']);

const handleDelete = () => {
  emit('delete', props.product.id);
};
</script>

<style scoped>
.line-clamp-3 {
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
</style>

import { createRouter, createWebHistory } from 'vue-router';
import ProductList from '../components/pages/ProductList/ProductList.vue';
import CreateProduct from '../components/pages/CreateProduct/CreateProduct.vue';
import EditProduct from '../components/pages/EditProduct/EditProduct.vue';

const routes = [
  {
    path: '/',
    name: 'ProductList',
    component: ProductList,
  },
  {
    path: '/createproduct',
    name: 'CreateProduct',
    component: CreateProduct,
  },
  {
    path: '/editproduct/:id',
    name: 'EditProduct',
    component: EditProduct,
    props: true,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;

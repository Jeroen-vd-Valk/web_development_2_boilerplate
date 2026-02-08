import { createRouter, createWebHistory } from 'vue-router'
import StockTickerPage from '../components/pages/StockTickerPage/StockTickerPage.vue'
import StockDetailPage from '../components/pages/StockDetailPage/StockDetailPage.vue'

const routes = [
  {
    path: '/',
    name: 'StockTicker',
    component: StockTickerPage
  },
  {
    path: '/stock/:name',
    name: 'StockDetail',
    component: StockDetailPage,
    props: true
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router

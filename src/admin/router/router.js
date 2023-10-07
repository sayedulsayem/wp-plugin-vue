import { createRouter, createWebHashHistory } from 'vue-router'
import Home from 'admin/pages/Home.vue'
import Settings from 'admin/pages/Settings.vue'

const routes = [
  { path: '/', component: Home },
  { path: '/settings', component: Settings },
]

const router = createRouter({
  history: createWebHashHistory(),
  routes,
})

export default router;
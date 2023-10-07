import { createRouter, createWebHashHistory} from 'vue-router'
import Home from 'frontend/pages/Home.vue'
import Profile from 'frontend/pages/Profile.vue'

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/profile',
    name: 'Profile',
    component: Profile
  },
]

const router = createRouter({
  history: createWebHashHistory(),
  routes,
})

export default router;
import VueRouter from 'vue-router'
import Login from '@/views/Login'
import Logout from '@/views/Logout'
import Dashboard from '@/views/Dashboard'

let routes = [
  {
    path: '/',
    name: 'dashboard',
    component: Dashboard
  },
  {
    path: '/login',
    name: 'login',
    component: Login
  },
  {
    path: '/logout',
    name: 'logout',
    component: Logout
  }
]

export default new VueRouter({
  routes
})

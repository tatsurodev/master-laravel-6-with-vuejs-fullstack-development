import VueRouter from 'vue-router'
import ExampleComponent from './components/ExampleComponent'
import Example2 from './components/Example2'

const routes = [
  {
    path: '/',
    component: ExampleComponent,
    name: 'home'
  },
  {
    path: '/second',
    component: Example2,
    name: 'second'
  }
]

const router = new VueRouter({
  routes,
  mode: 'history',
})

export default router

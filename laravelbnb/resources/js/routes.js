import VueRouter from 'vue-router'
import Bookable from './bookable/Bookable'
import Bookables from './bookables/Bookables'
import Review from './review/Review'
import Basket from './basket/Basket'

const routes = [
  {
    path: '/',
    component: Bookables,
    name: 'home'
  },
  {
    path: '/bookables/:id',
    component: Bookable,
    name: 'bookable'
  },
  {
    path: '/review/:id',
    component: Review,
    name: 'review'
  },
  {
    path: '/basket',
    component: Basket,
    name: 'basket'
  }
]

const router = new VueRouter({
  routes,
  mode: 'history',
})

export default router

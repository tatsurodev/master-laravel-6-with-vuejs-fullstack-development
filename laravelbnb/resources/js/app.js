require('./bootstrap')

import router from './routes'
import VueRouter from 'vue-router'
import Index from './Index'
import moment from 'moment'

window.Vue = require('vue')

Vue.use(VueRouter)

Vue.filter('fromNow', value => moment(value).fromNow())

const app = new Vue({
  el: '#app',
  router,
  components:
  {
    Index,
  }
})

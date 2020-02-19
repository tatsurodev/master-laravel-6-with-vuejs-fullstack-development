<template>
  <div class="row">
    <div class="col-md-8 pb-4">
      <div class="card">
        <div class="card-body">
          <div v-if="!loading">
            <h2>{{ bookable.title }}</h2>
            <hr />
            <article>{{ bookable.description }}</article>
          </div>
          <div v-else>loading...</div>
        </div>
      </div>
      <review-list :bookable-id="$route.params.id"></review-list>
    </div>
    <div class="col-md-4 pb-4">
      <Availability :bookable-id="$route.params.id" @availability="checkPrice($event)"></Availability>
    </div>
  </div>
</template>

<script>
import Availability from './Availability'
import ReviewList from './ReviewList'
import { mapState } from 'vuex'

export default {
  components: {
    Availability,
    ReviewList
  },
  data() {
    return {
      bookable: null,
      loading: false,
      price: null
    }
  },
  created() {
    this.loading = true
    axios.get(`/api/bookables/${this.$route.params.id}`).then(response => {
      this.bookable = response.data.data
      this.loading = false
    })
  },
  computed: {
    ...mapState(['lastSearch'])
  },
  methods: {
    async checkPrice(hasAvailability) {
      if (!hasAvailability) {
        this.price = null
        return
      }

      try {
        this.price = (
          await axios.get(
            `/api/bookables/${this.bookable.id}/price?from=${this.lastSearch.from}&to=${this.lastSearch.to}`
          )
        ).data.data
      } catch (err) {
        this.price = null
      }
    }
  }
}
</script>

<style lang="scss" scoped>
</style>
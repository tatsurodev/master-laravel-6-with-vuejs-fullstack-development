<template>
  <div>
    <h6 class="text-uppercase text-secondary font-weight-bolder">Check Availability</h6>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="from">From</label>
        <!-- v-model使用時は、value, checked, selected attributeはignroeされる -->
        <input
          type="text"
          name="from"
          class="form-control form-control-sm"
          placeholder="Start date"
          v-model="from"
          @keyup.enter="check"
        />
      </div>
      <div class="form-group col-md-6">
        <label for="to">To</label>
        <input
          type="text"
          name="to"
          class="form-control form-control-sm"
          placeholder="Start date"
          v-model="to"
          @keyup.enter="check"
        />
      </div>
      <button class="btn btn-secondary btn-block" @click="check" :disabled="loading">Check!</button>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      from: null,
      to: null,
      loading: false,
      status: null,
      errors: null
    }
  },
  methods: {
    check() {
      this.loading = true
      axios
        .get(
          `/api/bookables/${this.$route.params.id}/availability?from=${this.from}&to=${this.to}`
        )
        .then(response => {
          this.status = response.status
        })
        // status codeが200いくつか以外ならcatchされる
        .catch(error => {
          // validation errorを格納
          if (422 === error.response.status) {
            this.errors = error.response.data.errors
          }
          this.status = error.response.status
        })
        // always executed, finallyと一緒
        .then(() => (this.loading = false))
    }
  }
}
</script>

<style scoped>
label {
  font-size: 0.7rem;
  text-transform: uppercase;
  color: gray;
  font-weight: bolder;
}
</style>
<template>
  <div>
    <h1>{{ ItemTitle }}</h1>
    <p>{{ ItemContent }}</p>
  </div>
</template>

<script>
export default {
  props: { ItemTitle: String, ItemContent: String, price: Number },
  mounted() {
    console.log(this.ItemTitle)
    // this.ItemTitle = 'New title'
  }
}
</script>

<style scoped>
</style>
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
    // propsを更新してもparent componentからpropsが渡ってくると更新されてしまうのでbad idea
    // setTimeout(() => {
    //   this.ItemTitle = 'New title'
    // }, 1500)
  }
}
</script>

<style scoped>
</style>
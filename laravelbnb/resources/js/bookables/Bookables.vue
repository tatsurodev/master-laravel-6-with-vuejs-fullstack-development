<template>
  <div>
    <!-- <BookableListItem></BookableListItem> -->
    <bookable-list-item></bookable-list-item>
    <bookable-list-item></bookable-list-item>
    <bookable-list-item></bookable-list-item>
    <bookable-list-item></bookable-list-item>
    <bookable-list-item></bookable-list-item>
  </div>
</template>

<script>
import BookableListItem from './BookableListItem'
export default {
  components: {
    // PascaleCaseで登録するとtemplateでPascaleCase or kebab-caseで使用可
    // kebab-caseで登録するとtemplateではkebab-caseのみで使用可
    BookableListItem
  }
}
</script>

<style scoped>
</style>
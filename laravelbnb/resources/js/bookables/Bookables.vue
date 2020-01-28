<template>
  <div>
    <!-- <BookableListItem></BookableListItem> -->
    <!-- kebab-caseで渡したpropsは、PascaleCaseで使用する -->
    <!-- propsの型を指定するにはv-bindでquoteの中をjavascript式にして、渡したい型の文字列、数字、配列、オブジェクト等を指定する -->
    <bookable-list-item
      v-if="bookable1"
      :item-title="bookable1.title"
      :item-content="bookable1.content"
      :price="1000"
    ></bookable-list-item>
    <bookable-list-item
      v-if="bookable2"
      :item-title="bookable2.title"
      :item-content="bookable2.content"
      :price="1500"
    ></bookable-list-item>
  </div>
</template>

<script>
import BookableListItem from './BookableListItem'
export default {
  components: {
    // PascaleCaseで登録するとtemplateでPascaleCase or kebab-caseで使用可
    // kebab-caseで登録するとtemplateではkebab-caseのみで使用可
    BookableListItem
  },
  // reactiveに表示したいものはdataに格納、そうでないものはpropsを使うと良い
  data() {
    return {
      bookable1: null,
      bookable2: null
    }
  },
  //   beforeCreate() {
  //     console.log('before create')
  //   },
  // apiでdataを取得するような場合、時間が多少かかるのでcreated等でできるだけ早くdataを取得するようにするとbetter
  created() {
    setTimeout(() => {
      this.bookable1 = {
        title: 'Cheap Villa',
        content: 'A very cheap villa'
      }
      this.bookable2 = {
        title: 'Cheap Villa 2',
        content: 'A very cheap villa 2'
      }
    }, 2000)
  }
}
</script>

<style scoped>
</style>
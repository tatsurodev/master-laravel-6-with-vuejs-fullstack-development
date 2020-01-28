<template>
  <div>
    Rows is : {{ rows }}
    <div v-if="loading">Data is loading...</div>
    <div v-else>
      <!-- <BookableListItem></BookableListItem> -->
      <!-- kebab-caseで渡したpropsは、PascaleCaseで使用する -->
      <!-- propsの型を指定するにはv-bindでquoteの中をjavascript式にして、渡したい型の文字列、数字、配列、オブジェクト等を指定する -->
      <!-- bookablesがnullの時、v-forはスキップされる -->
      <bookable-list-item
        :item-title="bookable.title"
        :item-content="bookable.content"
        :price="1000"
        v-for="(bookable, index) in bookables"
        :key="index"
      ></bookable-list-item>
    </div>
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
      bookables: null,
      // loading中であればtrueなので初期値はfalse
      loading: false,
      // bootstrapのgridで表示するcolumns数
      columns: 3
    }
  },
  computed: {
    // column数とbookablesの数からrow数を計算
    rows() {
      return this.bookables === null
        ? 0
        : Math.ceil(this.bookables.length / this.columns)
    }
  },
  // apiでdataを取得するような場合、時間が多少かかるのでcreated等でできるだけ早くdataを取得するようにするとbetter
  created() {
    this.loading = true
    setTimeout(() => {
      this.bookables = [
        {
          title: 'Cheap Villa',
          content: 'A very cheap villa'
        },
        {
          title: 'Cheap Villa 2',
          content: 'A very cheap villa 2'
        },
        {
          title: 'Cheap Villa 2',
          content: 'A very cheap villa 2'
        },
        {
          title: 'Cheap Villa 2',
          content: 'A very cheap villa 2'
        },
        {
          title: 'Cheap Villa 2',
          content: 'A very cheap villa 2'
        },
        {
          title: 'Cheap Villa 2',
          content: 'A very cheap villa 2'
        },
        {
          title: 'Cheap Villa 2',
          content: 'A very cheap villa 2'
        }
      ]
      this.loading = false
    }, 2000)
  }
}
</script>

<style scoped>
</style>
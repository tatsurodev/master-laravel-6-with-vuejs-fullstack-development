<template>
  <div>
    <!-- <BookableListItem></BookableListItem> -->
    <!-- kebab-caseで渡したpropsは、PascaleCaseで使用する -->
    <!-- propsの型を指定するにはv-bindでquoteの中をjavascript式にして、渡したい型の文字列、数字、配列、オブジェクト等を指定する -->
    <bookable-list-item item-title="Cheap Villa" item-content="A very cheap villa" :price="1000"></bookable-list-item>
    <bookable-list-item
      item-title="Cheap Villa 2"
      item-content="A very cheap villa 2"
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
  //   beforeCreate() {
  //     console.log('before create')
  //   },
  // apiでdataを取得するような場合、時間が多少かかるのでcreated等でできるだけ早くdataを取得するようにするとbetter
  created() {
    console.log('created')
  }
  //   beforeMount() {
  //     console.log('before mount')
  //   },
  // child componentのmountedが呼ばれてからparent componentのmountedが呼ばれる
  //   mounted() {
  //     console.log('mounted')
  //   }
  // destroyは表示されるcomponentが変化する時にcall
  //   beforeDestroy() {
  //     console.log('before destroy')
  //   },
  //   destroyed() {
  //     console.log('destroyed')
  //   }
}
</script>

<style scoped>
</style>
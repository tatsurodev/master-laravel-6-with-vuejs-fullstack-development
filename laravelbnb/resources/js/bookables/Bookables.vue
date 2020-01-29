<template>
  <div>
    <div v-if="loading">Data is loading...</div>
    <div v-else>
      <div class="row mb-4" v-for="row in rows" :key="'row' + row">
        <!-- keyにrowだけだと他のforのindex等と被って一意でないのエラーが出るのでkeyを自作 -->
        <div
          class="col d-flex align-items-strech"
          v-for="(bookable, column) in bookablesInRow(row)"
          :key="'row' + row + column"
        >
          <!-- <BookableListItem></BookableListItem> -->
          <!-- kebab-caseで渡したpropsは、PascaleCaseで使用する -->
          <!-- propsの型を指定するにはv-bindでquoteの中をjavascript式にして、渡したい型の文字列、数字、配列、オブジェクト等を指定する -->
          <!-- bookablesがnullの時、v-forはスキップされる -->
          <!-- objectのproperty(:title="bookable.title", :description="bookable.description"とか)をpropertyとして全部渡す時、一々明示的に書かなくても、v-bind="object"で一気に書ける。つまり、v-bind=で指定したobjectのproperty全てがchild componentにpropsとして渡すことができる -->
          <bookable-list-item v-bind="bookable"></bookable-list-item>
        </div>
        <div class="col" v-for="p in placeholdersInRow(row)" :key="'placeholder' + row + p"></div>
      </div>
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
  methods: {
    // 該当の行に存在するbookablesを返す
    bookablesInRow(row) {
      return this.bookables.slice((row - 1) * this.columns, row * this.columns)
    },
    // 該当の行の空列数を返す
    placeholdersInRow(row) {
      return this.columns - this.bookablesInRow(row).length
    }
  },
  // apiでdataを取得するような場合、時間が多少かかるのでcreated等でできるだけ早くdataを取得するようにするとbetter
  created() {
    this.loading = true

    const request = axios.get('/api/bookables').then(response => {
      // response.dataのdataはaxiosのproperty, response.data.dataの最後のdataはlaravelのapi resourceによって自動的に付与されるjson objectのproperty
      this.bookables = response.data.data
      this.bookables.push({ title: 'x', description: 'x' })
      this.loading = false
    })
  }
}
</script>

<style scoped>
</style>
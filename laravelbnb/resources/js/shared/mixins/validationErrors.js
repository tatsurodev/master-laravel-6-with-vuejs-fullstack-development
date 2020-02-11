export default {
  data() {
    return {
      errors: null
    }
  },
  methods:
  {
    errorFor(field) {
      // validation errorあり & そのerrorが該当fieldのerror で該当fieldのerrorをreturn, なければnull
      return null !== this.errors && this.errors[field]
        ? this.errors[field]
        : null
    }
  }
}
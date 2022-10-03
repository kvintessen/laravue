<template>
  <div id="container">
    <h1>Данный человек доделает фронт(шутка) - {{fullname}}</h1>
  </div>
</template>

<script>
  export default {
    name: 'article-component',
    computed: {
      fullname() {
        return this.$store.getters.getFullName;
      },
      name(){
        return this.$store.state.firstname;
      }
    }
  }
</script>

<style scoped>

</style>


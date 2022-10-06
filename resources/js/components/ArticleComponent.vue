<template>
  <div id="container">
    <h1>Данный человек доделает фронт(шутка)</h1>
  </div>
</template>

<script>
import { mapActions } from 'vuex'

export default {
    name: 'article-component',
    mounted() {
        this.fetchData()
    },
    methods: {
        ...mapActions('article', ['fetchData']),
    },
}
</script>

<style scoped>

</style>


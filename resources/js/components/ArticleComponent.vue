<template>
  <div id="container">
    <h1>Данный человек доделает фронт(шутка)</h1>
  </div>
</template>

<script>
import {mapActions, mapState} from 'vuex'

export default {
    name: 'article-component',
    mounted() {
        this.fetchData()
    },
    computed: {
        ...mapState('article', {
            id:         state => state.id,
            title:      state => state.title,
            img:        state => state.img,
            body:       state => state.body,
            created_at: state => state.created_at,
            comments:   state => state.comments,
            tags:       state => state.tags,
            statistic:  state => state.statistic,
        }),
    },
    methods: {
        ...mapActions('article', ['fetchData']),
    },
}
</script>

<style scoped>

</style>


<template>
    <div class="row mt-5">
        <div
            class="col-12 p-3"
            v-if="is_loaded"
        >
            <img :src="img" class="border rounded mx-auto d-block" alt="...">
            <h5 class="mt-5">{{ title }}</h5>
            <p>
                <span class="tag" v-for="(tag, index) in tags">
                    <span v-if="tags.length === (index + 1)">{{ tag.label }}</span>
                    <span v-else>{{ tag.label }} | </span>
                </span>
            </p>
            <p class="card-text">{{ body }}</p>
            <p>Опубликованно: <i>{{ created_at }}</i></p>
        </div>
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
            is_loaded:  state => state.is_loaded,
        }),
    },
    methods: {
        ...mapActions('article', ['fetchData']),
    },
}
</script>

<style scoped>

</style>


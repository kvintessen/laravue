import {fetchArticlesData} from "../../api/articles/getArticles";

export default {
    namespaced: true,

    state: {
        slug:       null,
        is_loaded:  false,
        id:         null,
        title:      null,
        img:        null,
        body:       null,
        created_at: null,
        comments:   null,
        tags:       null,
        statistic:  null,
    },
    mutations: {
        setIsLoaded(state) {
            state.is_loaded = true
        },
        setSlug(state) {
            let url = window.location.pathname
            state.slug = url.substring(url.lastIndexOf('/')+1)
        },
        setId(state, id) {
            state.id = id
        },
        setTitle(state, title) {
            state.title = title
        },
        setImg(state, img) {
            state.img = img
        },
        setBody(state, body) {
            state.body = body
        },
        setCreated_at(state, created_at) {
            state.created_at = created_at
        },
        setComments(state, comments) {
            state.comments = comments()
        },
        setTags(state, tags) {
            state.tags = tags
        },
        setStatistic(state, statistic) {
            state.statistic = statistic
        },
    },
    actions: {
        async fetchData({commit, dispatch, state}) {
            commit('setSlug')
            const response = await fetchArticlesData(state.slug)
            console.log(response)
        }
    }
}

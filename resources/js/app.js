require('./bootstrap');

import store from './store'
import { createApp } from 'vue'
import ArticleComponent from './components/ArticleComponent'
import CommentsComponent from "./components/CommentsComponent";


const app = createApp({})

app
    .component(ArticleComponent.name, ArticleComponent)
    .component(CommentsComponent.name, CommentsComponent);

app
    .use(store)
    .mount('#app')
import {route} from '../api';
const $axios = require('axios').default;

export const fetchArticlesData = (slug) => {
    return $axios.get(`${route()}/article-json/` + slug)
};

import Actions from './actions';
import Mutations from './mutations';
import BlogApi from '@/services/api/blog/api';

export default {
    state: {
        posts: null,
        post: null,
        relativePosts: []
    },

    mutations: {
        [Mutations.BLOG_SAVE_LATEST](state, posts) {
            state.posts = posts;
        },

        [Mutations.BLOG_SAVE](state, post) {
            state.post = post;
        },

        [Mutations.BLOG_SAVE_RELATIVE](state, relativePosts) {
            state.relativePosts = relativePosts;
        }
    },

    actions: {
        [Actions.BLOG_FETCH_LATEST]({commit}, limit) {
            const posts = BlogApi.fetchLatestPosts(limit);
            commit(Mutations.BLOG_SAVE_LATEST, posts);
        },

        [Actions.BLOG_FETCH]({commit}, id) {
            const post = BlogApi.fetchPost(id);
            console.log('I fetched a post ' + id);
            console.log(post);
            commit(Mutations.BLOG_SAVE, post);
        },

        [Actions.BLOG_FETCH_RELATIVE]({commit}, id) {
            const posts = BlogApi.fetchRelativePosts(id);
            commit(Mutations.BLOG_SAVE_RELATIVE, posts);
        }
    }
};

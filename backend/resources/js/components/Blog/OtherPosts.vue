<template>
    <div class="other-posts-container">
        <h3>{{ $t('Other news') }}</h3>
        <div v-for="post in relativePosts">
            <router-link
                :to="{name: routeNames().ROUTE_BLOG_POST, params: {id: post.id}}"
                class="other-post"
                tag="a"
            >
                <font-awesome-icon icon="angle-right"/>
                {{post.title}}
            </router-link>
        </div>
    </div>
</template>

<script>
    import Actions from "@/store/actions";
    import {mapState} from 'vuex';
    import routeNames from "@/services/mixin/routeNames";

    export default {
        name: "OtherPosts",
        mixins: [routeNames],
        props: {
            postId: {
                type: Number,
                required: true
            }
        },
        computed: {
            ...mapState({
                relativePosts: state => state.blog.relativePosts
            })
        },
        created() {
            this.$store.dispatch(Actions.BLOG_FETCH_RELATIVE, this.postId);
        }
    }
</script>

<style scoped lang="scss">
    .other-posts-container {
        width: auto;
        padding: 0 50px;
        max-width: 1200px;
        margin: 0 auto 30px auto;

        h3 {
            font-family: "SF UI Text Bold", sans-serif;
            display: block;
            margin: 30px 0 20px 0;
            font-size: 21px;
            color: #191a1d;
        }

        .other-post {
            outline: none;
            text-decoration: underline;
            color: #153e5c;
            cursor: pointer;
            font-family: "SF UI Text Regular", sans-serif;
            font-size: 14px;

            &:hover {
                outline-width: 0;
            }
        }
    }
</style>

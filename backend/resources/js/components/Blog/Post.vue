<template>
    <div class="post-container">
        <h1>{{post.title}}</h1>
        <div class="published-at">
            <font-awesome-icon icon="calendar-alt"/> {{post.long_published_at}}
        </div>
        <div class="post-content" v-html="post.content"></div>
    </div>
</template>

<script>
    import {mapState} from 'vuex';
    import Actions from "@/store/actions";

    export default {
        name: "Post",
        props: {
            postId: {
                type: Number,
                required: true
            }
        },
        computed: {
            ...mapState({
                post: state => state.blog.post
            })
        },
        created() {
            this.$store.dispatch(Actions.BLOG_FETCH, this.postId);
        }
    }
</script>

<style scoped lang="scss">
    .post-container {
        width: auto;
        padding: 0 50px;
        max-width: 1200px;
        margin: 0 auto;

        h1 {
            letter-spacing: -1px;
            line-height: 1.1;
            font-family: "SF UI Text Bold", sans-serif;
            margin: 20px 0;
            font-weight: normal;
            font-size: 28px;
            color: #191a1d;
        }

        .published-at {
            color: #999;
            font-size: 12px;
            font-family: "SF UI Text Regular", sans-serif;
            margin: 10px 0;
        }

        .post-content {
            margin: 20px 0;
            color: #191a1d;
            font-family: "SF UI Text Regular", sans-serif;
            font-size: 14px;

            p {
                margin: 10px 0;
            }
        }
    }

</style>

<template>
    <div class="default-container mx-auto xs:mb=8 sm:mb-12 animated fadeInDown">
        <slot name="header"></slot>
        <post-preview :key="post.slug" v-for="post in posts" :post="post" />
    </div>
</template>

<script>
    import PostPreview from "@/components/Blog/PostPreview";
    import {mapState} from 'vuex';
    import Actions from '@/store/actions';
    import {fetchMocksByPrefix, MAP_KEYS} from "@/services/api/mocks";

    export default {
        name: "PostList",
        components: {PostPreview},
        computed: {
            ...mapState({
                posts: state => state.blog.posts
            })
        },
        created() {
            this.$store.dispatch(Actions.BLOG_FETCH_LATEST, 3);
        }
    }
</script>

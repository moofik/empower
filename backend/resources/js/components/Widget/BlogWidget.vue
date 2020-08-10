<template>
    <div class="w-11/12">
        <h3 class="workshop-default-title">{{ $t('Useful information') }}</h3>
        <div class="post flex flex-col" v-for="post in posts">
            <div class="flex">
                <img v-if="post.preview" :src="post.preview" class="post-image"/>
            </div>
            <div class="flex">
                <router-link :to="{name: routeNames().ROUTE_BLOG_POST, params: {id: post.id}}" tag="a" class="post-title">
                    {{ post.title }}
                </router-link>
            </div>
        </div>
    </div>
</template>

<script>
    import Actions from '@/store/actions';
    import {mapState} from 'vuex';
    import routeNames from "@/services/mixin/routeNames";

    export default {
        name: "BlogWidget",
        mixins: [routeNames],
        props: {
            limit: {
                type: Number,
                default: 3
            }
        },
        created() {
            this.$store.dispatch(Actions.BLOG_FETCH_LATEST, this.limit);
        },
        computed: {
            ...mapState({
                posts: state => state.blog.posts
            })
        }
    }
</script>

<style lang="scss">
    @import '~/sass/_generics.scss';

    .post {
        font-family: "SF UI Text Regular", sans-serif;
        font-size: 14px;
        text-decoration: underline;
        margin-bottom: 20px;
        background: #f2be54;
        color: #153e5c;
        cursor: pointer;

        .post-title {
            padding: 15px 25px;
        }

        img {
            width: 100%;
            height: auto;
        }
    }
</style>

<template>
    <div class="post-preview-container flex flex-row">
        <div v-if="post.preview" class="w-2/12 post-preview">
            <img class="actual-post-preview" :src="post.preview"/>
        </div>
        <div class="w-10/12 flex flex-col">
            <router-link :to="{name: routeNames().ROUTE_BLOG_POST, params: {id: post.id}}" tag="a" class="post-title">{{post.title}}</router-link>
            <div class="published-at">{{post.published_at}}</div>
            <div class="post-description" v-if="post.description && post.description.length > 0">{{post.description}}</div>
        </div>
    </div>
</template>

<script>
    import routeNames from "@/services/mixin/routeNames";

    export default {
        name: "PostPreview",
        mixins: [routeNames],
        props: {
            post: {
                type: Object,
                required: true
            }
        }
    }
</script>

<style lang="scss">
    .post-preview-container {
        margin: 40px 0;
        .actual-post-preview {
            height: 125px;
            padding: 0 12px 2px 0;
        }
    }

    .post-title {
        outline: none;
        text-decoration: underline;
        color: #153e5c;
        cursor: pointer;
    }

    .published-at {
        color: #999;
        margin: 10px 0;
        font-size: 12px;
    }

    .post-title {
        color: #153e5c;
        cursor: pointer;
        font-family: "SF UI Text Regular", sans-serif;
        font-size: 14px;
    }

    .post-description {
        font: 14px/18px 'SF UI Text Regular', arial, 'Helvetica CY', 'Nimbus Sans L', Sans-serif;
        color: #191a1d;
        margin-bottom: 10px;
    }
</style>

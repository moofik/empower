<template>
    <div class="animated fadeInDown">
        <post :key="$route.params.id" :post-id="parseInt($route.params.id)" />
        <other-posts :key="'__'+$route.params.id" :post-id="parseInt($route.params.id)" />
    </div>
</template>

<script>
    import Post from "@/components/Blog/Post";
    import OtherPosts from "@/components/Blog/OtherPosts";

    export default {
        name: "Post.vue",
        components: {OtherPosts, Post},
        created() {
            console.log(this.$route.params);
        }
    }
</script>

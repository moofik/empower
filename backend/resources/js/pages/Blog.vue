<template>
    <div>
        <post-list>
            <template v-slot:header>
                <h1>{{ $t('Blog') }}</h1>
            </template>
        </post-list>
    </div>
</template>

<script>
    import PostList from "@/components/Blog/PostList";

    export default {
        name: "Blog",
        components: {PostList}
    }
</script>

<style>

</style>

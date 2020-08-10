<template>
    <div class="breadcrumbs">
        <router-link :key="breadcrumb.name"
                     v-for="breadcrumb in crumbs"
                     tag="a" :to="{name: breadcrumb.route}">
            / {{ breadcrumb.title }}
        </router-link>
    </div>
</template>

<script>
    export default {
        name: "Breadcrumbs",
        data() {
            return {
                breadcrumbs: [],
            }
        },
        computed: {
            crumbs() {
                if (!this.$route.meta || !this.$route.meta.breadcrumb) {
                    return [];
                }

                return this.$route.meta.breadcrumb.map(element => {
                    if (element.params) {
                        const title = element.title + ' ' + this.$route.params[element.params];
                        return Object.assign({}, element, {title});
                    }

                    return element;
                });
            }
        }
    }
</script>

<style scoped>

</style>

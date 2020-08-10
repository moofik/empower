<template>
    <div class="w-11/12">
        <h3 class="workshop-default-title">{{ $t('Admin actions') }}</h3>
        <button type="button"
                class="cursor-pointer bg-gray-700 hover:bg-gray-600 px-5 py-2 inline-block text-blue-100 hover:text-white rounded"
                @click="$router.go(-1)"
        >
            {{$t('Back')}}
        </button>
        <button type="button"
                class="cursor-pointer bg-gray-700 hover:bg-gray-600 px-5 py-2 inline-block text-blue-100 hover:text-white rounded"
                @click="navigateToEdit"
        >
            {{$t('Edit')}}
        </button>
    </div>
</template>

<script>
    import routeNames from "@/services/mixin/routeNames";
    import routes from "@/router/routeNames";

    export default {
        name: "AdminMenuWidget",
        mixins: [routeNames],
        methods: {
            navigateToEdit() {
                this.$router.push({name: routes.ROUTE_ADMIN_SHOP_EDIT, id: this.$route.params.id});
            }
        },
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

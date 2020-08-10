<template>
    <workshop-registration-form :autologin="true" @logged-in="loggedIn"/>
</template>

<script>
    import WorkshopRegistrationForm from '@/components/WorkshopRegistrationForm';
    import redirectAuthenticated from '@/services/mixin/redirectAuthenticated';
    import Actions from "@/store/actions";
    import errorAwareWithPreloading from "@/services/mixin/errorAwareWithPreloading";

    export default {
        components: {WorkshopRegistrationForm},
        mixins: [redirectAuthenticated, errorAwareWithPreloading],
        methods: {
            async loggedIn() {
                console.log('RED TO HOME 5');
                await this.errorAwareStoreDispatch(Actions.AUTH_FETCH_ROLES);
                this.$router.push({name: 'home'}).catch((e) => {console.log(e)});
            }
        }
    }
</script>

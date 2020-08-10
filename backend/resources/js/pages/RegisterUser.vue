<template>
    <user-registration-form :autologin="true" @logged-in="loggedIn"/>
</template>

<script>
    import redirectAuthenticated from '@/services/mixin/redirectAuthenticated';
    import UserRegistrationForm from "@/components/UserRegistrationForm";
    import Actions from "@/store/actions";
    import errorAwareWithPreloading from "@/services/mixin/errorAwareWithPreloading";

    export default {
        components: {UserRegistrationForm},
        mixins: [redirectAuthenticated, errorAwareWithPreloading],
        methods: {
            async loggedIn() {
                console.log('RED TO HOME 4');
                await this.errorAwareStoreDispatch(Actions.AUTH_FETCH_ROLES);
                this.$router.push({name: 'home'}).catch(e => console.log(e));
            }
        }
    }
</script>

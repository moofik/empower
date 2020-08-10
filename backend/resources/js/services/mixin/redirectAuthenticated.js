import Routes from '@/router/routeNames';
import {mapGetters} from "vuex";
import Getter from "@/store/getters";

export default {
    beforeRouteEnter(to, from, next) {
        next((vm) => {
            if (vm.isAuthenticated && to.name === Routes.ROUTE_WORKSHOP_REGISTER) {
                console.log('RED TO HOME 8');
                vm.$router.push({name: Routes.ROUTE_HOME});
            }
        });
    },
    computed: {
        ...mapGetters({
            isAuthenticated: Getter.AUTH_IS_AUTHENTICATED
        })
    }
};

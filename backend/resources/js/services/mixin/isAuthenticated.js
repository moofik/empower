import {mapGetters} from 'vuex';
import Getter from '@/store/getters';

export default {
    computed: {
        ...mapGetters({
            isAuthenticated: Getter.AUTH_IS_AUTHENTICATED
        })
    }
};

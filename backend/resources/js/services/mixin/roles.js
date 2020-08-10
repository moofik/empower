import {mapGetters} from 'vuex';
import Getter from '@/store/getters';

export default {
    computed: {
        ...mapGetters({
            isAdmin: Getter.AUTH_ROLE_IS_ADMIN,
            isWorkshop: Getter.AUTH_ROLE_IS_WORKSHOP,
            isUser: Getter.AUTH_ROLE_IS_USER,
            isGuest: Getter.AUTH_ROLE_IS_GUEST,
            isModerator: Getter.AUTH_ROLE_IS_MODERATOR,
            isRolesLoaded: Getter.IS_ROLES_LOADED
        }),
    }
};

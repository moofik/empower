import Mutations from './mutations';

export default {
    state: {
        adminPanel: false
    },

    mutations: {
        [Mutations.ADMIN_PANEL_ENABLE](state) {
            state.adminPanel = true;
        },

        [Mutations.ADMIN_PANEL_DISABLE](state) {
            state.adminPanel = false;
        },
    }
};

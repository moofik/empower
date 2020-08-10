import Mutations from './mutations';
import Actions from './actions';
import AdminUsersApi from '@/services/api/admin-users/admin-users-api';

export default {
    state: {
        admins: [],
        currentUser: null
    },

    mutations: {
        [Mutations.SAVE_ADMIN_USERS](state, admins) {
            state.admins = admins;
        },

        [Mutations.SAVE_ADMIN_CURRENT_USER](state, user) {
            state.currentUser = user;
        }
    },

    actions: {
        async [Actions.FETCH_ADMIN_USERS]({commit}, query = '') {
            const admins = await AdminUsersApi.fetchAdministrators(query);

            commit(Mutations.SAVE_ADMIN_USERS, admins.data.data);
            return Promise.resolve(admins);
        },

        async [Actions.FETCH_ADMIN_USER]({commit}, id) {
            const admin = await AdminUsersApi.fetchAdministrator(id);

            commit(Mutations.SAVE_ADMIN_CURRENT_USER, admin.data.data);
            return Promise.resolve(admin);
        },

        async [Actions.CREATE_ADMIN_USER]({commit}, createAdminDto) {
            const admin = await AdminUsersApi.createAdministrator(createAdminDto);

            return Promise.resolve(admin);
        },

        async [Actions.UPDATE_ADMIN_USER]({commit}, {id, updateAdminDto}) {
            const admin = await AdminUsersApi.updateAdministrator(updateAdminDto, id);

            return Promise.resolve(admin);
        },

        async [Actions.DELETE_ADMIN_USER]({commit}, id) {
            await AdminUsersApi.deleteAdministrator(id);

            return Promise.resolve();
        },
    }
};

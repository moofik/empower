import AuthApi from '@/services/api/auth/api';
import ApiService from '@/services/api/apiService';
import {setRefreshToken, setToken, unsetRefreshToken, unsetToken} from '@/services/security/authManager';
import Actions from './actions';
import Mutations from './mutations';
import Getters from './getters';

export default {
    state: {
        userId: null,
        token: null,
        roles: [],
        roles_loaded: false
    },

    mutations: {
        [Mutations.AUTH_SET_TOKEN](state, token) {
            state.token = token || null;
        },

        [Mutations.AUTH_UNSET_TOKEN](state) {
            state.token = null;
        },

        [Mutations.AUTH_SET_ROLES](state, roles) {
            state.roles = roles;
            state.roles_loaded = true;

            if (roles[0] && roles[0].pivot && roles[0].pivot.model_id) {
                state.userId = roles[0].pivot.model_id;
            }
        },

        [Mutations.AUTH_UNSET_ROLES](state) {
            state.roles = [];
            state.roles_loaded = false;
        }
    },

    actions: {
        [Actions.AUTH_LOGIN]({commit}, {username, password}) {
            return AuthApi.login(username, password)
                .then((res) => {
                    const token = res.data.access_token;
                    const refreshToken = res.data.refresh_token;

                    setToken(token);
                    setRefreshToken(refreshToken);
                    ApiService.setBearerToken(token);

                    commit(Mutations.AUTH_SET_TOKEN, token);
                    return Promise.resolve(res);
                })
        },

        [Actions.AUTH_REGISTER_WORKSHOP]({commit}, createWorkshopDto) {
            return AuthApi.registerWorkshop(createWorkshopDto);
        },

        [Actions.AUTH_REGISTER_USER]({commit}, createUserDto) {
            return AuthApi.registerUser(createUserDto);
        },

        [Actions.AUTH_LOGOUT]({commit}) {
            unsetToken();
            unsetRefreshToken();

            commit(Mutations.AUTH_UNSET_TOKEN);
            commit(Mutations.AUTH_UNSET_ROLES);
            return Promise.resolve();
        },

        [Actions.AUTH_FETCH_ROLES]({commit}) {
            return AuthApi.fetchRole()
                .then((res) => {
                    const roles = res.data;

                    commit(Mutations.AUTH_SET_ROLES, roles);
                    return Promise.resolve(res);
                })
        }
    },

    getters: {
        [Getters.AUTH_IS_AUTHENTICATED](state) {
            return !!state.token
        },
        [Getters.IS_ROLES_LOADED](state) {
            return state.roles_loaded;
        },
        [Getters.AUTH_ROLE_IS_ADMIN](state) {
            return state.roles.some(element => element.name === 'admin');
        },
        [Getters.AUTH_ROLE_IS_USER](state) {
            return state.roles.some(element => element.name === 'user');
        },
        [Getters.AUTH_ROLE_IS_WORKSHOP](state) {
            return state.roles.some(element => element.name === 'workshop');
        },
        [Getters.AUTH_ROLE_IS_GUEST](state) {
            return state.roles.some(element => element.name === 'guest');
        },
        [Getters.AUTH_ROLE_IS_MODERATOR](state) {
            return state.roles.some(element => element.name === 'moderator');
        },
    }
};

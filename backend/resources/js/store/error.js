import Mutations from "@/store/mutations";
import Actions from "@/store/actions";

export default {
    state: {
        message: null,
        status: null
    },

    mutations: {
        [Mutations.ERROR_SET_STATUS](state, status) {
            state.status = status;
        },

        [Mutations.ERROR_SET_MESSAGE](state, message) {
            state.message = message;
        }
    },

    actions: {
        [Actions.ERROR_SET_ERROR]({commit}, err) {
            commit(Mutations.ERROR_SET_STATUS, err.response.status);

            if (err.response && err.response.data && err.response.data.detail && err.response.status) {
                if (Object.keys(err.response.data.detail).length !== 0) {
                    const key = Object.keys(err.response.data.detail);

                    if (Array.isArray(key)) {
                        const nestedKey = key[0];
                        const errorDetail = err.response.data.detail[nestedKey];
                        console.log('Error message: ', errorDetail[0]);
                        console.log('Error message type: ', typeof errorDetail[0]);
                        commit(Mutations.ERROR_SET_MESSAGE, errorDetail[0]);
                        return;
                    }

                    if (typeof key === 'string') {
                        commit(Mutations.ERROR_SET_MESSAGE, key);
                        return;
                    }
                }

                commit(Mutations.ERROR_SET_MESSAGE, 'Something wrong happens.');
            }
        },

        [Actions.ERROR_SET_SUCCESS_DATA]({commit}, {status, message}) {
            commit(Mutations.ERROR_SET_STATUS, status);
            commit(Mutations.ERROR_SET_MESSAGE, message);
        },

        [Actions.ERROR_CLEAR_PREVIOUS_DATA]({commit}) {
            commit(Mutations.ERROR_SET_STATUS, null);
            commit(Mutations.ERROR_SET_MESSAGE, null);
        }
    }
};

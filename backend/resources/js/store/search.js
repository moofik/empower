import Mutations from './mutations';

export default {
    state: {
        searchWidgetStatus: false
    },

    mutations: {
        [Mutations.ENABLE_SEARCH_WIDGET](state) {
            state.searchWidgetStatus = true;
        }
    }
};

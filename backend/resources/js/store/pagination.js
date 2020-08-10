import Mutations from "@/store/mutations";
import Actions from "@/store/actions";

export default {
    state: {
        metadata: null
    },

    mutations: {
        [Mutations.PAGINATION_METADATA_SAVE](state, metadata) {
            state.metadata = metadata;
        }
    },

    actions: {
        [Actions.PAGINATION_CLEAR_PREVIOUS_DATA]({commit}) {
            commit(Mutations.PAGINATION_METADATA_SAVE, null);
        }
    }
}

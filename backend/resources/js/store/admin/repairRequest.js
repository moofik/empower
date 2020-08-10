import Mutations from './mutations';
import Actions from './actions';
import AdminRepairRequestsApi from '@/services/api/request-repair/admin-api';

export default {
    state: {
        repairRequests: [],
        offers: [],
        currentRepairRequest: null
    },

    mutations: {
        [Mutations.SAVE_REPAIR_REQUESTS](state, requests) {
            state.repairRequests = requests;
        },

        [Mutations.SAVE_REPAIR_REQUESTS_CURRENT](state, request) {
            state.currentRepairRequest = request;
        },

        [Mutations.SAVE_REPAIR_REQUESTS_OFFERS](state, offers) {
            state.offers = offers;
        }
    },

    actions: {
        async [Actions.FETCH_REPAIR_REQUESTS]({commit}, query = '') {
            const repairRequests = await AdminRepairRequestsApi.fetchRepairRequests(query);

            commit(Mutations.SAVE_REPAIR_REQUESTS, repairRequests.data.data);
            return Promise.resolve(repairRequests);
        },

        async [Actions.FETCH_REPAIR_REQUEST]({commit}, id) {
            const repairRequest = await AdminRepairRequestsApi.fetchRepairRequest(id);

            commit(Mutations.SAVE_REPAIR_REQUESTS_CURRENT, repairRequest.data.data);
            return Promise.resolve(repairRequest);
        },

        async [Actions.DELETE_REPAIR_REQUEST]({commit}, id) {
            await AdminRepairRequestsApi.deleteRepairRequest(id);

            return Promise.resolve();
        },

        async [Actions.FETCH_REPAIR_REQUEST_OFFERS]({commit}, {query, requestId}) {
            const offers = await AdminRepairRequestsApi.fetchRepairRequestOffers(query, requestId);

            commit(Mutations.SAVE_REPAIR_REQUESTS_OFFERS, offers.data.data);
            return Promise.resolve(offers);
        },

        async [Actions.DELETE_REPAIR_REQUEST_OFFER]({commit}, id) {
            await AdminRepairRequestsApi.deleteRepairRequestOffer(id);

            return Promise.resolve();
        }
    }
};

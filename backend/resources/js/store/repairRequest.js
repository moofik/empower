import Actions from './actions';
import Mutations from './mutations';
import RepairRequestApi from '@/services/api/request-repair/api'
import WorkshopApi from "@/services/api/workshop/api";
import Getters from "@/store/getters";

export default {
    state: {
        makes: [],
        services: [],
        spareParts: [],
        repairRequests: [],
        offeredWorkshops: [],
        userRequests: [],
        currentRequest: null,
        appliedWorkshop: null
    },

    mutations: {
        [Mutations.REPAIR_REQUEST_SAVE_MAKES](state, makes) {
            state.makes = makes;
        },

        [Mutations.REPAIR_REQUEST_SAVE_SERVICES](state, services) {
            state.services = services;
        },

        [Mutations.REPAIR_REQUEST_SAVE_SPARE_PARTS](state, spareParts) {
            state.spareParts = spareParts;
        },

        [Mutations.REPAIR_REQUESTS_SAVE](state, repairRequests) {
            state.repairRequests = repairRequests;
        },

        [Mutations.REPAIR_REQUEST_USER_REQUESTS_SAVE](state, repairRequests) {
            state.userRequests = repairRequests;
        },

        [Mutations.REPAIR_REQUEST_SAVE](state, currentRequest) {
            state.currentRequest = currentRequest;
        },

        [Mutations.REPAIR_REQUEST_SAVE_OFFERED_WORKSHOPS](state, offeredWorkshops) {
            state.offeredWorkshops = offeredWorkshops;
        },

        [Mutations.REPAIR_REQUEST_SAVE_APPLIED_WORKSHOP](state, appliedWorkshop) {
            state.appliedWorkshop = appliedWorkshop;
        }
    },

    actions: {
        async [Actions.REPAIR_REQUESTS_FETCH_OFFERED_WORKSHOPS]({commit}, {id}) {
            const workshops = await RepairRequestApi.fetchOfferedWorkshops(id);

            commit(Mutations.REPAIR_REQUEST_SAVE_OFFERED_WORKSHOPS, workshops.data.data);
            return Promise.resolve(workshops);
        },

        async [Actions.REPAIR_REQUEST_FETCH_MAKES]({commit}) {
            const makes = await WorkshopApi.fetchMakes();
            console.log('public makes: ', makes);

            commit(Mutations.REPAIR_REQUEST_SAVE_MAKES, makes.data.data);
            return Promise.resolve(makes);
        },

        async [Actions.REPAIR_REQUEST_FETCH_SERVICES]({commit}) {
            const services = await WorkshopApi.fetchMainServices();
            console.log('public services: ', services);

            commit(Mutations.REPAIR_REQUEST_SAVE_SERVICES, services.data.data);
            return Promise.resolve(services);
        },

        async [Actions.REPAIR_REQUEST_FETCH_SPARE_PARTS]({commit}) {
            const spareParts = await WorkshopApi.fetchSpareParts();
            console.log('public spare parts: ', spareParts);

            commit(Mutations.REPAIR_REQUEST_SAVE_SPARE_PARTS, spareParts.data.data);
            return Promise.resolve(spareParts);
        },

        async [Actions.REPAIR_REQUEST_CREATE_HUB](context, repairRequestDto) {
            const repairRequest = await RepairRequestApi.createHubRepairRequest(repairRequestDto);

            return Promise.resolve(repairRequest);
        },

        async [Actions.REPAIR_REQUESTS_FETCH_HUB_REQUESTS]({commit}, page = 1) {
            const repairRequests = await RepairRequestApi.fetchHubRepairRequests(page);

            commit(Mutations.REPAIR_REQUESTS_SAVE, repairRequests.data.data);
            return Promise.resolve(repairRequests);
        },

        async [Actions.REPAIR_REQUESTS_FETCH_INCOMING_REQUESTS]({commit}, page = 1) {
            const repairRequests = await RepairRequestApi.fetchSpecificRepairRequests(page);

            commit(Mutations.REPAIR_REQUESTS_SAVE, repairRequests.data.data);
            return Promise.resolve(repairRequests);
        },

        async [Actions.REPAIR_REQUEST_CREATE_SPECIFIC](context, repairRequestDto) {
            const repairRequest = await RepairRequestApi.createSpecificRepairRequest(repairRequestDto);

            return Promise.resolve(repairRequest);
        },

        async [Actions.REPAIR_REQUEST_ACCEPT_SPECIFIC](context, id) {
            await RepairRequestApi.acceptIncomingRequest(id);

            return Promise.resolve();
        },

        async [Actions.REPAIR_REQUEST_DENY_SPECIFIC](context, id) {
            await RepairRequestApi.denyIncomingRequest(id);

            return Promise.resolve();
        },

        async [Actions.REPAIR_REQUEST_FETCH]({commit}, id) {
            const repairRequest = await RepairRequestApi.fetchRepairRequest(id);

            commit(Mutations.REPAIR_REQUEST_SAVE, repairRequest.data.data);
            return Promise.resolve(repairRequest);
        },

        async [Actions.REPAIR_REQUESTS_FETCH_WORKSHOP_OFFERS]({commit}, page = 1) {
            const repairRequests = await RepairRequestApi.fetchWorkshopOffers(page);

            commit(Mutations.REPAIR_REQUESTS_SAVE, repairRequests.data.data);
            return Promise.resolve(repairRequests);
        },

        async [Actions.REPAIR_REQUESTS_FETCH_USER_REQUESTS]({commit}, page = 1) {
            const repairRequests = await RepairRequestApi.fetchUserRequests(page);

            commit(Mutations.REPAIR_REQUEST_USER_REQUESTS_SAVE, repairRequests.data.data);
            return Promise.resolve(repairRequests);
        },

        async [Actions.REPAIR_REQUEST_DELETE](context, id) {
            await RepairRequestApi.deleteRepairRequest(id);
        },

        async [Actions.REPAIR_REQUEST_ADD_VIEWER]({commit}, id) {
            await RepairRequestApi.addUniqueView(id);
            return Promise.resolve();
        },

        async [Actions.REPAIR_REQUEST_MAKE_OFFER]({commit}, id) {
            await RepairRequestApi.makeOffer(id);
            return Promise.resolve();
        },

        async [Actions.REPAIR_REQUEST_CANCEL_OFFER]({commit}, id) {
            await RepairRequestApi.cancelOffer(id);
            return Promise.resolve();
        },

        async [Actions.REPAIR_REQUESTS_ACCEPT_OFFER]({commit}, {id}) {
            console.log('accept offer 2');
            await RepairRequestApi.acceptOffer(id);
            return Promise.resolve();
        },

        async [Actions.REPAIR_REQUESTS_DECLINE_OFFER]({commit}, {id}) {
            await RepairRequestApi.declineOffer(id);
            return Promise.resolve();
        },

        async [Actions.REPAIR_REQUESTS_CLOSE_OFFER]({commit}, id) {
            await RepairRequestApi.closeOffer(id);
            return Promise.resolve();
        },

        async [Actions.REPAIR_REQUESTS_FETCH_APPLIED_WORKSHOP]({commit}, {id}) {
            const appliedWorkshop = await RepairRequestApi.fetchAppliedWorkshop(id);

            commit(Mutations.REPAIR_REQUEST_SAVE_APPLIED_WORKSHOP, appliedWorkshop.data.data);
            return Promise.resolve(appliedWorkshop);
        },

        async [Actions.REPAIR_REQUEST_WORKSHOP_RATE]({commit}, {id, rating}) {
            await RepairRequestApi.updateAppliedWorkshopRating(id, rating);
        }
    },

    getters: {
        [Getters.IS_OFFER_CLOSED](state) {
            return (state.currentRequest && state.currentRequest.is_closed);
        },
    }
};

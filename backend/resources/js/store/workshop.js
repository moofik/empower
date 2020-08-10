import Actions from './actions';
import Mutations from './mutations';
import WorkshopApi from '@/services/api/workshop/api';

export default {
    state: {
        workshops: [],
        currentWorkshop: null,
        services: [],
        makes: []
    },

    mutations: {
        [Mutations.MAIN_SAVE_SERVICES](state, services) {
            state.services = services;
        },

        [Mutations.MAIN_SAVE_CAR_MAKES](state, makes) {
            state.makes = makes;
        },

        [Mutations.WORKSHOP_SAVE_WORKSHOPS](state, workshops) {
            state.workshops = workshops;
        },

        [Mutations.WORKSHOP_SAVE](state, workshop) {
            state.currentWorkshop = workshop;
        }
    },

    actions: {
        async [Actions.MAIN_FETCH_SERVICES]({commit}) {
            const services = await WorkshopApi.fetchMainServices();

            commit(Mutations.MAIN_SAVE_SERVICES, services.data.data);
            return Promise.resolve(services);
        },

        async [Actions.MAIN_FETCH_CAR_MAKES]({commit}) {
            const makes = await WorkshopApi.fetchMakes();

            commit(Mutations.MAIN_SAVE_CAR_MAKES, makes.data.data);
            return Promise.resolve(makes);
        },

        async [Actions.WORKSHOP_FETCH_ALL]({commit}, query) {
            const workshops = await WorkshopApi.fetchWorkshops(query);

            commit(Mutations.WORKSHOP_SAVE_WORKSHOPS, workshops.data.data);
            return Promise.resolve(workshops);
        },

        async [Actions.WORKSHOP_FETCH]({commit}, {id}) {
            const workshop = await WorkshopApi.fetchWorkshop(id);

            commit(Mutations.WORKSHOP_SAVE, workshop.data.data);
            return Promise.resolve(workshop);
        },

        [Actions.WORKSHOP_SEND_MESSAGE]({commit}, {name, phone, comment}) {
            // logic
        }
    }
};

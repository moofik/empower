import Actions from './actions';
import Mutations from './mutations';
import WorkshopApi from '@/services/api/workshop/api';

export default {
    state: {
        makes: [],
        cities: []
    },

    mutations: {
        [Mutations.FILTERS_SAVE_MAKES](state, makes) {
            state.makes = makes;
        },

        [Mutations.FILTERS_SAVE_CITIES](state, cities) {
            state.cities = cities;
        },
    },

    actions: {
        async [Actions.FILTER_FETCH_MAKES]({commit}) {
            const makes = await WorkshopApi.fetchMakes();

            commit(Mutations.FILTERS_SAVE_MAKES, makes.data.data);
        },

        async [Actions.FILTER_FETCH_CITIES]({commit}) {
            const cities = await WorkshopApi.fetchCities();

            commit(Mutations.FILTERS_SAVE_CITIES, cities.data.data);
        }
    }
};

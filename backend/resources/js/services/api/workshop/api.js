import ApiService from '@/services/api/apiService';

export default {
    fetchWorkshops(query) {
        let resource = 'workshops';

        if (query !== '') {
            resource += query;
        }

        return ApiService.get(resource);
    },

    fetchWorkshop(id) {
        return ApiService.get(`workshops/${id}`);
    },

    fetchMakes() {
        return ApiService.get('/makes');
    },

    fetchCities() {
        return ApiService.get('/cities');
    },

    fetchSpareParts() {
        return ApiService.get('/spare-parts');
    },

    fetchMainServices() {
        return ApiService.get('/main-services');
    }
}

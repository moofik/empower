import ApiService from '@/services/api/apiService'

export default {
    fetchRepairRequests(query = '') {
        let resource = '/admin/requests';

        if (query !== '') {
            resource += query;
        }

        return ApiService.get(resource);
    },

    fetchRepairRequest(id) {
        return ApiService.get(`/admin/requests/${id}`);
    },

    deleteRepairRequest(id) {
        return ApiService.delete(`/admin/requests/${id}`);
    },

    fetchRepairRequestOffers(query, requestId) {
        let resource = `/admin/requests/${requestId}/offers`;

        if (query !== '') {
            resource += query;
        }

        return ApiService.get(resource);
    },

    deleteRepairRequestOffer(id) {
        return ApiService.delete(`/admin/offers/${id}`);
    }
}

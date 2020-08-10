import ApiService from '@/services/api/apiService';

export default {
    createHubRepairRequest(repairRequestDto) {
        return ApiService.post('/repair-requests/bidding', repairRequestDto);
    },

    fetchHubRepairRequests(page) {
        return ApiService.get(`/repair-requests/bidding?page=${page}`);
    },

    addUniqueView(id) {
        return ApiService.post(`/repair-requests/${id}/views`);
    },

    makeOffer(id) {
        return ApiService.post(`/repair-requests/${id}/offers`);
    },

    cancelOffer(id) {
        return ApiService.delete(`/repair-requests/${id}/offers`);
    },

    fetchSpecificRepairRequests(page) {
        return ApiService.get(`/repair-requests/specific?page=${page}`);
    },

    fetchRepairRequest(id) {
        return ApiService.get(`/repair-requests/${id}`);
    },

    fetchUserRequests(page) {
        return ApiService.get(`/repair-requests/self?page=${page}`);
    },

    fetchOfferedWorkshops(id) {
        return ApiService.get(`/repair-requests/${id}/offers`);
    },

    deleteRepairRequest(id) {
        return ApiService.delete(`/repair-requests/${id}`);
    },

    fetchWorkshopOffers(page) {
        return ApiService.get(`/offers?page=${page}`);
    },

    acceptOffer(id) {
        console.log('accept offer 3');
        return ApiService.post(`/offers/${id}/accept`);
    },

    declineOffer(id) {
        return ApiService.post(`/offers/${id}/decline`);
    },

    closeOffer(id) {
        return ApiService.post(`/repair-requests/${id}/close`);
    },

    fetchAppliedWorkshop(id) {
        return ApiService.get(`/repair-requests/${id}/applicant`);
    },

    updateAppliedWorkshopRating(id, rating) {
        return ApiService.post(`/repair-requests/${id}/applicant/rating`, {rating});
    },

    createSpecificRepairRequest(repairRequestDto) {
        return ApiService.post('/repair-requests/specific', repairRequestDto);
    },

    acceptIncomingRequest(id) {
        return ApiService.post(`/repair-requests/${id}/specific/accept`);
    },

    denyIncomingRequest(id) {
        return ApiService.post(`/repair-requests/${id}/specific/deny`);
    }
}

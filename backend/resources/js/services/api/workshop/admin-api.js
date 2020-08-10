import ApiService from '@/services/api/apiService'

export default {
    fetchShops(query = '') {
        let resource = `/admin/shops`;

        if (query !== '') {
            resource += query;
        }

        return ApiService.get(resource);
    },

    fetchShop(id) {
        return ApiService.get(`/admin/shops/${id}`);
    },

    deleteShop(id) {
        return ApiService.delete(`/admin/shops/${id}`);
    },

    updateShop(updateShopDto, id) {
        return ApiService.patch(`/admin/shops/${id}`, updateShopDto);
    },

    fetchReviewsForShop(id) {
        return ApiService.get(`/admin/shops/${id}/reviews`);
    }
}

import ApiService from '@/services/api/apiService';

export default {
    fetchBasicSettings() {
        return ApiService.get('profile/basic');
    },
    updateBasicSettings(settings) {
        return ApiService.patch('profile/basic', settings);
    },

    fetchMainServices() {
        return ApiService.get('profile/services');
    },
    updateMainServices(services) {
        return ApiService.patch('profile/services', services);
    },

    fetchAdditionalServices() {
        return ApiService.get('profile/additional-services');
    },
    updateAdditionalServices(additionalServices) {
        return ApiService.patch('profile/additional-services', additionalServices);
    },

    fetchPaymentOptions() {
        return ApiService.get('profile/payment-options');
    },
    updatePaymentOptions(paymentOptions) {
        return ApiService.patch('profile/payment-options', paymentOptions)
    },

    fetchMakes() {
        return ApiService.get('profile/makes');
    },
    updateMakes(makes) {
        return ApiService.patch('profile/makes', makes)
    },

    fetchSpareParts() {
        return ApiService.get('profile/spare-parts');
    },
    updateSpareParts(spareParts) {
        return ApiService.patch('profile/spare-parts', spareParts)
    },

    fetchSchedule() {
        return ApiService.get('profile/schedule');
    },
    updateSchedule(schedule) {
        return ApiService.patch('profile/schedule', schedule)
    },

    fetchWarranty() {
        return ApiService.get('profile/warranty');
    },
    updateWarranty(warranty) {
        return ApiService.patch('profile/warranty', warranty)
    },

    fetchLogo() {
        return ApiService.get('profile/logo');
    },
    uploadLogo(image) {
        return ApiService.post('profile/logo', {image})
    },

    fetchCertificates() {
        return ApiService.get('profile/certificates');
    },
    uploadCertificates(images) {
        return ApiService.post('profile/certificates', {images})
    },

    fetchCurrentEmail() {
        return ApiService.get('profile/email');
    },
    updateCurrentEmail(email) {
        return ApiService.put('profile/email', {email});
    },

    updateCurrentPassword(password) {
        return ApiService.put('profile/password', password);
    }
}

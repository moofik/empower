import Actions from './actions';
import Mutations from './mutations';
import WorkshopProfileApi from '@/services/api/workshopProfile/api';
import {inspectResponseErrors} from "@/services/error/errorInspector";

export default {
    state: {
        basicSettings: {},
        services: {},
        additionalServices: {},
        paymentOptions: {},
        spareParts: {},
        makes: {},
        schedule: {},
        warranty: {},
        logoLink: null,
        certificates: [],
        currentEmail: null
    },

    mutations: {
        [Mutations.WORKSHOP_SETTINGS_SAVE_BASIC](state, settings) {
            state.basicSettings = settings
        },

        [Mutations.WORKSHOP_SERVICES_SAVE_MAIN](state, services) {
            state.services = services;
        },

        [Mutations.WORKSHOP_SERVICES_SAVE_ADDITIONAL](state, additionalServices) {
            state.additionalServices = additionalServices;
        },

        [Mutations.WORKSHOP_PAYMENT_OPTIONS_SAVE](state, paymentOptions) {
            state.paymentOptions = paymentOptions;
        },

        [Mutations.WORKSHOP_SPARE_PARTS_SAVE](state, spareParts) {
            state.spareParts = spareParts;
        },

        [Mutations.WORKSHOP_MAKES_SAVE](state, makes) {
            state.makes = makes;
        },

        [Mutations.WORKSHOP_SCHEDULE_SAVE](state, schedule) {
            state.schedule = schedule;
        },

        [Mutations.WORKSHOP_WARRANTY_SAVE](state, warranty) {
            state.warranty = warranty;
        },

        [Mutations.WORKSHOP_SAVE_LOGO_LINK](state, logoLink) {
            state.logoLink = logoLink;
        },

        [Mutations.WORKSHOP_SAVE_CERTIFICATES](state, certificates) {
            state.certificates = certificates;
        },

        [Mutations.WORKSHOP_EMAIL_SAVE](state, email) {
            state.currentEmail = email;
        }
    },

    actions: {
        async [Actions.SETTINGS_WORKSHOP_FETCH_BASIC]({commit}) {
            const settings = await WorkshopProfileApi.fetchBasicSettings();
            inspectResponseErrors(settings);

            commit(Mutations.WORKSHOP_SETTINGS_SAVE_BASIC, settings.data.data);
            return Promise.resolve(settings);
        },

        async [Actions.SETTINGS_WORKSHOP_UPDATE_BASIC]({commit}, settingsDto) {
            const settings = await WorkshopProfileApi.updateBasicSettings(settingsDto);
            inspectResponseErrors(settings);

            commit(Mutations.WORKSHOP_SETTINGS_SAVE_BASIC, settings.data.data);
            return Promise.resolve(settings);
        },

        async [Actions.SERVICES_WORKSHOP_FETCH_MAIN]({commit}) {
            const services = await WorkshopProfileApi.fetchMainServices();

            commit(Mutations.WORKSHOP_SERVICES_SAVE_MAIN, services.data.data);
            return Promise.resolve(services);
        },

        async [Actions.SERVICES_WORKSHOP_UPDATE_MAIN]({commit}, servicesDto) {
            const services = await WorkshopProfileApi.updateMainServices(servicesDto);

            commit(Mutations.WORKSHOP_SERVICES_SAVE_MAIN, services.data.data);
            return Promise.resolve(services);
        },

        async [Actions.SERVICES_WORKSHOP_FETCH_ADDITIONAL]({commit}) {
            const additionalServices = await WorkshopProfileApi.fetchAdditionalServices();

            commit(Mutations.WORKSHOP_SERVICES_SAVE_ADDITIONAL, additionalServices.data.data);
            return Promise.resolve(additionalServices);
        },

        async [Actions.SERVICES_WORKSHOP_UPDATE_ADDITIONAL]({commit}, additionalServicesDto) {
            const additionalServices = await WorkshopProfileApi.updateAdditionalServices(additionalServicesDto);

            commit(Mutations.WORKSHOP_SERVICES_SAVE_ADDITIONAL, additionalServices.data.data);
            return Promise.resolve(additionalServices);
        },

        async [Actions.PAYMENT_OPTIONS_WORKSHOP_FETCH]({commit}) {
            const paymentOptions = await WorkshopProfileApi.fetchPaymentOptions();

            commit(Mutations.WORKSHOP_PAYMENT_OPTIONS_SAVE, paymentOptions.data.data);
            return Promise.resolve(paymentOptions);
        },

        async [Actions.PAYMENT_OPTIONS_WORKSHOP_UPDATE]({commit}, paymentOptionsDto) {
            const paymentOptions = await WorkshopProfileApi.updatePaymentOptions(paymentOptionsDto);

            commit(Mutations.WORKSHOP_PAYMENT_OPTIONS_SAVE, paymentOptions.data.data);
            return Promise.resolve(paymentOptions);
        },

        async [Actions.SPARE_PARTS_WORKSHOP_FETCH]({commit}) {
            const spareParts = await WorkshopProfileApi.fetchSpareParts();

            commit(Mutations.WORKSHOP_SPARE_PARTS_SAVE, spareParts.data.data);
            return Promise.resolve(spareParts);
        },

        async [Actions.SPARE_PARTS_WORKSHOP_UPDATE]({commit}, sparePartsDto) {
            const spareParts = await WorkshopProfileApi.updateSpareParts(sparePartsDto);
            inspectResponseErrors(spareParts);

            commit(Mutations.WORKSHOP_SPARE_PARTS_SAVE, spareParts.data.data);
            return Promise.resolve(spareParts);
        },

        async [Actions.MAKES_WORKSHOP_FETCH]({commit}) {
            const makes = await WorkshopProfileApi.fetchMakes();
            inspectResponseErrors(makes);

            commit(Mutations.WORKSHOP_MAKES_SAVE, makes.data.data);
            return Promise.resolve(makes);
        },

        async [Actions.MAKES_WORKSHOP_UPDATE]({commit}, makesDto) {
            const makes = await WorkshopProfileApi.updateMakes(makesDto);

            commit(Mutations.WORKSHOP_MAKES_SAVE, makes.data.data);
            return Promise.resolve(makes);
        },

        async [Actions.SCHEDULE_WORKSHOP_FETCH]({commit}) {
            const schedule = await WorkshopProfileApi.fetchSchedule();

            commit(Mutations.WORKSHOP_SCHEDULE_SAVE, schedule.data.data);
            return Promise.resolve(schedule);
        },

        async [Actions.SCHEDULE_WORKSHOP_UPDATE]({commit}, scheduleDto) {
            const schedule = await WorkshopProfileApi.updateSchedule(scheduleDto);

            commit(Mutations.WORKSHOP_SCHEDULE_SAVE, schedule.data.data);
            return schedule;
        },

        async [Actions.WARRANTY_WORKSHOP_FETCH]({commit}) {
            const warranty = await WorkshopProfileApi.fetchWarranty();

            commit(Mutations.WORKSHOP_WARRANTY_SAVE, warranty.data.data);
            return Promise.resolve(warranty);
        },

        async [Actions.WARRANTY_WORKSHOP_UPDATE]({commit}, warrantyDto) {
            const warranty = await WorkshopProfileApi.updateWarranty(warrantyDto);

            commit(Mutations.WORKSHOP_WARRANTY_SAVE, warranty.data.data);
            return Promise.resolve(warranty);
        },

        async [Actions.WORKSHOP_LOGO_FETCH]({commit}) {
            const logo = await WorkshopProfileApi.fetchLogo();

            commit(Mutations.WORKSHOP_SAVE_LOGO_LINK, logo.data.data.url);
            return Promise.resolve();
        },

        async [Actions.WORKSHOP_LOGO_UPLOAD]({commit}, image) {
            const logo = await WorkshopProfileApi.uploadLogo(image);

            commit(Mutations.WORKSHOP_SAVE_LOGO_LINK, logo.data.data.url);
            return Promise.resolve(logo);
        },

        async [Actions.WORKSHOP_CERTIFICATES_FETCH]({commit}) {
            const certificates = await WorkshopProfileApi.fetchCertificates();

            commit(Mutations.WORKSHOP_SAVE_CERTIFICATES, certificates.data.data);
            return Promise.resolve(certificates);
        },

        async [Actions.WORKSHOP_CERTIFICATES_UPLOAD]({commit}, images) {
            const certificates = await WorkshopProfileApi.uploadCertificates(images);

            commit(Mutations.WORKSHOP_SAVE_CERTIFICATES, certificates.data.data);
            return Promise.resolve(certificates);
        },

        async [Actions.WORKSHOP_EMAIL_FETCH]({commit}) {
            const currentEmail = await WorkshopProfileApi.fetchCurrentEmail();

            commit(Mutations.WORKSHOP_EMAIL_SAVE, currentEmail.data.data.email);
            return Promise.resolve(currentEmail);
        },

        async [Actions.WORKSHOP_EMAIL_UPDATE]({commit}, email) {
            await WorkshopProfileApi.updateCurrentEmail(email);
        },

        async [Actions.WORKSHOP_PASSWORD_UPDATE]({commit}, updatePasswordDto) {
            await WorkshopProfileApi.updateCurrentPassword(updatePasswordDto);
        }
    }
};

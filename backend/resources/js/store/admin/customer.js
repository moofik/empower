import Mutations from './mutations';
import Actions from './actions';
import AdminCustomersApi from '@/services/api/customer/admin-api';

export default {
    state: {
        customers: [],
        currentUser: null
    },

    mutations: {
        [Mutations.SAVE_CUSTOMER_USERS](state, customers) {
            state.customers = customers;
        },

        [Mutations.SAVE_CUSTOMER_CURRENT_USER](state, user) {
            state.currentUser = user;
        }
    },

    actions: {
        async [Actions.FETCH_CUSTOMER_USERS]({commit}, query = '') {
            const customers = await AdminCustomersApi.fetchCustomers(query);

            commit(Mutations.SAVE_CUSTOMER_USERS, customers.data.data);
            return Promise.resolve(customers);
        },

        async [Actions.FETCH_CUSTOMER_USER]({commit}, id) {
            const customer = await AdminCustomersApi.fetchCustomer(id);

            commit(Mutations.SAVE_CUSTOMER_CURRENT_USER, customer.data.data);
            return Promise.resolve(customer);
        },

        async [Actions.CREATE_CUSTOMER_USER]({commit}, createCustomerDto) {
            const customer = await AdminCustomersApi.createCustomer(createCustomerDto);

            return Promise.resolve(customer);
        },

        async [Actions.UPDATE_CUSTOMER_USER]({commit}, {id, updateCustomerDto}) {
            const customer = await AdminCustomersApi.updateCustomer(updateCustomerDto, id);

            return Promise.resolve(customer);
        },

        async [Actions.DELETE_CUSTOMER_USER]({commit}, id) {
            await AdminCustomersApi.deleteCustomer(id);

            return Promise.resolve();
        },
    }
};

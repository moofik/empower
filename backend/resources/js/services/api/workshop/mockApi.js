import ApiService from '@/services/api/apiService'
import {createWorkshop, fetchMockByKey, fetchMocksByPrefix, MAP_KEYS} from "@/services/api/mocks";

export default {
    fetchWorkshops(page) {
        let result = fetchMocksByPrefix(MAP_KEYS.WORKSHOP);

        if (result.length) {
            return result;
        }

        return [
            createWorkshop('Doctor McGee Auto', 4.5, 'Helsinki Tikkurilantie'),
            createWorkshop('Secret Service #1', 5, 'Helsinki PL 828'),
            createWorkshop('Garage of Sergo', 4, 'Kiev Balzaka str.', ['Audi', 'BMW', 'Buick'])
        ];
    },

    fetchWorkshop(id) {
        return fetchMockByKey(MAP_KEYS.WORKSHOP + id);
    }
}

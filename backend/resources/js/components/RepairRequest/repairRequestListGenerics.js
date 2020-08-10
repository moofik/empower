import {mapState} from "vuex";
import isAuthenticated from "@/services/mixin/isAuthenticated";
import errorAwareWithPreloading from "@/services/mixin/errorAwareWithPreloading";
import pagination from "@/services/mixin/pagination";

export default {
    data()
    {
        return {
            headers: [
                this.$t('Added'),
                this.$t('Make & Model'),
                this.$t('Urgency'),
                this.$t('Service'),
                this.$t('Viewed'),
                this.$t('Offers'),
            ],
            nestedHeaders: [
                this.$t('City'),
                this.$t('Driven'),
                this.$t('Reg. No.'),
                '',
                '',
                '',
                this.$t('Description'),
                '',
            ],
            activeRows: []
        }
    },
    mixins: [isAuthenticated, errorAwareWithPreloading, pagination],
    computed: {
    ...mapState({
            repairRequests: state => state.repairRequest.repairRequests
        })
    },
    mounted()
    {
        this.updateRequests();
    },
}

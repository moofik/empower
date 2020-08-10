import Actions from "@/store/actions";
import AdminActions from "@/store/admin/actions";
import Mutations from "@/store/mutations";

export default {
    data() {
        return {
            hasError: false,
            loading: false
        }
    },
    methods: {
        async errorAwareStoreDispatch(action, dto = null, successMessage = null) {
            this.hasError = false;
            this.loading = true;
            let response = null;
            let result = null;

            try {
                try {
                    let actualAction = Actions[action];

                    if (undefined === actualAction) {
                        actualAction = AdminActions[action];
                    }

                    if (dto === null) {
                        response = await this.$store.dispatch(actualAction);
                    } else {
                        response = await this.$store.dispatch(actualAction, dto);
                    }

                    result = response;
                } catch (err) {
                    console.log("Error: ");
                    console.log(err);
                    console.log(err.data);
                    result = await this.$store.dispatch(Actions.ERROR_SET_ERROR, err);
                    this.hasError = true;
                }

                if (response && response.status && successMessage !== null) {

                    result = await this.$store.dispatch(Actions.ERROR_SET_SUCCESS_DATA, {
                        status: response.status,
                        message: successMessage
                    });

                }

                if (result && result.data && result.data.meta) {
                    await this.$store.dispatch(Actions.PAGINATION_CLEAR_PREVIOUS_DATA);
                    this.$store.commit(Mutations.PAGINATION_METADATA_SAVE, result.data.meta)
                }
            } catch (e) {
                console.log(e);
            }

            this.loading = false;

            if (this.hasError) {
                return Promise.reject(result);
            }

            return Promise.resolve(result)
        }
    },
    async mounted() {
        await this.$store.dispatch(Actions.ERROR_CLEAR_PREVIOUS_DATA);
    }
};

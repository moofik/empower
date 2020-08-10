import Errors from "@/services/error/errors";

export function inspectResponseErrors(res) {
    if (!res.data || !res.data.data) {
        throw new Error(Errors.ERROR_NO_RESPONSE_DATA_FIELD);
    }
}

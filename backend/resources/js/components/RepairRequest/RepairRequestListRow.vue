<template>
    <tbody>
    <tr class="text-center cursor-pointer" @click.stop="$emit('toRequest', request)">
        <td>{{ request.created_at }}</td>
        <td>{{ request.workshop_make.name }}</td>
        <td>{{ request.how_fast_time }}</td>
        <td>{{ request.workshop_service.name }}</td>
        <td>{{ request.viewed }}</td>
        <td>{{ request.offered }}</td>
        <td class="width-12p" @click.stop="handleReadMore(request.id)">
            <span class="btn-orange-default btn-flat xs:my-1 sm:my-2">
                {{ $t('Read more') }} <font-awesome-icon icon="angle-down"/>
            </span>
        </td>
        <td class="width-12p">
            <slot name="action"></slot>
        </td>
    </tr>
    <tr v-if="isActive" class="bg-light-gray text-center">
        <td class="text-muddy-gray py-4 px-2" v-for="nestedHeader in nestedHeaders">{{nestedHeader}}
        </td>
    </tr>
    <tr v-if="isActive" class="bg-light-gray text-center">
        <td class='text-black td-styling py-4 px-2'>{{ request.city }}</td>
        <td class='text-black td-styling py-4 px-2'>{{ request.drive }}</td>
        <td class='text-black td-styling py-4 px-2'>{{ request.registration_number }}</td>
        <td class='text-black td-styling py-4 px-2'></td>
        <td class='text-black td-styling py-4 px-2'></td>
        <td class='text-black td-styling py-4 px-2'></td>
        <td class='text-black td-styling py-4 px-2'>{{ request.description }}</td>
        <td class='text-black td-styling py-4 px-2'></td>
    </tr>
    </tbody>
</template>

<script>
    import Actions from "@/store/actions";
    import errorAwareWithPreloading from "@/services/mixin/errorAwareWithPreloading";

    export default {
        name: "RepairRequestListRow",
        mixins: [errorAwareWithPreloading],
        data() {
            return {
                isActive: false,
                wasActiveOnce: false,
            }
        },
        props: {
            request: {
                type: Object,
                required: true
            },
            nestedHeaders: {
                type: Array,
                required: true
            }
        },
        methods: {
            async handleReadMore(id) {
                this.isActive = !this.isActive;

                if (!this.wasActiveOnce) {
                    this.wasActiveOnce = true;
                    await this.errorAwareStoreDispatch(Actions.REPAIR_REQUEST_ADD_VIEWER, id);
                }
            }
        }
    }
</script>

<style scoped>

</style>

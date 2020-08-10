<template>
    <thead>
    <tr>
        <th
            class="px-2 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider w-1/6">
            {{$t('Shop admin')}}
        </th>
        <th
            class="px-2 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider w-1/6">
            {{$t('Shop name')}}
        </th>
        <th
            class="px-2 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider w-1/6">
            {{$t('E-mail')}}
        </th>
        <th
            class="px-2 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider w-1/6">
            {{$t('City')}}
        </th>
        <th
            class="px-2 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider w-1/6">
            {{$t('Phone')}}
        </th>
        <th
            class="px-2 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider w-1/6">
            {{$t('Actions')}}
        </th>
    </tr>
    </thead>
</template>

<script>
    export default {
        name: "WorkshopListHeader"
    }
</script>

<style scoped>

</style>

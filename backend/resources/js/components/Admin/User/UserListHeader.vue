<template>
    <thead>
    <tr>
        <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
            {{$t('User')}}
        </th>
        <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
            {{$t('Role')}}
        </th>
        <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
            {{$t('E-mail')}}
        </th>
        <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
            {{$t('Actions')}}
        </th>
    </tr>
    </thead>
</template>

<script>
    export default {
        name: "UserListHeader"
    }
</script>

<style scoped>

</style>

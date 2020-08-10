<template>
    <div class="default-table" :class="wrapperClass">
        <table :class="[tableClass, invertedTable ? 'inverted-table' : '']">
            <thead :class="[theadClass]">
            <tr :class="[theadTrClass]">
                <td class='default-thead-tr' :class="[theadTdClass, disableTheadStyling ? 'td-styling' : '']"
                    v-for="header in headers">{{header}}
                </td>
            </tr>
            </thead>
            <tbody :class="[tbodyClass]">
            <template v-for="row in rows">
                <tr :class="tbodyTrClass">
                    <td class="default-td" :class=[tbodyTdClass] v-for="(col, key) of row" v-if="key !== 'nested'"
                        @click="handleTdClick(key, row)">
                        <span v-if="key !== 'button'" v-html="col"></span>
                        <span v-else class="btn-orange-default btn-flat xs:my-1 sm:my-2">{{col}}&nbsp;&nbsp;<font-awesome-icon icon="angle-down"/></span>
                    </td>
                </tr>
                <tr v-if="row.nested.active" :class="[theadNestedTrClass]">
                    <td class='default-thead-tr' :class="[theadNestedTdClass, disableTheadStyling ? 'td-styling' : '']"
                        v-for="nestedHeader in row.nested.headers">{{nestedHeader}}
                    </td>
                </tr>
                <tr v-if="row.nested.active" :class="[tbodyNestedTrClass]">
                    <td class='default-thead-tr' :class="[tbodyNestedTdClass, disableTheadStyling ? 'td-styling' : '']"
                        v-for="nestedBody in row.nested.body">{{nestedBody}}
                    </td>
                </tr>
            </template>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: "NestedTableWidget",
        props: {
            headers: {
                type: Array,
                required: true
            },
            rows: {
                type: Array,
                required: true
            },
            invertedTable: {
                type: Boolean,
                default: false
            },
            disableTheadStyling: {
                type: Boolean,
                default: false
            },
            wrapperClass: {
                type: String,
                default: 'bg-smoke-gray'
            },
            tableClass: {
                type: String,
                default: 'w-full'
            },
            theadTrClass: {
                type: String,
                default: ''
            },
            theadTdClass: {
                type: String,
                default: ''
            },
            tbodyTrClass: {
                type: String,
                default: ''
            },
            tbodyTdClass: {
                type: String,
                default: ''
            },
            theadClass: {
                type: String,
                default: ''
            },
            tbodyClass: {
                type: String,
                default: ''
            },
            theadNestedTrClass: {
                type: String,
                default: ''
            },
            tbodyNestedTrClass: {
                type: String,
                default: ''
            },
            theadNestedTdClass: {
                type: String,
                default: ''
            },
            tbodyNestedTdClass: {
                type: String,
                default: ''
            },
        },
        methods: {
            handleTdClick(key, row) {
                if (key === 'button') {
                    row.nested.active = !row.nested.active;
                }
            }
        }
    }
</script>

<style scoped lang="scss">
    .default-table {
        font-family: "SF UI Font Regular", sans-serif;
        font-size: 14px;
        display: block;
        border-radius: 4px;
    }

    .default-td {
        border-top: 1px solid #cdd4ca;
    }

    .default-thead-tr {
        border-top: 0;

        &.td-styling {
            color: black;
            border-top: 1px solid #cdd4ca;
        }
    }

    .inverted-table {
        tr {
            display: block;
            float: left;
        }

        th, td {
            display: block;
        }

        tbody, thead {
            display: inline-block;
            vertical-align: top;
        }

        thead {
            tr {
                width: 100%;
            }
        }
    }
</style>

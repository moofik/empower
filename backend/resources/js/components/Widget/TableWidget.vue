<template>
    <div class="default-table">
        <table :class="[tableClass, invertedTable ? 'inverted-table' : '']">
            <thead :class="[theadClass]">
            <tr :class="[theadTrClass]">
                <td class='default-thead-tr' :class="[theadTdClass, disableTheadStyling ? 'td-styling' : '']"
                    v-for="header in headers">{{header}}</td>
            </tr>
            </thead>
            <tbody :class="[tbodyClass]">
            <tr :class="tbodyTrClass" v-for="row in rows">
                <td class="default-td" :class=[tbodyTdClass] v-for="col of row">
                    {{col}}
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: "TableWidget",
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
            }
        }
    }
</script>

<style scoped lang="scss">
    .default-table {
        font-family: "SF UI Font Regular", sans-serif;
        font-size: 14px;
        background: #e1e6df;
        display: block;
        padding: 15px 20px;
        border-radius: 4px;
    }

    .default-td {
        border-top: 1px solid #cdd4ca;
        padding: 10px 5px;
    }

    .default-thead-tr {
        color: #929d8e;
        border-top: 0;
        padding: 10px 5px;

        &.td-styling {
            color: black;
            border-top: 1px solid #cdd4ca;
            padding: 10px 5px;
        }
    }

    .inverted-table {
        tr { display: block; float: left; }
        th, td { display: block; }

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

<template>
    <div class="list-default-container flex" :class="[multiheadered ? 'flex-col' : 'flex-row']">
        <div v-if="multiheadered" v-for="(header, index) in headers" class="flex flex-col flex-1 list-default-multiheader-container">
            <h4>{{Object.keys(header)[0]}}</h4>
            <div v-for="(heads, nestedIndex) in header" class="list-default-header flex flex-row w-full">
                <div class="flex flex-1" v-for="head in header[nestedIndex]">{{head}}</div>
            </div>
            <div class="list-small-value flex flex-row w-full">
                <div class="flex flex-1" v-for="val in cols[index]">{{val}}</div>
            </div>
        </div>
        <template v-if="!multiheadered">
            <div v-for="(header, index) in headers" class="flex flex-col flex-1">
                <p class="list-default-header">{{header}}</p>
                <p v-for="value in cols[index]">
                    <font-awesome-icon
                        icon="check-circle"
                        :style="{ color: '#e2e6e0', background: 'black', border: '1px solid black', 'border-radius': '100%' }"
                    />
                    {{value}}
                </p>
            </div>
        </template>
    </div>
</template>

<script>
    export default {
        name: "ListWidget",
        props: {
            headers: {
                type: Array,
                required: false,
                default: () => ['']
            },
            cols: {
                type: Array,
                required: true
            },
            multiheadered: {
                type: Boolean,
                required: false,
                default: false
            }
        }
    }
</script>

<style scoped lang="scss">
    .list-default-container {
        font-family: "SF UI Font Regular", sans-serif;
        font-size: 14px;
        background: #e1e6df;
        display: flex;
        padding: 15px 20px;
        border-radius: 4px;

        p {
            margin: 10px 0;
            color: #191a1d;
        }
    }

    .list-default-header {
        letter-spacing: -1px;
        line-height: 1.1;
        font-family: "SF UI Text Bold", sans-serif;
        margin: 20px 0;
        font-size: 14px;
        font-weight: normal;
    }

    .list-default-multiheader-container {
        &:first-child {
            margin-bottom: 40px;
        }

        h4 {
            line-height: 1.1;
            font-family: "SF UI Text Bold", sans-serif;
            font-size: 16px;
            font-weight: normal;
        }
    }

    .list-small-value {
        margin-top: 0;
        font-family: "SF UI Text Regular", sans-serif;
        font-size: 14px;
        line-height: 1.1;
    }
</style>

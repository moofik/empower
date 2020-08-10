<template>
    <div>
        <div class="tabs">
            <div
                class="tab"
                :class="{ active: (tab === tabs.TAB_CONTACT_US) }"
                @click="tab=tabs.TAB_CONTACT_US">
                {{ $t('Contact Us') }}
            </div>
            <div
                class="tab"
                :class="{ active: (tab === tabs.TAB_SERVICES) }"
                @click="tab=tabs.TAB_SERVICES">
                {{ $t('Services') }}
            </div>
            <div
                class="tab"
                :class="{ active: (tab === tabs.TAB_MAKES) }"
                @click="tab=tabs.TAB_MAKES">
                {{ $t('Makes and models') }}
            </div>
            <div
                class="tab"
                :class="{ active: (tab === tabs.TAB_PAYMENT_OPTIONS) }"
                @click="tab=tabs.TAB_PAYMENT_OPTIONS">
                {{ $t('Payment') }}
            </div>
            <div
                class="tab"
                :class="{ active: (tab === tabs.TAB_SCHEDULE) }"
                @click="tab=tabs.TAB_SCHEDULE">
                {{ $t('Schedule') }}
            </div>
            <div
                class="tab"
                :class="{ active: (tab === tabs.TAB_SPARE_PARTS) }"
                @click="tab=tabs.TAB_SPARE_PARTS">
                {{ $t('Parts') }}
            </div>
            <div
                class="tab"
                :class="{ active: (tab === tabs.TAB_WARRANTY) }"
                @click="tab=tabs.TAB_WARRANTY"
            >
                {{ $t('Warranty') }}
            </div>
        </div>
        <div>
            <component :is="tab" :workshop="workshop"></component>
        </div>
    </div>
</template>

<script>
    import tabs from "@/components/Shop/tabs";
    import SubmitRepairRequestForm from "@/components/Shop/SubmitRepairRequestForm";
    import ContactUsTab from "@/components/Shop/ContactUsTab";
    import MakesTab from "@/components/Shop/MakesTab";
    import PaymentOptionsTab from "@/components/Shop/PaymentOptionsTab";
    import ScheduleTab from "@/components/Shop/ScheduleTab";
    import ServicesTab from "@/components/Shop/ServicesTab";
    import SparePartsTab from "@/components/Shop/SparePartsTab";
    import WarrantyTab from "@/components/Shop/WarrantyTab";


    export default {
        name: "TabMenuWidget",
        components: {
            SubmitRepairRequestForm,
            ContactUsTab,
            MakesTab,
            PaymentOptionsTab,
            ScheduleTab,
            ServicesTab,
            SparePartsTab,
            WarrantyTab
        },
        props: {
            workshop: {
                type: Object,
                required: true
            }
        },
        data() {
            return {
                tab: null
            }
        },
        computed: {
            tabs() {
                return tabs;
            }
        },
        created() {
            console.log(tabs);
            this.tab = tabs.TAB_CONTACT_US;
        }
    }
</script>

<style scoped lang="scss">
    .tabs {
        margin: 50px 0 20px 0;
        font-family: "SF UI Font Regular", sans-serif;
        color: #191a1d;
        font-size: 14px;

        .tab {
            display: inline-block;
            margin: 0 4px 3px 0;
            border-radius: 3px;
            white-space: nowrap;
            border: 1px solid #153e5c;
            color: #153e5c;
            padding: 9px 13px;
            cursor: pointer;

            &.active {
                background: white;
            }
        }

        :not(.active).tab:hover {
            background: #e1e6df;
        }
    }
</style>

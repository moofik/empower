<template>
    <div class="main-background">
        <swiper :options="swiperOption" ref="feedback-swiper">
            <swiper-slide :key="slide.id" v-for="slide in slides">
                <img alt="background" class="swiper-image" :src="slide.image" />
            </swiper-slide>
            <div class="swiper-pagination main-swiper-pagination" slot="pagination"></div>
        </swiper>
    </div>
</template>

<script>
    import * as header from '~/images/header.jpg'
    import * as header2 from '~/images/header2.jpg'
    import * as header3 from '~/images/header3.jpg'

    export default {
        name: 'SliderBackground',
        data() {
            return {
                'slides': [
                    {
                        id: 1,
                        image: header.default,
                    },
                    {
                        id: 2,
                        image: header2.default,
                    },
                    {
                        id: 3,
                        image: header3.default,
                    },
                ],
                swiperOption: {
                    pagination: {
                        el: '.swiper-pagination',
                        type: 'bullets',
                        clickable: true
                    }
                }
            }
        }
    }
</script>

<style scoped>
    .main-swiper-pagination {
        top: 50% !important;
        left: 95% !important;
        z-index: 100 !important;
    }

    .swiper-container {
        height: 700px !important;
    }

    .swiper-image {
        width: 100%;
        height: auto;
    }

    .swiper-pagination-bullet {
        width: 10px;
        height: 10px;
        outline: none;
        margin: 5px 4px !important;
        background: #cdd4cb !important;
        opacity: 100;
    }
</style>

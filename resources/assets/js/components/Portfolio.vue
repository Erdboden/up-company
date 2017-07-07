<template>
    <div @companyChanged="fetch">

        <p class="text-center">Portfolio</p>
        <transition name="fade">
            <portfolio-item-details v-if="showPortfolioDetails" @collapse="showPortfolioDetails = !showPortfolioDetails"
                                    :item="portfolioDetails"></portfolio-item-details>
        </transition>
        <div class="row">
            <div v-for="(portfolioItem, index) in items" :key="portfolioItem.id">
                <portfolio-item :data="portfolioItem" @show="showDetails(portfolioItem)"></portfolio-item>
            </div>
        </div>
        <paginator :dataSet="dataSet" @changed="fetch"></paginator>
    </div>
</template>
<script>
    import PortfolioItem from './PortfolioItem.vue';
    import PortfolioItemDetails from './PortfolioItemDetails.vue';
    import collection from '../mixins/Collection.js';
    export default{
        props: ['data'],
        components: {PortfolioItem, PortfolioItemDetails},
        mixins: [collection],


        created(){
            this.fetch();
        },

        data(){
            return {
                companySlug: this.data,
                showPortfolioDetails: false,
                portfolioDetails: '',
                dataSet: false
            }
        },
        watch: {
            data: function () {
                this.companySlug = this.data
                this.fetch();
            }
        },
        methods: {
            fetch(page) {
                axios.get(this.url(page)).then(this.refresh);
            },

            url(page) {
                if (!page) {
                    let query = location.search.match(/page=(\d+)/);

                    page = query ? query[1] : 1;
                }

                return `/companies/${this.companySlug}/portfolio?page=${page}`;
            },

            refresh({data}) {
                this.dataSet = data;
                this.items = data.data;

//                window.scrollTo(0, 0);
            },
            showDetails(portfolioItem){
                this.portfolioDetails = portfolioItem;
                this.showPortfolioDetails = true;
            }
        }
    }
</script>
<style>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s
    }

    .fade-enter, .fade-leave-to /* .fade-leave-active in <2.1.8 */
    {
        opacity: 0
    }
</style>
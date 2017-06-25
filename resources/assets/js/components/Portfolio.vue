<template>
    <div>

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
    </div>
</template>
<script>
    import PortfolioItem from './PortfolioItem.vue';
    import PortfolioItemDetails from './PortfolioItemDetails.vue';
    import collection from '../mixins/collection';
    export default{
        props: ['data'],
        components: {PortfolioItem, PortfolioItemDetails},
        mixins: [collection],

        created(){
            this.fetch();
        },
        data(){
            return {
                showPortfolioDetails: false,
                portfolioDetails: ''
            }
        },
        methods: {
            fetch(){

                axios.get(this.url())
                    .then(this.refresh);
            },
            refresh({data}){
                this.items = data;

            },
            url(){
                return `${location.pathname}/portfolio`;
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
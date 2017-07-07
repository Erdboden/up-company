<template>
    <div>
        <h1 class="text-center">Reviews</h1>
        <div v-for="(review, index) in items" :key="review.id">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title" v-text="'score: ' + review.score.score_text">Panel title</h3>
                </div>
                <div class="panel-body" v-text="review.body">
                </div>
            </div>
        </div>
        <paginator :dataSet="dataSet" @changed="fetch"></paginator>
    </div>
</template>
<script>
    import collection from '../mixins/Collection.js';
    export default{
        mixins: [collection],
        props: ['data'],

        data(){
            return {
                companySlug: this.data,
                dataSet: false
            }
        },
        created(){
            this.fetch();
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

                return `/companies/${this.companySlug}/reviews?page=${page}`;
            },

            refresh({data}) {
                this.dataSet = data;
                this.items = data.data;

//                window.scrollTo(0, 0);
            },
        }
    }
</script>
<template>
    <div class="col-sm-6 col-md-4">
        <div class="thumbnail thumbnail-height">
            <img :src="image">
            <div class="caption">
                <h5 v-text="title"></h5>
                <!--<p v-text="body"></p>-->
                <p class="text-center"><a href="#" class="btn btn-primary" role="button" @click.prevent="showDetailsFlag">View</a></p>
            </div>
        </div>
    </div>
</template>
<script>
    export default{
        props: ['data'],
        data(){
            return {
                id: this.data.id,
                title: this.data.title,
                body: this.data.body,
                image: ""
            };
        },
        methods:{
            showDetailsFlag(){
                this.$emit('show', this.data);
            }
        }
    }
</script>
<style>
    .thumbnail-height{
        height: 225px;
    }
</style>
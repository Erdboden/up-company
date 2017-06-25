<template>

    <div>
        <h1 class="text-center"><a @click.prevent="collapse" href="#">
            <span class="glyphicon glyphicon-remove"></span></a></h1>


        <h2 class="text-center" v-text="this.item.title"></h2>
        <img class="center-block" :src="this.item.image_path">
        <p class="text-center" v-text="this.item.body"></p>
        <hr>
    </div>
</template>
<script>
    export default{
        props: ['item'],
        methods: {
            collapse(){
                this.$emit('collapse');
            }
        }
    }
</script>

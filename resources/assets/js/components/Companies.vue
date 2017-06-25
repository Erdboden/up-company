<template>
    <tr>
        <th v-text="title"></th>
        <th v-text="body"></th>
        <th><img :src="image"></th>
        <th>
            <button class="btn btn-info">Edit</button>
        </th>
        <th>
            <button class="btn btn-danger" @click="destroy">Delete</button>
        </th>
    </tr>
</template>
<script>
    export default{
        props: ['data'],
        data(){
            return {
                id: this.data.id,
                title: this.data.name,
                body: this.data.slogan,
                image: this.data.main_image_path
            }
        },
        methods: {
            destroy(){
                axios.delete('/companies/' + this.data.name);
                this.$emit('deleted', this.data.id);
            }
        }
    }
</script>
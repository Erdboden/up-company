<template>
    <tbody>
    <tr :id="'company-'+id">
        <th v-text="title"></th>
        <th v-text="domain"></th>
        <th v-text="country"></th>
        <th v-text="city"></th>
        <th v-text="street"></th>
        <th v-text="slogan"></th>
        <th><img :src="image"></th>
        <th>
            <button class="btn btn-info" @click="show">Edit</button>
        </th>
        <th>
            <button class="btn btn-danger" @click="destroy">Delete</button>
        </th>
    </tr>
    </tbody>
</template>
<script>
    export default{
        props: ['data', 'domains'],
        data(){
            return {
//                editing: false,
                id: this.data.id,
                title: this.data.name,
                slug: this.data.slug,
                domain: this.data.domain.name,
                country: this.data.country,
                city: this.data.city,
                street: this.data.street,
                slogan: this.data.slogan,
                image: this.data.main_image_path
            }
        },
        methods: {
            destroy(){
                axios.delete('/companies/' + this.data.slug);
                this.$emit('deleted', this.data.id);
            },
            show(){
                this.$emit('editing', this.data.id);
            }
        }
    }
</script>
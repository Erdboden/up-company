<template>
    <tbody>
    <tr :id="'company-'+id">
        <th><a :href="'/companies/' + slug" v-text="title"></a></th>
        <th>
            <div v-for="(d, i) in domain" v-text="d.name"></div>
        </th>
        <th v-text="country"></th>
        <th v-text="city"></th>
        <th v-text="street"></th>
        <th v-text="slogan"></th>
        <th><img :src="image"></th>
        <th>
            <div class="btn-group">
                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                    Edit portfolio <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#" @click.prevent="showPortfolioForm('', data.slug)">New</a></li>
                    <li v-for="(item, index) in data.portfolio" :value="item.id">
                        <a href="#" @click.prevent="showPortfolioForm(item, data.slug)">{{item.title}}</a>
                    </li>
                </ul>
            </div>
        </th>
        <th>
            <button class="btn btn-info" @click.prevent="show">Edit</button>
        </th>
        <th>
            <button class="btn btn-danger" @click.prevent="showModal=true">Delete</button>
            <modal v-if="showModal" @close="showModal = false">
                <h3 slot="header">Warning</h3>
                <p slot="body">Are you sure you want to delete?</p>
                <div slot="footer">
                    <button class="btn btn-info btn-lg" @click="destroy">Yes</button>
                    <button class="btn btn-danger btn-lg" @click="showModal=false">No</button>
                </div>
            </modal>
        </th>
    </tr>
    </tbody>
</template>
<script>
    import Modal from './Modal.vue';
    export default{
        components: {Modal},
        props: ['data', 'domains'],
        data(){
            return {
//                editing: false,
                id: this.data.id,
                title: this.data.name,
                slug: this.data.slug,
                domain: this.data.domain,
                country: this.data.country,
                city: this.data.city,
                street: this.data.street,
                slogan: this.data.slogan,
                image: this.data.main_image_path,
                showModal: false
            }
        },
        watch: {
            data: function () {
                this.title = this.data.name,
                    this.slug = this.data.slug,
                    this.country = this.data.country,
                    this.city = this.data.city,
                    this.street = this.data.street,
                    this.image = this.data.main_image_path,
                    this.slogan = this.data.slogan,
                    this.domain = this.data.domain

            }
        },
        methods: {
            destroy(){
//                this.showModal = true;
                axios.delete('/companies/' + this.data.slug)
                    .then(response => flash('Company deleted'));
                this.$emit('deleted', this.data.id);
            },
            show(){
                this.$emit('editing', this.data.id);
            },
            showPortfolioForm(item, method, companySlug){
                this.$emit('showPortfolio', item, method, companySlug);
            }
        }
    }
</script>
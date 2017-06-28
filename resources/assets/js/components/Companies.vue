<template>
    <tbody>
    <tr :id="'company-'+id">
        <th v-text="title"></th>
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
                    <li><a href="#" @click.prevent="showPortfolioForm('','post', data.slug)">New</a></li>
                    <li v-for="(item, index) in data.portfolio" :value="item.id">
                        <a href="#" @click.prevent="showPortfolioForm(item, 'patch', data.slug)">{{item.title}}</a>
                    </li>
                </ul>
            </div>
        </th>
        <th>
            <button class="btn btn-info" @click.prevent="show">Edit</button>
        </th>
        <th>
            <button class="btn btn-danger" @click.prevent="destroy">Delete</button>
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
                domain: this.data.domain,
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
            },
            showPortfolioForm(item, method, companySlug){
                this.$emit('showPortfolio', item, method, companySlug);
            }
        }
    }
</script>
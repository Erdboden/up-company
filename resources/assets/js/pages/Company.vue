<template>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="level">
                            <span class="flex">
                        <h4 v-text="name"></h4>
                                </span>
                            <img :src="photo">
                        </div>
                    </div>
                    <div class="panel-body" v-text="slogan"></div>
                    <hr>
                    <div class="panel-body">
                        <portfolio :data="slug"></portfolio>
                    </div>
                    <hr>
                    <div class="panel-body">
                    <reviews :data="slug"></reviews>
                    </div>
                </div>
            </div>
            <div class="col-md-2 company-details">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <p class="text-center">General information</p>

                        <ul>
                            <li>Origin: <b v-text="city"></b>, <b v-text="country"></b>, <b v-text="street"></b>
                            </li>
                            <li>Owner:<b v-text="owner">{</b></li>
                            <li>Area of activity:
                                <ul>
                                    <li v-for="(domain, index) in data.domain" :key="domain.id">
                                        <b v-text="domain.name"></b></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import Portfolio from '../components/Portfolio.vue';
    import Reviews from '../components/Reviews.vue';
    export default{
        props: ['data', 'image'],
        components: {Portfolio, Reviews},
        data(){
            return {
                name: this.data.name,
                slug: this.data.slug,
                photo: this.image,
                slogan: this.data.slogan,
                city: this.data.city,
                country: this.data.country,
                street: this.data.street,
                owner: this.data.owner.name,

                domain: this.data.domain
            }
        },
        mounted(){
//            alert(this.data.domain);
        }
    }
</script>
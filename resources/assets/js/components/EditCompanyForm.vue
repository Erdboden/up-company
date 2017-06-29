<template>
    <div class="row">
        <form method="POST" action="/companies" @submit.prevent="onSubmit"
              @keydown="form.errors.clear($event.target.name)">
            <div class="form-group">
                <label>Choose a domain:</label>
                <select class="form-control" v-model="form.selectedDomain">
                    <option v-for="(item, index) in domains" :value="item.id">{{item.name}}</option>
                </select>
            </div>
            <div class="form-group">
                <button v-for="(d, i) in form.domain" class="btn btn-info btn-xs mr-1" v-text="d.name"
                        @click.prevent="deleteDomain(d.id, i)"></button>
            </div>
            <div class="form-group">
                <label>Company name:</label>
                <input type="text" name="name" class="form-control" v-model="form.name">
                <div class="alert alert-danger help-block" v-if="form.errors.has('name')"
                     v-text="form.errors.get('name')"></div>
            </div>

            <div class="form-group">
                <label>Country:</label>
                <input type="text" name="country" class="form-control" v-model="form.country">
                <div class="alert alert-danger help-block" v-if="form.errors.has('country')"
                     v-text="form.errors.get('country')"></div>
            </div>

            <div class="form-group">
                <label>City:</label>
                <input type="text" name="city" class="form-control" v-model="form.city">
                <div class="alert alert-danger help-block" v-if="form.errors.has('city')"
                     v-text="form.errors.get('city')"></div>
            </div>

            <div class="form-group">
                <label>Street:</label>
                <input type="text" name="street" class="form-control" v-model="form.street">
                <div class="alert alert-danger help-block" v-if="form.errors.has('street')"
                     v-text="form.errors.get('street')"></div>
            </div>

            <div class="form-group">
                <label>Image (link):</label>
                <input type="text" name="image" class="form-control" v-model="form.image">
            </div>

            <div class="form-group ">
                <label>Slogan:</label>
                <textarea class="form-control" name="slogan" rows="8" v-model="form.slogan"></textarea>
                <div class="alert alert-danger help-block" v-if="form.errors.has('slogan')"
                     v-text="form.errors.get('slogan')"></div>
            </div>
            <button class="btn btn-primary" :disabled="form.errors.any()">Update</button>
            <button class="btn btn-link" @click="collapse">Cancel</button>
        </form>
    </div>

</template>
<script>
    import collection from '../mixins/Collection.js';
    import {Form} from '../classes/Form.js';
    export default{
        props: ['data', 'domains'],
        mixins: [collection],
        data(){
            return {
                form: new Form({
                    selectedDomain: '',
                    domain: this.data.domain,
                    name: this.data.name,
                    slug: this.data.slug,
                    country: this.data.country,
                    city: this.data.city,
                    street: this.data.street,
                    image: this.data.main_image_path,
                    slogan: this.data.slogan
                })
            }
        },
        watch: {
            data: function () {
                this.form.domain = this.data.domain,
                    this.form.name = this.data.name,
                    this.form.slug = this.data.slug,
                    this.form.country = this.data.country,
                    this.form.city = this.data.city,
                    this.form.street = this.data.street,
                    this.form.image = this.data.main_image_path,
                    this.form.slogan = this.data.slogan
            }
        },
        methods: {
            onSubmit() {
                if (this.form.name != this.data.name) {
                    this.form.slug = this.form.name.split(' ').join('-');
                }
                this.form.patch('/companies/' + this.form.slug)
                    .then(response => {
                        this.collapse();
                        flash('Company updated');

                    });
            },

            deleteDomain(id, index){
                axios.patch('/companies/' + this.data.slug + '/domain', {
                    domain: id
                }).then(response => flash('Domain deleted'));
                this.form.domain.splice(index, 1);
            },
            collapse(){
                this.$emit('editing');
            },
        }
    }
</script>
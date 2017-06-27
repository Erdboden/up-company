<template>
    <div class="row">
        <div class="form-group">
            <label>Choose a domain:</label>
            <select class="form-control" v-model="selectedDomain" required>
                <option v-for="(item, index) in domains" :value="item.id">{{item.name}}</option>
            </select>
        </div>
        <div class="form-group">
            <button v-for="(d, i) in domain" class="btn btn-info btn-xs mr-1" v-text="d.name"
                    @click="deleteDomain(d.id, i)"></button>
        </div>
        <div class="form-group">
            <label>Company name:</label>
            <input type="text" class="form-control" v-model="name" required>
        </div>

        <div class="form-group">
            <label>Country:</label>
            <input type="text" class="form-control" v-model="country" required>
        </div>

        <div class="form-group">
            <label>City:</label>
            <input type="text" class="form-control" v-model="city" required>
        </div>

        <div class="form-group">
            <label>Street:</label>
            <input type="text" class="form-control" v-model="street" required>
        </div>

        <div class="form-group">
            <label>Image (link):</label>
            <input type="text" class="form-control" v-model="image" required>
        </div>

        <div class="form-group">
            <label>Slogan:</label>
            <textarea class="form-control" rows="8" v-model="slogan"></textarea>
        </div>
        <button class="btn btn-primary" @click="update">Update</button>
        <button class="btn btn-link" @click="collapse">Cancel</button>
    </div>

</template>
<script>
    import collection from '../mixins/Collection.js';
    export default{
        props: ['data', 'domains'],
        mixins: [collection],
        data(){
            return {
                selectedDomain: '',
                domain: this.data.domain,
                name: this.data.name,
                slug: this.data.slug,
                country: this.data.country,
                city: this.data.city,
                street: this.data.street,
                image: this.data.main_image_path,
                slogan: this.data.slogan
            }
        },
        created(){
            this.filter();
        },
        methods: {
            update(){
                if (this.name != this.data.name) {
                    this.slug = this.name.split(' ').join('-');
                }
                axios.patch('/companies/' + this.data.slug, {
                    selectedDomain: this.selectedDomain,
                    name: this.name,
                    slug: this.slug,
                    country: this.country,
                    city: this.city,
                    street: this.street,
                    image: this.image,
                    slogan: this.slogan
                });

                this.collapse();
            },
            deleteDomain(id, index){
                alert(id);
                axios.patch('/companies/' + this.data.slug + '/domain', {
                    domain: id
                });
                this.domain.splice(index, 1);
            },
            collapse(){
                this.$emit('editing');
            },
            filter(){

//                this.domains.forEach(function (element) {
                    this.domain.forEach(function (element) {

                    });
//                    console.log(element);
//                });
            }
        }

    }
</script>
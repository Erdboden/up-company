<template>
    <div class="row">
        <div class="form-group">
            <label>Choose a domain:</label>
            <select v-model="domain" class="form-control" required>
                <option v-for="(item, index) in domains" :value="item.id">{{item.name}}</option>
            </select>
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
    export default{
        props: ['data', 'domains'],
        data(){
            return {
                domain: this.data.domain_id,
                name: this.data.name,
                slug: this.data.slug,
                country: this.data.country,
                city: this.data.city,
                street: this.data.street,
                image: this.data.main_image_path,
                slogan: this.data.slogan
            }
        },
        methods: {
            update(){
                if(this.name != this.data.name){
                    this.slug=this.name.split(' ').join('-');
                }
                axios.patch('/companies/' + this.data.slug, {
                    domain: this.domain,
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
            collapse(){
                this.$emit('editing');
            }
        }

    }
</script>
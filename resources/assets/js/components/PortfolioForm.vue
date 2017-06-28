<template>
    <div class="row">
        <div class="form-group">
            <label>Title:</label>
            <input type="text" class="form-control" v-model="title" required>
        </div>

        <div class="form-group">
            <label>Image:</label>
            <input type="text" class="form-control" v-model="image" required>
        </div>

        <div class="form-group">
            <label>Body:</label>
            <textarea class="form-control" rows="8" v-model="body"></textarea>
        </div>
        <button class="btn btn-primary" @click="create" v-if="formMethod==='post'">Add</button>
        <button class="btn btn-primary" @click="update" v-if="formMethod==='patch'">Update</button>
        <button class="btn btn-danger" @click="destroy" v-if="formMethod==='patch'">Delete</button>
        <button class="btn btn-link" @click="collapse">Cancel</button>
    </div>
</template>
<script>
    export default{
        props: ['data', 'companySlug', 'method'],
        data(){
            return {
                id: this.data.id,
                title: this.data.title,
                image: this.data.image_path,
                body: this.data.body,
                company: this.companySlug,
                formMethod: this.method
            }
        },
        watch: {
            data: function () {
                this.id = this.data.id,
                    this.title = this.data.title,
                    this.image = this.data.image_path,
                    this.body = this.data.body,
                    this.company = this.companySlug,
                    this.formMethod = this.method

            }
        },
        methods: {
            update(){
                axios.patch('/companies/' + this.company + '/portfolio/' + this.id, {
                    title: this.title,
                    image: this.image,
                    body: this.body,
                });
                this.collapse();
            },
            create(){
                axios.post('/companies/' + this.company + '/portfolio/', {
                    title: this.title,
                    image: this.image,
                    body: this.body,
                });
                this.collapse();
            },
            destroy(){
                axios.delete('/companies/' + this.company + '/portfolio/' + this.id);
//                this.data.splice(index, 1);
                this.collapse();
            },
            collapse(){
                this.$emit('collapse', this.id);
            }
        }
    }
</script>
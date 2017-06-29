<template>
    <div class="row">
        <form method="POST" action="/portfolio" @submit.prevent="onSubmit"
              @keydown="form.errors.clear($event.target.name)">
            <div class="form-group">
                <label>Title:</label>
                <input type="text" name="title" class="form-control" v-model="form.title" required>
                <div class="alert alert-danger help-block" v-if="form.errors.has('title')"
                     v-text="form.errors.get('title')"></div>
            </div>

            <div class="form-group">
                <label>Image:</label>
                <input type="text" name="image" class="form-control" v-model="form.image" required>
            </div>

            <div class="form-group">
                <label>Body:</label>
                <textarea class="form-control" name="body" rows="8" v-model="form.body"></textarea>
                <div class="alert alert-danger help-block" v-if="form.errors.has('body')"
                     v-text="form.errors.get('body')"></div>
            </div>
            <button class="btn btn-primary" @click.prevent="onSubmit" v-if="!this.form.id">Add</button>
            <button class="btn btn-primary" @click.prevent="onUpdate" v-if="this.form.id">Update</button>
            <button class="btn btn-danger" @click.prevent="onDelete" v-if="this.form.id">Delete</button>
            <button class="btn btn-link" @click.prevent="collapse">Cancel</button>
        </form>
    </div>
</template>
<script>
    import {Form} from '../classes/Form.js';
    export default{
        props: ['data', 'companySlug'],
        data(){
            return {
                form: new Form({
                    id: this.data.id,
                    title: this.data.title,
                    image: this.data.image_path,
                    body: this.data.body,
                    company: this.companySlug
                })
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
            onUpdate() {
                this.form.patch('/companies/' + this.form.company + '/portfolio/' + this.form.id)
                    .then(response => {
                        this.collapse();
                        flash('Portfolio item updated');
                    });
            },
            onSubmit(){
                this.form.post('/companies/' + this.form.company + '/portfolio/')
                    .then(response => {
                        this.collapse();
                        flash('Portfolio item added');
                    });
            },
            onDelete(){
                this.form.delete('/companies/' + this.form.company + '/portfolio/' + this.form.id)
                    .then(response => {
                        this.collapse();
                        flash('Portfolio item deleted');
                    });
            },
            collapse(){
                this.$emit('collapse', this.id);
            }
        }
    }
</script>
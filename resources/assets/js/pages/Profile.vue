<template>
    <div class="container">
        <!--<div class="row">-->
        <table id="example" class="table">
            <thead>
            <tr>
                <th>title</th>
                <th>body</th>
                <th>image</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <companies v-for="(company, index) in companies"
                       :key="company.id" :data="company"
                       @deleted="companies.splice(index, 1)"></companies>
            </tbody>
        </table>
    </div>
</template>
<script>
    import Companies from '../components/Companies.vue';
    import collection from '../mixins/collection';
    export default{
        props: ['data'],
        components: {Companies},
        mixins: [collection],
        data(){
            return{
                companies: this.data
            }
        },
        created(){
            $(document).ready(function () {
                $('#example').DataTable();
            });
        },
        methods:{
            refresh(){
                this.items = data.data;
            }
        }
    }
</script>
<template>
    <div class="container">
        <table id="example" class="table">
            <thead>
            <tr>
                <th>title</th>
                <th>domain</th>
                <th>country</th>
                <th>city</th>
                <th>street</th>
                <th>slogan</th>
                <th>image</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <companies
                    v-for="(company, index) in items"
                    :key="company.id" :data="company"
                    @deleted="remove(index, 1)"
                    @editing="showForm(company)"></companies>
        </table>

        <edit-company-form :data="companyToEdit" v-if="editForm" :domains="domains"
                           @editing="fetch"></edit-company-form>
    </div>
</template>
<script>
    import Companies from '../components/Companies.vue';
    import EditCompanyForm from '../components/EditCompanyForm.vue';
    import collection from '../mixins/Collection.js';
    export default{
        props: ['domains'],
        components: {Companies, EditCompanyForm},
        mixins: [collection],
        data(){
            return {
                editForm: false,
                companies: this.data,
                companyToEdit: '',
            }
        },
        created(){
            this.fetch();
            $(document).ready(function () {
                $('#example').DataTable();
            });
        },
        computed:{
//            signedIn() {
//                return window.App.signedIn;
//            },
//
//            canUpdate() {
//                return this.authorize(user => this.data.user_id == user.id);
//            }
        },
        methods: {
            fetch() {
                axios.get(`${location.pathname}`).then(this.refresh);
            },
            refresh({data}){
                this.editForm = false;
                this.items = data;
            },
            showForm(company){
                this.editForm = true;
                this.companyToEdit = company;
            }
        }
    }
</script>
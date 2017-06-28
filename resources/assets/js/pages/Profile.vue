<template>
    <div class="container">
        <table id="companies" class="table">
            <thead>
            <tr>
                <th>title</th>
                <th>domain</th>
                <th>country</th>
                <th>city</th>
                <th>street</th>
                <th>slogan</th>
                <th>image</th>
                <th>portfolio</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <companies
                    v-for="(company, index) in items"
                    :key="company.id" :data="company"
                    @deleted="remove(index, 1)"
                    @editing="showForm(company)"
                    @showPortfolio="showPortfolioForm"></companies>
        </table>

        <portfolio-form :data="portfolioToEdit" :method="method" :companySlug="companySlug"
                        v-if="portfolioForm" @collapse="fetch"></portfolio-form>
        <edit-company-form :data="companyToEdit" v-if="editForm" :domains="domains"
                           @editing="fetch"></edit-company-form>
    </div>
</template>
<script>
    import Companies from '../components/Companies.vue';
    import EditCompanyForm from '../components/EditCompanyForm.vue';
    import PortfolioForm from '../components/PortfolioForm.vue';
    import collection from '../mixins/Collection.js';
    export default{
        props: ['domains'],
        components: {Companies, EditCompanyForm, PortfolioForm},
        mixins: [collection],
        data(){
            return {
                method: '',
                companySlug: '',
                editForm: false,
                portfolioForm: false,
//                companies: '',
                portfolioToEdit: '',
                companyToEdit: '',
            }
        },
        created(){
            this.fetch();
            $(document).ready(function () {
                $('#companies').DataTable();
            });
        },
        computed: {
//            signedIn() {
//                return window.App.signedIn;
//            },
//
//            canUpdate() {
//                return this.authorize(user => this.items.user_id == user.id);
//            }
        },
        methods: {
            fetch() {
                this.portfolioForm = false;
                axios.get(`${location.pathname}`).then(this.refresh);
            },
            refresh({data}){
                this.editForm = false;
                this.items = data;
            },
            showForm(company){
                this.editForm = true;
                this.portfolioForm = false;
                this.companyToEdit = company;
            },
            showPortfolioForm(portfolio, method, companySlug){
                this.companySlug = companySlug;
                this.method = method;
                this.portfolioToEdit = portfolio;
                this.portfolioForm = true;
                this.editForm = false;
//                this.$emit('companyChanged');
            }
        }
    }
</script>
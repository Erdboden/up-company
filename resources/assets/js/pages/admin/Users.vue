<template>
    <div class="container">
        <table id="companies" class="table">
            <thead>
            <tr>
                <th>name</th>
                <th>email</th>
                <th>role</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <user
                    v-for="(user, index) in items"
                    :key="user.id" :data="user"
                    @deleted="remove(index, 1)"
                    @editing="showForm(user)"></user>
        </table>
    </div>
</template>
<script>
    export default{}
</script>
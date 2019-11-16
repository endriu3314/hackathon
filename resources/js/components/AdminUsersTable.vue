<template>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">OAuth Provider</th>
            <th scope="col">Role</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
            <tr v-for="(item, index) in usersData">

                <td><p class="mt-2">{{ item.id }}</p></td>
                <td><p class="mt-2">{{ item.name }}</p></td>
                <td><p class="mt-2">{{ item.email }}</p></td>

                <td><p class="mt-2">{{ item.provider }}</p></td>
                <td><p class="mt-2">
                    <a v-if="userAdmin[index]" class="">Admin</a>
                    <a v-else class="">Membru</a>
                </p></td>

                <td>
                    <div class="row">
                        <div class="col">
                            <a v-if="userAdmin[index]" class="btn btn-secondary" href="#">Membru</a>
                            <a v-else class="btn btn-primary" href="#">Admin</a>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        name: "UserProfile",
        props: ['route', 'userRoleUrl'],
        methods: {
            isAdmin: function(){

            },
        },
        data: () => {
            return {
                usersData: {},
                userAdmin: {}
            }
        },
        mounted() {
            axios.get(`${this.route}`).then((response) => {
                this.usersData = response.data;
            });

            axios.get(`${this.userRoleUrl}`).then((response) => {
                this.userAdmin = response.data;
            })
        },
    }
</script>

<style scoped>
    p,th{
        color:white;
    }
</style>

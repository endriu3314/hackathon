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
            <tr v-for="item in usersData">
            
                <td><div class="mt-2">{{ item.id }}</div></td>
                <td><div class="mt-2">{{ item.name }}</div></td>
                <td><div class="mt-2">{{ item.email }}</div></td>
                <td><div class="mt-2">{{ item.role }}</div></td>
                <td><div class="mt-2">{{ item.provider }}</div></td>
        
                <td>
                    <div class="row">
                        <div class="col">
                            <a v-if=""class="btn btn-primary" href="#">Admin</a>
                            <a class="btn btn-secondary" href="#">Membru</a>
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
        props: ['route'],
        data: () => {
            return {
                usersData: {},
            }
        },
        mounted() {
            axios.get(`${this.route}`).then((response) => {
                this.usersData = response.data;
                
            });
        },
    }
</script>

<style scoped>

</style>

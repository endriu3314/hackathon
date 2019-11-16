<template>
    <div class="card w-100 m-2">
        <div class="card-body">
            <h5 class="card-title text-center font-weight-bold">Istoric Joburi</h5>
            <hr/>

            <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Functie</th>
                <th scope="col">Companie</th>
                <th scope="col">Durata</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in jobsData">
                <td>{{ item.id }}</td>
                <td>{{ item.functie }}</td>
                <td>{{ item.companie }}</td>
                <td>{{ item.start_job + ' ' + item.end_job }}</td>
            </tr>
            </tbody>
        </table>
        </div>
    </div>
</template>

<script>
    export default {
        name: "IstoricJoburi",
        props: ['route', 'user-id'],
        data: () => {
            return {
                jobsData: {}
            }
        },
        mounted() {
            axios.get(`${this.route}`).then((response) => {
                this.jobsData = response.data;
            });
        },
    }
</script>

<style scoped>

</style>

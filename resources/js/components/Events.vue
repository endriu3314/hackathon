<template>
    <table style="background-color: white" class="table table-striped m-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Nume</th>
                <th>Data</th>
                <th>Ora</th>
                <th>optiuni</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="event in eventData">
                    <td>{{ event.id }}</td>
                    <td>{{ event.name }}</td>
                    <td>{{ event.date }}</td>
                    <td>{{ event.time }}</td>
                    <td>
                        <a :href="'/events/' + event.id + '/attendance/1'" class="btn btn-success">Participa</a>
                        <a :href="'/events/' + event.id + '/attendance/0'" class="btn btn-danger">Nu participa</a>
                        <a :href="'/events/' + event.id" class="btn btn-secondary">Event Details</a>
                    </td>
                </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        name: "Events",
        props: ['route', 'attendance-route'],
        data: () => {
            return {
                eventData: {},
                attendanceData: {}
            }
        },
        mounted() {
            axios.get(`${this.route}`).then((response) => {
                this.eventData = response.data;
            });
            axios.get(`${this.attendance-route}`).then((response2) => {
                this.attendanceData = response2.data;
            });
        },
    }
</script>

<style scoped>

</style>

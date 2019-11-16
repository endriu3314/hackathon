<template>
    <div class="card w-100 m-2">
        <div class="card-body">
            <h5 class="card-title text-center font-weight-bold">Adauga Job</h5>
            <hr/>

            <form id="add-job" @submit.prevent="update">
                <div class="form-group">
                    <label class="" for="functie">Functie</label>
                    <input class="form-control" type="text" name="functie" id="functie">
                </div>
                <div class="form-group">
                    <label class="" for="companie">Companie</label>
                    <input class="form-control" type="text" name="companie" id="companie">
                </div>
                <div class="form-group">
                    <label class="data1" for="data1">Data Start</label>
                    <date-pick
                        name="data1"
                        id="data1"
                        v-model="date1"
                        :format="'YYYY.MM.DD'"
                    ></date-pick>
                </div>
                <div class="form-group">
                    <label class="data2" for="data2">Data Stop</label>
                    <date-pick
                        name="data2"
                        id="data2"
                        v-model="date2"
                        :format="'YYYY.MM.DD'"
                    ></date-pick>
                </div>
                <input type="hidden" name="id" id="id" :value="userData.id">
                <input type="hidden" name="_token" :value="csrf">
                <div class="btn btn-primary" v-on:click="insert()"><span>Incarca</span></div>
            </form>

        </div>
    </div>
</template>

<script>
    import DatePick from 'vue-date-pick';
    import 'vue-date-pick/dist/vueDatePick.css';
    import {jobsEventService} from "../app";

    export default {
        name: "AdaugaJob",
        props: ['insertUrl', 'userDataUrl'],
        components: {DatePick},
        methods: {
            insert: function() {
                const  formData = $('#add-job').serializeArray();

                axios.post(`${this.insertUrl}`, {
                    functie: formData[0].value,
                    companie: formData[1].value,
                    data1: this.date1,
                    data2: this.date2,
                    id: formData[2].value,
                }).then((response) => {
                    jobsEventService.$emit('jobInserted', response.data);
                });

                console.log(formData[0]);
                console.log(formData[1]);
                console.log(formData[2]);
                console.log(formData[3]);

                window.location.reload();
            },
        },
        data: () => ({
            userData: {},
            date1: null,
            date2: null,
            csrf: $('meta[name="csrf-token"]').attr('content')
        }),
        mounted() {
            axios.get(`${this.userDataUrl}`).then((response) => {
                this.userData = response.data;
            });
        }
    };

</script>

<style scoped>

</style>

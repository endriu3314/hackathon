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
                    <input class="form-control" type="email" name="companie" id="companie">
                </div>
                <div class="form-group">
                    <div>
                        <date-picker v-model="time1" valueType="format"></date-picker>
                        <date-picker v-model="time2" type="datetime"></date-picker>
                        <date-picker v-model="time3" range></date-picker>
                    </div>
                </div>
                <input type="hidden" name="id" :value="userData.id">
                <input type="hidden" name="_token" :value="csrf">
                <div class="btn btn-primary" v-on:click="update()"><span>Update</span></div>
            </form>

        </div>
    </div>
</template>

<script>
    //import {jobsEventService} from "../app";
    import DatePicker from 'vue2-datepicker';
    import 'vue2-datepicker/index.css';

    export default {
        components: { DatePicker },
        name: "AdaugaJob",
        props: ['insertUrl'],
        methods: {
            update: function () {
                const formData = $('#add-job').serializeArray();

                axios.post(`${this.userUpdateUrl}`, {
                    name: formData[0].value,
                    email: formData[1].value,
                    avatar: formData[2].value,
                    id: formData[3].value,
                }).then((response) => {
                    jobsEventService.$emit('jobInserted', response.data);
                });

                window.location.reload();
            },
        },
        data: () => {
            return {
                userData: {},
                csrf: $('meta[name="csrf-token"]').attr('content')
            }
            return {
                time1: null,
                time2: null,
                time3: null,
            }
        },
        mounted() {
            axios.get(`${this.userDataUrl}`).then((response) => {
                this.userData = response.data;
            });
        },
    }
</script>

<style scoped>

</style>

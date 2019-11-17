<template>
    <div class="card w-100 m-2">
        <div class="card-body">
            <h5 class="card-title text-center font-weight-bold">Edit Profile</h5>
            <hr/>

            <form id="user-edit" @submit="update">
                <div class="form-group">
                    <label class="" for="username">Name</label>
                    <input class="form-control" type="text" name="username" id="username" :value="userData.name">
                </div>
                <div class="form-group">
                    <label class="" for="email">Email</label>
                    <input class="form-control" type="email" name="email" id="email" :value="userData.email">
                </div>
                <div class="form-group">
                    <label class="" for="varsta">Varsta</label>
                    <input class="form-control" type="text" name="varsta" id="varsta" :value="userData.varsta">
                </div>
                <div class="form-group">
                    <label class="" for="nrtel">Nr.Tel</label>
                    <input class="form-control" type="text" name="nrtel" id="nrtel" :value="userData.nrtel">
                </div>
                <div class="form-group">
                    <label class="" for="avatar">Profile image (url)</label>
                    <input class="form-control" type="text" name="avatar" id="avatar"
                           :value="userData.avatar">
                </div>
                <div class="form-group">
                    <label for="domeniu">Domeniu</label>
                    <select class="form-control" name="domeniu" id="domeniu">
                        <option :selected="userData.domeniu == 'IT' ? 'true' : 'false'">IT</option>
                        <option :selected="userData.domeniu == 'Marketing' ? 'true' : 'false'">Marketing</option>
                        <option :selected="userData.domeniu == 'Vanzari' ? 'true' : 'false'">Vanzari</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="" for="facultate">Facultate</label>
                    <input class="form-control" type="text" name="facultate" id="facultate" :value="userData.facultate">
                </div>
                <div class="form-group">
                    <label class="" for="descriere">Descriere</label>
                    <textarea class="form-control" type="text" name="descriere" id="descriere" :value="userData.descriere"></textarea>
                </div>
                <input type="hidden" name="id" :value="userData.id">
                <input type="hidden" name="_token" :value="csrf">
                <span v-on:click="update()" class="btn btn-primary">Update</span>
            </form>

        </div>
    </div>
</template>

<script>
    import {userEventService} from "../app";

    export default {
        name: "UserProfileEdit",
        props: ['userDataUrl', 'userUpdateUrl'],
        methods: {
            update: function () {
                const formData = $('#user-edit').serializeArray();
               
                axios.post(`${this.userUpdateUrl}`, {
                    name: formData[0].value,
                    email: formData[1].value,
                    varsta: formData[2].value,
                    nrtel: formData[3].value,
                    avatar: formData[4].value,
                    domeniu: formData[5].value,
                    facultate: formData[6].value,
                    descriere: formData[7].value,
                    id: formData[8].value,
                    
                }).then((response) => {
                    userEventService.$emit('userUpdated', response.data);
                });

                console.log(formData);

                window.location.reload();
            },
        },
        data: () => {
            return {
                userData: {},
                csrf: $('meta[name="csrf-token"]').attr('content')
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

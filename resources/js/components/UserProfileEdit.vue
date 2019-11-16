<template>
    <div class="card w-100 m-2">
        <div class="card-body">
            <h5 class="card-title text-center font-weight-bold">Edit Profile</h5>
            <hr/>

            <form id="user-edit" @submit.prevent="update">
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
                    <label class="" for="faculta">Faculta</label>
                    <input class="form-control" type="text" name="faculta" id="faculta" :value="userData.faculta">
                </div>
                <div class="form-group">
                    <label class="" for="">Nr.Tel</label>
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Example select</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                        <option selected="selected">{{userData.domeniu}}</div>
                        <option v-for="i in dom"></option>
                        
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="" for="descriere">Descriere</label>
                    <textarea class="form-control" type="text" name="descriere" id="descriere" :value="userData.descriere"></textarea>
                </div>
                <div class="form-group">
                    <label class="" for="avatar">Profile image (url)</label>
                    <input class="form-control" type="text" name="avatar" id="avatar"
                           :value="userData.avatar">
                </div>
                
                <input type="hidden" name="id" :value="userData.id">
                <input type="hidden" name="_token" :value="csrf">
                <div class="btn btn-primary" v-on:click="update()"><span>Update</span></div>
            </form>

        </div>
    </div>
</template>

<script>


    import {userEventService} from "../app";

    var example1 = new Vue({
    el: '#example-1',
    data: {
        dom: [
        { a: 'IT' },
        { a: 'Marketing' },
        { a: 'Vanzari'}
        ]
    }
    })

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
                    descriere: formData[4].value,
                    avatar: formData[5].value,
                    id: formData[6].value,
                    
                }).then((response) => {
                    userEventService.$emit('userUpdated', response.data);
                });

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

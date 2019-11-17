<template>
    <div class="card w-100 m-2">
        <div class="card-body row">
            <div class="col-md-3">
                <img :src="userData.avatar" class="img-fluid" v-if="userData.avatar != null">
            </div>
            <div class="col-md-9">
                <h5 class="card-title text-center">{{ userData.name }}</h5>
                <h6 class="text-center font-weight-bold">{{userData.domeniu}}</h6>
                <hr/>
                <p>{{ userData.descriere}}</p>
                <hr/>
                <a class="lead"><i class="fas fa-glass-cheers"></i> Member since {{userData.created_at}}</a><br/>
                <a class="lead"><i class="mr-2 fas fa-school"></i> {{userData.facultate}}</a><br/>
                <a :href="'mailto:'+userData.email" class="lead"><i class="mr-2 fas fa-envelope"></i> {{userData.email}}</a><br/>
                <a :href="'callto:'+userData.nrtel" class="lead"><i class="mr-2 fas fa-phone-square-alt"></i> {{userData.nrtel}}</a><br/>
            </div>
        </div>
    </div>
</template>

<script>
    import {userEventService} from "../app";

    export default {
        name: "UserProfileSingle",
        props: ['route', 'user-id'],
        data: () => {
            return {
                userData: {}
            }
        },
        mounted() {
            axios.get(`${this.route}`).then((response) => {
                this.userData = response.data;
            });
        },
    }
</script>

<style scoped>

</style>

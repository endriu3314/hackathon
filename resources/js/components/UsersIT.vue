<template>
    <div class="row flex-row flex-wrap">
        <div class="col">
            <div class="row">
                <div class="card m-1">
                    <div class="card-body">
                        <p><strong>Nume:</strong><input type="text" v-model="keyword"></p>

                        <p><strong>Facultate:</strong></p>
                        <div v-for="user in userData">
                            {{user.facultate}} <input type="checkbox" v-model="fac" :value="user.facultate"/>
                        </div>

                        <p><strong>Varsta:</strong><input type="text" v-model="varsta1"><input type="text" v-model="varsta2"></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-10">
            <div class="row">
                <div v-for="(user, index) in computedUserData" :key="index" class="card m-1 w-custom">
                    <div class="card-body custom-body">
                        <img :src="user[1].avatar" class="rounded mx-auto avatar d-block mb-2" v-if="user[1].avatar != null">
                        <h5 class="text-center font-weight-bold">{{user[1].name}}</h5>
                        <hr/>
                        <h6 class="text-center font-weight-bold">{{user[1].domeniu}}</h6>
                        <p class="mb-2 "><i class="mr-2 fas fa-envelope"></i> {{user[1].email}}</p>
                        <p class="mb-2 "><i class="mr-2 fas fa-phone"></i> {{user[1].nrtel}}</p>
                        <p class="mb-2 "><i class="mr-2 fas fa-school"></i> {{user[1].facultate}}</p>
                        <p class="mb-2 "><i class="mr-2 fas fa-building"></i></p>
                        <a class="btn btn-primary w-100" href="">Vezi profil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name: "UsersIT",
        props: ['userDataUrl'],
        computed: {
            computedUserData: function () {
                //return this.userData.filter((item) => {
                return Object.entries(this.userData).filter((item) => {
                    return (this.keyword.length === 0 || item[1].name.includes(this.keyword)) &&
                        (this.fac.length === 0 || this.fac.includes(item[1].facultate))
                        //(this.varsta1.length === 0 || item[1].Array.prototype.filter(varsta => item[1].varsta  > this.varsta1))
                        //(this.dep.length === 0 || item[1].name.includes(this.dep))
                }).sort((a, b) => {
                    return a.toString().localeCompare(b.toString())
                })
            }
        },
        data: () => {
            return {
                userData: {},
                fac: [],
                sortBy: 'name',
                keyword: '',
                varsta1: '',
                varsta2: ''
            }
        },
        mounted() {
            axios.get(`${this.userDataUrl}`).then((response) => {
                this.userData = response.data;
            });
        }
    }
</script>

<style scoped>
    .avatar{
        max-height: 100px;
        border: 3px solid #39679e;
    }

    .custom-body{
        padding: .5rem;
    }

    .w-custom{
        width: 24% !important;
    }
</style>

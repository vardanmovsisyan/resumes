<template>
    <div class="table-wrapper">
        <table class="table table-striped" cellpadding="10px" cellspacing="0">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Verify</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="user in users">
                <td><strong>{{user.username}}</strong></td>
                <td>{{user.email}}</td>
                <td>
                    <button type="button" @click="verifyUser(user.id)" v-bind:class="user.verifiedByAdmin?'green-circle':'red-circle'">
                    </button>
                    <input type="hidden" v-model="user.verifiedByAdmin" name="verified"/>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data: function(){
            return {
                users:[],
                user:{
                    id:'',
                    username:'',
                    email:'',
                    verifiedByAdmin:''
                }
            }
        },
        mounted: function(){
            this.fetchUserList();
        },
        methods: {
            fetchUserList:function(){
                axios.get('api/users')
                    .then((response) => {
                        this.users = response.data;
                    }).catch((error) => {
                    console.log(error);
                });
            },
            verifyUser: function(id) {
                let self=this;
                axios.post('api/user/' + id, {verifiedByAdmin:self.user.verifiedByAdmin})
                    .then(function () {
                        self.fetchUserList();
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        }
    }
</script>

<style>
    .table-wrapper{
        margin-top:50px;
        background-color: #fff;
    }
    .green-circle{
        height: 35px;
        width:35px;
        border-radius: 20px;
        background-color: green;
        cursor:pointer;
        outline: none;
    }
    .red-circle{
        height: 35px;
        width:35px;
        border-radius: 20px;
        background-color: red;
        cursor:pointer;
        outline: none;
    }
</style>
<template>
    <div>
        <table class="table table-striped" cellpadding="10px" cellspacing="0">
            <thead>
            <tr>
                <th>Name</th>
                <th>Verify</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="user in users">
                <td><strong>{{user.username}}</strong></td>
                <td>
                    <input @change="verifyUser(user.id)" value="{{user.verifiedByAdmin}}" type="checkbox" name="verified" class="form-control">
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
                let params = Object.assign({}, self.user);
                axios.post('api/user/' + id, params)
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
<template>
    <div>
        <!--<form action="/signIn" method="POST">
            <label>userName: </label>
            <input name="userName"/>
            <label>password: </label>
            <input name="passWord"/>
            <button type="submit">submit</button>
        </form>-->

        <div class="m-4">
            <div>username</div>
            <input v-model="username" name="username"/>
            <div>password</div>
            <input v-model="password" name="password"/>
        </div>
        <button class="btn btn-primary" @click="submit" @keyup.enter="submit">Sign In</button>
        
    </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
export default {
    data(){
        return{
            username:"",
            password:"",
        }
    },
    computed:{
        ...mapGetters({
        }),
    },
    methods:{
        ...mapActions({
            setUsername: 'setUsername',
            setPassword: "setPassword"
        }),
        submit(){
            /*this.setUsername(this.username);
            this.setPassword(this.password);*/
            axios.post("http://localhost:8000/sign", {"username": this.username, 
            "password": this.password});
        }
    }
}
</script>
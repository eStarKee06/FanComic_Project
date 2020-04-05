<template>
    <div>
        <!--<div>Sign Up</div>
        <form action="/signUp" method="POST">
            @csrf
            <label>email: </label>
            <input name="email"/>
            <label>userName: </label>
            <input name="username"/>
            <label>password: </label>
            <input name="password"/>
            <button type="submit">submit</button>
        </form>-->
        <div class="m-4">
            <div>email</div>
            <input name="email" v-model="email"/>
            <div>username</div>
            <input name="username" v-model="username"/>
            <div>password</div>
            <input name="password" v-model="password"/>
        </div>
        <button class="btn btn-primary" @click="submit" @keyup.enter="submit"> Sign Up</button>
    </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
export default {
    data(){
        return{
            username:"",
            password:"",
            email:"",
        }
    },
    methods:{
        ...mapActions({
            setUsername: 'setUsername',
            setPassword: "setPassword",
            setEmail: "setEmail"
        }),
        submit(){
            /*this.setPassword(this.password);
            this.username(this.username);
            this.email(this.email);*/
            axios.post("/signUp", {"username": this.username, 
            "password": this.password, "email": this.email});
        }
    } 
}
</script>>
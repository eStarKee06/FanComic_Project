<template>
    <div>
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
            signUpPost: "signUpPost"
        }),
        submit(){
            axios.post("/signUp", {"username": this.username, 
            "password": this.password, "email": this.email}).then((response) =>{
                //window.location = response.data.redirect;
            });
        }
    } 
}
</script>>
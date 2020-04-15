<template>
    <div>
        <div class="m-4">
            <div>username</div>
            <input v-model="username"/>
            <div>password</div>
            <input v-model="password"/>
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
            signInPost: "signInPost"
        }),
        submit(){
            console.log(this.username);
            console.log(this.password);
            axios.post("/signIn", {"username": this.username, 
            "password": this.password}).then((response) => {
                //window.location = response.data.redirect;
            })
        }
    }
}
</script>
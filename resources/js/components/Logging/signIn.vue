<template>
    <div class="container">
        <div class="buffer"></div>
        <div class="signInWindow m-4 d-flex justify-content-center">
            <div class="mainCard card w-50">
                <div class="label card-header">
                    Sign In
                </div>
                <div class="signInBody card-body p-4">
                    <div>
                        <div class="label pt-0 pb-2 px-2">username</div>
                        <input v-model="username"/>
                        
                        <div class="label p-2">password</div>
                        <input type="password" v-model="password"/><br/>
                        <button class="submitButton btn btn-primary mt-4 px-3" @click="submit" @keyup.enter="submit">Sign In</button>
                    </div>
                    <div v-if="signInError" class="signInErrorBody p-5">
                        <div class="closeIconContainer d-flex justify-content-end pt-1 pr-2">
                            <button type="button" class="close" aria-label="Close" @click="signInError = false">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="buffer"></div>
                        <div>{{errorMsg}}</div>
                    </div>
                </div>

                

            </div>
        </div>
    </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
export default {
    data(){
        return{
            username:"",
            password:"",
            signInError: false,
            errorMsg: ""
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
            if(this.username == "" || this.password == ""){
                this.signInError=true;
                this.errorMsg = "Please provide both username and password"
                return;
            }
            axios.post("/signIn", {"username": this.username, 
            "password": this.password}).then((response) => {
                if(response.data == "AUTH_ERR"){
                    this.signInError = true;
                    this.errorMsg = "The given username and password do not match our records";
                }
                else if(response.data == "AUTH_ERR_VER"){
                    this.signInError = true;
                    this.errorMsg = "Account is not yet verified. Please check your email and verify your account.";
                }
                else{
                    window.location = "profile";                }
            })
        },
        submitChecks(){
            if(this.username == "" || this.password == ""){
                this.signInError=true;
                this.errorMsg = "Please provide both username and password"
                return false;
            }
            else{ // incorrect authorization; account not yet confirmed 

            }
        }
    }
}
</script>
<style lang="scss" scoped>
@import "./../../../sass/theme.scss";

    .container{
        text-align: center;
    }
    .buffer{
        height:20%;
        width: 100%;
        
    }
    .mainCard{
        text-align: center;
    }
    .mainCard .card-header{
        background-color: $black;
        color: $white;
    }
    .signInBody .signInErrorBody{
        
        text-align: center;
        width: 100%;
    }
    .mainCard .label{
        font-weight: bold;
    }
    .signInErrorBody{
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        
        width: 100%;
        background-color: rgba($black, 0.9);
        
        font-weight: bold;
        color: $white;
    }
    .close {
        color: $white; 
        opacity: 1;
    }
    .close:hover{
        color:$theme-highlight;
    }
    .closeIconContainer{
        
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        
    }
    .signInBody .submitButton{
        background-color: $black;
        border:none;
        border-radius:1rem;
        font-weight: bold;
        color: $white;
        opacity: 1;
    }
    .buffer{
        height:30%;
    }
    .signInBody{
        background-color: rgba($theme-highlight, 0.3);
    }
</style>
<template>
    <div class="container">
        <div class="buffer"></div>
        <div class="signInWindow m-4 d-flex justify-content-center">
            <div class="mainCard card w-50">
                <div class="label card-header">
                    Sign Up
                </div>
                <div v-if="!newAcctSuccess" class="signInBody card-body p-4">
                    <div>
                        <div class="label pt-0 pb-2 px-2">email</div>
                        <input name="email" v-model="email"/>
                        <div class="label p-2">username</div>
                        <input name="username" v-model="username"/>
                        <div class="label p-2">password</div>
                        <input type="password" name="password" v-model="password"/> <br/>
                        <div class="label p-2">re-type password</div>
                        <input type="password" name="password" v-model="copyPassword"/> <br/>
                        <button class="submitButton btn btn-primary mt-4 px-3" @click="submit" @keyup.enter="submit">Sign Up</button>                
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

                <div v-if="newAcctSuccess" class="signInBody card w-100">
                    <div class="buffer2"></div>
                    <div class="label">Please check your email and verify your account.</div>
                    <div class="buffer2"></div>
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
            email:"",
            copyPassword:"",
            signInError: false,
            errorMsg: "",
            newAcctSuccess: false
        }
    },
    methods:{
        ...mapActions({
            signUpPost: "signUpPost"
        }),
        submit(){
            if(this.username == "" || this.password == "" || this.email == "" || this.copyPassword == ""){
                this.signInError = true;
                this.errorMsg = "Please fill out all the information needed to complete the application process";
                return;
            }
            if(this.password != this.copyPassword){
                this.signInError = true;
                this.errorMsg = "The passwords written do not match, please double check your password";
                return;
            }
            axios.post("/signUp", {"username": this.username, 
            "password": this.password, "email": this.email}).then((response) =>{
                if(response.data == "AUTH_ERR_NOT_UNIQUE"){
                    this.signInError = true;
                    this.errorMsg = "There is already an account with the same email and/or username. Please try again";  
                }
                else if(response.data == "SUCCESS"){
                    this.newAcctSuccess = true;
                    console.log(this.newAcctSuccess);
                }
            });
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
        height:20%;
    }
    .signInBody{
        background-color: rgba($theme-highlight, 0.3);
    }
    .buffer2{
        height:120px;
    }
</style>
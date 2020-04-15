<template>
    <div>
        <div id="signIn-Up-tab">
            <ul class="list-group list-group-horizontal">
                <li class="list-group-item" @click="signInUpActiveItem = 0">Sign In</li>
                <li class="list-group-item" @click="signInUpActiveItem = 1">Sign Up</li>
            </ul>
            <div class="card" id="signIn-Up-tab2">
                <signIn v-show="signInUpActiveItem == 0"></signIn>
                <signUp v-show="signInUpActiveItem == 1"></signUp>
            </div>
        </div>
    </div>
</template>

<script>
import signIn from "./signIn.vue"
import signUp from "./signUp.vue"
export default {
    components:{
        signIn,
        signUp
    },
    data(){
        return{
            signInUpActiveItem: 0
        };
    }
}
</script>

<style>
    #signIn-Up-tab{
    }
    #signIn-Up-tab2{
        text-align: center;
    }
</style>
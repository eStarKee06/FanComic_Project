<template>
    <div id="background">
        <router-view></router-view>   
        
        <div id="top-navigator">
            <ul class="p-2 list-group list-group-horizontal">
                <a href="/explore"><div class="px-4 py-2" ><h6>Home</h6></div></a>     
                <a href="/explore"><div class="px-4 py-2" ><h6>Explore</h6></div></a>
                <a href="/signOut"><div class="px-4 py-2"><h6>signOut</h6></div></a>
                
                <a href="/profile" @mouseover="openMenu = true" @mouseout="openMenu = false">
                    <div class="px-4 py-2"><h6>Profile</h6></div>
                </a>
            </ul>
        </div>
 
            <ul class="profile-menu list-group" v-if="0" @mouseover="openMenu = true" @mouseout="openMenu = false">
                <li class="list-group-item px-5 py-3" @click="goToSignIn()">
                    Sign in
                </li>
                <li class="list-group-item px-5 py-3" @click="activeItem = 1">
                    Sign up
                </li>
                <li class="list-group-item px-5 py-3" @click="activeItem = 0">
                    Profile
                </li>
                <li class="list-group-item px-5 py-3" @click="activeItem = 1">
                    Sign out
                </li>
            </ul>
    </div>
</template>

<script>
export default {
    data(){
        return{
            openMenu: false,
        }
    },
    methods:{
        goToSignIn(){
            window.location.href = '/signIn';
        },
        goToSignUp(){
            window.location.href = '/signUp';
        },
        goToProfile(){
            window.location.href = '/profile';
        },
    }
}
</script>

<style lang="scss">
@import "./../../sass/theme.scss";
        #top-navigator{
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height:50px;
            border-bottom: 2px solid rgba($gray, 0.5);
            background-color: $white;
        }
        #top-navigator ul{
            float: right;
        }
        .profile-menu{
            position: absolute;
            top: 50px;
            right:0;
            width: 200px;
            height: 100px;
            text-align:center;
        }
</style>
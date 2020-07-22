<template>
    <div class="container">
        <!--<logging v-if="!sessionExists"></logging>-->
        <div class="mt-5"> 
            <!--<button @click="workViewActive = !workViewActive"> create new work/ view works </button>
            <div v-if="workViewActive == 0"></div>
            <createWork v-if="workViewActive == 1"></createWork>-->
            <div class="row p-5" id="main">
                <div class="col-3 h-100 p-0">
                    <div id="profileCard">
                        <profile></profile>
                    </div>

                </div>
                <div class="col-9 h-100 p-0">
                    <div class="profile-content card" id="content">
                        <!--<createWork v-if="activeItem == 1"></createWork>-->
                        <!--<workList v-if="activeItem == 0"></workList>-->
                        <workDisplay v-if="activeItem == 0"></workDisplay>
                    </div>
                    <ul class="list d-flex justify-content-between p-0" id="choice">
                        <li class="list-group-item m-0" :class="{'activeI' : activeItem == 0}" @click="activeItem = 0">My Works</li>
                        <li class="list-group-item m-0" :class="{'activeI' : activeItem == 1}" @click="activeItem = 1">My Stats</li>
                        <li class="list-group-item m-0" :class="{'activeI' : activeItem == 2}" @click="activeItem = 2">My Account</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
//import logging from "./logging.vue"
import createWork from "./createWork.vue"
import profile from "./Profile.vue"
import workDisplay from "./workDisplay/index.vue"
//import workList from "./workList.vue"
export default {
    components:{
        //logging,
        createWork,
        profile,
        workDisplay,
        //workList
    },
    data(){
        return{
            sessionExists: false,
            activeItem: 0
        }
    },
    mounted(){
        axios.get("/sessionExists").then((response) => {
            this.sessionExists = response.data;
         console.log(response.data)});
    }
}
</script>

<style lang="scss" module>
@import "./../../../sass/theme.scss";
    #main{
        width: 100%;
        height: 700px;
    }
    #profileCard{
        width: 90%;
        height: 60%;
    }
    #content{
        width: 100%;
        height: 100%;
    }
    .profile-content{
        height: 900px;
    }
    .list-group-item{
        position: absolute;
        bottom: 0;
        left: 0;
        width: 33.333333%;
        text-align: center;
        font-weight: bolder;
        
        z-index:1000;
        border: 1px solid black;
    }
    .list{
        width: 100%;
    }
    .list .activeI{
        background-color: $gray;
        z-index:100000;
        color: $white;
    }
    

</style>
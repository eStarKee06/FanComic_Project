<template>
    <div class="container">
        <logging v-if="!sessionExists"></logging>
        <div v-else> 
            <!--<button @click="workViewActive = !workViewActive"> create new work/ view works </button>
            <div v-if="workViewActive == 0"></div>
            <createWork v-if="workViewActive == 1"></createWork>-->
            <div class="row p-5" id="main">
                <div class="col-3 h-100 p-0">
                    <div class="card mx-2 mt-2 mb-5" id="profileCard">
                        <profile></profile>
                    </div>
                    <ul class="list-group mt-1" id="choice">
                        <li class="list-group-item pointer" @click="activeItem = 0">My Work List</li>
                        <li class="list-group-item pointer" @click="activeItem = 1">Create New Work</li>
                        <li class="list-group-item pointer" @click="activeItem = 2">Something else</li>
                    </ul>
                </div>
                <div class="col-9 h-100 p-0">
                    <div class="card" id="content">
                        <createWork v-if="activeItem == 1"></createWork>
                        <!--<workList v-if="activeItem == 0"></workList>-->
                        <workDisplay></workDisplay>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
import logging from "./logging.vue"
import createWork from "./createWork.vue"
import profile from "./Profile.vue"
import workDisplay from "./workDisplay/index.vue"
//import workList from "./workList.vue"
export default {
    components:{
        logging,
        createWork,
        profile,
        workDisplay
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

<style module>
    #main{
        width: 100%;
        height: 80%;
    }
    #profileCard{
        width: 90%;
        height: 60%;
    }
    #content{
        width: 100%;
        height: 100%;
    }
</style>
<template>
    <div>
        <logging v-if="!sessionExists"></logging>
        <div v-else> 
            <button @click="workViewActive = !workViewActive"> create new work/ view works </button>
            <div v-if="workViewActive == 0"></div>
            <createWork v-if="workViewActive == 1"></createWork>
        </div>
    </div>
</template>

<script>
import logging from "./logging.vue"
import createWork from "./createWork.vue"
export default {
    components:{
        logging,
        createWork
    },
    data(){
        return{
            sessionExists: false,
            workViewActive: 0
        }
    },
    mounted(){
        axios.get("/sessionExists").then((response) => {
            this.sessionExists = response.data;
         console.log(response.data)});
    }
}
</script>

<style>
</style>
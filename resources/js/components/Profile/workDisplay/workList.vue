<template>
    <div>
        <div class="row">
            <div class="col-4"> Title</div>
            <div class="col-4"> Genre</div>
            <div class="col-4"> Description</div>
        </div>
        <div v-if="workList != null">
            <div class="row" v-for="(work, idx) in workList" :key="idx" @click="clickWorkListing(idx)">
                <div class="col-4"> {{work.title}}</div>
                <img :src="work.cover_image"/>
            </div>
        </div>
    </div>
</template>

<script>

import { mapActions, mapGetters } from "vuex";
export default {
    components:{
    
    },
    data(){
        return{
            workList: null
        }
    },
    mounted(){
        /*axios.get("profile/"+ this.$router.currentRoute.params.id +"/works").then((response)=>{
            this.workList = response.data;
            console.log(response.data);
        });*/
        
        //this is hardcoded, change it later
        axios.get("profile/1/works").then((response)=>{
            this.workList = response.data;
        });
        
    },
    computed:{
        ...mapGetters({
            getEditProcessState: "getEditProcessState",
            getWorkSelected: "getWorkSelected"
        })
    },
    methods:{
        ...mapActions({
            setEditProcessState: "setEditProcessState",
            setWorkSelected: "setWorkSelected"
        }),
        clickWorkListing(index){
            this.setEditProcessState(1);
            this.setWorkSelected(this.workList[index]);
        }
    }
}
</script>

<style>
</style>
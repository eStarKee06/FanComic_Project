<template>
    <div>
        <!--<div class="row">
            <div class="col-4"> Title</div>
            <div class="col-4"> Genre</div>
            <div class="col-4"> Description</div>
        </div>
        <div v-if="workList != null">
            <div class="row" v-for="(work, idx) in workList" :key="idx" @click="clickWorkListing(idx)">
                <div class="col-4"> {{work.title}}</div>
                <img :src="work.cover_image"/>
            </div>
        </div>-->

        <div class="searchBG d-flex justify-content-end p-2 pr-3">
                <input class="ml-3" placeholder="search my works"/>
        </div>
        <div class="workListingContainer card">
        
            <div class="workListingSurround addWork d-flex justify-content-around pt-2 pb-3 px-3 mt-4 ml-5"
                @click="createWork()">
                    <h1 class="p-5">ADD WORK</h1>
            </div> 
            <!--<div class="workListingSurround d-flex justify-content-around pt-2 pb-3 px-3 mt-4 ml-5">
                <workListingSmall class="" :work="dummyWork" :author="dummyAuthor" :rating="dummyRating" 
                :colorProp="colors[Math.floor(Math.random() * colors.length)]"
                :styleType="0"></workListingSmall>

                <div class="workListingOptions pt-4">
                    <button class="btnOption mb-3 positive">Edit</button>
                    <br/>
                    <button class="btnOption negative">Delete</button>
                </div>
            </div>--> 
            <div class="workListingSurround d-flex justify-content-around pt-2 pb-3 px-3 mt-4 ml-5" 
                :v-if="workList != null" v-for="(work,i) in workList" :key="i">
                <workListingSmall class="" :work="work" :author="dummyAuthor" :rating="work.rating" 
                :colorProp="colors[Math.floor(Math.random() * colors.length)]"
                :styleType="0"></workListingSmall>

                <div class="workListingOptions pt-4">
                    <button class="btnOption mb-3 positive" @click="editWork(i)">Edit</button>
                    <br/>
                    <button class="btnOption negative">Delete</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import { mapActions, mapGetters } from "vuex";
import workListingSmall from "./../../ComponentTest/workListingSmall.vue"
export default {
    components:{
        workListingSmall
    },
    data(){
        return{
            workList: [],

                                    dummyWork:
                {
                    title: "test Title",
                    description: "test description jkahdfjkahsfdjkhdsaasjdfhjksadhfjksahdfjksahdfjkhsadfhjdsahfjksadhfjkhsadf",
                    cover_image: "http://localhost:8000/storage/public/1/test/Znu0wqX8gjUxw4LSEqXKaiqi7TE1WbPglTVU6AYV.png"
                },
            dummyAuthor: "testAuthorAuthor",
            dummyRating: "general",
            dummyRating2: "teen",
            dummyRating3: "mature",
            colors:["#3ade65", "#ff7e42", "#fd6bff", "#de455c", "#70ffc1"]
        }
    },
    mounted(){
        axios.get("showWorkOfUser").then((response)=>{
            this.workList = response.data;
            console.log(response.data);
        });
        
        //this is hardcoded, change it later
        /*axios.get("profile/1/works").then((response)=>{
            this.workList = response.data;
        });*/
        
    },
    /*computed:{
        ...mapGetters({
            getEditProcessState: "getEditProcessState",
            getWorkSelected: "getWorkSelected"
        })
    },*/
    methods:{
        /*...mapActions({
            setEditProcessState: "setEditProcessState",
            setWorkSelected: "setWorkSelected"
        }),
        clickWorkListing(index){
            this.setEditProcessState(1);
            this.setWorkSelected(this.workList[index]);
        },*/
        createWork(){
         window.location = "/newWork";
        },
        editWork(index){
            window.location = "/works/"+ this.workList[index].id +"/edit";
        }
    }
}
</script>

<style lang="scss" scoped>
@import "./../../../../sass/theme.scss";
    .workListingContainer{
        width: 100%;
       // height: 602px;
        top: 50px;
        height: 552px;
        overflow-y: auto;
        overflow-x: hidden;
        //background: rgba($black,0.8);
    }
    .workListingSurround{
        width:90%;
        background: rgba($black,0.8);
        border-radius: 2rem;
    }
    .workListingSurround:hover{
        animation: expand 1s;
        transform: scale(1.05);
    }
    @keyframes expand {
        from {
            transform: scale(1);
        }
        to {
            transform: scale(1.05);
        }
    }
    .workListingOptions{
        text-align: center;
    }
    .btnOption{
        width: 100px;
        height: 50px;
        border-radius: 1rem;
        font-weight: bold;
        border: none;
        color: $white;
    }
    .positive{
        background-color: $positive;
    }
    .negative{
        background-color: $negative;
    }
    .addWork{
        border: 5px dashed $white;
    }
    .addWork h1{
        color: $white;
        font-weight: bold;
    }
    .searchBG{
        position: fixed;
        float:right;
        width: 758px;
        height:50px;
        background: rgba($black,0.5);
        z-index: 100000;
    }
</style>
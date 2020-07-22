<template>
    <div class="d-flex justify-content-center p-3">
        <div class="carousel-container mt-3" @mouseover="stopAutoPlay = true" @mouseleave="stopAutoPlay = false">
            <div class="up-nav" @click="goUpPage()"></div>
            <div class="down-nav" @click="goDownPage()"></div>
            <div class="side-nav">
                <div class="pg0-nav" :class="{'activePage-nav' : page == 0}" @click="page = 0"></div>
                <div class="pg1-nav" :class="{'activePage-nav' : page == 1}" @click="page = 1"></div>
                <div class="pg2-nav" :class="{'activePage-nav' : page == 2}" @click="page = 2"></div>
            </div>

            <div class=carousel-content>
                <work-listing-dummy class="Page0" v-if="page == 0"/>
                <work-listing-dummy class="Page1" v-if="page == 1" transition="fade"/>
                <work-listing-dummy class="Page2" v-if="page == 2" transition="fade"/>
            </div>
        </div>
    </div>
</template>

<script>
import workListingDummy from "./../../ComponentTest/homeWorkDummy.vue" 
export default {
    components:{
        workListingDummy
    },
    data(){
        return{
            page: 0,
            slide: false,
            stopAutoPlay: false,
            transitionDirection: "DOWN"
        }
    },
    mounted(){   
        this.intializeAutoPlay();
    },
    watch:{
        stopAutoPlay: function(){
            this.intializeAutoPlay();
        },
        slide: function(){
            if(!this.stopAutoPlay){
                this.intializeAutoPlay();
            }
        }
    },
    methods:{
        intializeAutoPlay(){       
            if(!this.slide){
                setTimeout(()=>{
                this.slide = true}, 2000);
            }
            else{
                this.goDownPage();     
                    setTimeout(()=>{
                    this.slide = false}, 2000);
            }
        },
        goUpPage(){
            this.page = (3 + ((this.page - 1) % 3)) % 3;
            this.transitionDirection= "UP";
        },
        goDownPage(){
            this.page = (this.page + 1) % 3;
            this.transitionDirection= "DOWN";
        }
    }
}
</script>

<style lang="scss" scoped>
@import "./../../../../sass/theme.scss";
    .carousel-container{
        position:absolute;
        width: 1000px;
        height: 400px;
        background-color:rgba($black, 0.7);
        
        //background-image: linear-gradient(to left, rgba($black, 0), rgba($black, 0.4), rgba($black, 0.7), rgba($black, 1));
    }

    .up-nav{
        position:absolute;
        top:0;
        left: 200px;
        width: 800px;
        height: 30px;
    }
    .up-nav:hover{
        background-color: $theme-highlight;
        
        //background-image: linear-gradient(to left, rgba($theme-highlight, 0), rgba($theme-highlight, 0.2), rgba($theme-highlight, 0.7));
        opacity: 0.5;
    }
    .down-nav{
        position:absolute;
        left:200px;
        bottom: 0;
        width: 800px;
        height: 30px;
    }
    .down-nav:hover{
        
        background-color: $theme-highlight;
        //background-image: linear-gradient(to left, rgba($theme-highlight, 0), rgba($theme-highlight, 0.2), rgba($theme-highlight, 0.7));
        opacity: 0.5;
    }
    .side-nav{
        position:absolute;
        left:0px;
        top: 0;
        width: 200px;
        height: 400px;
    }
    .carousel-content{
        position:absolute;
        left:200px;
        top: 50px;
        
        width: 800px;
        height: 300px;
        overflow: hidden;
        
    }
    .pg0-nav{
        position: absolute;
        left:0;
        top: 0;
        width:200px;
        height: 133.33px;

        opacity: 1;
        background-color: rgba($white, 1);
    }
    .pg1-nav{
        position: absolute;
        left:0;
        top: 133.33;
        width:200px;
        height: 133.33px;

        
        background-color: green;
    }
    .pg2-nav{
        position: absolute;
        left:0;
        top: 266.66;
        width:200px;
        height: 133.33px;

        
        background-color:blue;
    }
    .activePage-nav{
        border: 5px solid $theme-highlight; 
    }
    /*.fade-enter-active, .fade-leave-active {
        transition: opacity 1s;
    }
    .fade-enter, .fade-leave-to {
        opacity: 0;
    }*/

    /* for testing*/
    /*.page0{
        background-color: red;
    }
    .page1{
        background-color: green;
    }
    .page2{
    }*/
</style>
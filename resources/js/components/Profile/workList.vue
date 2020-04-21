<template>
    <div>
        <div class="row">
            <div class="col-4"> Title</div>
            <div class="col-4"> Genre</div>
            <div class="col-4"> Description</div>
        </div>
        <div v-if="workList != null">
            <div class="row" v-for="(work, i) in workList" :key="i">
                <div class="col-4"> {{work.title}}</div>
                <div v-for="(genre, i) in work.genres" :key="i">
                    {{genre}}
                </div>
                <div class="col-4"> {{work.description}}</div>
            </div>
        </div>
    </div>
</template>

<script>
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
        
    }
}
</script>

<style>
</style>
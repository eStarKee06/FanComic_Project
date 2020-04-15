<template>
    <div>
        <div class="row">
            <div class="col-4"> Title</div>
            <div class="col-4"> Genre</div>
            <div class="col-4"> Description</div>
        </div>
        <div class="row" v-for="(work, i) in workList" :key="i">
            <div class="col-4"> {{work.title}}</div>
            <div class="col-4"> {{work.genre}}</div>
            <div class="col-4"> {{work.description}}</div>
        </div>
        <button @click="editWork">Edit</button>
    </div>
</template>

<script>
export default {
    components:{
    
    },
    data(){
        workList: null
    },
    mounted(){
        axios.get("profile/"+ this.$router.currentRoute.params.id +"/works").then((response)=>{
            this.workList = response.data;
        });
    }
}
</script>

<style>
</style>
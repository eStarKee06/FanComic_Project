<template>
    <div>
        <h1>Explore</h1>
        <div class="row">
            <div class="col-4"> Title</div>
            <div class="col-4"> Genre</div>
            <div class="col-4"> Description</div>
        </div>
        <div class="row" v-for="(work, i) in allWorks" :key="i" @click="viewWork(work.id)">
            <div class="col-4"> {{work.title}}</div>
            <div class="col-4"> {{work.genre}}</div>
            <div class="col-4"> {{work.description}}</div>
        </div>
    </div>
</template>

<script>
export default{
    prop:['id'],
    data(){
        return{
            allWorks: null
        };
    },
    mounted(){
        console.log(this.id);
        axios.get("/works").then((res) => {this.allWorks = res.data});
    },
    methods:{
        viewWork(id){
            window.location = "/explore/" + id;
        }
    }
}
</script>

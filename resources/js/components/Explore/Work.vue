<template>
    <div>
        <h1>Explore</h1>
        <div v-if="work != null">
            Title : {{work.title}} <br/>
            Description: {{work.description}} <br/>
            Genre: {{work.genre}}
        </div>
        <button @click="editWork">Edit</button>
    </div>
</template>

<script>
export default{
    prop:["id"],
    data(){
        let id = this.$router.currentRoute.params.id;
        return{
            work: null
        };
    },
    mounted(){
        axios.get("/works/" + this.$router.currentRoute.params.id).then((response) =>{
            this.work = response.data[0];
        })
    },
    methods:{
        editWork(){ //this function will be moved to the profile tab at the end
            window.location = "/explore/" + this.$router.currentRoute.params.id + "/edit"; 
        }
    }
}
</script>

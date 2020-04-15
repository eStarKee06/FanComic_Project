<template>
    <div>
        Title: <input v-model="newTitle" name="title"/> <br/>
        Description: <input v-model="newDescription" name="description"/> <br/>
        genre: <input v-model="newGenre" name="genre"/> <br/>
        <button @click="saveEdit"> save</button>
    </div>
</template>

<script>
export default{
    data(){
        return{
            newTitle: "",
            newDescription: "",
            newGenre: "",
            workId: null
        }
    },
    mounted(){
         this.workId = this.$router.currentRoute.params.id;
    },
    methods:{
        saveEdit(){
            console.log(this.newTitle);
            axios.post("/edit-work/" + this.workId, {"title": this.newTitle,
            "description": this.newDescription,"genre":this.newGenre});
        }
    }

}
</script>

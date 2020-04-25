<template>
    <div>
        <div v-if="chapterList != null">
            Chapter List <br/>
            <div v-for="(chapter, i) in chapterList" :key="i"
                @click="addPages(i)">
                {{chapter.chapter_title}}
            </div>
        </div>
        

        <button @click="showForm = 1"> add chapter</button>
        <div v-if="showForm">
            chapter: {{getWorkSelected.num_of_chapters + 1}}
            title: <br/>
            <input v-model="chapterTitle"/>
            <button @click="makeNewChapter()">submit</button>
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
            chapterList: null,
            showForm: false,
            chapterTitle: ""
        }
    },
    mounted(){
        /*axios.get("profile/"+ this.$router.currentRoute.params.id +"/works").then((response)=>{
            this.workList = response.data;
            console.log(response.data);
        });*/
        
        //this is hardcoded, change it later
        axios.get("works/" + this.getWorkSelected.id +"/chapters").then((response)=>{
            this.chapterList = response.data;
            console.log(this.chapterList);
        });
        
    },
    computed:{
        ...mapGetters({
            getEditProcessState: "getEditProcessState",
            getWorkSelected: "getWorkSelected",
            getChapterSelected: "getChapterSelected"
        })
    },
    methods:{
        ...mapActions({
            setEditProcessState: "setEditProcessState",
            setWorkSelected: "setWorkSelected",
            setChapterSelected: "setChapterSelected"
        }),
        makeNewChapter(){
            console.log(this.getWorkSelected);
            axios.post("/add_chapter", {"workId": this.getWorkSelected.id, "chapterTitle": this.chapterTitle});
        },
        addPages(index){
            this.setChapterSelected(this.chapterList[index]);
            this.setEditProcessState(2);
        }
    }
}
</script>

<style>
</style>
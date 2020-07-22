<template>
    <div>
        <input type="file" ref="pageImage" @change="handlePageImage()"/>
        <button @click="createPage()">add</button>
    </div>
</template>
<script>

import { mapActions, mapGetters } from "vuex";
export default {
    data(){
        return{
            pageImage: null
        };
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
        handlePageImage(){
            this.pageImage = this.$refs.pageImage.files[0];
        },
        createPage(){
            let formData = new FormData();
            formData.append('pageImage', this.pageImage);
            formData.append('chaptersId', this.getChapterSelected.id);
            
            axios.post("/create-page", formData, {headers: {'Content-Type': 'multipart/form-data'}});
        }
    }
}
</script>>
<template>
    <div>
        <workList v-if="getEditProcessState == 0"></workList>
        <chapterList v-if="getEditProcessState == 1"></chapterList>
        <editPage v-if="getEditProcessState == 2"></editPage>
    </div>
</template>
<script>
import workList from "./workList.vue"
import chapterList from "./chapterList.vue"
import editPage from "./editPage.vue"
//import pageList from "./pageList.vue"

import { mapActions, mapGetters } from "vuex";
export default {
    components:{
        workList,
        chapterList,
        editPage
    },
    data(){
        return{
            stage: 0
        }
    },
    computed:{
        ...mapGetters({
            getEditProcessState: "getEditProcessState"
        })
    },
    methods:{
        ...mapActions({
            setEditProcessState: "setEditProcessState"
        }),
    }
}
</script>>
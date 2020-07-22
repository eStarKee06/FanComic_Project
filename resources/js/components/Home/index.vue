<template>
    <div>
        <homeStarter></homeStarter>
        <div class="second-background pt-5">
            <genreDescription/>
            <div class="rating-description-bg my-5">

            </div>
        </div>
    </div>
</template>

<script>
import homeStarter from "./homeStarter/index.vue"


import genreDescription from "./genreDescription/index.vue"
export default {
    components:{
        homeStarter,
        genreDescription
    },
    data(){
        return{
            signInUpActiveItem: 0
        };
    }
}
</script>

<style lang="scss" scoped>
@import "./../../../sass/theme.scss";
    .second-background{
        position: absolute;
        top: 600px;
        width: 100%;
        height: 1000px;
        background-color: $white;
    }
    .rating-description-bg{
        position: absolute;
        height: 300px;
        width: 100%;
        background-color: $theme-highlight;
    }
</style>
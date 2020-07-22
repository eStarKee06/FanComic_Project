<template>
    <div>
        <div class="pillContainer d-flex justify-content-center p-2">
            {{genreTitle.toUpperCase()}}
        </div>
    </div>
</template>

<script>
import sassColors from "./../../../sass/theme.scss";
export default {
    props:{
        //these props are
        genreTitle:{},
        hover: false
    },
    data(){
        return{
        };
    },
    methods:{
        checkGenre(){
            switch(this.genreTitle){
            }
        }
    }
}
</script>

<style lang="scss" scoped>
@import "./../../../sass/theme.scss";
    .pillContainer{
        width: 150px;
        height: 40px;
        border-radius: 3rem;

        color: $black;
        background-color: white;
        box-shadow: 0 0 3px 1px $gray; 
        font-weight: bolder;
    }

    .pillContainer:hover{
        background-color: $theme-highlight;
        color: $white;
    }
</style>
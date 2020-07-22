<template>
    <div>
        <div @click="addGenre()" :class="{'activeGenre' : getGenreList.includes(genreTitle)}" class="pillContainer d-flex justify-content-center p-2">
            {{genreTitle.toUpperCase()}}
        </div>
    </div>
</template>

<script>
    
import { mapActions, mapGetters } from "vuex";
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
    computed:{
        ...mapGetters({
            getGenreList: "getGenreList",
            getRating: "getRating",
            getColor: "getColor"
        })
    },
    methods:{
        ...mapActions({
            setGenreList: "setGenreList", 
            setRating: "setRating",
            setColor: "setColor", 
        }),
        checkGenre(){ //later
            switch(this.genreTitle){
            }
        },
        addGenre(genre){ //put in store later
            this.setGenreList(this.genreTitle);
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

        color: rgba($gray,0.3);
        background-color: $white;
        box-shadow: 0 0 3px 1px $gray; 
        font-weight: bolder;
    }
    .activeGenre{
        color: $white;
        background-color: $gray; 
    }
</style>
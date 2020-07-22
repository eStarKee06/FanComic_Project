<template>
    <div>
        <div @click="addGenre(genreTitle)" :class="{'activeGenre' : genreList.includes(genreTitle)}" class="pillContainer d-flex justify-content-center p-2">
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
        genreList:{}
    },
    data(){
        return{
        };
    },
    computed:{
    },
    methods:{
        checkGenre(){ //later
            switch(this.genreTitle){
            }
        },
        addGenre(genre){ //put in store later
            if(!this.genreList.includes(genre)){
                this.genreList.push(genre);
            }else{
                const index = this.genreList.indexOf(genre);
                if (index > -1) {
                    this.genreList.splice(index, 1);
                }
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
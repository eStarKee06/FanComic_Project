<template>
    <div class="container">
        <div class="row">
            <div class="genre-list card col-4 m-5">
                <div class="d-flex justify-content-around py-3">
                    <genrePill class="p-0" :genreTitle="'romance'"/>
                    <genrePill class="p-0" :genreTitle="'drama'"/>
                </div>
                
                <div class="d-flex justify-content-around py-3">
                    <genrePill class="p-0" :genreTitle="'action'"/>
                    <genrePill class="" :genreTitle="'horror'"/>
                </div>
                
                <div class="d-flex justify-content-around py-3">
                    <genrePill class="" :genreTitle="'comedy'"/>
                    <genrePill class="" :genreTitle="'mystery'"/>
                </div>
                
                <div class="d-flex justify-content-around py-3">
                    <genrePill class="" :genreTitle="'sciFi'"/>
                    <genrePill class="" :genreTitle="'sports'"/>
                </div>
                
                <div class="d-flex justify-content-around py-3">
                    <genrePill class="" :genreTitle="'historical'"/>
                    <genrePill class="" :genreTitle="'historical'" style="opacity: 0;"/>
                </div>
            </div>
            <div class="col my-5 p-5 d-flex genre-description">
                descriptjflkjsadf.
                descriptjflkjsadf.
                descriptjflkjsadf.
                descriptjflkjsadf.
                descriptjflkjsadf.
                descriptjflkjsadf.
                descriptjflkjsadf.

                descriptjflkjsadf.
                descriptjflkjsadf.
                descriptjflkjsadf.
                descriptjflkjsadf.
                descriptjflkjsadf.
                descriptjflkjsadf.

                descriptjflkjsadf.
                descriptjflkjsadf.
                
                <button class="find-works m-5 px-3 py-2">find works</button>
            </div>
        </div>
    </div>
</template>

<script>
import genrePill from "./../../ComponentTest/genrePill.vue"
export default {
    components:{
        genrePill
    },
    data(){
        return{
        };
    }
}
</script>

<style lang="scss" scoped>
@import "./../../../../sass/theme.scss";
    .genre-list{
        background-color: rgba($white, 0.2);
    }
    .genre-description{
        background-color: rgba($black, 0.5);
        border:none;
        box-shadow: 0 0 10px 10px white inset;
    }
    .find-works{
        position: absolute;
        bottom: 0;
        right: 0;
        font-weight: bolder;
        font-size:13px;
        box-shadow: 0 0 2px 3px rgba($theme-highlight, 0.2);
    }
    .find-works:hover{
        background-color: $theme-highlight;
        color: $white;
        border: none;
    }
</style>
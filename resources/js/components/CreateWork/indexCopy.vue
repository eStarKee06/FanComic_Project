<template>
    <div>
        <!--<div>error if not logged in</div>-->
        <div class="d-flex justify-content-center">
            <div class="work-header mt-4">
                <div class="row">
                    <div class="workPic-Container col-4">
                        
                        <!-- createWork: <input class="workCoverImage" type="file" ref="coverImage" @change="handleCoverImage()"/>-->
                        <div class="workCoverImage mt-4" @click="addCoverIm()">
                            <h2 class="pt-5"> ADD </h2>
                            <h2>COVER IMAGE</h2>
                            
                            <input class="imInput p-2" type="file" ref="coverImage"/>
                        </div>
                    </div>
                    <div class="col-8 mt-4">
                        <div class="d-flex justify-content-between">
                            <input class="titleText mt-2 p-3" type="text" placeholder="TITLE"/>

                            <div class="ratings-dropdown mt-2 dropdown">
                                <button class="btn btn-primary" id="ratingsButton" @click="ratingsDropDownOpen = !ratingsDropDownOpen">
                                    {{currentRating}}
                                </button>
                                <div v-if="ratingsDropDownOpen">
                                    <li class="list-group-item" @click="setRatings('general')">General</li>
                                    <li class="list-group-item" @click="setRatings('teens')">Teens</li>
                                    <li class="list-group-item" @click="setRatings('mature')">Mature</li>
                                </div>
                            </div>

                        </div>
                        <div class="workDescription d-flex justify-content-between">
                            <textarea class="workDescription p-3" placeholder="description"></textarea>
                            
                            <div class="genrePickBackground">
                                <label>Genres</label> <br/>
                                <div class="d-flex justify-content-between pt-4">
                                    <genrePill class="mx-2" 
                                        @click="console.log('click')" :genreTitle="'romance'"/>
                                    <genrePill class="mx-2" 
                                        @click="addGenre('comedy')" :genreTitle="'comedy'"/>
                                    <genrePill class="mx-2" 
                                        @click="addGenre('drama')" :genreTitle="'drama'"/>
                                </div>
                                <div class="d-flex justify-content-between pt-4">
                                    <genrePill class="mx-2" 
                                        @click="addGenre('horror')" :genreTitle="'horror'"/>
                                    <genrePill class="mx-2" 
                                        @click="addGenre('mystery')" :genreTitle="'mystery'"/>
                                    <genrePill class="mx-2" 
                                        @click="addGenre('sciFi')" :genreTitle="'sciFi'"/>
                                </div>
                                <div class="d-flex justify-content-between pt-4">
                                    <genrePill class="mx-2" 
                                        @click="addGenre('sports')" :genreTitle="'sports'"/>
                                    <genrePill class="mx-2" 
                                        @click="addGenre('action')" :genreTitle="'action'"/>
                                    <genrePill class="mx-2" 
                                        @click="addGenre('historical')" :genreTitle="'historical'"/>
                                </div>
                            </div>
                        </div>
                        <button class="makeWork p-4">Establish Work</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>
<script>
    import genrePill from "./genrePillEdit.vue"
    import sass from "./../../../sass/theme.scss";
    export default{
        components:{
            genrePill
        },
        data(){
            return{
                ratingsDropDownOpen: false,
                currentRating: "general",
                genreList: []
            }
        },
        methods:{
            setRatings(rating){
                this.currentRating = rating;
                if(rating == "general"){
                    document.getElementById("ratingsButton").style.backgroundColor = sass.ratingGeneral;
                }
                else if (rating == "teens"){
                    document.getElementById("ratingsButton").style.backgroundColor = sass.ratingTeen;
                }
                else{
                    document.getElementById("ratingsButton").style.backgroundColor = sass.ratingMature;
                }
                this.ratingsDropDownOpen = !this.ratingsDropDownOpen;
            }
        }
    }
</script>
<style lang="scss" scoped>
@import "./../../../sass/theme.scss";
    .work-header{
        position:absolute;
        width: 1400px;
        height: 500px;
        border-radius: 1rem;
        border: 2px solid $gray;
        top: 80px;
        text-align:center;
    }
    .workCoverImage{
        position:absolute;
        left: 100;
        width: 340px; 
        height: 440px;
        border-radius: 2rem;
        background-color: rgba($gray,0.4);
        border: 10px dashed $black;

        text-align: center;
    }
    .workCoverImage h2{
        font-weight:bold;
        color: $black;
    }
    @keyframes expand {
        from {
            transform: scale(1);
        }
        to {
            transform: scale(1.05);
        }
    }
    .workCoverImage:hover{
        animation: expand 1s;
        transform: scale(1.05);
        
        background-color: rgba($black,0.7);
        border: 10px dashed $white;
    }
    .workCoverImage:hover h2{
        color: $white;
    }
    .imInput{
        position:absolute;
        left: 0;
        top:0;
        width: 100%; 
        height: 100%;
        border-radius: 2rem;
        opacity:0;
    }

    .titleText{
        position:absolute;
        left: 0;
        width: 650px;
        height: 50px;
        font-weight:bold;
        font-size:30px;
    }
    .ratings-dropdown{
        position:absolute;
        left: 700px;   
    }
    .ratings-dropdown button{
        height:50px;
        width: 150px;
    }
    .workDescription{
        position:absolute;
        top: 10px;
        left:0px;
    }
    .workDescription textarea{
        top: 75px;
        width: 350px;
        height: 350px;
        font-size: 20px;
        resize: none;
    }
    .genrePickBackground{
        position: absolute;
        top:70px;
        left: 370px;
    }
    .genrePickBackground label{
        font-weight: bold;
    }
    .list-group-item{
        width: 150px;
        background-color: rgba($gray,1);
        color: $white;
        border-bottom:1px solid $white;
    }
    .makeWork{
        position: absolute;
        top: 350px;
        left: 680px;  
        border-radius: 1rem;    
        border:none;
        background-color: $gray;
        color: $white;
        font-weight: bold;
        font-size: 20px;
    }
    #ratingsButton{
        background-color: $rating-general;
        border: none;
        font-weight: bold;
        font-size: 20px;
    }
</style>
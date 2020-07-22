<template>
    <div class="d-flex justify-content-center">
        <div class="work-header mt-4" :style=" 'background-image: linear-gradient(white, ' + ratingColor + ');'">
            <div class="row">
                <div class="workPic-Container col-4">
                    <!-- createWork: <input class="workCoverImage" type="file" ref="coverImage" @change="handleCoverImage()"/>-->
                    <div class="workCoverImage mt-4">
                        <img v-show="currentCoverImage != null" :src="currentCoverImage" id="imPreview"/>
                    </div>
                    
                    <div class="d-flex justify-content-between p-4">
                        <button class="restoreButton p-2" @click="restoreImage">
                            Restore
                        </button>
                        <button class="changeButton p-2">
                            Change
                        </button>
                        
                            <input class="imInput p-2" type="file" ref="coverImage" @change="handleCoverImage()"/>
                    </div>
                    
                </div>
               
                <div class="col-8 mt-4">
                    <div class="d-flex justify-content-between">
                        <input class="titleText mt-2 p-3" type="text" v-model="currentTitle"/>

                        <div class="ratings-dropdown mt-2 dropdown">
                            <button class="btn btn-primary" @click="ratingsDropDownOpen = !ratingsDropDownOpen"
                                id="ratingsButton" :style="'background-color: ' + ratingColor">
                                {{currentRating.toUpperCase()}}
                            </button>
                            <div v-if="ratingsDropDownOpen">
                                <li class="list-group-item" @click="setRatingLocal('general')">GENERAL</li>
                                <li class="list-group-item" @click="setRatingLocal('teens')">TEENS</li>
                                <li class="list-group-item" @click="setRatingLocal('mature')">MATURE</li>
                            </div>
                        </div>
                    </div>
                    <div class="workDescription d-flex justify-content-between">
                        <textarea class="workDescription p-3" v-model="currentDescription"></textarea>
                            
                        <div v-if="currentGenreList != null" class="genrePickBackground">
                            <label>Genres</label> <br/>
                            <div class="d-flex justify-content-between pt-4">
                                <genrePill class="mx-2" :genreTitle="'romance'" :genreList="currentGenreList"/>
                                <genrePill class="mx-2" :genreTitle="'comedy'" :genreList="currentGenreList"/>
                                <genrePill class="mx-2" :genreTitle="'drama'" :genreList="currentGenreList"/>
                            </div>
                            <div class="d-flex justify-content-between pt-4">
                                <genrePill class="mx-2" :genreTitle="'horror'" :genreList="currentGenreList"/>
                                <genrePill class="mx-2" :genreTitle="'mystery'" :genreList="currentGenreList"/>
                                <genrePill class="mx-2" :genreTitle="'sciFi'" :genreList="currentGenreList"/>
                            </div>
                            <div class="d-flex justify-content-between pt-4">
                                <genrePill class="mx-2" :genreTitle="'sports'" :genreList="currentGenreList"/>
                                <genrePill class="mx-2" :genreTitle="'action'" :genreList="currentGenreList"/>
                                <genrePill class="mx-2" :genreTitle="'historical'" :genreList="currentGenreList"/>
                            </div>
                        </div>
                    </div>
                    <button class="makeWork p-4" @click="sendWorkToServer()">ESTABLISH WORK</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import genrePill from "./genrePillEdit.vue";
    import sass from "./../../../sass/theme.scss";
    import { mapActions, mapGetters } from "vuex";
    export default{
        components:{
            genrePill
        },
        data(){
            return{
                ratingsDropDownOpen: false,
                
                currentGenreList: null,
                currentDescription: "",
                currentCoverImage: null,
                currentTitle: "",
                currentRating: null,
                ratingColor: null,

                workToShow: null
            }
        },
        mounted(){
            this.workToShow = axios.post("/getWork/" + this.$router.currentRoute.params.id).then((response)=>{
                this.workToShow = response.data;
                this.currentCoverImage = this.workToShow.cover_image;
                this.currentTitle = this.workToShow.title;
                this.currentDescription = this.workToShow.description;
                this.currentGenreList = this.workToShow.genres.map((content) => content.genre_title); 
                this.currentRating = this.workToShow.rating;
                this.ratingColor = (this.currentRating == 'general') ? sass.ratingGeneral : 
                              (this.currentRating == 'teens') ? sass.ratingTeen: sass.ratingMature;
            })
        },
        computed:{
            ...mapGetters({
                getGenreList: "getGenreList",
                getRating: "getRating",
                getColor: "getColor",

                //getWorkToShow: "getWorkToShow",
            }),
        },
        methods:{
            ...mapActions({
                setGenreList: "setGenreList", 
                setRating: "setRating",
                setColor: "setColor",

                //setWorkToShow: "setWorkToShow", 
            }),
            restoreImage(){
                this.currentCoverImage = this.workToShow.cover_image;
                
                document.getElementById("imPreview").src = this.currentCoverImage;
            },
            handleCoverImage(){
                this.currentCoverImage = this.$refs.coverImage.files[0];
                //check for the type of file using last three letters
                if ((this.currentCoverImage != null)) {
                    var fileReader = new FileReader();
                    fileReader.onload = function () {
                        document.getElementById("imPreview").src = fileReader.result;
                    }
                    fileReader.readAsDataURL(this.currentCoverImage);
                } 
            },
            setRatingLocal(rating){
                this.currentRating = rating;
                this.ratingColor = (rating == 'general') ? sass.ratingGeneral : 
                              (rating == 'teens') ? sass.ratingTeen: sass.ratingMature;

                this.ratingsDropDownOpen = !this.ratingsDropDownOpen;
            },/*
            sendWorkToServer(){
                console.log(this.coverImage);
                let formData = new FormData();
                formData.append('title', this.title);
                formData.append('description', this.description);
                formData.append('genres', JSON.stringify(this.getGenreList));
                formData.append('rating', this.getRating);
                formData.append('coverImage', this.coverImage);
                axios.post("/create-work", formData, {headers: {'Content-Type': 'multipart/form-data'}});
            },*/
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
    }
    @keyframes expand {
        from {
            transform: scale(1);
        }
        to {
            transform: scale(1.05);
        }
    }
    .imInput{
        position: absolute;
        top: 350px;
        left: 280px;
        width: 150px;
        height: 50px;
        opacity:0;
    }
    .restoreButton{
        position: absolute;
        top: 350px;
        left: 110px;
        width: 150px;
        height: 50px;

        color:$white;
        background-color: $negative;
        border: none;
        text-align:center;
        font-weight: bold;
    }
    .changeButton{
        position: absolute;
        top: 350px;
        left: 280px;
        width: 150px;
        height: 50px;

        background-color: $positive;
        color:$white;
        border: none;
        text-align:center;
        font-weight: bold;
    }
    #imPreview{      
        position:absolute;
        left: 0;
        top:0;
        width: 100%; 
        height: 100%;
        border-radius: 2rem;
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
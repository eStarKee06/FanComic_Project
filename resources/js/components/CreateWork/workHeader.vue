<template>
    <div class="d-flex justify-content-center">
        <div class="work-header mt-4">
            <div class="row">
                <div class="workPic-Container col-4">
                    <!-- createWork: <input class="workCoverImage" type="file" ref="coverImage" @change="handleCoverImage()"/>-->
                    <div class="workCoverImage mt-4">
                        <h2 class="pt-5"> {{coverImageText}} </h2>
                        <h2> COVER IMAGE </h2>
                        <img v-show="coverImage != null" :src="coverImage" id="imPreview"/>
                        <input class="imInput p-2" type="file" ref="coverImage" @change="handleCoverImage()"/>
                    </div>
                </div>
                <div class="col-8 mt-4">
                    <div class="d-flex justify-content-between">
                        <input class="titleText mt-2 p-3" type="text" placeholder="TITLE" v-model="title"/>

                        <div class="ratings-dropdown mt-2 dropdown">
                            <button class="btn btn-primary" @click="ratingsDropDownOpen = !ratingsDropDownOpen"
                                id="ratingsButton" :style="'background-color: ' + this.getColor">
                                {{this.getRating.toUpperCase()}}
                            </button>
                            <div v-if="ratingsDropDownOpen">
                                <li class="list-group-item" @click="setRatingLocal('general')">GENERAL</li>
                                <li class="list-group-item" @click="setRatingLocal('teens')">TEENS</li>
                                <li class="list-group-item" @click="setRatingLocal('mature')">MATURE</li>
                            </div>
                        </div>
                    </div>
                    <div class="workDescription d-flex justify-content-between">
                        <textarea class="workDescription p-3" placeholder="DESCRIPTION" v-model="description"></textarea>
                            
                        <div class="genrePickBackground">
                            <label>Genres</label> <br/>
                            <div class="d-flex justify-content-between pt-4">
                                <genrePill class="mx-2"  :genreTitle="'romance'"/>
                                <genrePill class="mx-2" :genreTitle="'comedy'"/>
                                <genrePill class="mx-2"  :genreTitle="'drama'"/>
                            </div>
                            <div class="d-flex justify-content-between pt-4">
                                <genrePill class="mx-2"  :genreTitle="'horror'"/>
                                <genrePill class="mx-2"  :genreTitle="'mystery'"/>
                                <genrePill class="mx-2"  :genreTitle="'sciFi'"/>
                            </div>
                            <div class="d-flex justify-content-between pt-4">
                                <genrePill class="mx-2" :genreTitle="'sports'"/>
                                <genrePill class="mx-2"  :genreTitle="'action'"/>
                                <genrePill class="mx-2"  :genreTitle="'historical'"/>
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
    import { mapActions, mapGetters } from "vuex";
    import genrePill from "./genrePillEdit.vue";
    import sass from "./../../../sass/theme.scss";
    export default{
        components:{
            genrePill
        },
        data(){
            return{
                ratingsDropDownOpen: false,
                genreList: [],
                title: "",
                description: "",
                coverImage: null,
            }
        },
        mounted(){
            this.setColor(sass.ratingGeneral);
        },
        computed:{
            ...mapGetters({
                getGenreList: "getGenreList",
                getRating: "getRating",
                getColor: "getColor"
            }),
            coverImageText(){
                if(this.coverImage == null) return "ADD";
                else return "CHANGE";
            }
        },
        methods:{
            ...mapActions({
                setGenreList: "setGenreList", 
                setRating: "setRating",
                setColor: "setColor", 
            }),
            handleCoverImage(){
                this.coverImage = this.$refs.coverImage.files[0];
                //check for the type of file using last three letters
                if ((this.coverImage != null)) {
                    var fileReader = new FileReader();
                    fileReader.onload = function () {
                        document.getElementById("imPreview").src = fileReader.result;
                    }
                    fileReader.readAsDataURL(this.coverImage);
                }
            },
            setRatingLocal(rating){
                this.setRating(rating);
                this.setColor((rating == 'general') ? sass.ratingGeneral : 
                              (rating == 'teens') ? sass.ratingTeen: sass.ratingMature);

                this.ratingsDropDownOpen = !this.ratingsDropDownOpen;
            },
            sendWorkToServer(){
                console.log(this.coverImage);
                let formData = new FormData();
                formData.append('title', this.title);
                formData.append('description', this.description);
                formData.append('genres', JSON.stringify(this.getGenreList));
                formData.append('rating', this.getRating);
                formData.append('coverImage', this.coverImage);
                axios.post("/create-work", formData, {headers: {'Content-Type': 'multipart/form-data'}});
            },
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
    #imPreview{      
        position:absolute;
        left: 0;
        top:0;
        width: 100%; 
        height: 100%;
        opacity: 0.6;
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
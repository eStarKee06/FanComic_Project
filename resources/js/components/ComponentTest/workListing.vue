<template>
    <div>
        <div class="d-flex">
            <div class='work-border' @mouseover="showWorkInfo = true" @mouseout="showWorkInfo = false"
                :class="
                        styleType == 0 ? 
                            ((rating == 'general' ) ? 'G-explore-work-border' : 
                            (rating == 'teen' ) ? 'T-explore-work-border' :
                            'M-explore-work-border') 
                        :styleType == 1 ? 
                            ((rating == 'general' ) ? 'G-home-work-border' : 
                            (rating == 'teen' ) ? 'T-home-work-border' :
                            'M-home-work-border') 
                        : 'work-border'">

                    <div class="rating" id="rating"><h4>R</h4></div>
                <img :src="work.cover_image"/>

                <div v-if="styleType == 0">
                    <div class="explore-info-slide p-4">      
                            hello my name is Ervey how are you doing? more characters here just to check more character more characters
                    </div>
                    
                    <div class="author-text-explore p-2">
                            {{author}}
                    </div>
                </div>
            </div>

            <!-- home components: -->
            <div class="row" v-if="styleType == 1">
                <div class="col">
                    <div class="author mt-4 mb-3" id="author">
                            <div class="author-text" v-if=showWorkInfo>{{author}}fgdghjghjgghj</div>
                    </div>
                    <!--<div class="title my-5">{{work.title}}</div>-->
                    
                    <div class="title d-flex justify-content-center" id="title">
                        <div class="title-text" v-if=showWorkInfo>hello my name is Ervey how are you doing?</div>
                    </div>
                    
                </div>
            </div>

        </div>
        
    </div>
</template>
<script>
export default {
    /*
        // styleType:
            0: explore
            1: home
            2: profile
    */
    props:["work", "author", "rating", "colorProp", "styleType"], 
    data(){
        return{
            showWorkInfo: false,
            accentColor: "blue",
        }
    },
    mounted(){
        //console.log(this.rating);
    },
    computed: {
        cssProps() {
            console.log(this.colorProp);
            return {
                '--hover-color': this.colorProp,
            }
        },
    },
    methods:{

    }
}
</script>

<style lang="scss" scoped> 
@import "./../../../sass/theme.scss";
    img{
        width: 170px; 
        height: 220px;
        border-radius: 2rem;
    }
    .rating{
        position: absolute;
        left:0;
        top: 0;
        border-top-left-radius: 2rem;
        border-bottom-right-radius: 2rem;
        padding: 15px;

        font-weight: bolder;
        background-color: rgba($gray, 0.7);
        color: $white;
    }
    .explore-info-slide{
        position: absolute;
        width: 170px;
        left:0;
        top: 0;
        border-top-right-radius: 2rem;
        border-top-left-radius: 2rem;
        opacity: 0;
        text-align: center;

        overflow: hidden;
        color: $white;
        font-size: 18px;
        font-weight: bold;
        word-wrap: break-word;
    }
    .work-border{
        position: relative;
        width: 170px;
        height: 220px;
        padding: 0px;
        border-radius: 2rem;
    }
    .author{
        height: 30px;
        width: 0px;
        border-top-right-radius: 2rem;
        border-bottom-right-radius: 2rem;
        text-align: center;
    }
    .title{
        height: 130px;
        width: 0px;
        border-top-right-radius: 2rem;
        border-bottom-right-radius: 2rem;
        text-align: center;
        
        display: flex;
        align-items: center;
    }
    textarea{
        resize: none;
        height: 115px;
        width: 150px;
        outline: none;
        border: none;
        background-color: transparent;
        padding: 10px;
        overflow: hidden;
        color: $white;
        font-size: 18px;
        font-weight: bold;
        text-align:center;
    }
    .title-text{
        max-height: 115px;
        max-width: 150px;
        padding: 10px;
        overflow: hidden;
        color: $white;
        font-size: 18px;
        font-weight: bold;
        word-wrap: break-word;
    }
    .author-text{
        max-height: 30px;
        max-width: 150px;
        padding: 5px;
        overflow: hidden;
        color: $white;
        font-size: 15px;
        font-weight: bold;
        text-align:center;
    }   
    .title-text-explore{
        max-height: 180px;
        max-width: 170px;
        overflow: hidden;
        color: $white;
        font-size: 20px;
        font-weight: bold;
        word-wrap: break-word;
    }
    .author-text-explore{
        position: absolute;
        left:0;
        bottom: 0;
        width: 100%;
        border-bottom-left-radius: 2rem;
        border-bottom-right-radius: 2rem;
        font-size: 12px;

        font-weight: bolder;
        text-align: center;
        background-color: $gray;
        overflow: hidden;
    }
</style>

<style scoped>/*explore styles---------------------------------------------*/</style>
<style lang="scss" scoped> 
@import "./../../../sass/theme.scss";
    .G-explore-work-border .explore-info-slide{
        height: 30px;
        transition: all 2s;
        background-color: $rating-general;
    }
    .G-explore-work-border:hover{
        box-shadow: 0 0 0 2px $rating-general, 0 0 15px 7px $rating-general;
    }
    .G-explore-work-border:hover .explore-info-slide{
        height: 187px;
        background-color: $gray;
        opacity: 1;
    }
    .G-explore-work-border .author-text-explore{
        color: $rating-general;
    }
</style>

<style lang="scss" scoped> 
@import "./../../../sass/theme.scss";
    .T-explore-work-border .explore-info-slide{
        height: 30px;
        transition: all 2s;
        background-color: $rating-teen;
    }
    .T-explore-work-border:hover{
        box-shadow: 0 0 0 2px $rating-teen, 0 0 15px 7px $rating-teen;
    }
    .T-explore-work-border:hover .explore-info-slide{
        height: 187px;
        background-color: $gray;
        opacity: 1;
    }
    .T-explore-work-border .author-text-explore{
        color: $rating-teen;
    }
</style>

<style lang="scss" scoped> 
@import "./../../../sass/theme.scss";
    .M-explore-work-border .explore-info-slide{
        height: 30px;
        transition: all 2s;
        background-color: $rating-mature;
    }
    .M-explore-work-border:hover{
        box-shadow: 0 0 0 2px $rating-mature, 0 0 15px 7px $rating-mature;
    }
    .M-explore-work-border:hover .explore-info-slide{
        height: 187px;
        background-color: $gray;
        opacity: 1;
    }
    .M-explore-work-border .author-text-explore{
        color: $rating-mature;
    }
</style>





<style scoped>/*home styles---------------------------------------------*/</style>
<style lang="scss" scoped> 
@import "./../../../sass/theme.scss";
/*home-general*/
    .G-home-work-border + .row .col .title{
        transition: width 2s;
    }
    .G-home-work-border + .row .col .author{
        transition: width 2s;
    }
    .G-home-work-border:hover .rating{
        box-shadow: 0px 0px 25px 0 $rating-general;
        background-color: $rating-general;
        color: $white;
    }
    .G-home-work-border:hover{
        box-shadow: 0 0 0 2px $rating-general, 0 0 20px 7px $rating-general;
        background-color: $rating-general;
    }
    .G-home-work-border:hover + .row .col .title{
        width: 150px;
        box-shadow: 2px 2px 20px 0 $rating-general;
        background-color:  $rating-general;
        color: $white;
    }
    .G-home-work-border:hover + .row .col .author{
        width: 150px;
        box-shadow: 2px 2px 20px 0 $rating-general;
        background-color: $rating-general;
        color: $white;
    }
</style>

<style lang="scss" scoped> 
@import "./../../../sass/theme.scss";
    .T-home-work-border + .row .col .title{
        transition: width 2s;
    }
    .T-home-work-border + .row .col .author{
        transition: width 2s;
    }
    .T-home-work-border:hover .rating{
        box-shadow: 0px 0px 25px 0 $rating-teen;
        background-color: $rating-teen;
        color: $white;
        color: $white;
    }
    .T-home-work-border:hover{
        box-shadow: 0 0 0 2px $rating-teen, 0 0 20px 7px $rating-teen;
        background-color: $rating-teen;
    }
    .T-home-work-border:hover + .row .col .title{
        width: 150px;
        box-shadow: 0px 0px 20px 0 $rating-teen;
        background-color:  $rating-teen;
        color: $white;
    }
    .T-home-work-border:hover + .row .col .author{
        width: 150px;
        box-shadow: 2px 2px 20px 0 $rating-teen;
        background-color:  $rating-teen;
        color: $white;
    }
</style>

<style lang="scss" scoped> 
@import "./../../../sass/theme.scss";
/*home-mature*/
    .M-home-work-border + .row .col .title{
        transition: width 2s;
    }
    .M-home-work-border + .row .col .author{
        transition: width 2s;
    }
    .M-home-work-border:hover .rating{
        box-shadow: 0px 0px 25px 0 $rating-mature;
        background-color: $rating-mature;
        color: $white;
    }
    .M-home-work-border:hover{
        box-shadow: 0 0 0 2px $rating-mature, 0 0 20px 7px $rating-mature;
        background-color: $rating-mature;
    }
    .M-home-work-border:hover + .row .col .title{
        width: 150px;
        box-shadow: 2px 2px 20px 0 $rating-mature;
        background-color:  $rating-mature;
        color: $white;
    }
    .M-home-work-border:hover + .row .col .author{
        width: 150px;
        box-shadow: 2px 2px 20px 0 $rating-mature;
        background-color:  $rating-mature;
        color: $white;
    }
</style>




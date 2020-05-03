<template>
    <div>
        <div class="container"  
            :class="rating == 'general' ? 'G-profile-work-border' : 
                    rating == 'teen'  ? 'T-profile-work-border' :
                    'M-profile-work-border'"
        >
            <div class="row d-flex">
                <div class='col-sm-img work-border' @mouseover="showWorkInfo = true" @mouseout="showWorkInfo = false">
                    <img :src="work.cover_image"/>
                </div>
                <div class="col">
                    <div class="description d-flex justify-content-start row px-4 py-2">
                        <div class="description-contents">
                            this is a description o
                            f the ksdjf lksajdflfjksld
                            j flks ajdfk ljsafsj d;jds
                            ;lksa jdf;l ksajdfl ksajd;flk dfsa dfsadfs adf
                            asadf sa df
                            a df jahdsfjk ahsd fjkhdsa jakshdfjkhd fsa jhdsfjk
                            </div>
                    </div>
                    <div class="title d-flex justify-content-center row">
                        <div class="title-contents">hello my name is Ervey how are doing?</div>
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
    props:["work", "author", "rating", "colorProp"], 
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
    .container{
        width: 500px;
    }
    img{
        /* img measurements divided by 1.5 from workListing */
        width: 113.33px;  
        height: 146.67px;
        border-radius: 2rem;
    }
    .work-border{
        border-top-right-radius: 2rem;
        border-top-left-radius: 2rem;
        border-bottom-left-radius: 2rem;
    }
    .col-sm-img{
        width: 123.33px; 
        height: 156.67px; 
        padding: 5px;
        text-align: center;
    }
    .title{
        position: absolute;
        bottom: 0;
        width: 375px;
        height: 40px;
        border-top-right-radius: 2rem;
        border-bottom-right-radius: 2rem;
        
        text-align: center;
        display: flex;
        align-items: center;
    }
    .title-contents{
        position: absolute;
        top: 0;
        max-width: 360px;
        max-height: 30px;
        overflow: hidden;
        color: $white;
        font-size: 18px;
        font-weight: bold;
        padding:5px;
    }
    .description{
        width: 360px;
        height: 90px;
        border-top-right-radius: 2rem;
        border-bottom-right-radius: 2rem;
    }
    .description-contents{
        max-width: 375px;
        max-height: 90px;
        overflow: hidden;
        color: $white;
        font-size: 14px;
        font-weight: bold;
        word-wrap: break-word;
    }
</style>

<style scoped>/*explore styles---------------------------------------------*/</style>
<style lang="scss" scoped> 
@import "./../../../sass/theme.scss";
    .G-profile-work-border .work-border{
        background-color: $rating-general;
        box-shadow: 0 0 15px 3px $rating-general;
    }
    .G-profile-work-border .row .col .title{
        background-color: $rating-general;
        box-shadow: 0 0 15px 3px $rating-general;
    }
    .G-profile-work-border .row .col .description .description-contents{
        color: $rating-general;
    }
</style>

<style lang="scss" scoped> 
@import "./../../../sass/theme.scss";
    .T-profile-work-border .work-border{
        background-color: $rating-teen;
        box-shadow: 0 0 15px 3px $rating-teen;
    }
    .T-profile-work-border .row .col .title{
        background-color: $rating-teen;
        box-shadow: 0 0 15px 3px $rating-teen;
    }
    .T-profile-work-border .row .col .description .description-contents{
        color: $rating-teen;
    }
</style>

<style lang="scss" scoped> 
@import "./../../../sass/theme.scss";
    .M-profile-work-border .work-border{
        background-color: $rating-mature;
        box-shadow: 0 0 15px 3px $rating-mature;
    }
    .M-profile-work-border .row .col .title{
        background-color: $rating-mature;
        box-shadow: 0 0 15px 3px $rating-mature;
    }
    .M-profile-work-border .row .col .description .description-contents{
        color: $rating-mature;
    }
</style>
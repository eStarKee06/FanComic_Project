<template>
    <div>
        
        <div class="d-flex m-3">
            <workListing class="m-2" :work="dummyWork" :author="dummyAuthor" :rating="dummyRating" 
            :colorProp="colors[Math.floor(Math.random() * colors.length)]" :styleType="1"></workListing>

            <workListing class="m-2" :work="dummyWork" :author="dummyAuthor" :rating="dummyRating2" 
            :colorProp="colors[Math.floor(Math.random() * colors.length)]"
            :styleType="1"></workListing>

            <workListing class="m-2" :work="dummyWork" :author="dummyAuthor" :rating="dummyRating3" 
            :colorProp="colors[Math.floor(Math.random() * colors.length)]"
            :styleType="1"></workListing>
        </div>
        <div class="d-flex m-3">
            <workListing class="m-2" :work="dummyWork" :author="dummyAuthor" :rating="dummyRating" 
            :colorProp="colors[Math.floor(Math.random() * colors.length)]"
            :styleType="0"></workListing> 

            
            <workListing class="m-2" :work="dummyWork" :author="dummyAuthor" :rating="dummyRating2" 
            :colorProp="colors[Math.floor(Math.random() * colors.length)]"
            :styleType="0"></workListing> 

            
            <workListing class="m-2" :work="dummyWork" :author="dummyAuthor" :rating="dummyRating3" 
            :colorProp="colors[Math.floor(Math.random() * colors.length)]"
            :styleType="0"></workListing> 
        </div>

    
            <genrePill class="m-5" :genreTitle="'romance'"/>
            <genrePill class="m-5" :genreTitle="'comedy'"/>
            <genrePill class="m-5" :genreTitle="'drama'"/>
            <genrePill class="m-5" :genreTitle="'horror'"/>
            <genrePill class="m-5" :genreTitle="'mystery'"/>
            <genrePill class="m-5" :genreTitle="'sciFi'"/>
            <genrePill class="m-5" :genreTitle="'sports'"/>
            <genrePill class="m-5" :genreTitle="'action'"/>
            <genrePill class="m-5" :genreTitle="'historical'"/>
        <div>
            <workListingSmall class="m-2" :work="dummyWork" :author="dummyAuthor" :rating="dummyRating" 
            :colorProp="colors[Math.floor(Math.random() * colors.length)]"
            :styleType="0"></workListingSmall> 
                        
            <workListingSmall class="m-2" :work="dummyWork" :author="dummyAuthor" :rating="dummyRating2" 
            :colorProp="colors[Math.floor(Math.random() * colors.length)]"
            :styleType="0"></workListingSmall> 

            <workListingSmall class="m-2" :work="dummyWork" :author="dummyAuthor" :rating="dummyRating3" 
            :colorProp="colors[Math.floor(Math.random() * colors.length)]"
            :styleType="0"></workListingSmall> 
        
        </div>
    </div>
</template>
<script>
import workListing from "./workListing.vue"
import workListingSmall from "./workListingSmall.vue"
import genrePill from "./genrePill.vue"
export default {
    components:{
        workListing,
        workListingSmall,
        genrePill
    },
    data(){
        return{
            dummyWork:
                {
                    title: "test Title",
                    description: "test description jkahdfjkahsfdjkhdsaasjdfhjksadhfjksahdfjksahdfjkhsadfhjdsahfjksadhfjkhsadf",
                    cover_image: "http://localhost:8000/storage/public/1/test/Znu0wqX8gjUxw4LSEqXKaiqi7TE1WbPglTVU6AYV.png"
                },
            dummyAuthor: "testAuthorAuthor",
            dummyRating: "general",
            dummyRating2: "teen",
            dummyRating3: "mature",
            colors:["#3ade65", "#ff7e42", "#fd6bff", "#de455c", "#70ffc1"]
        };
    }
}
</script>

<style scoped>
</style>
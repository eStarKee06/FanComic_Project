<template>
    <div>
        <div class="video-container">
            <video :src="videoPathDummy" autoplay loop playsinline muted></video>
        </div>
        
        <carousel class="m-5"/>

    </div>
</template>

<script>
import VueVideoBackground from 'vue-video-background'
import carousel from './carousel.vue'
export default {
    components:{
        VueVideoBackground,
        carousel
    },
    data(){
        return{
            videoPathDummy: "http://localhost:8000/storage/adminVideos/Pexels Videos 1851190.mp4",
            signInUpActiveItem: 0
        };
    }
}
</script>

<style scoped>
    video{
        width: 100%;
        height: auto;
    }
    .video-container{
        position: absolute;
        top: 50px;
        left: 0;
        max-height: 1000px;
        width: 100%;
        overflow: hidden;
    }
    .starter-carousel{
        width: 100%;
    }
</style>
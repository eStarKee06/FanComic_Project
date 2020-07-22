<template>
    <div>
        <!--<div>error if not logged in</div>-->
        <workHeader/>
    </div>
</template>
<script>
    import workHeader from "./workHeader.vue"
    export default{
        components:{
            workHeader
        },
        data(){
            return{
            }
        },
        methods:{
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
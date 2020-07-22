<template>
    <div>
        <img :src="image">
        <h5 class="mt-3">UserName:</h5> 
        <div class="profile-description mt-1"> 
            <h6 class="">thislkfjasdfkansdfmsa jdksdjflksajdflkjsadfl kjsadlkfjsa dlkfjsalkdfjsa
                 jdksdjflksajdflkjsadfl kjsadlkfjsa dlkfjsalkdfjsa
                  jdksdjflksajdflkjsadfl kjsadlkfjsa dlkfjsalkdfjsa
                   jdksdjflksajdflkjsadfl kjsadlkfjsa dlkfjsalkdfjsa flksahfjsdaf</h6> 
        </div>
    </div>
</template>

<script>
export default{
    data(){
        return{
            image: "http://localhost:8000/storage/public/1/test/Znu0wqX8gjUxw4LSEqXKaiqi7TE1WbPglTVU6AYV.png"
        }
    },
    mounted(){
    },
    methods:{
    }

}
</script>
<style scoped>
img {
    width: 220px;
    height: 300px;
    border: 2px solid black;
}
.profile-description{
    overflow: hidden;
    word-wrap: break-word;
}
</style>
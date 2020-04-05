<template>
    <div>
        <h1>Explore</h1>
        <div v-for="(work, i) in allWorks" :key="i">
            <h3>{{work.title}}</h3>...<h5>{{work.genre}}</h5>
            {{work.description}}
        </div>
    </div>
</template>

<script>
export default{
    data(){
        let allWorksData = axios.get("/works").then((response) => {console.log(response.data)});
        console.log("works: " + axios.get("/works"))
        return{
            allWorks: allWorksData
        };
    }
}
</script>

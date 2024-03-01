<template>
    <a :href="urlto">{{ desc }}</a>
</template>

<script>
export default {
    mounted() {
        console.log("Component mounted.")
    },
    props: {
        desc: String,
        urlto: String
    }
}
</script>
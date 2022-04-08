<template>
    <label :for="fors" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600" v-text="lable"></label>
</template>
<script>
export default {
    props: {
        lable: String,
        fors: String
    }
}
</script>
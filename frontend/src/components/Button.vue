<style>
.blue{
    @apply bg-blue-600 hover:bg-blue-700
}
</style>
<template>
<!-- Loading button -->
    <button :type="type" v-if="loading" disabled
        :class="color"
        class="flex items-center justify-center focus:outline-none text-white text-sm sm:text-base rounded py-2 px-5 transition duration-150 ease-in cursor-wait">
        <Spinner/>
        <span class="mr-2">Loading....</span>
    </button>

<!-- Button -->
    <button :type="type" v-else
        :class="color"
        class="flex items-center justify-center focus:outline-none text-white text-sm sm:text-base rounded py-2 px-5 transition duration-150 ease-in">
        <component :is="icon" v-if="icon"></component>
        <span class="mr-2 uppercase ml-3" v-text="btn_name"></span>
    </button>
</template>
<script>
import Login from './icons/Login.vue';
import Spinner from './icons/Spinner.vue';
export default {
    props: {
        btn_name: String,
        btn_full: String,
        type: String,
        icon: String,
        color: String,
        loading: String
    },
    components: {
        Login,
        Spinner
    }
}
</script>
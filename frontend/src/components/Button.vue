<style>
.blue{
    @apply bg-blue-600 hover:bg-blue-700
}
</style>
<template>
    <button :type="type"
        :class="btn_full? 'w-full':'' + color"
        class="flex items-center justify-center focus:outline-none text-white text-sm sm:text-base rounded py-2 px-5 transition duration-150 ease-in blue">
        <span class="mr-2 uppercase">{{ btn_name }}</span>
        <component :is="icon" v-if="icon"></component>
    </button>
</template>
<script>
import Login from './icons/Login.vue';
export default {
    props: {
        btn_name: String,
        btn_full: String,
        type: String,
        icon: String,
        color: String
    },
    components: {
        Login
    }
}
</script>
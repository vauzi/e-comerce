<template>
    <input :id="input" :type="type" :name="input"
        class="text-sm sm:text-base border border-gray-400 placeholder-gray-500 pl-10 pr-4 rounded-lg  w-full py-2 focus:outline-none focus:border-blue-400"
        :placeholder="holder" />
</template>
<script>
export default {
    props: {
        input: String,
        type: String,
        holder: String
    }
}
</script>
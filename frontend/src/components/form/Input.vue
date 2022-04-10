<template>
    <input :id="input" :type="type" :name="input" v-model="model"
        class="text-sm sm:text-base border border-gray-400 placeholder-gray-500 pl-10 pr-4 rounded-lg  w-full py-2 focus:outline-none focus:border-blue-400"
        :placeholder="holder" />
</template>
<script>
    import {
        toRef
    } from '@vue/reactivity'
    import {
        computed
    } from '@vue/runtime-core';
    export default {
        props: {
            input: String,
            type: String,
            holder: String,
            model: String
        },
        emits: ["update:model"],
        setup(props, {emit }) {
            const {model} = toRef(props);

            const model_ = computed({
                get: () => model.value,
                set: val => emit("update:model", val)
            })
            return {
                model_
            }
        }
    }
</script>
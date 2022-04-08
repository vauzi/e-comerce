<template>
    <auth-layout>
        <template v-slot:auth>
            <div class="container mx-auto flex flex-col bg-white px-4 sm:px-6 md:px-8 lg:px-10 py-8 w-full max-w-md">
                <div class="font-medium self-center text-xl sm:text-2xl uppercase text-gray-800">Login To Your Account
                </div>
                <div class="relative mt-10 h-px bg-gray-300">
                    <div class="absolute left-0 top-0 flex justify-center w-full -mt-2">
                        <span class="bg-white px-4 text-xs text-gray-500 uppercase">Login With Email</span>
                    </div>
                </div>
                <div class="mt-10">
                    <form @submit.prevent="hendleSubmited">
                        <div class="flex flex-col mb-6">
                            <Label lable="E-Mail Address:" fors="email" />
                            <div class="relative">
                                <div
                                    class="inline-flex items-center justify-center absolute left-0 top-0 h-full w-10 text-gray-400">
                                    <IconAt />
                                </div>
                                <Input input="email" type="email" holder="E-Mail Address:" />
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <Label lable="Password:" fors="password" />
                            <div class="relative">
                                <div
                                    class="inline-flex items-center justify-center absolute left-0 top-0 h-full w-10 text-gray-400">
                                    <Lock />
                                </div>
                                <Input input="password" type="password" holder="Password" />
                            </div>
                        </div>
                        <div class="flex items-center justify-end m-3">
                            <a href="#" class="inline-flex text-xs sm:text-sm text-blue-500 hover:text-blue-700">Forgot Your Password?</a>
                        </div>
                        <div class="flex w-full">
                            <Button type="submit" btn_name="Login" btn_full="full" icon="Login" color="blue" disabled />
                        </div>
                    </form>
                </div>
                <div class="flex justify-center items-center mt-6">
                    <a href="#" target="_blank"
                        class="inline-flex items-center font-bold text-blue-500 hover:text-blue-700 text-xs text-center">
                        <users-plus></users-plus>
                        <router-link to="/register" class="ml-2">You don't have an account?</router-link>
                    </a>
                </div>
            </div>
        </template>
    </auth-layout>
</template>
<script>
    import AuthLayout from './index.vue'
    import {
        reactive,
        ref
    } from "@vue/reactivity";
    import axios from 'axios'
    import Label from '../../components/form/Label.vue';
    import Input from '../../components/form/Input.vue';
    import IconAt from '../../components/icons/@.vue';
    import Lock from '../../components/icons/Lock.vue';
    import UsersPlus from '../../components/icons/UsersPlus.vue';
    import Button from '../../components/Button.vue';
    export default {
        name: 'Login',
        components: {
            AuthLayout,
            Label,
            Input,
            IconAt,
            Lock,
            UsersPlus,
            Button
        },
        setup() {
            const formData = reactive({
                email: '',
                password: ''
            })
            const validator = ref([])
            const hendleSubmited = async () => {
                await axios.post("http://localhost:8000/api/login", formData).then((response) => {})
                    .catch(error => {
                        validator.value = error.response.data;
                    });
                console.log(validator.value);
            }
            return {
                formData,
                validator,
                hendleSubmited,
            }
        }
    }
</script>
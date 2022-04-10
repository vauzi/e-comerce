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
                                <Input input="email" type="email" holder="E-Mail Address:" v-model="data.email" />
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <Label lable="Password:" fors="password" />
                            <div class="relative">
                                <div
                                    class="inline-flex items-center justify-center absolute left-0 top-0 h-full w-10 text-gray-400">
                                    <Lock />
                                </div>
                                <Input input="password" type="password" holder="Password" v-model="data.password"/>
                            </div>
                        </div>
                        <div class="flex items-center justify-end m-3">
                            <a href="#" class="inline-flex text-xs sm:text-sm text-blue-500 hover:text-blue-700">Forgot Your Password?</a>
                        </div>
                        <div class="w-full"> 
                            <div class="w-full" v-if="loading">
                                <Button type="submit" btn_name="Login" icon="Login" color="blue" />
                            </div>
                            <div class="w-full" v-else>
                                <Button loading="true" color="blue"/>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="flex justify-center items-center mt-6">
                    <a href="#" target="_blank"
                        class="inline-flex items-center font-bold text-blue-500 hover:text-blue-700 text-xs text-center">
                        <users-plus></users-plus>
                        <!-- {{ email }} -->
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
            const data = reactive({
                email: '',
                password: ''
            })
            const loading = ref(true)
            const validator = ref([])
            const hendleSubmited = async () => {
                loading.value = false
                await axios.post("http://localhost:8000/api/login", data).then((response) => {
                    if (response.data.success) {
                        loading.value = true
                    }
                })
                    .catch(error => {
                        validator.value = error.response.data;
                        if (validator.value) {
                            loading.value = true
                        }
                    });
                console.log(data);
            }
            return {
                validator,
                hendleSubmited,
                data,
                loading
            }
        }
    }
</script>
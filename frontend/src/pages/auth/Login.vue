<script>
    import AuthLayout from './index.vue'
    export default {
        name: 'Login',
        components: {
            AuthLayout
        }
    }
</script>
<template>
    <auth-layout>
        <template v-slot:auth>
            <div
                class="container mx-auto flex flex-col bg-white shadow-md px-4 sm:px-6 md:px-8 lg:px-10 py-8 rounded-md w-full max-w-md">
                <div class="font-medium self-center text-xl sm:text-2xl uppercase text-gray-800">Login To Your Account
                </div>
                <button
                    class="relative mt-6 border rounded-md py-2 text-sm text-gray-800 bg-gray-100 hover:bg-gray-200">
                    <span class="absolute left-0 top-0 flex items-center justify-center h-full w-10 text-blue-500"><i
                            class="fab fa-facebook-f"></i></span>
                    <span>Login with Facebook</span>
                </button>
                <div class="relative mt-10 h-px bg-gray-300">
                    <div class="absolute left-0 top-0 flex justify-center w-full -mt-2">
                        <span class="bg-white px-4 text-xs text-gray-500 uppercase">Or Login With Email</span>
                    </div>
                </div>
                <div class="mt-10">
                    <form action="#">
                        <div class="flex flex-col mb-6">
                            <label for="email" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">E-Mail
                                Address:</label>
                            <div class="relative">
                                <div
                                    class="inline-flex items-center justify-center absolute left-0 top-0 h-full w-10 text-gray-400">
                                    <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                        <path
                                            d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                    </svg>
                                </div>

                                <input id="email" type="email" name="email"
                                    class="text-sm sm:text-base placeholder-gray-500 pl-10 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400"
                                    placeholder="E-Mail Address" />
                            </div>
                        </div>
                        <div class="flex flex-col mb-6">
                            <label for="password"
                                class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Password:</label>
                            <div class="relative">
                                <div
                                    class="inline-flex items-center justify-center absolute left-0 top-0 h-full w-10 text-gray-400">
                                    <span>
                                        <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                            <path
                                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                        </svg>
                                    </span>
                                </div>

                                <input id="password" type="password" name="password"
                                    class="text-sm sm:text-base placeholder-gray-500 pl-10 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400"
                                    placeholder="Password" />
                            </div>
                        </div>

                        <div class="flex items-center mb-6 -mt-4">
                            <div class="flex ml-auto">
                                <a href="#"
                                    class="inline-flex text-xs sm:text-sm text-blue-500 hover:text-blue-700">Forgot Your
                                    Password?</a>
                            </div>
                        </div>

                        <div class="flex w-full">
                            <button type="submit"
                                class="flex items-center justify-center focus:outline-none text-white text-sm sm:text-base bg-blue-600 hover:bg-blue-700 rounded py-2 w-full transition duration-150 ease-in">
                                <span class="mr-2 uppercase">Login</span>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="flex justify-center items-center mt-6">
                    <a href="#" target="_blank"
                        class="inline-flex items-center font-bold text-blue-500 hover:text-blue-700 text-xs text-center">
                        <span>
                            <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                            </svg>
                        </span>
                        <router-link to="/register" class="ml-2">You don't have an account?</router-link>
                    </a>
                </div>
            </div>
        </template>
    </auth-layout>
</template>
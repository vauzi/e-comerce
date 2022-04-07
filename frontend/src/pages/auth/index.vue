<template>
    <main class="w-full h-screen bg-gray-100 overflow-auto">
        <div class="flex items-center justify-between px-16 py-3 space-x-3">
            <span class="flex items-center text-green-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
                        clip-rule="evenodd" />
                </svg>
                <p class="text-2xl font-bold">Comerce</p>
                <p class="text-2xl ml-1 text-gray-800 font-bold">Bag</p>
            </span>
            <span class="flex items-center space-x-2 text-cyan-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                        clip-rule="evenodd" />
                </svg>
                <router-link to="/" class="text-lg ">Back Home</router-link>
            </span>
        </div>
        <!-- component -->
        <div class="px-20 h-screen w-screen flex flex-col-reverse md:flex-row items-center justify-center md:-mt-7">
            <div class="content text-3xl text-center md:text-left hidden md:block">
                <span class="flex items-center space-x-2">
                    <h1 class="text-5xl text-green-500 font-bold">Comerce</h1>
                    <h1 class="text-5xl text-gray-700 font-bold">Bag</h1>
                </span>
                <p class="mt-3 mr-7">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas quasi pariatur fuga fugiat ipsa, minus a hic nam illo ipsum.</p>
            </div>
            <slot name="auth"/>
        </div>

    </main>
</template>
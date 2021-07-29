<template>
    <div class="w-full relative shadow-2xl rounded overflow-hidden">
        <div class="top h-64 w-full bg-blue-600 overflow-hidden relative" >
            <img src="https://images.pexels.com/photos/3812048/pexels-photo-3812048.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="" class="bg w-full h-full object-cover object-center absolute z-0">
            <div class="flex flex-col justify-center items-center relative h-full bg-black bg-opacity-50 text-white">
                <img src="https://avatars.githubusercontent.com/u/66381853?v=4" class="h-24 w-24 object-cover rounded-full">
                <h1 class="text-2xl font-semibold">NinoKrb</h1>
                <h4 class="text-sm font-semibold">Joined Since 29 July 2021</h4>
            </div>
        </div>
        <div class="grid grid-cols-12 bg-white">
            <div class="col-span-12 w-full px-3 justify-center flex space-x-4 border-b border-solid md:space-x-0 md:flex-col md:col-span-2 md:justify-start ">
                <div class="flex items-center justify-center bg-gray-100">
                    <div class="flex w-full max-w-xs p-4 bg-white">
                        <ul class="flex flex-col w-full">
                            <li class="my-px">
                                <span class="flex font-medium text-sm text-gray-400 px-4 my-4 uppercase">Navigation</span>
                            </li>
                            <li class="my-px">
                                <a href="#" class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-600 hover:bg-gray-100 bg-gray-100">
                                    <span class="flex items-center justify-center text-lg text-gray-400">
                                        <UserIcon class="h-5 w-5"/>
                                    </span>
                                    <span class="ml-3">General</span>
                                </a>
                            </li>
                            <li class="my-px">
                                <a href="#" class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-600 hover:bg-gray-100">
                                    <span class="flex items-center justify-center text-lg text-gray-400">
                                        <LockClosedIcon class="h-5 w-5"/>
                                    </span>
                                    <span class="ml-3">Security</span>
                                </a>
                            </li>
                            <li class="my-px">
                                <a href="#" class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-600 hover:bg-gray-100">
                                    <span class="flex items-center justify-center text-lg text-gray-400">
                                        <AnnotationIcon class="h-5 w-5"/>
                                    </span>
                                    <span class="ml-3">Notifications</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-span-12 md:border-solid md:border-l md:border-black md:border-opacity-25 h-full pb-12 md:col-span-10">
                <div class="px-4 pt-4">
                    <form action="#" class="flex flex-col space-y-8">

                        <div>
                            <h3 class="text-2xl font-semibold">Basic Information</h3>
                            <hr>
                        </div>

                        <div class="flex flex-row justify-center items-center space-x-3">
                            <!-- Firstname field -->
                            <div class="content-center w-full">
                                <label class="ml-1 text-sm font-bold text-gray-700 tracking-wide">
                                    Firstname
                                </label>
                                <div class="relative mt-1">
                                    <input
                                        class="w-full content-center text-base px-4 py-2 border-b rounded-xl border-gray-300 focus:border-xupa focus:outline-none focus:ring-0"
                                        type="text" placeholder="Enter your firstname">
                                </div>
                            </div>
                            <!-- END: Firstname field -->

                            <!-- Lastname field -->
                            <div class="content-center w-full">
                                <label class="ml-1 text-sm font-bold text-gray-700 tracking-wide">
                                    Lastname
                                </label>
                                <div class="relative mt-1">
                                    <input
                                        class="w-full content-center text-base px-4 py-2 border-b rounded-xl border-gray-300 focus:border-xupa focus:outline-none focus:ring-0"
                                        type="text" placeholder="Enter your lastname">
                                </div>
                            </div>
                            <!-- END: Lastname field -->
                        </div>

                        <div class="flex flex-row justify-center items-center space-x-3">
                            <!-- Username field -->
                            <div class="content-center w-full">
                                <label class="ml-1 text-sm font-bold text-gray-700 tracking-wide">
                                    Username
                                </label>
                                <div class="relative mt-1">
                                    <input
                                        class="w-full content-center text-base px-4 py-2 border-b rounded-xl border-gray-300 focus:border-xupa focus:outline-none focus:ring-0"
                                        type="text" placeholder="Enter your username">
                                </div>
                            </div>
                            <!-- END: Username field -->

                            <!-- Email field -->
                            <div class="content-center w-full">
                                <label class="ml-1 text-sm font-bold text-gray-700 tracking-wide">
                                    Email Address
                                </label>
                                <div class="relative mt-1">
                                    <input
                                        class="w-full content-center text-base px-4 py-2 border-b rounded-xl border-gray-300 focus:border-xupa focus:outline-none focus:ring-0"
                                        type="email" placeholder="Enter your email address">
                                </div>
                            </div>
                            <!-- END: Email field -->
                        </div>

                        <div>
                            <h3 class="text-2xl font-semibold ">More About Me</h3>
                            <hr>
                        </div>

                        <!-- Email field -->
                        <div class="content-center w-full">
                            <label class="ml-1 text-sm font-bold text-gray-700 tracking-wide">
                                Email Address
                            </label>
                            <div class="relative mt-1">
                                <input
                                    class="w-full content-center text-base px-4 py-2 border-b rounded-xl border-gray-300 focus:border-xupa focus:outline-none focus:ring-0"
                                    type="email" placeholder="Enter your email address">
                            </div>
                        </div>
                        <!-- END: Email field -->

                        <div class="form-item w-full">
                            <label class="text-xl ">Biography</label>
                            <textarea cols="30" rows="10" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 " disabled>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem natus nobis odio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, eveniet fugiat? Explicabo assumenda dignissimos quisquam perspiciatis corporis sint commodi cumque rem tempora!</textarea>
                        </div>

                        <div>
                            <h3 class="text-2xl font-semibold">My Social Media</h3>
                            <hr>
                        </div>

                        <div class="form-item">
                            <label class="text-xl ">Instagram</label>
                            <input type="text" value="https://instagram.com/" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 " disabled>
                        </div>
                        <div class="form-item">
                            <label class="text-xl ">Facebook</label>
                            <input type="text" value="https://facebook.com/" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 " disabled>
                        </div>
                        <div class="form-item">
                            <label class="text-xl ">Twitter</label>
                            <input type="text" value="https://twitter.com/" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2  mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200  " disabled>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { LockClosedIcon, AnnotationIcon, UserIcon } from '@heroicons/vue/outline'

export default {
    name: 'Profile',
    components: {
        LockClosedIcon,
        AnnotationIcon,
        UserIcon
    }
}
</script>

<style scoped>

</style>

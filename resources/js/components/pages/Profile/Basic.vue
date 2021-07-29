<template>
    <DashboardLayout>
        <div class="w-full relative shadow-2xl rounded overflow-hidden bg-white">
            <div class="top h-64 w-full bg-blue-600 overflow-hidden relative" >
                <img src="https://images.pexels.com/photos/3812048/pexels-photo-3812048.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="" class="bg w-full h-full object-cover object-center absolute z-0">
                <div class="flex flex-col justify-center items-center relative h-full bg-black bg-opacity-50 text-white">
                    <img src="https://avatars.githubusercontent.com/u/66381853?v=4" class="h-24 w-24 object-cover rounded-full">
                    <h1 class="text-2xl font-semibold">NinoKrb</h1>
                    <h4 class="text-sm font-semibold">Joined Since 29 July 2021</h4>
                </div>
            </div>
            <div class="w-full grid grid-cols-12">
                <Sidebar />
                <div class="col-span-12 h-full pb-12 md:col-span-10">
                    <div class="px-4 pt-4">
                        <form action="#" class="flex flex-col space-y-7 mr-5">

                            <div>
                                <h3 class="text-2xl font-semibold">Basic Information</h3>
                                <hr>
                            </div>

                            <div class="flex items-center justify-start space-x-2">
                                <h3 class="text-2xl font-semibold">Basic Information</h3>
                                <span class="w-16 h-1 bg-xupa"></span>
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

                            <!-- Biography field -->
                            <div class="content-center w-full">
                                <label class="ml-1 text-sm font-bold text-gray-700">
                                    Biography
                                </label>
                                <div class="relative mt-1">
                                    <textarea
                                        class="w-full content-center text-base px-4 border-b rounded-xl border-gray-300 focus:border-xupa focus:outline-none focus:ring-0"
                                        type="email"
                                        placeholder="Write your biography here"
                                        rows="5"
                                        cols="30"
                                    />
                                </div>
                            </div>
                            <!-- END: Biography field -->
                            <button type="submit"
                                    class="w-min px-10 flex justify-center bg-xupa text-gray-100 py-2 rounded-full tracking-wide font-semibold focus:outline-none focus:shadow-outline hover:bg-xupa-dark shadow-lg cursor-pointer transition ease-in duration-300">
                                Save
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </DashboardLayout>
</template>

<script>
import DashboardLayout from '../Layout/Dashboard'
import Sidebar from './Components/Sidebar'

export default {
    components: {
        DashboardLayout,
        Sidebar
    }
}
</script>

<template>
    <DashboardLayout>
        <!-- Page title starts -->
        <div class="relative pt-8 pb-16 w-full">
            <!-- Background image starts -->
            <img class="z-0 w-full absolute inset-0 object-cover h-64" :src="titleImage" alt="bg" />
            <!-- Background image ends -->
            <div class="relative container px-6 mx-auto flex flex-col lg:flex-row items-start lg:items-center justify-between">
                <div>
                    <p class="flex items-center text-gray-300 text-xs">
                        <span class="cursor-pointer">Xupa</span>
                        <span class="mx-2">&gt;</span>
                        <span class="cursor-pointer">Your Projects</span>
                    </p>
                    <h4 class="text-2xl font-bold leading-tight text-white">Your Projects</h4>
                </div>
                <div class="mt-6 lg:mt-0">
                    <button class="focus:outline-none transition duration-150 ease-in-out hover:bg-gray-200 border bg-white rounded text-xupa px-8 py-2 text-sm" @click="openCreateProjectModal()">Create Project</button>
                </div>
            </div>
            <div class="w-full">
                <div class="container px-6 mx-auto">
                    <div class="relative">
                        <div class="container mx-auto pb-10 mt-2">
                            <!-- START: PROJECT GRID -->
                            <div class="container mx-auto grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 pt-6 gap-8">
                                <!-- START: PROJECT CARD -->
                                <div class="max-w-sm bg-white rounded shadow">
                                    <div class="group">
                                        <div class="bg-cover bg-center h-56 rounded-tl rounded-tr" style="background-image: url(https://images.pexels.com/photos/7015153/pexels-photo-7015153.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260)">
                                            <div class="transition duration-300 flex justify-end group-hover:opacity-100 opacity-0 p-4 bg-opacity-50 bg-black h-56 rounded-tl rounded-tr text-white">
                                                <PencilAltIcon class="h-6 w-6 cursor-pointer text-white" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-white dark:bg-gray-800 rounded-b sm:p-6 p-4">
                                        <div class="flex items-center">
                                            <div class="pr-5">
                                                <div class="w-12 h-12b-4 lg:mb-0 bg-cover rounded-md mr-2">
                                                    <img src="https://cdn.discordapp.com/attachments/676421183561793546/875824230984458240/XupaRed.png" alt="" class="rounded h-full w-full overflow-hidden shadow" />
                                                </div>
                                            </div>
                                            <div class="pl-4 border-l border-gray-200">
                                                <p class="text-lg font-semibold leading-none text-gray-800 dark:text-gray-100">Xupa Project Manager</p>
                                                <p class="text-sm leading-4 pt-2 text-gray-500 dark:text-gray-400">World bests Project planner!</p>
                                            </div>
                                        </div>
                                        <p class="mt-5 text-sm text-gray-600 dark:text-gray-400 font-normal">
                                            The web has witnessed mammoth advances; however a website’s success still depends on just one thing: how users interact with it.
                                        </p>
                                        <div class="flex items-center pt-5">
                                            <div class="pr-4">
                                                <div class="w-8 h-8 bg-gray-100 dark:bg-gray-700 rounded flex items-center justify-center">
                                                    <LocationMarkerIcon class="text-xupa dark:text-xupa-darkest p-1"></LocationMarkerIcon>
                                                </div>
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium leading-none text-gray-800 dark:text-gray-100">KRB-Development HQ</p>
                                                <p class="pt-2 text-xs leading-3 text-gray-500 dark:text-gray-400">Bochum, Germany</p>
                                            </div>
                                        </div>
                                        <div class="flex items-center pt-5">
                                            <div class="pr-4">
                                                <div class="w-8 h-8 bg-gray-100 dark:bg-gray-700 rounded flex items-center justify-center">
                                                    <LinkIcon class="text-xupa dark:text-xupa-darkest p-1"></LinkIcon>
                                                </div>
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium leading-none text-gray-800 dark:text-gray-100">www.xupa.com</p>
                                                <p class="pt-2 text-xs leading-3 text-gray-500 dark:text-gray-400">Official Webpage</p>
                                            </div>
                                        </div>
                                        <div class="pt-8 flex items-center">
                                            <div class="w-9 h-9 bg-white shadow rounded-full flex items-center justify-center">
                                                <img src="https://i.ibb.co/37n3fzs/1.png" alt class="w-8 h-8 rounded-full" />
                                            </div>
                                            <div class="w-9 h-9 bg-white shadow rounded-full flex items-center justify-center -ml-2.5">
                                                <img src="https://i.ibb.co/nDfs93B/2.png" alt class="w-8 h-8 rounded-full" />
                                            </div>
                                            <div class="w-9 h-9 bg-white shadow rounded-full flex items-center justify-center -ml-2.5">
                                                <img src="https://i.ibb.co/qFfsngB/3.png" alt class="w-8 h-8 rounded-full" />
                                            </div>
                                            <div class="w-9 h-9 bg-white shadow rounded-full flex items-center justify-center -ml-2.5">
                                                <img src="https://i.ibb.co/vj2rK3r/4.png" alt class="w-8 h-8 rounded-full" />
                                            </div>
                                            <div class="w-9 h-9 bg-white shadow rounded-full flex items-center justify-center -ml-2.5">
                                                <img src="https://i.ibb.co/5By9D0H/5.png" alt class="w-8 h-8 rounded-full" />
                                            </div>
                                            <p class="text-sm font-medium leading-4 pl-2 cursor-pointer text-gray-500 dark:text-gray-400">+42</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- END: PROJECT CARD -->
                            </div>
                            <!-- END: PROJECT GRID -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <CreateProjectModal ref="CreateProjectModal" />
    </DashboardLayout>
</template>

<script>
import DashboardLayout from '../Layout/Dashboard'
import { PencilAltIcon, LocationMarkerIcon, LinkIcon } from '@heroicons/vue/outline'
import CreateProjectModal from './Components/CreateProjectModal'

export default {
    name: 'user-projects',
    components: {
        DashboardLayout,
        CreateProjectModal,
        PencilAltIcon,
        LocationMarkerIcon,
        LinkIcon
    },
    data() {
        return {
            titleImage: 'https://tuk-cdn.s3.amazonaws.com/assets/webapp/common/bg_image_lite.png'
        }
    },
    methods: {
        route(routeName, data = {}) { return window.route(routeName, data) },
        openCreateProjectModal(state = true) {
            this.$refs.CreateProjectModal.open = state
        }
    }
}
</script>

<template>
    <DashboardLayout>
        <div class="relative z-10 bg-gray-800 pt-8 pb-16 w-full h-44">
            <div class="container px-6 mx-auto flex flex-col lg:flex-row items-start lg:items-center justify-between">
                <div>
                    <p class="flex items-center text-gray-300 text-xs">
                        <span class="cursor-pointer"> Xupa </span>
                        <span class="mx-2"> &gt; </span>
                        <span class="cursor-pointer"> Projects </span>
                        <span class="mx-2"> &gt; </span>
                        <span class="cursor-pointer"> Details </span>
                    </p>
                    <h4 class="text-2xl font-bold leading-tight text-white">Project Title</h4>
                </div>
                <div class="mt-6 lg:mt-0">
                    <button class="focus:outline-none mr-3 bg-transparent transition duration-150 ease-in-out hover:bg-gray-700 rounded text-white px-5 py-2 text-sm border border-white">Back</button>
                    <button class="focus:outline-none transition duration-150 ease-in-out hover:bg-gray-200 border bg-white rounded text-xupa px-8 py-2 text-sm">Edit Project</button>
                </div>
            </div>
            <div class="container px-6 mx-auto">
                <div class="w-full mt-10">
                    <div class="h-auto">
                        <div class="w-full h-auto lg:h-20 mb-6 rounded shadow bg-white">
                            <div class="lg:hidden bg-white w-full relative">
                                <div class="absolute inset-0 m-auto mr-4 z-0 w-6 h-6">
                                    <svg :xmlns="xmlns" class="icon icon-tabler icon-tabler-selector" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#A0AEC0" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <polyline points="8 9 12 5 16 9" />
                                        <polyline points="16 15 12 19 8 15" />
                                    </svg>
                                </div>
                                <select aria-label="Selected tab" class="form-select block w-full p-3 border border-gray-300 rounded text-gray-600 appearance-none bg-transparent relative z-10">
                                    <option selected="" class="text-sm text-gray-600">Overview</option>
                                    <option class="text-sm text-gray-600">Member</option>
                                    <option class="text-sm text-gray-600">Notes</option>
                                    <option class="text-sm text-gray-600">Tasks</option>
                                    <option class="text-sm text-gray-600">Statistics</option>
                                </select>
                            </div>
                            <ul class="hidden lg:flex flex-row items-center h-full">
                                <li class="ml-4 my-2 lg:my-0 rounded text-base text-gray-800 px-4 py-2 bg-gray-200">Overview</li>
                                <li class="pl-10 my-0 text-base text-gray-600">Member</li>
                                <li class="pl-10 my-0 text-base text-gray-600">Notes</li>
                                <li class="pl-10 my-0 text-base text-gray-600">Tasks</li>
                                <li class="pl-10 my-0 text-base text-gray-600">Tasks</li>
                            </ul>
                        </div>
                        <!-- Remove class [ h-64 ] when adding a card block -->
                        <div class="container mx-auto">
                            <div class="bg-white dark:bg-gray-800 w-full h-full rounded shadow p-2">
                                <!-- Place your content here -->
                                <div class="flex flex-col lg:flex-row mx-auto">
                                    <div class="w-full lg:w-1/3 p-6">
                                        <div class="flex items-center">
                                            <div class="w-12 h-12 rounded shadow">
                                                <img class="w-full h-full overflow-hidden object-cover rounded" :src="project.logo ? this.route('projects.requests.project.logo.get', { project: project.id }) : 'https://t4.ftcdn.net/jpg/02/07/87/79/360_F_207877921_BtG6ZKAVvtLyc5GWpBNEIlIxsffTtWkv.jpg'" alt="logo" />
                                            </div>
                                            <div class="ml-3">
                                                <h5 class="text-gray-800 dark:text-gray-100 font-medium text-base">
                                                    {{ project.title }}
                                                </h5>
                                                <p class="text-gray-600 dark:text-gray-400 text-xs font-normal">
                                                    {{ project.slogan }}
                                                </p>
                                            </div>
                                        </div>
                                        <h3 class="text-lg text-gray-800 dark:text-gray-100 font-bold mt-5 mb-1">Description</h3>
                                        <p class="text-gray-600 dark:text-gray-400 text-sm font-normal">
                                            {{ project.description.substring(0, 300) }}{{ project.description.length > 300 ? '...' : '' }}
                                        </p>
                                        <div class="flex items-center mt-6 w-full">
                                            <div class="shadow border-2 border-white rounded-full w-8 h-8">
                                                <img class="w-full h-full overflow-hidden object-cover rounded-full" src="https://dh-ui.s3.amazonaws.com/assets/photo-1564061170517-d3907caa96ea.jfif" alt="avatar" />
                                            </div>
                                            <div class="-ml-2 shadow border-2 border-white rounded-full w-8 h-8">
                                                <img class="w-full h-full overflow-hidden object-cover rounded-full" src="https://dh-ui.s3.amazonaws.com/assets/photo-1548958921-c5c0fe1b307d.jfif" alt="avatar" />
                                            </div>
                                            <div class="-ml-2 shadow border-2 border-white rounded-full w-8 h-8">
                                                <img class="w-full h-full overflow-hidden object-cover rounded-full" src="https://dh-ui.s3.amazonaws.com/assets/photo-1566753323558-f4e0952af115.jfif" alt="avatar" />
                                            </div>
                                            <div class="-ml-2 shadow border-2 border-white rounded-full w-8 h-8">
                                                <img class="w-full h-full overflow-hidden object-cover rounded-full" src="https://dh-ui.s3.amazonaws.com/assets/beautiful-woman-medium-shot-with-pink-background_23-2148316670.jpg" alt="avatar" />
                                            </div>
                                            <div class="-ml-2 shadow border-2 border-white rounded-full w-8 h-8">
                                                <img class="w-full h-full overflow-hidden object-cover rounded-full" src="https://dh-ui.s3.amazonaws.com/assets/excited-happy-young-pretty-woman_171337-2006.jpg" alt="avatar" />
                                            </div>
                                            <p class="text-gray-600 dark:text-gray-400 text-sm font-normal ml-2">+2 more participants</p>
                                        </div>
                                    </div>
                                    <div class="w-full lg:w-1/3 p-6 border-t border-b lg:border-t-0 lg:border-b-0 sm:border-l sm:border-r border-gray-300">
                                        <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between">
                                            <div class="text-xs text-center w-full bg-gray-100 dark:bg-gray-700 text-xupa-darkest dark:text-xupa rounded font-medium p-3 lg:mr-3">
                                                Start Date: {{ formatDate(project.created_at) }}
                                            </div>
                                            <div class="mt-4 text-center w-full lg:mt-0 text-xs bg-gray-100 dark:bg-gray-700 text-xupa-darkest dark:text-xupa rounded font-medium p-3">
                                                End Date: {{ formatDate(project.created_at) }}
                                            </div>
                                        </div>
                                        <div class="mt-6 mb-8 w-full bg-gray-100 dark:bg-gray-700 rounded p-4 relative">
                                            <ul>
                                                <li class="text-xs text-gray-600 dark:text-gray-400 font-normal tracking-normal">- Visual QA for all design components</li>
                                                <li class="text-xs text-gray-600 dark:text-gray-400 font-normal tracking-normal my-4">- UX overview of new product launch</li>
                                                <li class="text-xs text-gray-600 dark:text-gray-400 font-normal tracking-normal">- Visual QA for all design components</li>
                                            </ul>
                                        </div>
                                        <div class="flex items-center justify-between">
                                            <div>
                                                <h2 class="text-gray-600 dark:text-gray-400 font-bold text-lg leading-6 mb-1 text-center">24</h2>
                                                <p class="text-gray-800 dark:text-gray-100 text-sm leading-5 text-center">Quick notes</p>
                                            </div>
                                            <div>
                                                <h2 class="text-gray-600 dark:text-gray-400 font-bold text-lg leading-6 mb-1 text-center">03</h2>
                                                <p class="text-gray-800 dark:text-gray-100 text-sm leading-5 text-center">Teams Assigned</p>
                                            </div>
                                            <div>
                                                <h2 class="text-gray-600 dark:text-gray-400 font-bold text-lg leading-6 mb-1 text-center">14</h2>
                                                <p class="text-gray-800 dark:text-gray-100 text-sm leading-5 text-center">Tasks Pending</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full lg:w-1/3 p-6">
                                        <div class="mb-4 flex items-center justify-between">
                                            <p class="text-gray-600 dark:text-gray-400 text-sm font-normal leading-3 tracking-normal">User Experience Research</p>
                                            <p class="text-xs text-xupa-dark dark:text-xupa font-normal leading-3 tracking-normal">7/12</p>
                                        </div>
                                        <div class="relative mb-8">
                                            <hr class="h-1 rounded-sm bg-gray-200" />
                                            <hr class="absolute top-0 h-1 w-7/12 rounded-sm bg-xupa-lightest" />
                                        </div>
                                        <div class="mb-4 flex items-center justify-between">
                                            <p class="text-gray-600 dark:text-gray-400 text-sm font-normal leading-3 tracking-normal">Component Wireframing</p>
                                            <p class="text-xs text-xupa-dark dark:text-xupa font-normal leading-3 tracking-normal">3/12</p>
                                        </div>
                                        <div class="relative mb-8">
                                            <hr class="h-1 rounded-sm bg-gray-200" />
                                            <hr class="absolute top-0 h-1 w-3/12 rounded-sm bg-xupa-lightest" />
                                        </div>
                                        <div class="mb-4 flex items-center justify-between">
                                            <p class="text-gray-600 dark:text-gray-400 text-sm font-normal leading-3 tracking-normal">Quality Assurance</p>
                                            <p class="text-xs text-xupa-dark dark:text-xupa font-normal leading-3 tracking-normal">9/12</p>
                                        </div>
                                        <div class="relative mb-6 sm:mb-12">
                                            <hr class="h-1 rounded-sm bg-gray-200" />
                                            <hr class="absolute top-0 h-1 w-9/12 rounded-sm bg-xupa-lightest" />
                                        </div>
                                        <div class="flex items-center justify-between">
                                            <div>
                                                <p class="text-sm text-gray-800 dark:text-gray-100 font-normal mb-1 tracking-normal">Earnings</p>
                                                <h2 class="text-sm xl:text-lg text-gray-600 dark:text-gray-400 font-bold tracking-normal">$357,655</h2>
                                            </div>
                                            <div>
                                                <p class="text-sm text-gray-800 dark:text-gray-100 font-normal mb-1 tracking-normal">Expenses</p>
                                                <h2 class="text-sm xl:text-lg text-gray-600 dark:text-gray-400 font-bold tracking-normal">$189,955</h2>
                                            </div>
                                            <div>
                                                <p class="text-sm text-gray-800 dark:text-gray-100 font-normal mb-1 tracking-normal">Net Cash</p>
                                                <h2 class="text-sm xl:text-lg text-gray-600 dark:text-gray-400 font-bold tracking-normal">$888,546</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </DashboardLayout>
</template>

<script>
import DashboardLayout from '../Layout/Dashboard'
import moment from 'moment'

export default {
    name: 'Project',
    props: ['project'],
    components: {
        DashboardLayout
    },
    methods: {
        formatDate(timeString) { return moment(String(timeString)).format('D MMM, YYYY') },
        route(routeName, data = {}) { return window.route(routeName, data) }
    }
}
</script>

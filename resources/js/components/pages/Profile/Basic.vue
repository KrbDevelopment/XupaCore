<template>
    <DashboardLayout>
        <div class="w-full relative shadow-2xl overflow-hidden bg-white">
            <Header />
            <div class="w-full grid grid-cols-12">
                <Sidebar />
                <div class="col-span-12 h-full pb-12 md:col-span-10">
                    <div class="px-4 pt-4">
                        <form @submit.prevent="performUpdateAttempt" class="flex flex-col space-y-7">
                            <div class="pt-3 pb-2 md:pb-2 lg:pb-3 xl:pb-3">
                                <h1 class="xl:text-3xl text-3xl font-bold text-gray-800 mb-1">General</h1>
                                <p class="text-gray-500 text-md uppercase leading-tight">personal informations</p>
                            </div>
                            <div class="flex flex-row justify-center items-center space-x-3 w-full xl:w-3/4">
                                <!-- Firstname field -->
                                <div class="content-center w-full">
                                    <label class="ml-1 text-sm font-bold text-gray-700 tracking-wide">
                                        Firstname
                                    </label>
                                    <div class="relative mt-1">
                                        <input
                                            class="w-full content-center text-base px-4 py-2 border-b rounded-xl border-gray-300 focus:border-xupa focus:outline-none focus:ring-0"
                                            type="text" placeholder="Enter your firstname" v-model="first_name">
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
                                            type="text" placeholder="Enter your lastname" v-model="last_name">
                                    </div>
                                </div>
                                <!-- END: Lastname field -->
                            </div>

                            <div class="flex flex-row justify-center items-center space-x-3 w-full xl:w-3/4">
                                <!-- Username field -->
                                <div class="content-center w-full">
                                    <label class="ml-1 text-sm font-bold text-gray-700 tracking-wide">
                                        Username
                                    </label>
                                    <div class="relative mt-1">
                                        <input
                                            class="w-full content-center text-base px-4 py-2 border-b rounded-xl border-gray-300 focus:border-xupa focus:outline-none focus:ring-0"
                                            type="text" placeholder="Enter your username" v-model="username">
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
                                            type="email" placeholder="Enter your email address" v-model="email">
                                    </div>
                                </div>
                                <!-- END: Email field -->
                            </div>

                            <!-- Biography field -->
                            <div class="content-center w-full xl:w-3/4">
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
                                        v-model="biography"
                                    />
                                </div>
                            </div>
                            <!-- END: Biography field -->
                            <button type="submit"
                                    class="w-min px-10 flex justify-center bg-xupa text-gray-100 py-2 rounded-full tracking-wide font-semibold focus:outline-none focus:shadow-outline hover:bg-xupa-dark shadow-lg cursor-pointer transition ease-in duration-300">
                                Save
                            </button>
                        </form>
                        <div class="rounded-md bg-red-50 p-4 mt-4 xl:w-3/4" v-if="validationError">
                            <!-- Error Section -->
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <XCircleIcon class="h-5 w-5 text-red-400" aria-hidden="true" />
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-red-800">
                                        There were {{ validationError ? Object.keys(validationError)?.length : 0 }} errors with your submission
                                    </h3>
                                    <div class="mt-2 text-sm text-red-700">
                                        <ul class="list-disc pl-5 space-y-1">
                                            <li v-for="(error, index) in validationError" v-bind:key="index"> {{ error }} </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- END: Error Section -->
                        </div>
                    </div>
                </div>
            </div>
            <Notifications />
        </div>
    </DashboardLayout>
</template>

<script>
import DashboardLayout from '../Layout/Dashboard'
import Sidebar from './Components/Sidebar'
import Header from './Components/Header'
import { Inertia } from '@inertiajs/inertia'
import AlternativeProfilePicture from '../../../../assets/images/profile_picture.png'
import Notifications from '../../global/Notifications'

export default {
    components: {
        Notifications,
        DashboardLayout,
        Sidebar,
        Header
    },
    setup() {
        return {
            AlternativeProfilePicture
        }
    },
    data() {
        return {
            // User Credentials
            first_name: this.$page.props.authentication.user.first_name,
            last_name: this.$page.props.authentication.user.last_name,
            username: this.$page.props.authentication.user.username,
            email: this.$page.props.authentication.user.email,
            biography: this.$page.props.authentication.user.biography,

            // Post Login
            validationError: null
        }
    },
    methods: {
        route(routeName, data = {}) { return window.route(routeName, data) },
        /**
         * Perform update attempt for profile form
         */
        performUpdateAttempt() {
            // Clear recent validation errors
            this.validationError = null

            Inertia.post(window.route('profile.requests.general'), {
                // Post Content
                first_name: this.first_name,
                last_name: this.last_name,
                username: this.username,
                email: this.email,
                biography: this.biography,

                // CSRF Token
                _token: this.$page.props.csrf_token
            }, {
                // Server Response Handler

                preserveScroll: true, // Keep scrolling position (freeze position)

                /**
                 * Successfully server response
                 * @param response
                 */
                onSuccess: (response) => {
                    this.$notify(
                        {
                            group: 'success',
                            title: 'Profile updated',
                            text: 'your profile has been updated',
                            transitionGroupClasses: {
                                enterActiveClassDelayed: 'transform ease-out duration-300 transition delay-300',
                                enterActiveClass: 'transform ease-out duration-300 transition',
                                enterFromClass: 'translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-4',
                                enterToClass: 'translate-y-0 opacity-100 sm:translate-x-0',
                                leaveActiveClass: 'transition ease-in duration-500',
                                leaveFromClass: 'opacity-100',
                                leaveToClass: 'opacity-0',
                                moveClass: 'transition duration-500'
                            }
                        },
                        4000
                    )
                },

                /**
                 * Failed server response [HTTP Code: 4x & 5x] Most likely validation error
                 * @param error
                 */
                onError: (error) => {
                    this.validationError = error
                    this.$notify(
                        {
                            group: 'error',
                            title: 'An error has occurred',
                            transitionGroupClasses: {
                                enterActiveClassDelayed: 'transform ease-out duration-300 transition delay-300',
                                enterActiveClass: 'transform ease-out duration-300 transition',
                                enterFromClass: 'translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-4',
                                enterToClass: 'translate-y-0 opacity-100 sm:translate-x-0',
                                leaveActiveClass: 'transition ease-in duration-500',
                                leaveFromClass: 'opacity-100',
                                leaveToClass: 'opacity-0',
                                moveClass: 'transition duration-500'
                            }
                        },
                        4000
                    )
                }
            })
        }
    }
}
</script>

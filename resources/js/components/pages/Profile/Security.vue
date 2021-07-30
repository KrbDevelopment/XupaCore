<template>
    <DashboardLayout>
        <div class="w-full relative shadow-2xl rounded overflow-hidden bg-white">
            <Header />
            <div class="w-full grid grid-cols-12">
                <Sidebar />
                <div class="col-span-12 h-full pb-12 md:col-span-10">
                    <div class="px-4 pt-4">
                        <form class="flex flex-col space-y-7" @submit.prevent="performChangePasswordAttempt">
                            <div class="pt-3 pb-2 md:pb-2 lg:pb-3 xl:pb-3">
                                <h1 class="xl:text-3xl text-3xl font-bold text-gray-800 mb-1">Security</h1>
                                <p class="text-gray-500 text-md uppercase leading-tight">safety settings</p>
                            </div>
                            <!-- Current Password field -->
                            <div class="content-center w-full xl:w-3/4">
                                <label class="ml-1 text-sm font-bold text-gray-700 tracking-wide">
                                    Current Password
                                </label>
                                <div class="relative mt-1">
                                    <input
                                        class="w-full content-center text-base px-4 py-2 border-b rounded-xl border-gray-300 focus:border-xupa focus:outline-none focus:ring-0"
                                        type="password" placeholder="Enter your current Password" v-model="current_password">
                                </div>
                            </div>
                            <!-- Current: Old Password field -->

                            <!-- New Password field -->
                            <div class="content-center w-full xl:w-3/4">
                                <label class="ml-1 text-sm font-bold text-gray-700 tracking-wide">
                                    New Password
                                </label>
                                <div class="relative mt-1">
                                    <input
                                        class="w-full content-center text-base px-4 py-2 border-b rounded-xl border-gray-300 focus:border-xupa focus:outline-none focus:ring-0"
                                        type="password" placeholder="Enter your new Password" v-model="password">
                                </div>
                                <password-meter :password="password" />
                            </div>
                            <!-- END: New Password field -->

                            <!-- Confirm new Password field -->
                            <div class="content-center w-full md:w-full md:w-full xl:w-3/4">
                                <label class="ml-1 text-sm font-bold text-gray-700 tracking-wide">
                                    Confirm Password
                                </label>
                                <div class="relative mt-1">
                                    <input
                                        class="w-full content-center text-base px-4 py-2 border-b rounded-xl border-gray-300 focus:border-xupa focus:outline-none focus:ring-0"
                                        type="password" placeholder="Enter your new Password again" v-model="confirm_password">
                                </div>
                            </div>
                            <!-- END: Confirm new Password field -->

                            <button type="submit" class="w-full sm:w-3/5 md:w-2/5 xl:w-1/5 px-10 flex justify-center bg-xupa text-gray-100 py-2 rounded-full tracking-wide font-semibold focus:outline-none focus:shadow-outline hover:bg-xupa-dark shadow-lg cursor-pointer transition ease-in duration-300">
                                Change Password
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
import Header from './Components/Header'
import PasswordMeter from 'vue-simple-password-meter'
import { Inertia } from '@inertiajs/inertia'

export default {
    components: {
        DashboardLayout,
        PasswordMeter,
        Sidebar,
        Header
    },
    data() {
        return {
            // User Credentials
            current_password: null,
            password: null,
            confirm_password: null,

            // Post Login
            validationError: null
        }
    },
    methods: {
        route(routeName, data = {}) { return window.route(routeName, data) },
        /**
         * Perform login attempt for login form
         */
        performChangePasswordAttempt() {
            // Clear recent validation errors
            this.validationError = null

            Inertia.post(window.route('profile.requests.password.change'), {
                // Post Content
                current_password: this.current_password,
                password: this.password,
                confirm_password: this.confirm_password,

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
                            title: 'Password changed',
                            text: 'your password has been changed',
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

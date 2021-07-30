<template>
    <DashboardLayout>
        <div class="w-full relative shadow-2xl rounded overflow-hidden bg-white">
            <Header />
            <div class="w-full grid grid-cols-12">
                <Sidebar />
                <div class="col-span-12 h-full pb-12 md:col-span-10">
                    <div class="px-4 pt-4">
                        <form action="#" class="flex flex-col space-y-7 w-full xl:w-3/4" @submit.prevent="performChangePasswordAttempt">
                            <div class="pt-3 pb-2 md:pb-2 lg:pb-3 xl:pb-3">
                                <h1 class="xl:text-3xl text-3xl font-bold text-gray-800 mb-1">Notifications</h1>
                                <p class="text-gray-500 uppercase leading-tight">notification settings</p>
                            </div>

                            <div class="container mx-auto bg-white dark:bg-gray-800 py-6">
                                <div class="flex items-center mb-8 text-gray-800 dark:text-gray-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <rect x="3" y="5" width="18" height="14" rx="2" />
                                        <polyline points="3 7 12 13 21 7" />
                                    </svg>
                                    <p class="text-sm font-bold ml-2 text-gray-800 dark:text-gray-100">Via Email</p>
                                </div>

                                <div class="flex justify-between items-center mb-8">
                                    <div class="w-9/12">
                                        <p class="text-sm text-gray-800 dark:text-gray-100 pb-1">Projects</p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">Get updates about the latest activities in your projects</p>
                                    </div>
                                    <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200">
                                        <input type="checkbox" name="toggle" id="toggle1" class="toggle-checkbox absolute block w-6 h-6 rounded-full text-xupa appearance-none cursor-pointer focus:ring-0"/>
                                        <label for="toggle1" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center mb-8">
                                    <div class="w-9/12">
                                        <p class="text-sm text-gray-800 dark:text-gray-100 pb-1">Weekly Newsletter</p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">Receive weekly notifications to be always up to date</p>
                                    </div>
                                    <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200">
                                        <input type="checkbox" name="toggle" id="toggle2" class="toggle-checkbox absolute block w-6 h-6 rounded-full text-xupa appearance-none cursor-pointer focus:ring-0"/>
                                        <label for="toggle2" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center mb-8">
                                    <div class="w-9/12">
                                        <p class="text-sm text-gray-800 dark:text-gray-100 pb-1">Weekly work evaluation</p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">Get an overview of what you have done the week</p>
                                    </div>
                                    <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200">
                                        <input type="checkbox" name="toggle" id="toggle3" class="toggle-checkbox absolute block w-6 h-6 rounded-full text-xupa appearance-none cursor-pointer focus:ring-0"/>
                                        <label for="toggle3" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center">
                                    <div class="w-9/12">
                                        <p class="text-sm text-gray-800 dark:text-gray-100 pb-1">Account related updates</p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">Get an update about recent actions related to your account</p>
                                    </div>
                                    <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200">
                                        <input type="checkbox" name="toggle" id="toggle4" class="toggle-checkbox absolute block w-6 h-6 rounded-full text-xupa appearance-none cursor-pointer focus:ring-0"/>
                                        <label for="toggle4" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="w-min px-10 flex justify-center bg-xupa text-gray-100 py-2 rounded-full tracking-wide font-semibold focus:outline-none focus:shadow-outline hover:bg-xupa-dark shadow-lg cursor-pointer transition ease-in duration-300">
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
import Header from './Components/Header'
import { Inertia } from '@inertiajs/inertia'

export default {
    components: {
        DashboardLayout,
        Sidebar,
        Header
    },
    data() {
        return {
            // Notification Settings
            newsletter: null,
            product: null,
            project: null,
            private: null,

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

            Inertia.post(window.route(''), {
                // Post Content
                newsletter: this.newsletter,
                product: this.product,
                project: this.project,
                private: this.private,

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
                            title: 'Notifications updated',
                            text: 'your notification settings has been updated',
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

<style>
.toggle-checkbox:checked {
    right: 0;
}
</style>

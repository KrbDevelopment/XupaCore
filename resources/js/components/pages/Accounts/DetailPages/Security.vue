<template>
    <Detail :account="this.account">
        <form class="space-y-8 divide-y divide-gray-200" @submit.prevent="performUpdateAttempt(account)">
            <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                <div>
                    <div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            General
                        </h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                            This page will show you the current preferences of the Administrator role
                        </p>
                    </div>

                    <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                        <div class="flex flex-row justify-center items-center space-x-3 w-full">
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

                        <div class="flex flex-row justify-center items-center space-x-3 w-full">
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
                                        v-model="biography"
                                    />
                            </div>
                        </div>
                        <!-- END: Biography field -->
                    </div>
                </div>
            </div>

            <div class="pt-5">
                <div class="flex justify-end">
                    <button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-xupa">
                        Cancel
                    </button>
                    <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-xupa hover:bg-xupa-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-xupa">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </Detail>
</template>

<script>
import Detail from '../Detail'
import { Inertia } from '@inertiajs/inertia'
export default {
    props: ['account'],
    name: 'Settings',
    components: { Detail },
    data() {
        return {
            // User Credentials
            first_name: this.$page.props.account.first_name,
            last_name: this.$page.props.account.last_name,
            username: this.$page.props.account.username,
            email: this.$page.props.account.email,
            biography: this.$page.props.account.biography,

            // Post Login
            validationError: null
        }
    },
    methods: {
        route(routeName, data = {}) { return window.route(routeName, data) },
        /**
         * Perform update attempt for profile form
         */
        performUpdateAttempt(user) {
            // Clear recent validation errors
            this.validationError = null

            Inertia.post(window.route('accounts.requests.account.update.general', { user: user }), {
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
                    console.log(error)
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

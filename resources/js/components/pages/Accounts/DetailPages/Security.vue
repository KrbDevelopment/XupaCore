<template>
    <Detail :account="this.account">
        <form class="space-y-8 divide-y divide-gray-200" @submit.prevent="performChangePasswordAttempt(account)">
            <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                <div>
                    <div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Security
                        </h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                            This page shows you the current security settings of the account
                        </p>
                    </div>

                    <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                        <!-- New Password field -->
                        <div class="content-center w-full">
                            <label class="ml-1 text-sm font-bold text-gray-700 tracking-wide">
                                New Password
                            </label>
                            <div class="relative mt-1">
                                <input
                                    class="w-full content-center text-base px-4 py-2 border-b rounded-xl border-gray-300 focus:border-xupa focus:outline-none focus:ring-0"
                                    type="password" placeholder="Enter a new Password" v-model="password">
                            </div>
                        </div>
                        <!-- END: New Password field -->

                        <!-- New Password field -->
                        <div class="content-center w-full">
                            <label class="ml-1 text-sm font-bold text-gray-700 tracking-wide">
                                Repeat Password
                            </label>
                            <div class="relative mt-1">
                                <input
                                    class="w-full content-center text-base px-4 py-2 border-b rounded-xl border-gray-300 focus:border-xupa focus:outline-none focus:ring-0"
                                    type="password" placeholder="Enter the new Password again" v-model="password_confirmation">
                            </div>
                        </div>
                        <!-- END: New Password field -->
                    </div>
                </div>
            </div>

            <div class="pt-5">
                <div class="flex justify-end">
                    <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-xupa hover:bg-xupa-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-xupa">
                        Save
                    </button>
                </div>
            </div>
        </form>
        <form class="space-y-8 divide-y divide-gray-200" @submit.prevent="performChangePasswordAttempt(account)">
            <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                <div>
                    <div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Security Notifications
                        </h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                            Here you can send security notifications to the account owner manually.
                        </p>
                    </div>

                    <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                        <!-- Send Notifications -->
                        <div class="w-full">
                            <div class="container mx-auto flex items-start justify-center">
                                <div class="w-full">
                                    <div class="flex flex-col lg:flex-row mx-auto bg-white shadow rounded-lg">
                                        <div class="w-full lg:w-1/3 px-12 flex flex-col items-center py-10">
                                            <h2 class="text-gray-800 dark:text-gray-100 text-xl tracking-normal font-medium mb-1">Reset Password</h2>
                                            <p class="flex text-gray-600 dark:text-gray-100 text-sm tracking-normal font-normal mb-3 text-center">
                                                Email
                                            </p>
                                            <p class="text-gray-600 dark:text-gray-100 text-sm tracking-normal font-normal mb-8 text-center w-10/12">Send the user an email in which he can reset his password.</p>
                                            <button type="submit" class="ml-3 inline-flex w-full justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-xupa hover:bg-xupa-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-xupa">
                                                Send Notification
                                            </button>
                                        </div>
                                        <div class="w-full lg:w-1/3 px-12 flex flex-col items-center py-10 border-t border-b lg:border-t-0 lg:border-b-0 lg:border-l border-gray-300">
                                            <h2 class="text-gray-800 dark:text-gray-100 text-xl tracking-normal font-medium mb-1">Verify Mail</h2>
                                            <p class="flex text-gray-600 dark:text-gray-100 text-sm tracking-normal font-normal mb-3 text-center">
                                                Email
                                            </p>
                                            <p class="text-gray-600 dark:text-gray-100 text-sm tracking-normal font-normal mb-8 text-center w-10/12">Send the user an email confirming his email address.</p>
                                            <button type="submit" class="ml-3 inline-flex w-full justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-xupa hover:bg-xupa-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-xupa">
                                                Send Notification
                                            </button>
                                        </div>
                                        <div class="w-full lg:w-1/3 px-12 flex flex-col items-center py-10 border-t border-b lg:border-t-0 lg:border-b-0 lg:border-l border-gray-300">
                                            <h2 class="text-gray-800 dark:text-gray-100 text-xl tracking-normal font-medium mb-1">Password Changed</h2>
                                            <p class="flex text-gray-600 dark:text-gray-100 text-sm tracking-normal font-normal mb-3 text-center">
                                                Email
                                            </p>
                                            <p class="text-gray-600 dark:text-gray-100 text-sm tracking-normal font-normal mb-8 text-center w-10/12">Send the user an email stating that his password has been changed.</p>
                                            <button type="submit" class="ml-3 inline-flex w-full justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-xupa hover:bg-xupa-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-xupa">
                                                Send Notification
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Send Notifications -->
                    </div>
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
            password: null,
            password_confirmation: null,
            // Post Login
            validationError: null
        }
    },
    methods: {
        route(routeName, data = {}) { return window.route(routeName, data) },
        /**
         * Perform change password attempt for password form
         */
        performChangePasswordAttempt(user) {
            // Clear recent validation errors
            this.validationError = null

            Inertia.post(window.route('accounts.requests.account.change.password', { user: user }), {
                // Post Content
                password: this.password,
                password_confirmation: this.password_confirmation,

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
                            text: 'the account password has been changed',
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

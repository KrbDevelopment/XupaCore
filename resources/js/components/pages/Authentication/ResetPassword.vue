<template>
    <div class="relative min-h-screen flex ">
        <div class="flex flex-col sm:flex-row items-center md:items-start sm:justify-center md:justify-start flex-auto min-w-0 bg-white">
            <!-- Left Page Half -->
            <div class="relative sm:w-1/2 xl:w-3/5 h-full hidden md:flex flex-auto items-center justify-center p-10 overflow-hidden bg-purple-900 text-white bg-no-repeat bg-cover relative"
                 style="background-image: url(https://images.unsplash.com/photo-1579451861283-a2239070aaa9?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=1950&amp;q=80);">
                <div class="absolute bg-xupa-darkest opacity-75 inset-0 z-0"></div>
                <div class="w-full  lg:max-w-2xl md:max-w-md z-10">
                    <div class="sm:text-4xl xl:text-6xl font-bold leading-tight mb-6">Reset Password?</div>
                    <div class="sm:text-sm xl:text-md text-gray-200 font-normal"> If you have forgotten your password, you can request a reset. You will then receive a confirmation email from us where you can reset your password. Here you can enter your new password to reset your old one.
                    </div>
                </div>
            </div>
            <!-- END: Left Page Half -->

            <!-- Right Page Half -->
            <div class="md:flex md:items-center md:justify-center w-full sm:w-auto md:h-full w-2/5 xl:w-1/2 sm:py-8 md:p-10 lg:p-14 sm:rounded-lg md:rounded-none bg-white">
                <div class="max-w-md w-full space-y-8">
                    <div class="text-center">
                        <h2 class="mt-6 text-3xl font-bold text-gray-900">
                            Password Reset
                        </h2>
                        <p class="mt-2 text-sm text-gray-500">Please enter your new Password</p>
                    </div>

                    <form class="mt-8 space-y-6" @submit.prevent="performRequestAttempt">

                        <!-- Password field -->
                        <div class="relative">
                            <label class="ml-1 text-sm font-bold text-gray-700 tracking-wide">Password</label>
                            <div class="relative mt-1">
                                <input class="w-full text-base px-4 py-2 border-b rounded-xl border-gray-300 focus:outline-none focus:border-xupa"
                                       type="password" placeholder="Enter your new Password" v-model="password">

                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none" v-if="this.validationError?.password">
                                    <XCircleIcon class="h-6 w-6 text-red-600" />
                                </div>
                                <password-meter :password="password" />
                            </div>
                            <p class="mt-2 text-sm text-red-600" id="password-error" v-if="this.validationError?.password">{{ this.validationError?.password }}</p>
                        </div>
                        <!-- END: Password field -->

                        <!-- Password Confirmation field -->
                        <div class="relative">
                            <label class="ml-1 text-sm font-bold text-gray-700 tracking-wide">Repeat Password</label>
                            <div class="relative mt-1">
                                <input class="w-full text-base px-4 py-2 border-b rounded-xl border-gray-300 focus:outline-none focus:border-xupa"
                                       type="password" placeholder="Enter your new Password again" v-model="password_confirmation">

                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none" v-if="this.validationError?.password_confirmation">
                                    <XCircleIcon class="h-6 w-6 text-red-600" />
                                </div>
                            </div>
                            <p class="mt-2 text-sm text-red-600" id="password_confirmation-error" v-if="this.validationError?.password_confirmation">{{ this.validationError?.password_confirmation }}</p>
                        </div>
                        <!-- END: Password Confirmation field -->

                        <!-- Action Buttons -->
                        <div class="mt-2">
                            <button type="submit"
                                    class="w-full flex justify-center bg-xupa text-gray-100 p-4 rounded-full tracking-wide font-semibold focus:outline-none focus:shadow-outline hover:bg-xupa-dark shadow-lg cursor-pointer transition ease-in duration-300">
                                Reset Password
                            </button>
                        </div>
                        <!-- END: Action Buttons -->
                    </form>

                    <div class="rounded-md bg-red-50 p-4 mt-4" v-if="validationError">
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
            <!-- END: Right Page Half -->
        </div>
    </div>
</template>

<script>
// Components -> Icons
import { XCircleIcon } from '@heroicons/vue/outline'

// Libraries
import { Inertia } from '@inertiajs/inertia'
import PasswordMeter from 'vue-simple-password-meter'

export default {
    props: ['email', 'token'],
    data() {
        return {
            // User Credentials
            password: null,
            password_confirmation: null,

            // Post Register
            validationError: null
        }
    },
    components: {
        XCircleIcon,
        PasswordMeter
    },
    methods: {
        route(routeName, data = {}) { return window.route(routeName, data) },
        /**
         * Perform reset attempt for password reset form
         */
        performRequestAttempt() {
            // Clear recent validation errors
            this.validationError = null

            Inertia.post(window.route('auth.requests.password.reset'), {
                // Post Content
                password: this.password,
                password_confirmation: this.password_confirmation,
                email: this.email,
                token: this.token,

                // CSRF Token
                _token: this.$page.props.csrf_token
            }, {
                // Server Response Handler

                preserveScroll: true, // Keep scrolling position (freeze position)

                /**
                 * Failed server response [HTTP Code: 4x & 5x] Most likely validation error
                 * @param error
                 */
                onError: (error) => {
                    this.validationError = error
                }
            })
        }
    }
}
</script>

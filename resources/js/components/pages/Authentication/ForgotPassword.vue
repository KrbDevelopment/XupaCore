<template>
    <div class="relative min-h-screen flex ">
        <div class="flex flex-col sm:flex-row items-center md:items-start sm:justify-center md:justify-start flex-auto min-w-0 bg-white">
            <!-- Left Page Half -->
            <div class="relative sm:w-1/2 xl:w-3/5 h-full hidden md:flex flex-auto items-center justify-center p-10 overflow-hidden bg-purple-900 text-white bg-no-repeat bg-cover relative"
                 style="background-image: url(https://images.unsplash.com/photo-1579451861283-a2239070aaa9?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=1950&amp;q=80);">
                <div class="absolute bg-xupa-darkest opacity-75 inset-0 z-0"></div>
                <div class="w-full  lg:max-w-2xl md:max-w-md z-10">
                    <div class="sm:text-4xl xl:text-6xl font-bold leading-tight mb-6">Password forgotten?</div>
                    <div class="sm:text-sm xl:text-md text-gray-200 font-normal"> If you have forgotten your password you can enter your registered account email address here. You will then receive a confirmation email from us in which you can reset your password.
                    </div>
                </div>
            </div>
            <!-- END: Left Page Half -->

            <!-- Right Page Half -->
            <div class="md:flex md:items-center md:justify-center w-full sm:w-auto md:h-full w-2/5 xl:w-1/2 sm:py-8 md:p-10 lg:p-14 sm:rounded-lg md:rounded-none bg-white">
                <div class="max-w-md w-full space-y-8">
                    <div class="text-center">
                        <h2 class="mt-6 text-3xl font-bold text-gray-900">
                            Password Request
                        </h2>
                        <p class="mt-2 text-sm text-gray-500">Please enter your account email</p>
                    </div>

                    <form class="mt-8 space-y-6" @submit.prevent="performRequestAttempt">

                        <!-- Email field -->
                        <div class="relative">
                            <label class="ml-1 text-sm font-bold text-gray-700 tracking-wide">Email</label>
                            <div class="relative mt-1">
                                <input class="w-full text-base px-4 py-2 border-b rounded-xl border-gray-300 focus:outline-none focus:border-xupa"
                                       type="text" placeholder="mail@gmail.com" v-model="email">

                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none" v-if="this.validationError?.email">
                                    <XCircleIcon class="h-6 w-6 text-red-600" />
                                </div>
                            </div>
                            <p class="mt-2 text-sm text-red-600" id="email-error" v-if="this.validationError?.email">{{ this.validationError?.email }}</p>
                        </div>
                        <!-- END: Email field -->

                        <!-- Action Buttons -->
                        <div class="mt-2">
                            <button type="submit"
                                    class="w-full flex justify-center bg-xupa text-gray-100 p-4 rounded-full tracking-wide font-semibold focus:outline-none focus:shadow-outline hover:bg-xupa-dark shadow-lg cursor-pointer transition ease-in duration-300">
                                Request Password
                            </button>
                        </div>
                        <p class="flex flex-col items-center justify-center mt-10 text-center text-md text-gray-500">
                            <span>You have your login data?</span>
                            <Link :href="this.route('auth.render.login')" as="a" class="text-xupa hover:text-xupa-dark no-underline hover:underline cursor-pointer transition ease-in duration-300">
                                Sign in
                            </Link>
                        </p>
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
import { Link } from '@inertiajs/inertia-vue3'

export default {
    data() {
        return {
            // User Credentials
            email: null,

            // Post Register
            validationError: null
        }
    },
    components: {
        Link,
        XCircleIcon
    },
    methods: {
        route(routeName, data = {}) { return window.route(routeName, data) },
        /**
         * Perform request attempt for password request form
         */
        performRequestAttempt() {
            // Clear recent validation errors
            this.validationError = null

            Inertia.post(window.route('auth.requests.password.forgot'), {
                // Post Content
                email: this.email,

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

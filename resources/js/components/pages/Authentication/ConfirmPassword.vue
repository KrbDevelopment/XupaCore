<template>
    <div class="relative min-h-screen flex ">
        <div class="flex flex-col sm:flex-row items-center md:items-start sm:justify-center md:justify-start flex-auto min-w-0 bg-white">
            <!-- Left Page Half -->
            <div class="relative h-full hidden md:flex flex-auto items-center justify-center p-10 overflow-hidden bg-purple-900 text-white bg-no-repeat bg-cover relative"
                 style="background-image: url(https://images.unsplash.com/photo-1579451861283-a2239070aaa9?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=1950&amp;q=80);">
                <div class="absolute bg-xupa-darkest opacity-75 inset-0 z-0"></div>
                <div class="max-w-md w-full space-y-8 z-10">
                    <div class="bg-white rounded-xl p-10">
                        <div class="text-center">
                            <h2 class="mt-6 text-4xl font-bold text-gray-900">
                                Confirm Password
                            </h2>
                            <p class="mt-2 text-sm text-gray-500">Please submit your Password change</p>
                        </div>

                        <form class="mt-8 space-y-6" @submit.prevent="performConfirmAttempt">
                            <!-- Password field -->
                            <div class="mt-8 content-center">
                                <label class="ml-1 text-sm font-bold text-gray-700 tracking-wide">
                                    Password
                                </label>
                                <div class="relative mt-1">
                                    <input
                                        class="w-full content-center text-base text-gray-900 px-4 py-2 border-b rounded-xl border-gray-300 focus:border-xupa focus:outline-none focus:ring-0"
                                        type="password" placeholder="Enter your password" v-model="password">

                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none" v-if="this.validationError?.password">
                                        <XCircleIcon class="h-6 w-6 text-red-600" />
                                    </div>
                                </div>
                                <p class="mt-2 text-sm text-red-600" id="password-error" v-if="this.validationError?.password">{{ this.validationError?.password }}</p>
                            </div>
                            <!-- END: Password field -->

                            <!-- Action Buttons -->
                            <div class="mt-2">
                                <button type="submit" class="w-full flex justify-center bg-xupa text-gray-100 p-4 rounded-full tracking-wide font-semibold focus:outline-none focus:shadow-outline hover:bg-xupa-dark shadow-lg cursor-pointer transition ease-in duration-300">
                                    Submit
                                </button>
                            </div>
                            <!-- END: Action Buttons -->
                        </form>
                    </div>
                </div>
            </div>
            <!-- END: Left Page Half -->
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
            // Password to confirm
            password: null,

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
         * Perform confirm attempt for confirm form
         */
        performConfirmAttempt() {
            // Clear recent validation errors
            this.validationError = null

            Inertia.post(window.route('auth.requests.password.confirm'), {
                // Post Content
                password: this.password,

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

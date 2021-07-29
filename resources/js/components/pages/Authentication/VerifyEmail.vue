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
                                Verify Email
                            </h2>
                            <p class="mt-2 text-sm text-gray-500">Please verify your Email address</p>
                        </div>

                        <form class="mt-8 space-y-6" @submit.prevent="performVerifyAttempt">
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

            Inertia.post(window.route('auth.requests.email.verify'), {
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

<template>
    <div class="relative min-h-screen flex ">
        <div class="flex flex-col sm:flex-row items-center md:items-start sm:justify-center md:justify-start flex-auto min-w-0 bg-white">
            <!-- Left Page Half -->
            <div class="relative sm:w-1/2 xl:w-3/5 h-full hidden md:flex flex-auto items-center justify-center p-10 overflow-hidden bg-purple-900 text-white bg-no-repeat bg-cover relative"
                 style="background-image: url(https://images.unsplash.com/photo-1579451861283-a2239070aaa9?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=1950&amp;q=80);">
                <div class="absolute bg-xupa-darkest opacity-75 inset-0 z-0"></div>
                <div class="w-full  lg:max-w-2xl md:max-w-md z-10">
                    <div class="sm:text-4xl xl:text-6xl font-bold leading-tight mb-6">Reference site about Lorem Ipsum..</div>
                    <div class="sm:text-sm xl:text-md text-gray-200 font-normal"> What is Lorem Ipsum Lorem Ipsum is simply dummy
                        text of the printing and typesetting industry Lorem Ipsum has been the industry's standard dummy text ever
                        since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it
                        has?
                    </div>
                </div>
            </div>
            <!-- END: Left Page Half -->

            <!-- Right Page Half -->
            <div class="md:flex md:items-center md:justify-center w-full sm:w-auto md:h-full w-2/5 xl:w-1/2 p-8  md:p-10 lg:p-14 sm:rounded-lg md:rounded-none bg-white">
                <div class="max-w-md w-full space-y-8">
                    <div class="text-center">
                        <h2 class="mt-6 text-3xl font-bold text-gray-900">
                            Welcome Back!
                        </h2>
                        <p class="mt-2 text-sm text-gray-500">Please sign in to your account</p>
                    </div>

                    <!-- Social Login Anchors -->
                    <div class="flex flex-row justify-center items-center space-x-3">
                        <a href="https://www.behance.net/ajeeshmon" target="_blank"
                           class="w-11 h-11 items-center justify-center inline-flex rounded-2xl font-bold text-lg text-white bg-xupa hover:shadow-lg cursor-pointer transition ease-in duration-300"><img
                            class="w-4 h-4"
                            src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDI0IDI0IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA1MTIgNTEyIiB4bWw6c3BhY2U9InByZXNlcnZlIiBjbGFzcz0iIj48Zz48cGF0aCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGQ9Im0xNS45OTcgMy45ODVoMi4xOTF2LTMuODE2Yy0uMzc4LS4wNTItMS42NzgtLjE2OS0zLjE5Mi0uMTY5LTMuMTU5IDAtNS4zMjMgMS45ODctNS4zMjMgNS42Mzl2My4zNjFoLTMuNDg2djQuMjY2aDMuNDg2djEwLjczNGg0LjI3NHYtMTAuNzMzaDMuMzQ1bC41MzEtNC4yNjZoLTMuODc3di0yLjkzOWMuMDAxLTEuMjMzLjMzMy0yLjA3NyAyLjA1MS0yLjA3N3oiIGZpbGw9IiNmZmZmZmYiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIHN0eWxlPSIiIGNsYXNzPSIiPjwvcGF0aD48L2c+PC9zdmc+"></a>
                        <a href="https://twitter.com/ajeemon?lang=en" target="_blank"
                           class="w-11 h-11 items-center justify-center inline-flex rounded-2xl font-bold text-lg  text-white bg-xupa hover:shadow-lg cursor-pointer transition ease-in duration-300"><img
                            class="w-4 h-4"
                            src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDY4MS4zMzQ2NCA2ODEiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiPjxnPjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZD0ibTIwMC45NjQ4NDQgNTE1LjI5Mjk2OWMyNDEuMDUwNzgxIDAgMzcyLjg3MTA5NC0xOTkuNzAzMTI1IDM3Mi44NzEwOTQtMzcyLjg3MTA5NCAwLTUuNjcxODc1LS4xMTcxODgtMTEuMzIwMzEzLS4zNzEwOTQtMTYuOTM3NSAyNS41ODU5MzctMTguNSA0Ny44MjQyMTgtNDEuNTg1OTM3IDY1LjM3MTA5NC02Ny44NjMyODEtMjMuNDgwNDY5IDEwLjQ0MTQwNi00OC43NTM5MDcgMTcuNDYwOTM3LTc1LjI1NzgxMyAyMC42MzY3MTggMjcuMDU0Njg3LTE2LjIzMDQ2OCA0Ny44MjgxMjUtNDEuODk0NTMxIDU3LjYyNS03Mi40ODgyODEtMjUuMzIwMzEzIDE1LjAxMTcxOS01My4zNjMyODEgMjUuOTE3OTY5LTgzLjIxNDg0NCAzMS44MDg1OTQtMjMuOTE0MDYyLTI1LjQ3MjY1Ni01Ny45NjQ4NDMtNDEuNDAyMzQ0LTk1LjY2NDA2Mi00MS40MDIzNDQtNzIuMzY3MTg4IDAtMTMxLjA1ODU5NCA1OC42ODc1LTEzMS4wNTg1OTQgMTMxLjAzMTI1IDAgMTAuMjg5MDYzIDEuMTUyMzQ0IDIwLjI4OTA2MyAzLjM5ODQzNyAyOS44ODI4MTMtMTA4LjkxNzk2OC01LjQ4MDQ2OS0yMDUuNTAzOTA2LTU3LjYyNS0yNzAuMTMyODEyLTEzNi45MjE4NzUtMTEuMjUgMTkuMzYzMjgxLTE3Ljc0MjE4OCA0MS44NjMyODEtMTcuNzQyMTg4IDY1Ljg3MTA5MyAwIDQ1LjQ2MDkzOCAyMy4xMzY3MTkgODUuNjA1NDY5IDU4LjMxNjQwNyAxMDkuMDgyMDMyLTIxLjUtLjY2MDE1Ni00MS42OTUzMTMtNi41NjI1LTU5LjM1MTU2My0xNi4zODY3MTktLjAxOTUzMS41NTA3ODEtLjAxOTUzMSAxLjA4NTkzNy0uMDE5NTMxIDEuNjcxODc1IDAgNjMuNDY4NzUgNDUuMTcxODc1IDExNi40NjA5MzggMTA1LjE0NDUzMSAxMjguNDY4NzUtMTEuMDE1NjI1IDIuOTk2MDk0LTIyLjYwNTQ2OCA0LjYwOTM3NS0zNC41NTg1OTQgNC42MDkzNzUtOC40Mjk2ODcgMC0xNi42NDg0MzctLjgyODEyNS0yNC42MzI4MTItMi4zNjMyODEgMTYuNjgzNTk0IDUyLjA3MDMxMiA2NS4wNjY0MDYgODkuOTYwOTM3IDEyMi40MjU3ODEgOTEuMDIzNDM3LTQ0Ljg1NTQ2OSAzNS4xNTYyNS0xMDEuMzU5Mzc1IDU2LjA5NzY1Ny0xNjIuNzY5NTMxIDU2LjA5NzY1Ny0xMC41NjI1IDAtMjEuMDAzOTA2LS42MDU0NjktMzEuMjYxNzE4OC0xLjgxNjQwNyA1Ny45OTk5OTk4IDM3LjE3NTc4MSAxMjYuODcxMDkzOCA1OC44NzEwOTQgMjAwLjg4NjcxODggNTguODcxMDk0IiBmaWxsPSIjZmZmZmZmIiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBzdHlsZT0iIj48L3BhdGg+PC9nPjwvc3ZnPg=="></a>
                        <a href="https://in.linkedin.com/in/ajeeshmon" target="_blank"
                           class="w-11 h-11 items-center justify-center inline-flex rounded-2xl font-bold text-lg  text-white bg-xupa hover:shadow-lg cursor-pointer transition ease-in duration-300"><img
                            src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDI0IDI0IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA1MTIgNTEyIiB4bWw6c3BhY2U9InByZXNlcnZlIj48Zz48cGF0aCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGQ9Im0yMy45OTQgMjR2LS4wMDFoLjAwNnYtOC44MDJjMC00LjMwNi0uOTI3LTcuNjIzLTUuOTYxLTcuNjIzLTIuNDIgMC00LjA0NCAxLjMyOC00LjcwNyAyLjU4N2gtLjA3di0yLjE4NWgtNC43NzN2MTYuMDIzaDQuOTd2LTcuOTM0YzAtMi4wODkuMzk2LTQuMTA5IDIuOTgzLTQuMTA5IDIuNTQ5IDAgMi41ODcgMi4zODQgMi41ODcgNC4yNDN2Ny44MDF6IiBmaWxsPSIjZmZmZmZmIiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBzdHlsZT0iIj48L3BhdGg+PHBhdGggeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBkPSJtLjM5NiA3Ljk3N2g0Ljk3NnYxNi4wMjNoLTQuOTc2eiIgZmlsbD0iI2ZmZmZmZiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgc3R5bGU9IiI+PC9wYXRoPjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZD0ibTIuODgyIDBjLTEuNTkxIDAtMi44ODIgMS4yOTEtMi44ODIgMi44ODJzMS4yOTEgMi45MDkgMi44ODIgMi45MDkgMi44ODItMS4zMTggMi44ODItMi45MDljLS4wMDEtMS41OTEtMS4yOTItMi44ODItMi44ODItMi44ODJ6IiBmaWxsPSIjZmZmZmZmIiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBzdHlsZT0iIj48L3BhdGg+PC9nPjwvc3ZnPg=="
                            class="w-4 h-4"></a>
                    </div>
                    <!-- END: Social Login Anchors -->

                    <div class="flex items-center justify-center space-x-2">
                        <span class="h-px w-16 bg-gray-200"></span>
                        <span class="text-gray-300 font-normal">or continue with</span>
                        <span class="h-px w-16 bg-gray-200"></span>
                    </div>
                    <form class="mt-8 space-y-6" @submit.prevent="performLoginAttempt">
                        <!-- Email field -->
                        <div class="relative">
                            <label class="ml-1 text-sm font-bold text-gray-700 tracking-wide">Email</label>
                            <div class="relative mt-1">
                                <input class="w-full text-base px-4 py-2 border-b rounded-xl border-gray-300 focus:outline-none focus:border-xupa"
                                       type="text" placeholder="mail@gmail.com" value="mail@gmail.com" v-model="email">

                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none" v-if="this.validationError?.email">
                                    <XCircleIcon class="h-6 w-6 text-red-600" />
                                </div>
                            </div>
                            <p class="mt-2 text-sm text-red-600" id="email-error" v-if="this.validationError?.email">{{ this.validationError?.email }}</p>
                        </div>
                        <!-- END: Email field -->

                        <!-- Password field -->
                        <div class="mt-8 content-center">
                            <label class="ml-1 text-sm font-bold text-gray-700 tracking-wide">
                                Password
                            </label>
                            <div class="relative mt-1">
                                <input
                                    class="w-full content-center text-base px-4 py-2 border-b rounded-xl border-gray-300 focus:outline-none focus:border-xupa"
                                    type="password" placeholder="Enter your password" v-model="password">

                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none" v-if="this.validationError?.password">
                                    <XCircleIcon class="h-6 w-6 text-red-600" />
                                </div>
                            </div>
                            <p class="mt-2 text-sm text-red-600" id="password-error" v-if="this.validationError?.password">{{ this.validationError?.password }}</p>
                        </div>
                        <!-- END: Password field -->

                        <!-- Remember me & Forgot password -->
                        <div class="flex items-center justify-between">
                            <!-- Remember me field -->
                            <div class="flex items-center">
                                <input id="remember_me" name="remember_me" type="checkbox" v-model="remember_me"
                                       class="focus:ring-xupa h-4 w-4 text-xupa-dark border-gray-300 rounded">
                                <label for="remember_me" class="ml-2 block text-sm text-gray-900">
                                    Remember me
                                </label>
                            </div>
                            <!-- END: Remember me field -->

                            <!-- Forgot Password Anchor -->
                            <div class="text-sm">
                                <a href="#" class="font-medium text-xupa hover:textxupa-dark">
                                    Forgot your password?
                                </a>
                            </div>
                            <!-- END: Forgot Password Anchor -->
                        </div>
                        <!-- END: Remember me & Forgot password -->

                        <!-- Action Buttons -->
                        <div class="mt-2">
                            <button type="submit"
                                    class="w-full flex justify-center bg-xupa text-gray-100 p-4 rounded-full tracking-wide font-semibold focus:outline-none focus:shadow-outline hover:bg-xupa-dark shadow-lg cursor-pointer transition ease-in duration-300">
                                Sign in
                            </button>
                        </div>
                        <p class="flex flex-col items-center justify-center mt-10 text-center text-md text-gray-500">
                            <span>Don't have an account?</span>
                            <a href="#"
                               class="text-xupa hover:text-xupa-dark no-underline hover:underline cursor-pointer transition ease-in duration-300">
                                Sign up
                            </a>
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

export default {
    data() {
        return {
            // Login Credentials
            email: null,
            password: null,
            remember_me: null,

            // Post Login
            validationError: null
        }
    },
    components: {
        XCircleIcon
    },
    methods: {

        /**
         * Perform login attempt for login form
         */
        performLoginAttempt() {
            // Clear recent validation errors
            this.validationError = null

            Inertia.post(window.route('auth.requests.login'), {
                // Post Content
                email: this.email,
                password: this.password,
                remember_me: this.remember_me
            }, {
                // Server Response Handler

                preserveScroll: true, // Keep scrolling position (freeze position)

                /**
                 * Successful server response [HTTP Code: 2xx]
                 * @param response [Object] Server response containing props, etc.
                 */
                onSuccess: (response) => {},

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

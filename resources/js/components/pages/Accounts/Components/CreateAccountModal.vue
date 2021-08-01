<template>
    <TransitionRoot as="template" :show="open">
        <Dialog as="div" static class="fixed inset-0 overflow-hidden" @close="open = false" :open="open">
            <div class="absolute inset-0 overflow-hidden">
                <DialogOverlay class="absolute inset-0" />

                <div class="fixed inset-y-0 pl-16 max-w-full right-0 flex">
                    <TransitionChild as="template" enter="transform transition ease-in-out duration-500 sm:duration-700" enter-from="translate-x-full" enter-to="translate-x-0" leave="transform transition ease-in-out duration-500 sm:duration-700" leave-from="translate-x-0" leave-to="translate-x-full">
                        <div class="w-screen max-w-md">
                            <form class="h-full divide-y divide-gray-200 flex flex-col bg-white shadow-xl" @submit.prevent="createAccount">
                                <div class="flex-1 h-0 overflow-y-auto">
                                    <div class="py-6 px-4 bg-xupa sm:px-6">
                                        <div class="flex items-center justify-between">
                                            <DialogTitle class="text-lg font-semibold text-white">
                                                New Account
                                            </DialogTitle>
                                            <div class="ml-3 h-7 flex items-center">
                                                <button type="button" class="bg-xupa rounded-md text-white hover:text-white focus:outline-none focus:ring-2 focus:ring-white" @click="open = false">
                                                    <span class="sr-only">Close panel</span>
                                                    <XIcon class="h-6 w-6" aria-hidden="true" />
                                                </button>
                                            </div>
                                        </div>
                                        <div class="mt-1">
                                            <p class="text-sm text-white">
                                                Please enter the user data below to create an account.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="flex-1 flex flex-col justify-between">
                                        <div class="px-4 divide-y divide-gray-200 sm:px-6">
                                            <div class="space-y-6 pt-6 pb-5">
                                                <div class="flex flex-row justify-center items-center space-x-3">
                                                    <div>
                                                        <label for="project-name" class="block text-sm font-medium text-gray-900">
                                                            Firstname <span class="text-xupa">*</span>
                                                        </label>
                                                        <div class="mt-1">
                                                            <input type="text" name="account-first_name" id="account-first_name" :class="`block w-full shadow-sm sm:text-sm focus:ring-xupa focus:border-xupa border-gray-300 rounded-md ${this.validationErrors.first_name ? 'border-red-700' : ''}`" v-model="account.first_name" />
                                                        </div>
                                                        <p class="text-sm text-red-700 mt-1 float-right" v-if="this.validationErrors.first_name">{{ this.validationErrors.first_name }}</p>
                                                    </div>
                                                    <div>
                                                        <label for="project-name" class="block text-sm font-medium text-gray-900">
                                                            Lastname <span class="text-xupa">*</span>
                                                        </label>
                                                        <div class="mt-1">
                                                            <input type="text" name="account-last_name" id="account-last_name" :class="`block w-full shadow-sm sm:text-sm focus:ring-xupa focus:border-xupa border-gray-300 rounded-md ${this.validationErrors.last_name ? 'border-red-700' : ''}`" v-model="account.last_name" />
                                                        </div>
                                                        <p class="text-sm text-red-700 mt-1 float-right" v-if="this.validationErrors.last_name">{{ this.validationErrors.last_name }}</p>
                                                    </div>
                                                </div>
                                                <div class="flex flex-row justify-center items-center space-x-3">
                                                    <div>
                                                        <label for="project-name" class="block text-sm font-medium text-gray-900">
                                                            Username <span class="text-xupa">*</span>
                                                        </label>
                                                        <div class="mt-1">
                                                            <input type="text" name="account-username" id="account-username" :class="`block w-full shadow-sm sm:text-sm focus:ring-xupa focus:border-xupa border-gray-300 rounded-md ${this.validationErrors.username ? 'border-red-700' : ''}`" v-model="account.username" />
                                                        </div>
                                                        <p class="text-sm text-red-700 mt-1 float-right" v-if="this.validationErrors.username">{{ this.validationErrors.username }}</p>
                                                    </div>
                                                    <div>
                                                        <label for="project-name" class="block text-sm font-medium text-gray-900">
                                                            Email Address <span class="text-xupa">*</span>
                                                        </label>
                                                        <div class="mt-1">
                                                            <input type="email" name="account-email" id="account-email" :class="`block w-full shadow-sm sm:text-sm focus:ring-xupa focus:border-xupa border-gray-300 rounded-md ${this.validationErrors.email ? 'border-red-700' : ''}`" v-model="account.email" />
                                                        </div>
                                                        <p class="text-sm text-red-700 mt-1 float-right" v-if="this.validationErrors.email">{{ this.validationErrors.email }}</p>
                                                    </div>
                                                </div>
                                                <div>
                                                    <label for="project-name" class="block text-sm font-medium text-gray-900">
                                                        Password <span class="text-xupa">*</span>
                                                    </label>
                                                    <div class="mt-1">
                                                        <input type="password" name="account-password" id="account-password" :class="`block w-full shadow-sm sm:text-sm focus:ring-xupa focus:border-xupa border-gray-300 rounded-md ${this.validationErrors.password ? 'border-red-700' : ''}`" v-model="account.password" />
                                                    </div>
                                                    <password-meter :password="account.password" />
                                                    <p class="text-sm text-red-700 mt-1 float-right" v-if="this.validationErrors.password">{{ this.validationErrors.password }}</p>
                                                </div>
                                                <div>
                                                    <label for="project-name" class="block text-sm font-medium text-gray-900">
                                                        Password Confirmation <span class="text-xupa">*</span>
                                                    </label>
                                                    <div class="mt-1">
                                                        <input type="password" name="account-password_confirmation" id="account-password_confirmation" :class="`block w-full shadow-sm sm:text-sm focus:ring-xupa focus:border-xupa border-gray-300 rounded-md ${this.validationErrors.password_confirmation ? 'border-red-700' : ''}`" v-model="account.password_confirmation" />
                                                    </div>
                                                    <p class="text-sm text-red-700 mt-1 float-right" v-if="this.validationErrors.password_confirmation">{{ this.validationErrors.password_confirmation }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-shrink-0 px-4 py-4 flex justify-end">
                                    <button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-xupa hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-xupa" @click="open = false">
                                        Cancel
                                    </button>
                                    <button type="submit" class="ml-4 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-xupa hover:bg-xupa-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-xupa">
                                        Create
                                    </button>
                                </div>
                            </form>
                        </div>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>

<script>
import { ref } from 'vue'
import { Dialog, DialogOverlay, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'
import { XIcon } from '@heroicons/vue/outline'
import { Inertia } from '@inertiajs/inertia'
import PasswordMeter from 'vue-simple-password-meter'

export default {
    components: {
        Dialog,
        DialogOverlay,
        DialogTitle,
        TransitionChild,
        TransitionRoot,
        PasswordMeter,
        XIcon
    },
    data() {
        return {
            account: {
                first_name: null,
                last_name: null,
                username: null,
                email: null,
                password: null,
                password_confirmation: null
            },
            validationErrors: {}
        }
    },
    setup() {
        const open = ref(false)

        return {
            open
        }
    },
    methods: {
        route(name, options = {}) {
            return window.route(name, options)
        },
        createAccount() {
            // Clear recent validation errors
            this.validationError = null

            Inertia.post(window.route('accounts.requests.account.create'), {
                // Post Content
                first_name: this.account.first_name,
                last_name: this.account.last_name,
                username: this.account.username,
                email: this.account.email,
                password: this.account.password,
                password_confirmation: this.account.password_confirmation,

                // CSRF Token
                _token: this.$page.props.csrf_token
            }, {
                // Server Response Handler

                preserveScroll: true, // Keep scrolling position (freeze position)

                /**
                 * Successful server response [HTTP Code: 2x]
                 */
                onSuccess: () => {
                    this.$notify(
                        {
                            group: 'success',
                            text: 'Account has been created successfully',
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

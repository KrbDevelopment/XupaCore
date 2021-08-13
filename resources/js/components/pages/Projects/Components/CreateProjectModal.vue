<template>
    <TransitionRoot as="template" :show="open">
        <Dialog as="div" static class="fixed inset-0 overflow-hidden" @close="open = false" :open="open">
            <div class="absolute inset-0 overflow-hidden">
                <DialogOverlay class="absolute inset-0" />

                <div class="fixed inset-y-0 pl-16 max-w-full right-0 flex">
                    <TransitionChild as="template" enter="transform transition ease-in-out duration-500 sm:duration-700" enter-from="translate-x-full" enter-to="translate-x-0" leave="transform transition ease-in-out duration-500 sm:duration-700" leave-from="translate-x-0" leave-to="translate-x-full">
                        <div class="w-screen max-w-md">
                            <form class="h-full divide-y divide-gray-200 flex flex-col bg-white shadow-xl" @submit.prevent="createProject">
                                <div class="flex-1 h-0 overflow-y-auto">
                                    <div class="py-6 px-4 bg-xupa sm:px-6">
                                        <div class="flex items-center justify-between">
                                            <DialogTitle class="text-lg font-semibold text-white">
                                                Create Project
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
                                                Please enter the following project properties.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="flex-1 flex flex-col justify-between p-2">
                                        <!-- START: PROJECT CARD -->
                                        <div class="w-full shadow">
                                            <div class="group">
                                                <div class="bg-cover bg-center h-56 rounded-tl rounded-tr" style="background-image: url(https://images.pexels.com/photos/7015153/pexels-photo-7015153.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260)">
                                                    <div class="transition duration-300 flex justify-end group-hover:opacity-100 opacity-0 p-4 bg-opacity-50 bg-black h-56 rounded-tl rounded-tr text-white">
                                                        <PencilAltIcon class="h-6 w-6 cursor-pointer text-white" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bg-white dark:bg-gray-800 rounded-b sm:p-6 p-4">
                                                <div class="flex items-center">
                                                    <div class="pr-5">
                                                        <div class="w-12 h-12 lg:mb-0 bg-cover rounded-md mr-2 group" style="background-image: url(https://cdn.discordapp.com/attachments/676421183561793546/875824230984458240/XupaRed.png)">
                                                            <div class="transition duration-300 flex justify-center items-center group-hover:opacity-100 w-full h-full rounded-md opacity-0 bg-opacity-50 bg-black text-white">
                                                                <PencilAltIcon class="h-6 w-6 cursor-pointer text-white" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="pl-4 border-l border-gray-200">
                                                        <input type="text" class="text-lg font-semibold leading-none text-gray-800 dark:text-gray-100 border-0 focus:ring-0 p-0" placeholder="New Title">
                                                        <input type="text" class="text-sm leading-4 pt-2 text-gray-500 dark:text-gray-400 border-0 focus:ring-0 p-0" placeholder="New Slogan">
                                                    </div>
                                                </div>
                                                <textarea class="mt-5 text-sm text-gray-600 dark:text-gray-400 font-normal w-full border-0 focus:ring-0 p-0" rows="3">New Description</textarea>
                                                <!-- START: Location -->
                                                <div class="flex items-center pt-5">
                                                    <div class="pr-4">
                                                        <div class="w-8 h-8 bg-gray-100 dark:bg-gray-700 rounded flex items-center justify-center">
                                                            <LocationMarkerIcon class="text-xupa dark:text-xupa-darkest p-1"></LocationMarkerIcon>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <input type="text" class="text-sm font-medium leading-none text-gray-800 dark:text-gray-100 border-0 focus:ring-0 p-0" placeholder="Address">
                                                        <input type="text" class="pt-2 text-xs leading-3 text-gray-500 dark:text-gray-400 border-0 focus:ring-0 p-0" placeholder="City, Country">
                                                    </div>
                                                </div>
                                                <!-- END: Location -->
                                                <!-- START: Website -->
                                                <div class="flex items-center pt-5">
                                                    <div class="pr-4">
                                                        <div class="w-8 h-8 bg-gray-100 dark:bg-gray-700 rounded flex items-center justify-center">
                                                            <LinkIcon class="text-xupa dark:text-xupa-darkest p-1"></LinkIcon>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <input type="text" class="text-sm font-medium leading-none text-gray-800 dark:text-gray-100 border-0 focus:ring-0 p-0" placeholder="www.your-domain.com">
                                                        <input type="text" class="pt-2 text-xs leading-3 text-gray-500 dark:text-gray-400 border-0 focus:ring-0 p-0" placeholder="Your Domain Name">
                                                    </div>
                                                </div>
                                                <!-- START: Website -->
                                            </div>
                                        </div>
                                        <!-- END: PROJECT CARD -->
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
import { XIcon, PencilAltIcon, LocationMarkerIcon, LinkIcon } from '@heroicons/vue/outline'
import { Inertia } from '@inertiajs/inertia'

export default {
    components: {
        Dialog,
        DialogOverlay,
        DialogTitle,
        TransitionChild,
        TransitionRoot,
        PencilAltIcon,
        LocationMarkerIcon,
        LinkIcon,
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
        createProject() {
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
                            text: 'Project has been created successfully',
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

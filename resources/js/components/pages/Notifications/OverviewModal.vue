<template>
    <TransitionRoot as="template" :show="open">
        <Dialog as="div" static class="fixed inset-0 overflow-hidden z-10" @close="open = false" :open="open">
            <div class="absolute inset-0 overflow-hidden">
                <DialogOverlay class="absolute inset-0" />

                <div class="fixed inset-y-0 right-0 pl-10 max-w-full flex sm:pl-16">
                    <TransitionChild as="template" enter="transform transition ease-in-out duration-500 sm:duration-700" enter-from="translate-x-full" enter-to="translate-x-0" leave="transform transition ease-in-out duration-500 sm:duration-700" leave-from="translate-x-0" leave-to="translate-x-full">
                        <div class="w-screen max-w-xl">
                            <form class="h-full flex flex-col bg-gray-50 shadow-xl overflow-y-scroll" v-on:submit.prevent="create">
                                <div class="flex-1">
                                    <!-- Header -->
                                    <div class="px-4 py-6 bg-gray-100 sm:px-6">
                                        <div class="flex items-start justify-between space-x-3">
                                            <div class="space-y-1">
                                                <DialogTitle class="text-lg font-medium text-gray-900">
                                                    Notifications
                                                </DialogTitle>
                                                <p class="text-sm text-gray-500">
                                                    Here you can find various notifications regarding on xupa
                                                </p>
                                            </div>
                                            <div class="h-7 flex items-center">
                                                <button type="button" class="rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-none" @click="open = false">
                                                    <span class="sr-only">Close panel</span>
                                                    <XIcon class="h-6 w-6 text-xupa" aria-hidden="true" />
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Divider container -->
                                    <div class="p-4 space-y-6 sm:divide-y sm:divide-gray-200">
                                        <div class="shadow-lg rounded-lg bg-white mx-auto p-4 notification-box flex">
                                            <div class="pr-2">
                                                <svg
                                                    class="fill-current text-red-600"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24"
                                                    width="24"
                                                    height="24"
                                                >
                                                    <path
                                                        class="heroicon-ui"
                                                        d="M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-3.54-4.54a5 5 0 0 1 7.08 0 1 1 0 0 1-1.42 1.42 3 3 0 0 0-4.24 0 1 1 0 0 1-1.42-1.42zM9 11a1 1 0 1 1 0-2 1 1 0 0 1 0 2zm6 0a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"
                                                    />
                                                </svg>
                                            </div>
                                            <div>
                                                <div class="text-sm pb-2">
                                                    Notification Title
                                                    <span class="float-right">
                                                      <svg
                                                          class="fill-current text-gray-600"
                                                          xmlns="http://www.w3.org/2000/svg"
                                                          viewBox="0 0 24 24"
                                                          width="22"
                                                          height="22"
                                                      >
                                                        <path
                                                            class="heroicon-ui"
                                                            d="M16.24 14.83a1 1 0 0 1-1.41 1.41L12 13.41l-2.83 2.83a1 1 0 0 1-1.41-1.41L10.59 12 7.76 9.17a1 1 0 0 1 1.41-1.41L12 10.59l2.83-2.83a1 1 0 0 1 1.41 1.41L13.41 12l2.83 2.83z"
                                                        />
                                                      </svg>
                                                    </span>
                                                </div>
                                                <div class="text-sm text-gray-600  tracking-tight ">
                                                    I will never close automatically. This is a purposely very very long
                                                    description that has many many characters and words.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
import { Dialog, DialogOverlay, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'
import { XIcon } from '@heroicons/vue/outline'

export default {
    components: {
        Dialog,
        DialogOverlay,
        DialogTitle,
        TransitionChild,
        TransitionRoot,
        XIcon
    },
    data() {
        return {
            open: true
        }
    }
}
</script>

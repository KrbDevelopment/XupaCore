<template>
    <div class="min-h-screen bg-gray-100 flex flex-col">
        <!-- Top nav-->
        <header class="flex-shrink-0 relative h-16 bg-white flex items-center">
            <!-- Logo area -->
            <div class="absolute inset-y-0 left-0 md:static md:flex-shrink-0">
                <a href="#" class="flex items-center justify-center h-16 w-16 bg-xupa focus:outline-none focus:ring-2 focus:ring-inset focus:ring-xupa md:w-20">
                    <img class="h-6 w-auto" src="../../../../assets/images/logo/logo-white.svg" alt="Xupa logo white" />
                </a>
            </div>

            <!-- Menu button area -->
            <div class="absolute inset-y-0 right-0 pr-4 flex items-center sm:pr-6 md:hidden">
                <!-- Mobile menu button -->
                <button type="button" class="-mr-2 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-xupa" @click="mobileMenuOpen = true">
                    <span class="sr-only">Open main menu</span>
                    <MenuIcon class="block h-6 w-6" aria-hidden="true" />
                </button>
            </div>

            <!-- Desktop nav area -->
            <div class="hidden md:min-w-0 md:flex-1 md:flex md:items-center md:justify-between">
                <div class="min-w-0 flex-1">
                    <div class="max-w-2xl relative text-gray-400 focus-within:text-gray-500">
                        <label for="search" class="sr-only">Search</label>
                        <input id="search" type="search" placeholder="Search" class="block w-full border-transparent pl-12 placeholder-gray-500 focus:border-transparent sm:text-sm focus:ring-0" />
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center justify-center pl-4">
                            <SearchIcon class="h-5 w-5" aria-hidden="true" />
                        </div>
                    </div>
                </div>
                <div class="ml-10 pr-4 flex-shrink-0 flex items-center space-x-10">
                    <nav aria-label="Global" class="flex space-x-10">
                        <a href="#" class="text-sm font-medium text-gray-900">Inboxes</a>
                        <a href="#" class="text-sm font-medium text-gray-900">Reporting</a>
                        <a href="#" class="text-sm font-medium text-gray-900">Settings</a>
                    </nav>
                    <div class="flex items-center space-x-8">
                        <Menu as="div" class="relative inline-block text-left">
                            <MenuButton class="bg-white rounded-full flex text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-xupa">
                                <span class="sr-only">View notifications</span>
                                <BellIcon class="h-6 w-6" aria-hidden="true" />
                            </MenuButton>

                            <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                                <MenuItems class="origin-top-right absolute z-30 right-0 mt-2 overflow-hidden rounded-md w-96 shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
                                    <div class="w-full px-5 py-6 flex justify-between shadow">
                                        <p class="uppercase text-gray-600 text-sm font-semibold">Notifications</p>
                                        <p class="text-gray-600 text-sm cursor-pointer" @click="markAsRead">Mark as read</p>
                                    </div>
                                    <div class="w-full">
                                        <div class="w-full px-6 py-6 flex border-0 border-gray-100 border-t-2 bg-gradient-from-bl bg-gradient-to-tr hover:from-white hover:to-gray-50" v-for="notification in this.$page.props.notifications" v-bind:key="notification.id">
                                            <div v-if="notification.icon">
                                                <div class="rounded-full bg-red-50 flex justify-center items-center" :style="`background-color: ${notification.color}10;`">
                                                    <component :is="notification.icon" class="w-6 h-6 m-2 text-red" :style="`color: ${notification.color};`"/>
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                <p class="text-gray-900 font-semibold text-sm capitalize mb-2" v-if="notification.title">{{ notification.title }}</p>
                                                <p class="text-gray-700 text-sm mb-1">{{ notification.message.substring(0, 150) }}...</p>
                                                <p class="text-gray-500 font-semibold text-xs capitalize">{{ formatNotificationDate(notification.created_at) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </MenuItems>
                            </transition>
                        </Menu>

                        <Menu as="div" class="relative inline-block text-left">
                            <MenuButton class="bg-white rounded-full flex text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-xupa">
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full" :src="$page.props.authentication.user.profile_picture ?? AlternativeProfilePicture" alt="" />
                            </MenuButton>

                            <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                                <MenuItems class="origin-top-right absolute z-30 right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
                                    <div class="py-1">
                                        <MenuItem v-slot="{ active }">
                                            <a href="#" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">
                                                Your Profile
                                            </a>
                                        </MenuItem>
                                        <MenuItem v-slot="{ active }">
                                            <a href="#" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">
                                                Sign Out
                                            </a>
                                        </MenuItem>
                                    </div>
                                </MenuItems>
                            </transition>
                        </Menu>
                    </div>
                </div>
            </div>

            <!-- Mobile menu, show/hide this `div` based on menu open/closed state -->
            <TransitionRoot as="template" :show="mobileMenuOpen">
                <Dialog as="div" static class="fixed inset-0 z-40 md:hidden" @close="mobileMenuOpen = false" :open="mobileMenuOpen">
                    <TransitionChild as="template" enter="transition-opacity ease-linear duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="transition-opacity ease-linear duration-300" leave-from="opacity-100" leave-to="opacity-0">
                        <DialogOverlay class="hidden sm:block sm:fixed sm:inset-0 sm:bg-gray-600 sm:bg-opacity-75" />
                    </TransitionChild>

                    <TransitionChild as="template" enter="transition ease-out duration-150 sm:ease-in-out sm:duration-300" enter-from="transform opacity-0 scale-110 sm:translate-x-full sm:scale-100 sm:opacity-100" enter-to="transform opacity-100 scale-100  sm:translate-x-0 sm:scale-100 sm:opacity-100" leave="transition ease-in duration-150 sm:ease-in-out sm:duration-300" leave-from="transform opacity-100 scale-100 sm:translate-x-0 sm:scale-100 sm:opacity-100" leave-to="transform opacity-0 scale-110  sm:translate-x-full sm:scale-100 sm:opacity-100">
                        <nav class="fixed z-40 inset-0 h-full w-full bg-white sm:inset-y-0 sm:left-auto sm:right-0 sm:max-w-sm sm:w-full sm:shadow-lg" aria-label="Global">
                            <div class="h-16 flex items-center justify-between px-4 sm:px-6">
                                <a href="#">
                                    <img class="block h-8 w-auto" src="../../../../assets/images/logo/logo-xupa.svg" alt="Xupa logo red" />
                                </a>
                                <button type="button" class="-mr-2 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-xupa" @click="mobileMenuOpen = false">
                                    <span class="sr-only">Close main menu</span>
                                    <XIcon class="block h-6 w-6" aria-hidden="true" />
                                </button>
                            </div>
                            <div class="mt-2 max-w-8xl mx-auto px-4 sm:px-6">
                                <div class="relative text-gray-400 focus-within:text-gray-500">
                                    <label for="search" class="sr-only">Search all inboxes</label>
                                    <input id="search" type="search" placeholder="Search all inboxes" class="block w-full border-gray-300 rounded-md pl-10 placeholder-gray-500 focus:border-xupa focus:ring-xupa" />
                                    <div class="absolute inset-y-0 left-0 flex items-center justify-center pl-3">
                                        <SearchIcon class="h-5 w-5" aria-hidden="true" />
                                    </div>
                                </div>
                            </div>
                            <div class="border-t border-gray-200 pt-4 pb-3">
                                <div class="max-w-8xl mx-auto px-4 flex items-center sm:px-6">
                                    <div class="flex-shrink-0">
                                        <img class="h-10 w-10 rounded-full" :src="$page.props.authentication.user.profile_picture ?? AlternativeProfilePicture" alt="Profile picture" />
                                    </div>
                                    <div class="ml-3 min-w-0 flex-1">
                                        <div class="text-base font-medium text-gray-800 truncate">@{{ $page.props.authentication.user.username }}</div>
                                        <div class="text-sm font-medium text-gray-500 truncate">{{ $page.props.authentication.user.email }}</div>
                                    </div>
                                    <a href="#" class="ml-auto flex-shrink-0 bg-white p-2 text-gray-400 hover:text-gray-500">
                                        <span class="sr-only">View notifications</span>
                                        <BellIcon class="h-6 w-6" aria-hidden="true" />
                                    </a>
                                </div>
                                <div class="mt-3 max-w-8xl mx-auto px-2 space-y-1 sm:px-4">
                                    <a v-for="item in userNavigation" :key="item.name" :href="item.href" class="block rounded-md py-2 px-3 text-base font-medium text-gray-900 hover:bg-gray-50">{{ item.name }}</a>
                                </div>
                            </div>
                        </nav>
                    </TransitionChild>
                </Dialog>
            </TransitionRoot>
        </header>

        <!-- Bottom section -->
        <div class="min-h-0 flex-1 flex">
            <!-- Narrow sidebar-->
            <nav aria-label="Sidebar" class="md:block md:flex-shrink-0 md:bg-gray-800 md:overflow-y-auto hidden">
                <div class="relative w-20 flex flex-col p-3 space-y-3">
                    <a v-for="item in sidebarNavigation" :key="item.name" :href="item.href" :class="[item.current ? 'bg-gray-900 text-white' : 'text-gray-400 hover:bg-gray-700', 'flex-shrink-0 inline-flex items-center justify-center h-14 w-14 rounded-lg']">
                        <span class="sr-only">{{ item.name }}</span>
                        <component :is="item.icon" class="h-6 w-6" aria-hidden="true" />
                    </a>
                </div>
            </nav>

            <!-- Main area -->
            <main class="min-w-0 flex-1 border-t border-gray-200 lg:flex">
                <slot />
            </main>
        </div>

        <notifications />
    </div>
</template>

<script>
import { ref } from 'vue'
import {
    Dialog,
    DialogOverlay,
    Menu,
    MenuButton,
    MenuItem,
    MenuItems,
    TransitionChild,
    TransitionRoot
} from '@headlessui/vue'
import { ChevronDownIcon, SearchIcon } from '@heroicons/vue/solid'
import {
    ArchiveIcon,
    BanIcon,
    BellIcon,
    FlagIcon,
    InboxIcon,
    MenuIcon,
    PencilAltIcon,
    UserCircleIcon,
    XIcon
} from '@heroicons/vue/outline'
import AlternativeProfilePicture from '../../../../assets/images/profile_picture.png'
import { Inertia } from '@inertiajs/inertia'
import moment from 'moment'
import Notifications from '../../global/Notifications'

const sidebarNavigation = [
    { name: 'Open', href: '#', icon: InboxIcon, current: true },
    { name: 'Archive', href: '#', icon: ArchiveIcon, current: false },
    { name: 'Customers', href: '#', icon: UserCircleIcon, current: false },
    { name: 'Flagged', href: '#', icon: FlagIcon, current: false },
    { name: 'Spam', href: '#', icon: BanIcon, current: false },
    { name: 'Drafts', href: '#', icon: PencilAltIcon, current: false }
]
const userNavigation = [
    { name: 'Your Profile', href: '#' },
    { name: 'Sign out', href: '#' }
]

export default {
    components: {
        Notifications,
        Dialog,
        DialogOverlay,
        Menu,
        MenuButton,
        MenuItem,
        MenuItems,
        TransitionChild,
        TransitionRoot,
        BellIcon,
        ChevronDownIcon,
        MenuIcon,
        SearchIcon,
        XIcon
    },
    methods: {
        route(name, options = {}) {
            return window.route(name, options)
        },
        isCurrent(name) {
            return window.route().current(name)
        },
        markAsRead() {
            const notificationIds = this.$page.props.notifications.map(notification => {
                return notification.id
            })

            console.log(this.$page.props.notifications)

            Inertia.post(this.route('notifications.requests.read.array'), {
                notifications: notificationIds
            }, {
                preserveScroll: true, // Keep scrolling position (freeze position)

                /**
                 * Successful server response [HTTP Code: 2x]
                 */
                onSuccess: () => {
                    this.$notify(
                        {
                            group: 'success',
                            text: 'You\'re notifications has been marked as read',
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
                 */
                onError: () => {
                    this.$notify(
                        {
                            group: 'error',
                            title: 'An error has occurred',
                            text: 'We weren\'t able to mark the notifications as read',
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
        },
        formatNotificationDate(date) {
            console.log(date)
            return moment(new Date(date)).format('MMM DD • H:mma')
        }
    },
    setup() {
        const mobileMenuOpen = ref(false)

        return {
            sidebarNavigation,
            userNavigation,
            mobileMenuOpen,
            AlternativeProfilePicture
        }
    }
}
</script>

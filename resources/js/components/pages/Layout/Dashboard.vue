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

            <!-- Picker area -->
            <div class="mx-auto md:hidden">
                <div class="relative">
                    <label for="inbox-select" class="sr-only">Choose inbox</label>
                    <select id="inbox-select" class="rounded-md border-0 bg-none pl-3 pr-8 text-base font-medium text-gray-900 focus:ring-2 focus:ring-xupa">
                        <option v-for="item in sidebarNavigation" :key="item.name" :selected="this.isCurrent(item.href)">{{ item.name }}</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center justify-center pr-2">
                        <ChevronDownIcon class="h-5 w-5 text-gray-500" aria-hidden="true" />
                    </div>
                </div>
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
                    <span class="inline-flex">
                        <a @click="$refs.NotificationModal.open = true" class="-mx-1 bg-white p-1 rounded-full text-gray-400 hover:text-gray-500">
                            <span class="sr-only">View notifications</span>
                            <BellIcon class="h-6 w-6" aria-hidden="true" />
                        </a>
                    </span>

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
                            <div class="max-w-8xl mx-auto py-3 px-2 sm:px-4">
                                <template v-for="item in navigation" :key="item.name">
                                    <a :href="item.href" class="block rounded-md py-2 px-3 text-base font-medium text-gray-900 hover:bg-gray-100">{{ item.name }}</a>
                                    <a v-for="child in item.children" :key="child.name" :href="child.href" class="block rounded-md py-2 pl-5 pr-3 text-base font-medium text-gray-500 hover:bg-gray-100">{{ child.name }}</a>
                                </template>
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
            <nav aria-label="Sidebar" class="md:block md:flex-shrink-0 md:bg-gray-800 md:overflow-y-auto">
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

        <NotificationModal ref="NotificationModal" />
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
import NotificationModal from '../Notifications/OverviewModal'

const navigation = [
    {
        name: 'Inboxes',
        href: '#',
        children: [
            { name: 'Technical Support', href: '#' },
            { name: 'Sales', href: '#' },
            { name: 'General', href: '#' }
        ]
    },
    { name: 'Reporting', href: '#', children: [] },
    { name: 'Settings', href: '#', children: [] }
]
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
        XIcon,
        NotificationModal
    },
    methods: {
        route(name, options = {}) {
            return window.route(name, options)
        },
        isCurrent(name) {
            return window.route().current(name)
        }
    },
    setup() {
        const mobileMenuOpen = ref(false)

        return {
            navigation,
            sidebarNavigation,
            userNavigation,
            mobileMenuOpen,
            AlternativeProfilePicture
        }
    }
}
</script>

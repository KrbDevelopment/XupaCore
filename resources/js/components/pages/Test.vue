<template>
    <div class="h-screen overflow-hidden bg-gray-100 flex flex-col">
        <!-- Top nav-->
        <header class="flex-shrink-0 relative h-16 bg-white flex items-center">
            <!-- Logo area -->
            <div class="absolute inset-y-0 left-0 md:static md:flex-shrink-0">
                <a href="#" class="flex items-center justify-center h-16 w-16 bg-xupa focus:outline-none focus:ring-2 focus:ring-inset focus:ring-xupa md:w-20">
                    <svg
                        class="h-6 w-auto"
                        width="100mm"
                        height="100mm"
                        viewBox="0 0 100 100"
                        version="1.1"
                        id="svg8"
                        inkscape:version="1.1 (ce6663b3b7, 2021-05-25)"
                        sodipodi:docname="Xupa-Logo-White.svg"
                        xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
                        xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                        xmlns="http://www.w3.org/2000/svg"
                        xmlns:svg="http://www.w3.org/2000/svg"
                        xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                        xmlns:cc="http://creativecommons.org/ns#"
                        xmlns:dc="http://purl.org/dc/elements/1.1/">
                        <defs
                            id="defs2" />
                        <sodipodi:namedview
                            id="base"
                            pagecolor="#ffffff"
                            bordercolor="#666666"
                            borderopacity="0"
                            inkscape:pageopacity="0.0"
                            inkscape:pageshadow="2"
                            inkscape:zoom="0.7"
                            inkscape:cx="413.57143"
                            inkscape:cy="478.57143"
                            inkscape:document-units="mm"
                            inkscape:current-layer="layer1"
                            inkscape:document-rotation="0"
                            showgrid="false"
                            inkscape:window-width="1920"
                            inkscape:window-height="1067"
                            inkscape:window-x="0"
                            inkscape:window-y="44"
                            inkscape:window-maximized="1"
                            inkscape:pagecheckerboard="0"
                            width="100mm" />
                        <metadata
                            id="metadata5">
                            <rdf:RDF>
                                <cc:Work
                                    rdf:about="">
                                    <dc:format>image/svg+xml</dc:format>
                                    <dc:type
                                        rdf:resource="http://purl.org/dc/dcmitype/StillImage" />
                                </cc:Work>
                            </rdf:RDF>
                        </metadata>
                        <g
                            inkscape:label="Layer 1"
                            inkscape:groupmode="layer"
                            id="layer1">
                            <g
                                id="g41"
                                style="fill:#ffffff;stroke-width:0;stroke-miterlimit:4;stroke-dasharray:none"
                                transform="translate(8.72434,12.821463)">
                                <path
                                    style="fill:#ffffff;stroke:#000000;stroke-width:0;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"
                                    d="M 46.599636,94.872253 84.625364,145.33472 46.710237,195.50359 H 80.958022 L 119.42155,145.42629 80.931498,94.767912 Z"
                                    id="path32" />
                                <path
                                    style="fill:#ffffff;stroke:#000000;stroke-width:0;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"
                                    d="m 127.00615,94.792947 h 34.24644 l -32.46903,42.700033 -17.26203,-22.04415 z"
                                    id="path34" />
                                <path
                                    style="fill:#ffffff;stroke:#000000;stroke-width:0;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"
                                    d="m 129.54532,153.88388 -17.0707,21.42098 15.37062,20.14274 h 33.36935 z"
                                    id="path36" />
                            </g>
                            <g
                                id="g41-5"
                                style="fill:#ffffff;stroke-width:0;stroke-miterlimit:4;stroke-dasharray:none"
                                transform="matrix(0.87219731,0,0,0.99269694,-40.644076,-94.075816)">
                                <path
                                    style="fill:#ffffff;stroke:#000000;stroke-width:0;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"
                                    d="M 46.599636,94.872253 84.625364,145.33472 46.710237,195.50359 H 80.958022 L 119.42155,145.42629 80.931498,94.767912 Z"
                                    id="path32-6" />
                                <path
                                    style="fill:#ffffff;stroke:#000000;stroke-width:0;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"
                                    d="m 127.00615,94.792947 h 34.24644 l -32.46903,42.700033 -17.26203,-22.04415 z"
                                    id="path34-2" />
                                <path
                                    style="fill:#ffffff;stroke:#000000;stroke-width:0;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"
                                    d="m 129.54532,153.88388 -17.0707,21.42098 15.37062,20.14274 h 33.36935 z"
                                    id="path36-9" />
                            </g>
                        </g>
                    </svg>
                </a>
            </div>

            <!-- Picker area -->
            <div class="mx-auto md:hidden">
                <div class="relative">
                    <label for="inbox-select" class="sr-only">Choose inbox</label>
                    <select id="inbox-select" class="rounded-md border-0 bg-none pl-3 pr-8 text-base font-medium text-gray-900 focus:ring-2 focus:ring-xupa">
                        <option v-for="item in sidebarNavigation" :key="item.name" :selected="item.current">{{ item.name }}</option>
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
                        <a href="#" class="-mx-1 bg-white p-1 rounded-full text-gray-400 hover:text-gray-500">
                            <span class="sr-only">View notifications</span>
                            <BellIcon class="h-6 w-6" aria-hidden="true" />
                        </a>
                    </span>

                        <Menu as="div" class="relative inline-block text-left">
                            <MenuButton class="bg-white rounded-full flex text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-xupa">
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full" :src="user.imageUrl" alt="" />
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
                                    <img class="block h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark.svg?color=indigo&shade=500" alt="Workflow" />
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
                                        <img class="h-10 w-10 rounded-full" :src="user.imageUrl" alt="" />
                                    </div>
                                    <div class="ml-3 min-w-0 flex-1">
                                        <div class="text-base font-medium text-gray-800 truncate">{{ user.name }}</div>
                                        <div class="text-sm font-medium text-gray-500 truncate">{{ user.email }}</div>
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
        <div class="min-h-0 flex-1 flex overflow-hidden">
            <!-- Narrow sidebar-->
            <nav aria-label="Sidebar" class="hidden md:block md:flex-shrink-0 md:bg-gray-800 md:overflow-y-auto">
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

const user = {
    name: 'Whitney Francis',
    email: 'whitneyfrancis@example.com',
    imageUrl:
        'https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80'
}
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
        XIcon
    },
    setup() {
        const mobileMenuOpen = ref(false)

        return {
            user,
            navigation,
            sidebarNavigation,
            userNavigation,
            mobileMenuOpen
        }
    }
}
</script>

<template>
    <DashboardLayout>
        <div class="w-full py-10">
            <div class="mx-auto container bg-white shadow rounded">
                <div class="flex flex-col lg:flex-row p-4 lg:p-8 justify-end items-end w-full">
                    <div class="w-full lg:w-2/3 flex flex-col lg:flex-row items-start lg:items-center justify-end">
                        <div class="flex items-center py-3 lg:py-0 lg:px-6">
                            <p class="text-base text-gray-600 dark:text-gray-400" id="page-view">Viewing {{ this.permissions.from ?? 0 }} - {{ this.permissions.to ?? 0 }} of {{ this.permissions.total ?? 0 }}</p>
                            <Link as="a" :href="this.permissions.prev_page_url" v-if="this.permissions.prev_page_url" class="text-gray-600 dark:text-gray-400 ml-2 border-transparent cursor-pointer rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <polyline points="15 6 9 12 15 18" />
                                </svg>
                            </Link>
                            <Link as="a" :href="this.permissions.next_page_url" v-if="this.permissions.next_page_url" class="text-gray-600 dark:text-gray-400 border-transparent rounded focus:outline-none cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <polyline points="9 6 15 12 9 18" />
                                </svg>
                            </Link>
                        </div>
                    </div>
                </div>
                <div class="w-full overflow-x-scroll xl:overflow-x-hidden">
                    <table class="min-w-full bg-white dark:bg-gray-800">
                        <thead>
                        <tr class="w-full h-16 border-gray-300 border-b py-8">
                            <th class="pl-8 text-gray-600 dark:text-gray-400 font-normal pr-6 text-left text-sm tracking-normal leading-4">ID</th>
                            <th class="text-gray-600 dark:text-gray-400 font-normal pr-6 text-left text-sm tracking-normal leading-4">Name</th>
                            <th class="text-gray-600 dark:text-gray-400 font-normal pr-6 text-left text-sm tracking-normal leading-4">Guard</th>
                            <th class="text-gray-600 dark:text-gray-400 font-normal pr-6 text-left text-sm tracking-normal leading-4">Description</th>
                            <th class="text-gray-600 dark:text-gray-400 font-normal pr-6 text-left text-sm tracking-normal leading-4">Roles</th>
                            <th class="text-gray-600 dark:text-gray-400 font-normal pr-6 text-left text-sm tracking-normal leading-4">Date</th>
                            <td class="text-gray-600 dark:text-gray-400 font-normal pr-8 text-left text-sm tracking-normal leading-4">More</td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="h-24 border-gray-300 border-b" v-for="permission in this.permissions.data" v-bind:key="permission.id">
                            <td class="pl-8 pr-6 text-sm whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">#R{{ permission.id }}</td>
                            <td class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">{{ permission.name }}</td>
                            <td class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">{{ permission.guard_name }}</td>
                            <td class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">{{ permission.description?.substr(0, 150) }}...</td>
                            <td class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">{{ permission.roles_count }}</td>
                            <td class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">{{ formatDate(permission.created_at) }}</td>
                            <td class="pr-8 relative">
                                <Menu as="div" class="relative inline-block text-left">
                                    <MenuButton class="bg-white rounded-full flex text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-xupa">
                                        <span class="sr-only">Open dropdown menu</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-dots-vertical dropbtn" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <circle cx="12" cy="12" r="1" />
                                            <circle cx="12" cy="19" r="1" />
                                            <circle cx="12" cy="5" r="1" />
                                        </svg>
                                    </MenuButton>

                                    <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                                        <MenuItems class="origin-top-right absolute z-30 right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
                                            <div class="py-1">
                                                <MenuItem v-slot="{ active }">
                                                    <Link as="a" :href="route('permissions.render.permissions.detail', { permission: permission.id })" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">
                                                        Open
                                                    </Link>
                                                </MenuItem>
                                            </div>
                                        </MenuItems>
                                    </transition>
                                </Menu>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </DashboardLayout>
</template>

<script>
import DashboardLayout from '../../Layout/Dashboard'
import moment from 'moment'
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
import { Link } from '@inertiajs/inertia-vue3'

export default {
    props: ['permissions'],
    components: {
        DashboardLayout,
        Menu,
        MenuButton,
        MenuItem,
        MenuItems,
        Link
    },
    methods: {
        route(name, options = {}) {
            return window.route(name, options)
        },
        formatDate(date) {
            return moment(new Date(date)).format('MMMM Do YYYY • H:mma')
        }
    }
}
</script>

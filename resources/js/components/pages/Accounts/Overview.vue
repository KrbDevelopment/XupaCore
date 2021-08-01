<template>
    <DashboardLayout>
        <div class="w-full bg-gray-200 py-10">
            <div class="mx-auto container bg-white dark:bg-gray-800 dark:bg-gray-800 shadow rounded">
                <div class="flex flex-col lg:flex-row p-4 lg:p-8 justify-between items-start lg:items-stretch w-full">
                    <div class="w-full lg:w-1/3 flex flex-col lg:flex-row items-start lg:items-center">
                        <div class="flex items-center">
                            <a class="text-gray-600 dark:text-gray-400 p-2 border-transparent border bg-gray-100 dark:hover:bg-gray-600 dark:bg-gray-700 hover:bg-gray-200 cursor-pointer rounded focus:outline-none focus:border-gray-800 focus:shadow-outline-gray" href="javascript: void(0)">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon cursor-pointer icon-tabler icon-tabler-edit" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                    <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                    <line x1="16" y1="5" x2="19" y2="8" />
                                </svg>
                            </a>
                            <a class="text-gray-600 dark:text-gray-400 mx-2 p-2 border-transparent border bg-gray-100 dark:hover:bg-gray-600 dark:bg-gray-700 hover:bg-gray-200 cursor-pointer rounded focus:outline-none focus:border-gray-800 focus:shadow-outline-gray" href="javascript: void(0)">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon cursor-pointer icon-tabler icon-tabler-settings" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                            </a>
                            <a class="text-red-500 p-2 border-transparent border bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 hover:bg-gray-200 cursor-pointer rounded focus:outline-none focus:border-gray-800 focus:shadow-outline-gray" href="javascript: void(0)">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon cursor-pointer icon-tabler icon-tabler-trash" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <line x1="4" y1="7" x2="20" y2="7" />
                                    <line x1="10" y1="11" x2="10" y2="17" />
                                    <line x1="14" y1="11" x2="14" y2="17" />
                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="w-full lg:w-2/3 flex flex-col lg:flex-row items-start lg:items-center justify-end">
                        <div class="flex items-center pb-3 lg:pb-0 lg:px-6">
                            <a class="text-gray-600 dark:text-gray-400 mr-2 p-2 border-transparent border bg-gray-100 dark:hover:bg-gray-600 dark:bg-gray-700 hover:bg-gray-200 cursor-pointer rounded focus:outline-none focus:border-gray-800 focus:shadow-outline-gray" href="javascript: void(0)">
                                <ViewGridIcon class="h-4 w-4" />
                            </a>
                            <a class="text-gray-600 dark:text-gray-400 mr-2 p-2 border-transparent border bg-gray-100 dark:hover:bg-gray-600 dark:bg-gray-700 hover:bg-gray-200 cursor-pointer rounded focus:outline-none focus:border-gray-800 focus:shadow-outline-gray" href="javascript: void(0)">
                                <ViewListIcon class="h-4 w-4" />
                            </a>
                        </div>

                        <div class="flex items-center lg:border-l border-gray-300 py-3 lg:py-0 lg:pl-6">
                            <p class="text-base text-gray-600 dark:text-gray-400" id="page-view">Viewing 1 - 20 of 60</p>
                            <a class="text-gray-600 dark:text-gray-400 ml-2 border-transparent border cursor-pointer rounded" onclick="pageView(false)">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <polyline points="15 6 9 12 15 18" />
                                </svg>
                            </a>
                            <a class="text-gray-600 dark:text-gray-400 border-transparent border rounded focus:outline-none cursor-pointer" onclick="pageView(true)">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <polyline points="9 6 15 12 9 18" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="w-full overflow-x-scroll xl:overflow-x-hidden">
                    <table class="min-w-full bg-white dark:bg-gray-800">
                        <thead>
                        <tr class="w-full h-16 border-gray-300 border-b py-8">
                            <th class="pl-8 text-gray-600 pr-2 dark:text-gray-400 font-normal text-left text-sm tracking-normal leading-4">
                                <input type="checkbox" class="cursor-pointer relative w-5 h-5 border rounded border-gray-400 bg-white dark:bg-gray-800 outline-none" @click="checkAll(this)" />
                            </th>
                            <th class="text-gray-600 pr-2 dark:text-gray-400 font-normal text-left text-sm tracking-normal leading-4"></th>
                            <th class="text-gray-600 pr-2 dark:text-gray-400 font-normal text-left text-sm tracking-normal leading-4">Firstname</th>
                            <th class="text-gray-600 pr-2 dark:text-gray-400 font-normal text-left text-sm tracking-normal leading-4">Lastname</th>
                            <th class="text-gray-600 pr-2 dark:text-gray-400 font-normal text-left text-sm tracking-normal leading-4">Username</th>
                            <th class="text-gray-600 pr-2 dark:text-gray-400 font-normal text-left text-sm tracking-normal leading-4">Email</th>
                            <th class="text-gray-600 pr-2 dark:text-gray-400 font-normal text-left text-sm tracking-normal leading-4">Last Update</th>
                            <th class="text-gray-600 pr-2 dark:text-gray-400 font-normal text-left text-sm tracking-normal leading-4">Created at</th>
                            <td class="text-gray-600 pr-2 dark:text-gray-400 font-normal text-left text-sm tracking-normal leading-4"></td>
                        </tr>
                        </thead>
                        <tbody>
                            <tr class="h-24 border-gray-300 border-b" v-for="account in allAccounts">
                                <td class="pl-8 text-left whitespace-no-wrap text-sm text-gray-800 dark:text-gray-100 tracking-normal leading-4">
                                    <input type="checkbox" class="cursor-pointer relative w-5 h-5 border rounded border-gray-400 bg-white dark:bg-gray-800 outline-none" @click="tableInteract(this)" />
                                </td>
                                <td class="pr-6 whitespace-no-wrap">
                                    <div class="flex items-center">
                                        <div class="h-8 w-8">
                                            <img :src="this.route('user.profile_image', account.id)" alt="" class="h-full w-full rounded-full overflow-hidden shadow" />
                                        </div>
                                    </div>
                                </td>
                                <td class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">
                                    {{ account.first_name }}
                                </td>
                                <td class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">
                                    {{ account.last_name }}
                                </td>
                                <td class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">
                                    {{ account.username }}
                                </td>
                                <td class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">
                                    {{ account.email }}
                                </td>
                                <td class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">
                                    {{ account.updated_at }}
                                </td>
                                <td class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">
                                    {{ account.created_at }}
                                </td>
                                <td class="pr-8 relative">
                                    <div class="dropdown-content mt-8 absolute left-0 -ml-12 shadow-md z-10 hidden w-32">
                                        <ul class="bg-white dark:bg-gray-800 shadow rounded py-1">
                                            <li class="cursor-pointer text-gray-600 dark:text-gray-400 text-sm leading-3 tracking-normal py-3 hover:bg-indigo-700 hover:text-white px-3 font-normal">Edit</li>
                                            <li class="cursor-pointer text-gray-600 dark:text-gray-400 text-sm leading-3 tracking-normal py-3 hover:bg-indigo-700 hover:text-white px-3 font-normal">Delete</li>
                                            <li class="cursor-pointer text-gray-600 dark:text-gray-400 text-sm leading-3 tracking-normal py-3 hover:bg-indigo-700 hover:text-white px-3 font-normal">Duplicate</li>
                                        </ul>
                                    </div>
                                    <button class="text-gray-500 rounded cursor-pointer border border-transparent focus:outline-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" @click="dropdownFunction(this)" class="icon icon-tabler icon-tabler-dots-vertical dropbtn" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <circle cx="12" cy="12" r="1" />
                                            <circle cx="12" cy="19" r="1" />
                                            <circle cx="12" cy="5" r="1" />
                                        </svg>
                                    </button>
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
import DashboardLayout from '../Layout/Dashboard'
import { ViewGridIcon, ViewListIcon } from '@heroicons/vue/outline'

export default {
    props: ['allAccounts'],
    data() {
        return {
            temp: 0
        }
    },
    components: {
        DashboardLayout,
        ViewGridIcon,
        ViewListIcon
    },
    methods: {
        checkAll(event) {
            const rows = event.currentTarget.parentElement.parentElement.parentElement.nextElementSibling.children
            for (let i = 0; i < rows.length; i++) {
                if (event.currentTarget.checked) {
                    rows[i].classList.add('bg-gray-100')
                    const checkbox = rows[i].getElementsByTagName('input')[0]
                    if (checkbox) {
                        checkbox.checked = true
                    }
                } else {
                    rows[i].classList.remove('bg-gray-100')
                    const checkbox = rows[i].getElementsByTagName('input')[0]
                    if (checkbox) {
                        checkbox.checked = false
                    }
                }
            }
        },
        tableInteract(event) {
            const single = event.currentTarget.parentElement.parentElement
            single.classList.toggle('bg-gray-100')
        },
        pageView(val) {
            const text = document.getElementById('page-view')
            if (val) {
                if (this.$data.temp === 2) {
                    this.$data.temp = 0
                } else {
                    this.$data.temp = this.$data.temp + 1
                }
            } else if (this.$data.temp !== 0) {
                this.$data.temp = this.$data.temp - 1
            }
            switch (this.$data.temp) {
            case 0:
                text.innerHTML = 'Viewing 1 - 20 of 60'
                break
            case 1:
                text.innerHTML = 'Viewing 21 - 40 of 60'
                break
            case 2:
                text.innerHTML = 'Viewing 41 - 60 of 60'
            }
        },
        route(name, options = {}) {
            return window.route(name, options)
        }
    },
    created() {
        document.addEventListener('click', this.documentClick)
    },
    unmounted() {
        document.removeEventListener('click', this.documentClick)
    }
}
</script>

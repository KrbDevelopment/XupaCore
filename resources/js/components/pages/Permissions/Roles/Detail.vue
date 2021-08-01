<template>
    <DashboardLayout>
        <div class="flex-1 flex flex-col">
            <!-- Breadcrumb -->
            <nav aria-label="Breadcrumb" class="bg-white border-b border-blue-gray-200 xl:hidden">
                <div class="max-w-3xl mx-auto py-3 px-4 flex items-start sm:px-6 lg:px-8">
                    <span class="-ml-1 inline-flex items-center space-x-3 text-sm font-medium text-blue-gray-900">
                        <ChevronLeftIcon class="h-5 w-5 text-blue-gray-400" aria-hidden="true" />
                        <span>Administrator</span>
                    </span>
                </div>
            </nav>

            <div class="flex-1 flex">
                <!-- Secondary sidebar -->
                <nav aria-label="Sections" class="hidden flex-shrink-0 w-96 bg-white border-r border-blue-gray-200 xl:flex xl:flex-col">
                    <div class="flex-shrink-0 h-16 px-6 border-b border-blue-gray-200 flex items-center">
                        <p class="text-lg font-medium text-blue-gray-900">Administrator</p>
                    </div>
                    <div class="flex-1 min-h-0 overflow-y-auto">
                        <a v-for="item in subNavigation" :key="item.name" :href="item.href" :class="[item.current ? 'bg-blue-50 bg-opacity-50' : 'hover:bg-blue-50 hover:bg-opacity-50', 'flex p-6 border-b border-blue-gray-200']" :aria-current="item.current ? 'page' : undefined">
                            <component :is="item.icon" class="flex-shrink-0 -mt-0.5 h-6 w-6 text-blue-gray-400" aria-hidden="true" />
                            <div class="ml-3 text-sm">
                                <p class="font-medium text-blue-gray-900">{{ item.name }}</p>
                                <p class="mt-1 text-blue-gray-500">{{ item.description }}</p>
                            </div>
                        </a>
                    </div>
                </nav>

                <!-- Main content -->
                <div class="flex-1 py-8 px-12">
                    <slot />
                </div>
            </div>
        </div>
    </DashboardLayout>
</template>

<script>
import DashboardLayout from '../../Layout/Dashboard'
import { Dialog, DialogOverlay, TransitionChild, TransitionRoot } from '@headlessui/vue'
import {
    BellIcon,
    CogIcon,
    KeyIcon,
    MenuIcon,
    ViewGridAddIcon,
    XIcon
} from '@heroicons/vue/outline'
import { ChevronLeftIcon } from '@heroicons/vue/solid'

export default {
    props: ['role'],
    components: {
        DashboardLayout,
        Dialog,
        DialogOverlay,
        TransitionChild,
        TransitionRoot,
        ChevronLeftIcon,
        MenuIcon,
        XIcon
    },
    data() {
        return {
            subNavigation: [
                {
                    name: 'Settings',
                    description: 'Here you can see and edit the basic role preferences',
                    href: this.route('permissions.render.roles.detail.settings', { role: this.role.id }),
                    icon: CogIcon,
                    current: true
                },
                {
                    name: 'Access',
                    description: 'Here you can see current members of this role and invite new users',
                    href: this.route('permissions.render.roles.detail.access', { role: this.role.id }),
                    icon: KeyIcon,
                    current: false
                },
                {
                    name: 'Notifications',
                    description: 'Here you can see and create role related notifications to the members',
                    href: this.route('permissions.render.roles.detail.notifications', { role: this.role.id }),
                    icon: BellIcon,
                    current: false
                },
                {
                    name: 'Integrations',
                    description: 'Here you can see the integrations, which are in use for your role',
                    href: this.route('permissions.render.roles.detail.integrations', { role: this.role.id }),
                    icon: ViewGridAddIcon,
                    current: false
                }
            ]
        }
    },
    methods: {
        route(name, options = {}) {
            return window.route(name, options)
        },
        isCurrent(name) {
            return window.route().current(name)
        }
    }
}
</script>

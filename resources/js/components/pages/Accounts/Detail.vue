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
                        <Link as="a" :href="this.route('permissions.render.roles.detail.settings', { role: this.role.id })" class="hover:bg-blue-50 hover:bg-opacity-50 flex p-6 border-b border-blue-gray-200">
                            <CogIcon class="flex-shrink-0 -mt-0.5 h-6 w-6 text-blue-gray-400" aria-hidden="true" />
                            <div class="ml-3 text-sm">
                                <p class="font-medium text-blue-gray-900">Settings</p>
                                <p class="mt-1 text-blue-gray-500">Here you can see and edit the basic role preferences</p>
                            </div>
                        </Link>

                        <Link as="a" :href="this.route('permissions.render.roles.detail.access', { role: this.role.id })" class="hover:bg-blue-50 hover:bg-opacity-50 flex p-6 border-b border-blue-gray-200">
                            <KeyIcon class="flex-shrink-0 -mt-0.5 h-6 w-6 text-blue-gray-400" aria-hidden="true" />
                            <div class="ml-3 text-sm">
                                <p class="font-medium text-blue-gray-900">Access</p>
                                <p class="mt-1 text-blue-gray-500">Here you can see current members of this role and invite new users</p>
                            </div>
                        </Link>

                        <Link as="a" :href="this.route('permissions.render.roles.detail.notifications', { role: this.role.id })" class="hover:bg-blue-50 hover:bg-opacity-50 flex p-6 border-b border-blue-gray-200">
                            <BellIcon class="flex-shrink-0 -mt-0.5 h-6 w-6 text-blue-gray-400" aria-hidden="true" />
                            <div class="ml-3 text-sm">
                                <p class="font-medium text-blue-gray-900">Notifications</p>
                                <p class="mt-1 text-blue-gray-500">Here you can see current members of this role and invite new users</p>
                            </div>
                        </Link>

                        <Link as="a" :href="this.route('permissions.render.roles.detail.integrations', { role: this.role.id })" class="hover:bg-blue-50 hover:bg-opacity-50 flex p-6 border-b border-blue-gray-200">
                            <ViewGridAddIcon class="flex-shrink-0 -mt-0.5 h-6 w-6 text-blue-gray-400" aria-hidden="true" />
                            <div class="ml-3 text-sm">
                                <p class="font-medium text-blue-gray-900">Integrations</p>
                                <p class="mt-1 text-blue-gray-500">Here you can see the integrations, which are in use for your role</p>
                            </div>
                        </Link>
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
import { ChevronLeftIcon } from '@heroicons/vue/solid'
import { CogIcon, KeyIcon, BellIcon, ViewGridAddIcon } from '@heroicons/vue/outline'
import { Link } from '@inertiajs/inertia-vue3'

export default {
    props: ['role'],
    components: {
        DashboardLayout,
        ChevronLeftIcon,
        Link,
        CogIcon,
        KeyIcon,
        BellIcon,
        ViewGridAddIcon
    },
    data() {
        return {}
    },
    methods: {
        route(name, options = {}) {
            return window.route(name, options)
        }
    }
}
</script>

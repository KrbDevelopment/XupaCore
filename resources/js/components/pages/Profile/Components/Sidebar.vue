<template>
    <div class="col-span-12 w-full px-3 justify-center flex space-x-4 md:space-x-0 md:flex-col md:col-span-2 md:justify-start">
        <div class="flex items-center justify-center">
            <div class="flex w-full max-w-xs p-4">
                <ul class="flex flex-col w-full">
                    <li class="my-px">
                        <span class="flex font-medium text-sm text-gray-400 px-4 my-4 uppercase">Navigation</span>
                    </li>
                    <li class="my-px">
                        <Link :href="this.route('profile.render.general')" as="a" :class="[this.isCurrent('profile.render.general') ? 'bg-gray-100' : 'hover:bg-gray-100', 'flex flex-row items-center h-12 px-4 rounded-lg text-gray-600']">
                            <span class="flex items-center justify-center text-lg text-gray-400">
                                <UserIcon class="h-5 w-5"/>
                            </span>
                            <span class="ml-3">General</span>
                        </Link>
                    </li>
                    <li class="my-px">
                        <Link :href="this.route('profile.render.security')" as="a" :class="[this.isCurrent('profile.render.security') ? 'bg-gray-100' : 'hover:bg-gray-100', 'flex flex-row items-center h-12 px-4 rounded-lg text-gray-600']">
                            <span class="flex items-center justify-center text-lg text-gray-400">
                                <LockClosedIcon class="h-5 w-5"/>
                            </span>
                            <span class="ml-3">Security</span>
                        </Link>
                    </li>
                    <li class="my-px">
                        <Link :href="this.route('profile.render.notifications')" as="a" :class="[this.isCurrent('profile.render.notifications') ? 'bg-gray-100' : 'hover:bg-gray-100', 'flex flex-row items-center h-12 px-4 rounded-lg text-gray-600']">
                            <span class="flex items-center justify-center text-lg text-gray-400">
                                <AnnotationIcon class="h-5 w-5"/>
                            </span>
                            <span class="ml-3">Notifications</span>
                        </Link>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
import { LockClosedIcon, AnnotationIcon, UserIcon } from '@heroicons/vue/outline'
import { Link } from '@inertiajs/inertia-vue3'

export default {
    name: 'Sidebar',
    components: {
        LockClosedIcon,
        AnnotationIcon,
        UserIcon,
        Link
    },
    methods: {
        route(routeName, data = {}) {
            return window.route(routeName, data)
        },
        isCurrent(name) {
            return window.route().current(name)
        }
    }
}
</script>

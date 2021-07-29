<template>
    <div class="col-span-12 w-full px-3 justify-center flex space-x-4 md:space-x-0 md:flex-col md:col-span-2 md:justify-start">
        <div class="flex items-center justify-center">
            <div class="flex w-full max-w-xs p-4">
                <ul class="flex flex-col w-full">
                    <li class="my-px">
                        <span class="flex font-medium text-sm text-gray-400 px-4 my-4 uppercase">Navigation</span>
                    </li>
                    <li class="my-px">
                        <a href="#" class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-600 hover:bg-gray-100 bg-gray-100">
                                    <span class="flex items-center justify-center text-lg text-gray-400">
                                        <UserIcon class="h-5 w-5"/>
                                    </span>
                            <span class="ml-3">General</span>
                        </a>
                    </li>
                    <li class="my-px">
                        <a href="#" class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-600 hover:bg-gray-100">
                                    <span class="flex items-center justify-center text-lg text-gray-400">
                                        <LockClosedIcon class="h-5 w-5"/>
                                    </span>
                            <span class="ml-3">Security</span>
                        </a>
                    </li>
                    <li class="my-px">
                        <a href="#" class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-600 hover:bg-gray-100">
                                    <span class="flex items-center justify-center text-lg text-gray-400">
                                        <AnnotationIcon class="h-5 w-5"/>
                                    </span>
                            <span class="ml-3">Notifications</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
import { LockClosedIcon, AnnotationIcon, UserIcon } from '@heroicons/vue/outline'

export default {
    name: 'Sidebar',
    components: {
        LockClosedIcon,
        AnnotationIcon,
        UserIcon
    }
}
</script>

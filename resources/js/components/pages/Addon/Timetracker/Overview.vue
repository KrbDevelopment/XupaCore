<template>
    <DashboardLayout>
        <div class="w-full p-10">
            <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-3 md:grid-cols-2 lg:grid-cols-6">
                <li v-for="person in people" :key="person.email" class="col-span-1 bg-white rounded-lg shadow divide-y divide-gray-200">
                    <a href="" class="c-card block bg-white shadow-md hover:shadow-xl rounded-lg overflow-hidden">
                        <div class="relative pb-48 overflow-hidden">
                            <img class="absolute inset-0 h-full w-full object-cover" src="https://images.unsplash.com/photo-1475855581690-80accde3ae2b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80" alt="" />
                        </div>
                        <div class="p-4">
                            <h2 class="mt-2 mb-2 font-bold">Purus Ullamcorper Inceptos Nibh</h2>
                            <p class="text-sm">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec ullamcorper nulla non metus auctor fringilla.</p>
                        </div>
                        <div class="w-full h-1 bg-xupa">

                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </DashboardLayout>
</template>

<script>
import DashboardLayout from '../../Layout/Dashboard'
import { MailIcon, PhoneIcon } from '@heroicons/vue/solid'

export default {
    components: {
        DashboardLayout,
        MailIcon,
        PhoneIcon
    },
    setup() {
        const people = []

        for (let i = 0; i < 25; i++) {
            people.push({
                title: 'Paradigm Repres',
                description: 'Lorem ipsum',
                imageUrl:
                    'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60',
            })
        }

        return {
            people
        }
    }
}
</script>

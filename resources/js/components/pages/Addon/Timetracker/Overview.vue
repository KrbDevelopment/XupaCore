<template>
    <DashboardLayout>
        <div class="w-full p-10">
            <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-3 md:grid-cols-2 lg:grid-cols-6">
                <li v-for="timetracker in timetrackers" :key="timetracker.email" class="col-span-1 bg-white rounded-lg shadow divide-y divide-gray-200">
                    <a href="" class="c-card block bg-white shadow-md hover:shadow-xl rounded-lg overflow-hidden">
                        <div class="relative pb-48 overflow-hidden">
                            <img class="absolute inset-0 h-full w-full object-cover" :src="timetracker.image" alt="" />
                        </div>
                        <div class="p-4">
                            <h2 class="mt-2 mb-2 font-bold">{{ timetracker.title }}</h2>
                            <p class="text-sm">
                                {{ timetracker.description }}
                            </p>
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

export default {
    components: {
        DashboardLayout
    },
    setup() {
        const timetrackers = []

        for (let i = 0; i < 25; i++) {
            timetrackers.push({
                title: 'Timetracker',
                description: 'Eine Timetracker mappe welche Privat oder passend zu einem Projekt genutzt werden kann',
                image: 'https://i.ibb.co/WV099sR/1a322f68096147-5b50d1d9dc776.jpg'
            })
        }

        return {
            timetrackers
        }
    }
}
</script>

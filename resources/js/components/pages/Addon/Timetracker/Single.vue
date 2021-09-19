<template>
    <DashboardLayout>
        <div class="w-full p-10">
            <div class="relative pb-5 border-b border-gray-200 sm:pb-0">
                <div class="md:flex md:items-center md:justify-between">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Xupa Projectplanning software
                    </h3>
                    <div class="mt-3 flex md:mt-0 md:absolute md:top-3 md:right-0">
                        <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-xupa">
                            Go Back
                        </button>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="sm:hidden">
                        <label for="current-tab" class="sr-only">Select a tab</label>
                        <select id="current-tab" name="current-tab" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-xupa focus:border-xupa sm:text-sm rounded-md">
                            <option v-for="tab in tabs" :key="tab.name" :selected="tab.current" class="text-xupa">{{ tab.name }}</option>
                        </select>
                    </div>
                    <div class="hidden sm:block">
                        <nav class="-mb-px flex space-x-8">
                            <a v-for="tab in tabs" :key="tab.name" :href="tab.href" :class="[tab.current ? 'border-xupa-dark text-xupa' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300', 'whitespace-nowrap pb-4 px-1 border-b-2 font-medium text-sm']" :aria-current="tab.current ? 'page' : undefined">
                                {{ tab.name }}
                            </a>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="flex flex-col lg:flex-row gap-8 py-5">
                <div class="w-full lg:w-9/12 flex flex-col gap-y-8">
                    <div class="bg-white p-10 rounded-lg">
                        <div class="px-4 py-2 sm:px-6">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                Current Session
                            </h3>
                            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                Overview & Tasks
                            </p>
                        </div>
                        <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                            <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                                <div class="sm:col-span-1">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Title
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900">
                                        Timetracker Frontend
                                    </dd>
                                </div>
                                <div class="sm:col-span-1">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Related Project
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900">
                                        Xupa Projectplanning software
                                    </dd>
                                </div>
                                <div class="sm:col-span-1">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Started at
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900">
                                        23:10, Sep 19 2021
                                    </dd>
                                </div>
                                <div class="sm:col-span-1">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Time target
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900">
                                        23:30, Sep 19 2021
                                    </dd>
                                </div>
                                <div class="sm:col-span-2">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Short description
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900">
                                        Fugiat ipsum ipsum deserunt culpa aute sint do nostrud anim incididunt cillum culpa consequat. Excepteur qui ipsum aliquip consequat sint. Sit id mollit nulla mollit nostrud in ea officia proident. Irure nostrud pariatur mollit ad adipisicing reprehenderit deserunt qui eu.
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                    <div class="bg-white p-10 rounded-lg">
                        <fieldset>
                            <legend class="text-lg font-medium text-gray-900 mx-4">Tasks</legend>
                            <div class="mt-4 border-t border-b border-gray-200 divide-y divide-gray-200">
                                <div v-for="(task, taskIdx) in tasks" :key="taskIdx" class="relative flex items-start py-4 mx-4">
                                    <div class="min-w-0 flex-1 text-sm">
                                        <label :for="`person-${task.id}`" class="font-medium text-gray-700 select-none cursor-pointer">{{ task.title }}</label>
                                    </div>
                                    <div class="ml-3 flex items-center h-5">
                                        <input :id="`person-${task.id}`" :name="`task-${task.id}`" type="checkbox" class="cursor-pointer focus:ring-xupa h-4 w-4 text-xupa-dark border-gray-300 rounded" />
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-between text-gray-900 pt-5">
                                <div>
                                    0/{{ tasks.length }} Tasks
                                </div>
                                <div>
                                    0%
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class="w-full lg:w-3/12 flex flex-col gap-y-8">
                    <div class="bg-white p-10 rounded-lg">
                        <div class="flex justify-between">
                            <h3 class="text-lg leading-6 font-medium text-gray-600">
                                Current Session
                            </h3>
                            <div>
                                <DotsHorizontalIcon class="flex-shrink-0 h-5 w-5 text-gray-600 cursor-pointer" />
                            </div>
                        </div>
                        <div class="text-center self-center py-16">
                            <h4 class="text-gray-900 text-xl">
                                Timer
                            </h4>
                            <h2 class="font-medium text-5xl">
                                00:08:15
                            </h2>
                            <PlayIcon class="flex-shrink-0 h-16 w-16 text-xupa mx-auto mt-10 cursor-pointer" />
                        </div>
                    </div>
                    <div class="bg-white p-10 rounded-lg">
                        <div class="flex justify-between pb-5">
                            <h4 class="text-gray-900 text-xl">
                                Last actions
                            </h4>
                            <div class="bg-xupa hover:bg-xupa-dark rounded-lg px-4 py-1 text-white cursor-pointer">
                                See more
                            </div>
                        </div>
                        <div class="flow-root">
                            <ul role="list" class="-mb-8">
                                <li v-for="(event, eventIdx) in timeline" :key="event.id">
                                    <div class="relative pb-8">
                                        <span v-if="(eventIdx !== timeline.length - 1)" class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true" />
                                        <div class="relative flex space-x-3">
                                            <div>
                                  <span :class="[event.iconBackground, 'h-8 w-8 rounded-full flex items-center justify-center ring-8 ring-white']">
                                    <component :is="event.icon" class="h-5 w-5 text-white" aria-hidden="true" />
                                  </span>
                                            </div>
                                            <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                                <div>
                                                    <p class="text-sm text-gray-500">
                                                        {{ event.content }} <a :href="event.href" class="font-medium text-gray-900">{{ event.target }}</a>
                                                    </p>
                                                </div>
                                                <div class="text-right text-sm whitespace-nowrap text-gray-500">
                                                    <time :datetime="event.datetime">{{ event.date }}</time>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </DashboardLayout>
</template>

<script>
import DashboardLayout from '../../Layout/Dashboard'
import { CheckIcon, ThumbUpIcon, UserIcon, PlayIcon, DotsHorizontalIcon } from '@heroicons/vue/solid'
const tabs = [
    { name: 'Current Session', href: '#', current: true },
    { name: 'Session History', href: '#', current: false },
    { name: 'Settings', href: '#', current: false }
]
const timeline = [
    {
        id: 1,
        content: 'Applied to',
        target: 'Front End Developer',
        href: '#',
        date: 'Sep 20',
        datetime: '2020-09-20',
        icon: UserIcon,
        iconBackground: 'bg-gray-400'
    },
    {
        id: 2,
        content: 'Advanced to phone screening by',
        target: 'Bethany Blake',
        href: '#',
        date: 'Sep 22',
        datetime: '2020-09-22',
        icon: ThumbUpIcon,
        iconBackground: 'bg-blue-500'
    },
    {
        id: 3,
        content: 'Completed phone screening with',
        target: 'Martha Gardner',
        href: '#',
        date: 'Sep 28',
        datetime: '2020-09-28',
        icon: CheckIcon,
        iconBackground: 'bg-green-500'
    },
    {
        id: 4,
        content: 'Advanced to interview by',
        target: 'Bethany Blake',
        href: '#',
        date: 'Sep 30',
        datetime: '2020-09-30',
        icon: ThumbUpIcon,
        iconBackground: 'bg-blue-500'
    },
    {
        id: 5,
        content: 'Completed interview with',
        target: 'Katherine Snyder',
        href: '#',
        date: 'Oct 4',
        datetime: '2020-10-04',
        icon: CheckIcon,
        iconBackground: 'bg-green-500'
    }
]
const tasks = [
    { id: 1, title: 'Layout management' },
    { id: 2, title: 'Finish Mockups' },
    { id: 3, title: 'Fix Responsive design' },
    { id: 4, title: 'Add placeholder content' },
    { id: 5, title: 'Write documentation' }
]

export default {
    name: 'Single',
    components: {
        DashboardLayout,
        PlayIcon,
        DotsHorizontalIcon
    },
    setup() {
        return {
            timeline,
            tasks,
            tabs
        }
    }
}
</script>

<template>
    <DashboardLayout>
        <div class="w-full p-10">
            <Header></Header>
            <div class="flex flex-col lg:flex-row gap-8 py-5">
                <div class="w-full lg:w-9/12 flex flex-col gap-y-8">
                    <div class="bg-white p-10 rounded-lg">
                        <div class="px-4 py-2 sm:px-6">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                Session Histories
                            </h3>
                            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                Session management & overview
                            </p>
                        </div>
                    </div>
                    <div>
                        <dl class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
                            <div v-for="item in stats" :key="item.id" class="relative bg-white pt-5 px-4 pb-12 sm:pt-6 sm:px-6 shadow rounded-lg overflow-hidden">
                                <dt>
                                    <div class="absolute bg-xupa-light rounded-md p-3">
                                        <component :is="item.icon" class="h-6 w-6 text-white" aria-hidden="true" />
                                    </div>
                                    <p class="ml-16 text-sm font-medium text-gray-500 truncate">{{ item.name }}</p>
                                </dt>
                                <dd class="ml-16 pb-6 flex items-baseline sm:pb-7">
                                    <p class="text-2xl font-semibold text-gray-900">
                                        {{ item.stat }}
                                    </p>
                                    <p :class="[item.changeType === 'increase' ? 'text-green-600' : 'text-red-600', 'ml-2 flex items-baseline text-sm font-semibold']">
                                        <ArrowSmUpIcon v-if="item.changeType === 'increase'" class="self-center flex-shrink-0 h-5 w-5 text-green-500" aria-hidden="true" />
                                        <ArrowSmDownIcon v-else class="self-center flex-shrink-0 h-5 w-5 text-red-500" aria-hidden="true" />
                                        <span class="sr-only"> {{ item.changeType === 'increase' ? 'Increased' : 'Decreased' }} by </span>
                                        {{ item.change }}
                                    </p>
                                    <div class="absolute bottom-0 inset-x-0 bg-gray-50 px-4 py-4 sm:px-6">
                                        <div class="text-sm">
                                            <a href="#" class="font-medium text-xupa hover:text-xupa-dark">
                                                View all<span class="sr-only"> {{ item.name }} stats</span></a
                                            >
                                        </div>
                                    </div>
                                </dd>
                            </div>
                        </dl>
                    </div>
                    <div class="bg-white rounded-lg">
                        <ul role="list" class="divide-y divide-gray-200">
                            <li v-for="session in sessions" :key="session.session.id">
                                <a class="block hover:bg-gray-50">
                                    <div class="flex items-center px-4 py-4 sm:px-6">
                                        <div class="min-w-0 flex-1 flex items-center">
                                            <div class="flex-shrink-0">
                                                <img class="h-12 w-12 rounded-full object-cover" :src="profile_image" alt="" />
                                            </div>
                                            <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                                                <div>
                                                    <p class="text-sm font-medium text-xupa truncate">{{ session.session.title }}</p>
                                                    <p class="mt-2 flex items-center text-sm text-gray-500">
                                                        <CollectionIcon class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" aria-hidden="true" />
                                                        <span class="truncate">{{ session.session.project }}</span>
                                                    </p>
                                                </div>
                                                <div class="hidden md:block">
                                                    <div>
                                                        <p class="text-sm text-gray-900">
                                                            Started at
                                                            {{ ' ' }}
                                                            <time :datetime="session.session.started_at">{{ session.session.started_at }}</time>
                                                        </p>
                                                        <p class="mt-2 flex items-center text-sm text-gray-500">
                                                            <component :is="session.icon" :class="'flex-shrink-0 mr-1.5 h-5 w-5 ' + (session.color)" aria-hidden="true" />
                                                            {{ session.state }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <ChevronRightIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="hover:bg-gray-50">
                                    <div class="flex items-center px-4 py-4 sm:px-6">
                                        <div class="min-w-0 flex-1 flex items-center">
                                            <div class="flex-shrink-0">
                                                <img class="h-12 w-12 rounded-full object-cover" :src="profile_image" alt="" />
                                            </div>
                                            <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                                                <div>
                                                    <p class="text-sm font-medium text-xupa truncate">Selected Session</p>
                                                    <p class="mt-2 flex items-center text-sm text-gray-500">
                                                        <CollectionIcon class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" aria-hidden="true" />
                                                        <span class="truncate">Releated Project</span>
                                                    </p>
                                                </div>
                                                <div class="hidden md:block">
                                                    <div>
                                                        <p class="text-sm text-gray-900">
                                                            Started at
                                                            {{ ' ' }}
                                                            <time datetime="Started at 23:10, Sep 19 2021">Started at 23:10, Sep 19 2021</time>
                                                        </p>
                                                        <p class="mt-2 flex items-center text-sm text-gray-500">
                                                            <XCircleIcon :class="'flex-shrink-0 mr-1.5 h-5 w-5 text-red-600'" aria-hidden="true" />
                                                            Closed
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <ChevronDownIcon class="h-5 w-5 text-gray-400 cursor-pointer" aria-hidden="true" />
                                        </div>
                                    </div>
                                    <div>
                                        <div class="px-4 py-2 sm:px-6">
                                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                                Current Session
                                            </h3>
                                            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                                Overview & Tasks
                                            </p>
                                        </div>
                                        <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                                            <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2 mb-5">
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
                                            <div class="flex justify-end">
                                                <div class="bg-xupa hover:bg-xupa-dark text-white py-1 px-4 rounded-lg cursor-pointer w-max">
                                                    Open Session
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
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
import Header from './Components/header'
import { CheckIcon, ThumbUpIcon, UserIcon, PlayIcon, DotsHorizontalIcon, CheckCircleIcon, XCircleIcon, ChevronRightIcon, ChevronDownIcon, CollectionIcon, ArrowSmDownIcon, ArrowSmUpIcon } from '@heroicons/vue/solid'
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
const sessions = [
    {
        session: {
            id: 3,
            title: 'Timetracker Frontend History',
            project: 'Xupa Projectplanning software',
            started_at: '23:10, Sep 19 2021',
            time_target: '23:30, Sep 19 2021',
            description: 'Fugiat ipsum ipsum deserunt culpa aute sint do nostrud anim incididunt cillum culpa consequat. Excepteur qui ipsum aliquip consequat sint. Sit id mollit nulla mollit nostrud in ea officia proident. Irure nostrud pariatur mollit ad adipisicing reprehenderit deserunt qui eu.'
        },
        state: 'Active',
        color: 'text-green-600',
        icon: 'CheckCircleIcon'
    },
    {
        session: {
            id: 2,
            title: 'Timetracker Frontend Session',
            project: 'Xupa Projectplanning software',
            started_at: '23:10, Sep 19 2021',
            time_target: '23:30, Sep 19 2021',
            description: 'Fugiat ipsum ipsum deserunt culpa aute sint do nostrud anim incididunt cillum culpa consequat. Excepteur qui ipsum aliquip consequat sint. Sit id mollit nulla mollit nostrud in ea officia proident. Irure nostrud pariatur mollit ad adipisicing reprehenderit deserunt qui eu.'
        },
        state: 'Paused',
        color: 'text-yellow-600',
        icon: 'PlayIcon'
    },
    {
        session: {
            id: 1,
            title: 'Timetracker Frontend',
            project: 'Xupa Projectplanning software',
            started_at: '23:10, Sep 19 2021',
            time_target: '23:30, Sep 19 2021',
            description: 'Fugiat ipsum ipsum deserunt culpa aute sint do nostrud anim incididunt cillum culpa consequat. Excepteur qui ipsum aliquip consequat sint. Sit id mollit nulla mollit nostrud in ea officia proident. Irure nostrud pariatur mollit ad adipisicing reprehenderit deserunt qui eu.'
        },
        state: 'Closed',
        color: 'text-red-600',
        icon: 'XCircleIcon'
    }
]
const stats = [
    { id: 1, name: 'Total Tasks', stat: '71,897', icon: UserIcon, change: '122', changeType: 'increase' },
    { id: 2, name: 'Time management', stat: '58.16%', icon: UserIcon, change: '5.4%', changeType: 'increase' },
    { id: 3, name: 'Avg. Click Rate', stat: '24.57%', icon: UserIcon, change: '3.2%', changeType: 'decrease' }
]

export default {
    name: 'Single',
    components: {
        DashboardLayout,
        PlayIcon,
        DotsHorizontalIcon,
        CheckCircleIcon,
        ChevronRightIcon,
        ChevronDownIcon,
        CollectionIcon,
        XCircleIcon,
        ArrowSmDownIcon,
        ArrowSmUpIcon,
        Header
    },
    data() {
        return {
            profile_image: this.route('user.profile_image', { user: this.$page.props.authentication.user.id })
        }
    },
    setup() {
        return {
            timeline,
            tasks,
            sessions,
            stats
        }
    },
    methods: {
        route(routeName, data = {}) {
            return window.route(routeName, data)
        }
    }
}
</script>

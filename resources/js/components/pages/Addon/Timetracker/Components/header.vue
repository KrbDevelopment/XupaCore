<template>
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
</template>

<script>
const tabs = [
    { name: 'Current Session', href: 'http://localhost:8000/timetracker/1/session', current: true },
    { name: 'Session History', href: 'http://localhost:8000/timetracker/1/history', current: false },
    { name: 'Settings', href: '#', current: false }
]

export default {
    name: 'header',
    setup() {
        return {
            tabs
        }
    }
}
</script>

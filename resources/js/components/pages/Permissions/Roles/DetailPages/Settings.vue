<template>
    <Detail :role="this.role">
        <form class="space-y-8 divide-y divide-gray-200">
            <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                <div>
                    <div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Settings
                        </h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                            This page will show you the current preferences of the Administrator role
                        </p>
                    </div>

                    <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="username" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                Role-Name (& Guard)
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <div class="max-w-lg flex rounded-md shadow-sm">
                                    <select id="guard" name="guard" class="mt-1 block w-1/3 pl-3 pr-10 py-2 text-base border-r-0 border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-l-md">
                                        <option selected="">Web-Guard</option>
                                        <option>API-Guard</option>
                                    </select>
                                    <input type="text" name="name" id="name" class="mt-1 block w-2/3 pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-r-md" />
                                </div>
                            </div>
                        </div>

                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="about" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                Description
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <textarea id="about" name="about" rows="3" class="max-w-lg shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border border-gray-300 rounded-md" />
                                <p class="mt-2 text-sm text-gray-500">Write a few sentences about the role.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="divide-y divide-gray-200 pt-8 space-y-6 sm:pt-10 sm:space-y-5">
                    <div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Preferences
                        </h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                            This section includes some smaller preferences
                        </p>
                    </div>
                    <div class="space-y-6 sm:space-y-5 divide-y divide-gray-200">
                        <div class="pt-6 sm:pt-5">
                            <div role="group" aria-labelledby="label-email">
                                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-baseline">
                                    <div>
                                        <div class="text-base font-medium text-gray-900 sm:text-sm sm:text-gray-700" id="label-email">
                                            General
                                        </div>
                                    </div>
                                    <div class="mt-4 sm:mt-0 sm:col-span-2">
                                        <div class="max-w-lg space-y-4">
                                            <div class="relative flex items-start">
                                                <div class="flex items-center h-5">
                                                    <input id="comments" name="comments" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" />
                                                </div>
                                                <div class="ml-3 text-sm">
                                                    <label for="comments" class="font-medium text-gray-700">Public</label>
                                                    <p class="text-gray-500">The role is public and every user can join it.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pt-6 sm:pt-5">
                            <div role="group" aria-labelledby="label-email">
                                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-baseline">
                                    <div>
                                        <div class="text-base font-medium text-gray-900 sm:text-sm sm:text-gray-700" id="label-email">
                                            Security
                                        </div>
                                    </div>
                                    <div class="mt-4 sm:mt-0 sm:col-span-2">
                                        <div class="max-w-lg space-y-4">
                                            <div class="relative flex items-start">
                                                <div class="flex items-center h-5">
                                                    <input id="comments" name="comments" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" />
                                                </div>
                                                <div class="ml-3 text-sm">
                                                    <label for="comments" class="font-medium text-gray-700">2FA-Required</label>
                                                    <p class="text-gray-500">All users in this role are forced to have 2FA activated.</p>
                                                    <p class="text-xupa text-sm">Users without 2FA will be kicked out, when activating it!</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-5">
                <div class="flex justify-end">
                    <button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-xupa">
                        Cancel
                    </button>
                    <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-xupa hover:bg-xupa-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-xupa">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </Detail>
</template>

<script>
import Detail from '../Detail'
export default {
    props: ['role'],
    name: 'Settings',
    components: { Detail }
}
</script>

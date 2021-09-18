<template>
    <Detail :role="this.role">
        <form class="space-y-8 divide-y divide-gray-200" v-on:submit.prevent method="post">
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
                            <label for="role_name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                Role-Name
                            </label>
                            <input type="text" name="role_name" id="role_name" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-xupa focus:border-xupa sm:text-sm rounded-md" v-model="mutable_role.name" />
                        </div>

                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="role_description" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                Description
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <textarea id="role_description" name="role_description" rows="3" class="max-w-lg shadow-sm block w-full focus:ring-xupa focus:border-xupa sm:text-sm border border-gray-300 rounded-md" v-model="mutable_role.description" />
                                <p class="mt-2 text-sm text-gray-500">This description will be shown in invites and role pages.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="divide-y divide-gray-200 pt-8 space-y-6 sm:pt-10 sm:space-y-5">
                    <div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Preferences (Soon)
                        </h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                            This section includes some smaller preferences<br><br>
                            This section will follow in further updates
                        </p>
                    </div>
                    <div class="space-y-6 sm:space-y-5 divide-y divide-gray-200">
                        <div class="pt-6 sm:pt-5">
                            <div role="group" aria-labelledby="label-email">
                                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-baseline">
                                    <div>
                                        <div class="text-base font-medium text-gray-900 sm:text-sm sm:text-gray-700" id="label-general">
                                            General
                                        </div>
                                    </div>
                                    <div class="mt-4 sm:mt-0 sm:col-span-2">
                                        <div class="max-w-lg space-y-4">
                                            <div class="relative flex items-start">
                                                <div class="flex items-center h-5">
                                                    <input id="public" name="public" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" disabled />
                                                </div>
                                                <div class="ml-3 text-sm">
                                                    <label for="public" class="font-medium text-gray-700">Public</label>
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
                                        <div class="text-base font-medium text-gray-900 sm:text-sm sm:text-gray-700" id="label-security">
                                            Security
                                        </div>
                                    </div>
                                    <div class="mt-4 sm:mt-0 sm:col-span-2">
                                        <div class="max-w-lg space-y-4">
                                            <div class="relative flex items-start">
                                                <div class="flex items-center h-5">
                                                    <input id="2fa" name="2fa" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" disabled />
                                                </div>
                                                <div class="ml-3 text-sm">
                                                    <label for="2fa" class="font-medium text-gray-700">2FA-Required</label>
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
                    <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-xupa hover:bg-xupa-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-xupa" @click="updateRole()">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </Detail>
</template>

<script>
import Detail from '../Detail'
import { Inertia } from '@inertiajs/inertia'

export default {
    props: ['role'],
    name: 'Settings',
    components: { Detail },
    data() {
        return {
            mutable_role: this.role
        }
    },
    methods: {
        route(name, options = {}) {
            return window.route(name, options)
        },
        updateRole() {
            Inertia.post(this.route('permissions.requests.role.update', this.role.id), this.mutable_role, {
                preserveScroll: true, // Keep scrolling position (freeze position)

                /**
                 * Successful server response [HTTP Code: 2x]
                 */
                onSuccess: () => {
                    this.$notify(
                        {
                            group: 'success',
                            text: `The ${this.mutable_role.name} has been updated`,
                            transitionGroupClasses: {
                                enterActiveClassDelayed: 'transform ease-out duration-300 transition delay-300',
                                enterActiveClass: 'transform ease-out duration-300 transition',
                                enterFromClass: 'translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-4',
                                enterToClass: 'translate-y-0 opacity-100 sm:translate-x-0',
                                leaveActiveClass: 'transition ease-in duration-500',
                                leaveFromClass: 'opacity-100',
                                leaveToClass: 'opacity-0',
                                moveClass: 'transition duration-500'
                            }
                        },
                        4000
                    )
                },

                /**
                 * Failed server response [HTTP Code: 4x & 5x] Most likely validation error
                 */
                onError: (err) => {
                    console.log(err)
                    this.$notify(
                        {
                            group: 'error',
                            title: 'An error has occurred',
                            text: `We weren't able to update ${this.mutable_role.name}`,
                            transitionGroupClasses: {
                                enterActiveClassDelayed: 'transform ease-out duration-300 transition delay-300',
                                enterActiveClass: 'transform ease-out duration-300 transition',
                                enterFromClass: 'translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-4',
                                enterToClass: 'translate-y-0 opacity-100 sm:translate-x-0',
                                leaveActiveClass: 'transition ease-in duration-500',
                                leaveFromClass: 'opacity-100',
                                leaveToClass: 'opacity-0',
                                moveClass: 'transition duration-500'
                            }
                        },
                        4000
                    )
                }
            })
        }
    }
}
</script>

<template>
    <div class="mx-auto">
        <div class="mx-auto xl:mx-0">
            <div class="top h-64 relative">
                <img :src="banner ?? AlternativeProfileBanner" alt="" class="bg w-full h-full object-cover object-center absolute z-0">
                <div class="absolute opacity-25 bg-black top-0 right-0 bottom-0 left-0"></div>
                <div class="flex flex-col justify-center items-center relative h-full text-white bg-gradient-to-tr bg-gradient-from-bl from-transparent to-transparent hover:from-transparent hover:to-gray-900" @mouseover="hover_banner = true" @mouseleave="hover_banner = false; hover_profile_image = false">
                    <div class="flex items-center px-3 py-2 absolute right-0 top-0 mr-4 mt-4 cursor-pointer z-10" v-show="hover_banner">
                        <div class="text-center">
                            <!-- Photo File Input -->
                            <input id="uploadBanner" type="file" accept="image/*" @change="performBannerUpdateAttempt" hidden>
                            <!-- Change Photo Button -->
                            <button type="button" class="inline-flex items-center px-4 rounded-md text-white shadow-sm hover:text-gray-500 ease-in-out ml-3" @click.prevent="chooseBanner">
                                Change Cover Photo
                                <div class="ml-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                        <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                        <line x1="16" y1="5" x2="19" y2="8" />
                                    </svg>
                                </div>
                            </button>
                        </div>
                    </div>
                    <!-- <div class="flex items-center px-3 py-2 top-0 mr-4 mt-4 cursor-pointer hover:opacity-50">
                        <img :src="profile_image ?? AlternativeProfilePicture" class="h-24 w-24 object-cover rounded-full opacity-100">
                    </div> -->
                    <div class="flex items-center px-3 py-2 top-0 mr-4 mt-4">
                        <!-- Photo File Input -->
                        <input id="uploadProfileImage" type="file" accept="image/*" @change="performProfileImageUpdateAttempt" hidden>
                        <!-- Change Photo Button -->
                        <img :src="profile_image ?? AlternativeProfilePicture" alt="" class="z-0 h-24 w-24 object-cover rounded-full" @mouseover="hover_profile_image = true" @mouseleave="hover_profile_image = false" />
                        <div class="cursor-pointer flex flex-col justify-center items-center text-white absolute ml-5 z-10" v-show="hover_profile_image" @mouseover="hover_profile_image = true" @click.prevent="chooseProfileImage">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                <line x1="16" y1="5" x2="19" y2="8" />
                            </svg>
                            <p class="text-xs text-gray-100">Edit Picture</p>
                        </div>
                    </div>
                    <h1 class="text-2xl font-semibold opacity-100">{{ username }}</h1>
                    <h4 class="text-sm font-semibold opacity-100">Joined since {{ formatDate(created_at) }}</h4>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import AlternativeProfilePicture from '../../../../../assets/images/profile_picture.png'
import AlternativeProfileBanner from '../../../../../assets/images/profile_banner.png'
import moment from 'moment'
import { Inertia } from '@inertiajs/inertia'

export default {
    data() {
        return {
            // Banner Hover effect
            hover_banner: false,
            hover_profile_image: false,

            // User Details
            banner: this.route('user.banner', { user: this.$page.props.authentication.user.id }),
            profile_image: this.route('user.profile_image', { user: this.$page.props.authentication.user.id }),
            username: this.$page.props.authentication.user.username,
            created_at: this.$page.props.authentication.user.created_at
        }
    },
    setup() {
        return {
            AlternativeProfilePicture,
            AlternativeProfileBanner
        }
    },
    methods: {
        formatDate(timeString) {
            return moment(String(timeString)).format('MMMM Do YYYY')
        },

        chooseBanner() {
            document.getElementById('uploadBanner').click()
        },

        chooseProfileImage() {
            document.getElementById('uploadProfileImage').click()
        },

        route(routeName, data = {}) {
            return window.route(routeName, data)
        },

        performProfileImageUpdateAttempt(e) {
            this.validationError = null

            Inertia.post(window.route('profile.requests.profile_image.update'), {
                // Post Content
                profile_image: e.target.files[0],

                // CSRF Token
                _token: this.$page.props.csrf_token
            }, {
                // Server Response Handler

                preserveScroll: true, // Keep scrolling position (freeze position)

                /**
                 * Successfully server response
                 * @param response
                 */
                onSuccess: (response) => {
                    location.reload()
                    this.$notify(
                        {
                            group: 'success',
                            title: 'Profile updated',
                            text: 'your profile image has been updated',
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
                 * @param error
                 */
                onError: (error) => {
                    this.validationError = error
                    this.$notify(
                        {
                            group: 'error',
                            title: 'An error has occurred',
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
        },

        performBannerUpdateAttempt(e) {
            this.validationError = null

            Inertia.post(window.route('profile.requests.banner.update'), {
                // Post Content
                banner: e.target.files[0],

                // CSRF Token
                _token: this.$page.props.csrf_token
            }, {
                // Server Response Handler

                preserveScroll: true, // Keep scrolling position (freeze position)

                /**
                 * Successfully server response
                 * @param response
                 */
                onSuccess: (response) => {
                    location.reload()
                    this.$notify(
                        {
                            group: 'success',
                            title: 'Profile updated',
                            text: 'your profile banner has been updated',
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
                 * @param error
                 */
                onError: (error) => {
                    this.validationError = error
                    this.$notify(
                        {
                            group: 'error',
                            title: 'An error has occurred',
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

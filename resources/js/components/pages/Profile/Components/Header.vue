<template>
    <div class="mx-auto">
        <div class="mx-auto xl:mx-0">
            <div class="top h-64 relative">
                <img src="https://cdn.discordapp.com/attachments/676421183561793546/870672426814566500/default-banner.png" alt="" class="bg w-full h-full object-cover object-center absolute z-0">
                <div class="absolute opacity-25 bg-black top-0 right-0 bottom-0 left-0"></div>
                <div class="flex flex-col justify-center items-center relative h-full text-white z-30 bg-gradient-to-tr bg-gradient-from-bl from-transparent to-transparent hover:from-transparent hover:to-gray-900" @mouseover="hover_banner = true" @mouseleave="hover_banner = false">
                    <div class="flex items-center px-3 py-2 absolute right-0 top-0 mr-4 mt-4 cursor-pointer z-40" v-show="hover_banner">
                        <p class="text-xs text-gray-100">Change Cover Photo</p>
                        <div class="ml-2 text-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                <line x1="16" y1="5" x2="19" y2="8" />
                            </svg>
                        </div>
                    </div>
                    <img :src="profile_image ?? AlternativeProfilePicture" class="h-24 w-24 object-cover rounded-full opacity-100">
                    <h1 class="text-2xl font-semibold opacity-100">{{ username }}</h1>
                    <h4 class="text-sm font-semibold opacity-100">Joined Since 29 July 2021</h4>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import AlternativeProfilePicture from '../../../../../assets/images/profile_picture.png'

export default {
    data() {
        return {
            // Banner Hover effect
            hover_banner: false,

            // User Details
            banner: this.$page.props.authentication.user.banner,
            profile_image: this.$page.props.authentication.user.profile_image,
            username: this.$page.props.authentication.user.username
        }
    },
    setup() {
        return {
            AlternativeProfilePicture
        }
    }
}
</script>


<script setup>
import { Head } from '@inertiajs/vue3';
import { computed, ref } from 'vue';
import { usePage, useForm } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
import AuthenticatedLayout from './AuthenticatedLayout.vue';
import toast from '@/Stores/toast';

const page = usePage();
const authUser = page.props.auth.user;
const userId = authUser.id;

const props = defineProps({
    user: Object,
    total: Object
});

const profilePhotoModal = ref(false);
function toggleProfilePhotoModal(){
    profilePhotoModal.value = !profilePhotoModal.value;
}

const coverPhotoModal = ref(false);
function toggleCoverPhotoModal(){
    coverPhotoModal.value = !coverPhotoModal.value;
}

const profilePhotoUpdateForm = useForm({
    image: null,
});
const coverPhotoUpdateForm = useForm({
    image: null,
});

function updateProfilePhoto(){
    profilePhotoUpdateForm.post(route('profile.photo.update', { userid:userId }), {
        forceFormData:true,
        preserveScroll:true,
        onSuccess: () => {
            toggleProfilePhotoModal();
            toast.add({
                message: 'Profile Photo Updated successfully'
            });
        }
    });
}

function updateCoverPhoto(){
    coverPhotoUpdateForm.post(route('profile.cover.photo.update', { userid:userId }), {
        forceFormData:true,
        preserveScroll:true,
        onSuccess: () => {
            toggleCoverPhotoModal();
            toast.add({
                message: 'Cover Photo Updated successfully'
            });
        }
    });
}

</script>
<template>
    <Head :title="props.user.name" />
    <AuthenticatedLayout>
        <div class="flex-shrink max-w-full px-4 w-full mb-6">
            <div class="bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg mb-8">
                <div class="group h-40 overflow-hidden relative">
                    <img v-if="props.user.media == null" src="src/img/blog/bg.jpg" class="w-full">
                    <img v-else
                        :src="`/media/${props.user.media[1].id}/${props.user.media[1].file_name}`"
                        class="w-full">
                    <div v-if="props.user.username == authUser.username" class="absolute top-4 ltr:right-4 rtl:left-4">
                        <button @click="toggleCoverPhotoModal()" type="button"
                            class="group-hover:opacity-80 opacity-0 py-1.5 px-3 inline-block text-center mb-3 rounded leading-5 text-gray-800 bg-gray-200 border border-gray-200 hover:text-gray-900 hover:bg-gray-300 hover:ring-0 hover:border-gray-300 focus:bg-gray-300 focus:border-gray-300 focus:outline-none focus:ring-0">Edit
                            cover <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="inline-block bi bi-camera" viewBox="0 0 16 16">
                                <path
                                    d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1v6zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2z">
                                </path>
                                <path
                                    d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7zM3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="flex justify-center -mt-10 relative">
                    <a @click="toggleProfilePhotoModal()" class="z-30 group" href="javascript:;">
                        <svg v-if="props.user.media[0].name == null" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            fill="currentColor"
                            class="rounded-full w-24 h-24 bg-gray-200 border-solid border-white border-2 -mt-3">
                            <path fill-rule="evenodd"
                                d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                                clip-rule="evenodd" />
                        </svg>
                        <img v-else :src="`/media/${props.user.media[0].id}/${props.user.media[0].file_name}`"
                            class="rounded-full w-24 h-24 bg-gray-200 border-solid border-white border-2 -mt-3">

                        <div v-if="props.user.username == authUser.username" title="Change avatar"
                            class="absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 opacity-0 group-hover:opacity-100 text-white dark:text-gray-900">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="w-6 h-6 bi bi-camera" viewBox="0 0 16 16">
                                <path
                                    d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1v6zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2z">
                                </path>
                                <path
                                    d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7zM3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z">
                                </path>
                            </svg>
                        </div>
                    </a>
                </div>
                <div class="text-center px-3 pb-6 pt-2">
                    <h3 class="text-gray-800 dark:text-gray-100 font-bold text-lg">{{ props.user.name }}</h3>
                    <p class="mt-2 font-light">Hello, i'm professional front end developer!</p>
                </div>
                <div class="flex justify-center pb-6">
                    <div class="text-center px-2.5">
                        <p class="text-gray-500">{{ props.total.posts }}</p>
                        <span>Posts</span>
                    </div>
                    <div class="text-center px-2.5">
                        <p class="text-gray-500">{{ props.total.friends }}</p>
                        <span>Friends</span>
                    </div>
                    <div class="text-center px-2.5">
                        <p class="text-gray-500">{{ props.total.groups }}</p>
                        <span>Groups</span>
                    </div>
                </div>

                <!-- Navbar -->
                <div class="antialiased bg-gray-100 dark-mode:bg-gray-900">
                    <div class="w-full text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800">
                        <div
                            class="flex flex-col max-w-screen-xl mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
                            <nav class="flex-col flex-grow hidden pb-4 md:pb-4 md:flex md:justify-start md:flex-row">
                                <Link
                                    class="px-4 py-2 mt-2 text-sm font-semibold bg-gray-200 rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                    :class="route().current('user.posts') ? 'bg-gray-200' : 'bg-transparent'"
                                    :href="route('user.posts', props.user.username)">Posts</Link>
                                <Link
                                    class="px-4 py-2 mt-2 text-sm font-semibold rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                    :class="route().current('user.about') ? 'bg-gray-200' : 'bg-transparent'"
                                    :href="route('user.about', props.user.username)">About</Link>

                                <Link
                                    class="px-4 py-2 mt-2 text-sm font-semibold rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                    :class="route().current('user.friends') ? 'bg-gray-200' : 'bg-transparent'"
                                    :href="route('user.friends', props.user.username)">Friends</Link>
                                <Link
                                    class="px-4 py-2 mt-2 text-sm font-semibold rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                    :class="route().current('user.photos') ? 'bg-gray-200' : 'bg-transparent'"
                                    :href="route('user.photos', props.user.username)">Photos</Link>
                                <Link
                                    class="px-4 py-2 mt-2 text-sm font-semibold rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                    :class="route().current('user.followers') ? 'bg-gray-200' : 'bg-transparent'"
                                    :href="route('user.followers', props.user.username)">Followers</Link>
                                <Link
                                    class="px-4 py-2 mt-2 text-sm font-semibold rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                    :class="route().current('user.videos') ? 'bg-gray-200' : 'bg-transparent'"
                                    :href="route('user.videos', props.user.username)">Videos</Link>
                                <Link
                                    class="px-4 py-2 mt-2 text-sm font-semibold rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                    :class="route().current('user.groups') ? 'bg-gray-200' : 'bg-transparent'"
                                    :href="route('user.groups', props.user.username)">Groups</Link>


                                <div @click.away="open = false" class="relative" x-data="{ open: true }">
                                </div>
                            </nav>
                            <div class="flex flex-row items-center justify-between p-4">
                                <button v-if="props.user.username != authUser.username"
                                    class="flex px-3 py-1 bg-gray-400 hover:bg-gray-500 mr-1 text-black font-semibold rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-5 h-5">
                                        <path fill-rule="evenodd"
                                            d="M4.804 21.644A6.707 6.707 0 006 21.75a6.721 6.721 0 003.583-1.029c.774.182 1.584.279 2.417.279 5.322 0 9.75-3.97 9.75-9 0-5.03-4.428-9-9.75-9s-9.75 3.97-9.75 9c0 2.409 1.025 4.587 2.674 6.192.232.226.277.428.254.543a3.73 3.73 0 01-.814 1.686.75.75 0 00.44 1.223zM8.25 10.875a1.125 1.125 0 100 2.25 1.125 1.125 0 000-2.25zM10.875 12a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0zm4.875-1.125a1.125 1.125 0 100 2.25 1.125 1.125 0 000-2.25z"
                                            clip-rule="evenodd" />
                                    </svg>

                                    <span class="ml-1">Message</span>
                                </button>
                                <button v-if="props.user.username != authUser.username"
                                    class="flex px-3 py-1 bg-blue-600 hover:bg-blue-700 mr-1 text-white font-semibold rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-5 h-5">
                                        <path
                                            d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z" />
                                    </svg>
                                    <span class="ml-1">Add Friend</span>
                                </button>
                                <button v-if="props.user.username != authUser.username"
                                    class="flex px-3 py-1 bg-blue-600 hover:bg-blue-700 mr-1 text-white font-semibold rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-5 h-5">
                                        <path fill-rule="evenodd"
                                            d="M3.75 4.5a.75.75 0 01.75-.75h.75c8.284 0 15 6.716 15 15v.75a.75.75 0 01-.75.75h-.75a.75.75 0 01-.75-.75v-.75C18 11.708 12.292 6 5.25 6H4.5a.75.75 0 01-.75-.75V4.5zm0 6.75a.75.75 0 01.75-.75h.75a8.25 8.25 0 018.25 8.25v.75a.75.75 0 01-.75.75H12a.75.75 0 01-.75-.75v-.75a6 6 0 00-6-6H4.5a.75.75 0 01-.75-.75v-.75zm0 7.5a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-1">Follow</span>
                                </button>
                                <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline">
                                    <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                                        <path x-show="!open" fill-rule="evenodd"
                                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                                            clip-rule="evenodd"></path>
                                        <path x-show="open" fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap flex-row mx-4">
                <slot></slot>
            </div>
        </div>

        <div v-if="profilePhotoModal"
            class="main-modal fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster"
            style="background: rgba(0,0,0,.7);">
            <div
                class="border border-teal-500 modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
                <div class="modal-content py-4 text-left px-6">
                    <!--Title-->
                    <div class="flex justify-between items-center pb-3">
                        <p class="text-2xl font-bold">Update Profile Photo</p>
                        <div class="modal-close cursor-pointer z-50">
                            <svg @click="toggleProfilePhotoModal()" class="fill-current text-black"
                                xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                <path
                                    d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <!--Body-->
                <form @submit.prevent="updateProfilePhoto()" class="space-y-3">
                    <div class="my-5">
                        <input type="file" @input="profilePhotoUpdateForm.image = $event.target.files[0]" id="image" />
                        <progress v-if="profilePhotoUpdateForm.progress" :value="profilePhotoUpdateForm.progress.percentage" max="100">
                            {{ profilePhotoUpdateForm.progress.percentage }}%
                        </progress>
                    </div>
                    <!--Footer-->
                    <div class="flex justify-end pt-2">
                        <button @click="toggleProfilePhotoModal()"
                            class="focus:outline-none modal-close px-4 bg-gray-400 p-3 rounded-lg text-black hover:bg-gray-300">Cancel</button>
                        <button type="submit"
                            class="focus:outline-none px-4 bg-teal-500 p-3 ml-3 rounded-lg text-white hover:bg-teal-400">Confirm</button>
                    </div>
                </form>
                </div>
            </div>
        </div>

        <div v-if="coverPhotoModal"
            class="main-modal fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster"
            style="background: rgba(0,0,0,.7);">
            <div
                class="border border-teal-500 modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
                <div class="modal-content py-4 text-left px-6">
                    <!--Title-->
                    <div class="flex justify-between items-center pb-3">
                        <p class="text-2xl font-bold">Update Cover Photo</p>
                        <div class="modal-close cursor-pointer z-50">
                            <svg @click="toggleCoverPhotoModal()" class="fill-current text-black"
                                xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                <path
                                    d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <!--Body-->
                <form @submit.prevent="updateCoverPhoto()" class="space-y-3">
                    <div class="my-5">
                        <input type="file" @input="coverPhotoUpdateForm.image = $event.target.files[0]" id="image" />
                        <progress v-if="coverPhotoUpdateForm.progress" :value="coverPhotoUpdateForm.progress.percentage" max="100">
                            {{ coverPhotoUpdateForm.progress.percentage }}%
                        </progress>
                    </div>
                    <!--Footer-->
                    <div class="flex justify-end pt-2">
                        <button @click="toggleCoverPhotoModal()"
                            class="focus:outline-none modal-close px-4 bg-gray-400 p-3 rounded-lg text-black hover:bg-gray-300">Cancel</button>
                        <button type="submit"
                            class="focus:outline-none px-4 bg-teal-500 p-3 ml-3 rounded-lg text-white hover:bg-teal-400">Confirm</button>
                    </div>
                </form>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>
<style>
.animated {
    -webkit-animation-duration: 1s;
    animation-duration: 1s;
    -webkit-animation-fill-mode: both;
    animation-fill-mode: both;
}

.animated.faster {
    -webkit-animation-duration: 500ms;
    animation-duration: 500ms;
}

.fadeIn {
    -webkit-animation-name: fadeIn;
    animation-name: fadeIn;
}

.fadeOut {
    -webkit-animation-name: fadeOut;
    animation-name: fadeOut;
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }

    to {
        opacity: 1;
    }
}

@keyframes fadeOut {
    from {
        opacity: 1;
    }

    to {
        opacity: 0;
    }
}
</style>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import PostCard from './Post/PostCard.vue';
import { computed } from 'vue';
import { usePage } from '@inertiajs/vue3';
import CreatePost from './Post/CreatePost.vue';

const page = usePage();
const authUser = page.props.auth.user;

const props = defineProps({
    posts: Object,
    user: Object
});

const totalPosts = computed(() => {
    return props.posts ? props.posts.length : 0;
});
</script>

<template>
    <Head :title="props.user.name" />
    <AuthenticatedLayout>
        <div x-data="{ open: false }" class="flex-shrink max-w-full px-4 w-full mb-6">
            <div class="bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg mb-8">
                <div class="group h-40 overflow-hidden relative">
                    <img v-if="props.user.cover != null" src="src/img/blog/bg.jpg" class="w-full">
                    <img v-else
                        src="https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=1472&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        class="w-full">
                    <div v-if="props.user.username == authUser.username" class="absolute top-4 ltr:right-4 rtl:left-4">
                        <button @click="open = true" type="button"
                            class="group-hover:opacity-80 opacity-0 py-1.5 px-3 inline-block text-center mb-3 rounded leading-5 text-gray-800 bg-gray-200 border border-gray-200 hover:text-gray-900 hover:bg-gray-300 hover:ring-0 hover:border-gray-300 focus:bg-gray-300 focus:border-gray-300 focus:outline-none focus:ring-0">Edit
                            cover <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="inline-block bi bi-camera" viewBox="0 0 16 16">
                                <path
                                    d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1v6zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2z">
                                </path>
                                <path
                                    d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7zM3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z">
                                </path>
                            </svg></button>
                    </div>
                </div>
                <div class="flex justify-center -mt-10 relative">
                    <a @click="open = true" class="z-30 group" href="javascript:;">
                        <svg v-if="props.user.image == null" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            fill="currentColor"
                            class="rounded-full w-24 h-24 bg-gray-200 border-solid border-white border-2 -mt-3">
                            <path fill-rule="evenodd"
                                d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                                clip-rule="evenodd" />
                        </svg>
                        <img v-else src="src/img/avatar/avatar.png"
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
                        <p class="text-gray-500">{{ totalPosts }}</p>
                        <span>Posts</span>
                    </div>
                    <div class="text-center px-2.5">
                        <p class="text-gray-500">12</p>
                        <span>Friends</span>
                    </div>
                    <div class="text-center px-2.5">
                        <p class="text-gray-500">221</p>
                        <span>Groups</span>
                    </div>
                </div>

                <!-- Navbar -->
                <div class="antialiased bg-gray-100 dark-mode:bg-gray-900">
                        <div class="w-full text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800">
                            <div x-data="{ open: true }"
                                class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
                                <div class="flex flex-row items-center justify-between p-4">
                                    <a href="#"
                                        class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">Flowtrail
                                        UI</a>
                                    <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline"
                                        @click="open = !open">
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
                                <nav class="flex-col flex-grow hidden pb-4 md:pb-0 md:flex md:justify-end md:flex-row">
                                    <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                        href="#">Blog</a>
                                    <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                        href="#">Portfolio</a>
                                    <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                        href="#">About</a>
                                    <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                        href="#">Contact</a>
                                    <div @click.away="open = false" class="relative" x-data="{ open: true }">
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
        </div>

        <div class="flex flex-wrap flex-row -mx-4">
            <div class="flex-shrink max-w-full px-4 w-full lg:w-1/3 mb-8">
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg h-full p-6">
                    <div class="flex flex-row justify-between pb-3">
                        <div class="flex flex-col">
                            <h3 class="text-base font-bold">Information</h3>
                        </div>
                    </div>
                    <div class="py-3">
                        <p class="text-gray-500 mb-2">
                            User Bio here
                        </p>
                        <div class="border-t border-gray-200 my-3 dark:border-gray-700"></div>
                        <div class="ltr:text-left rtl:text-right">
                            <p class="mb-2"><strong>Full Name :</strong><span class="ml-2">{{ props.user.name }}</span>
                            </p>
                            <p class="mb-2"><strong>Email :</strong><span class="ml-2">{{ props.user.email }}</span></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-shrink max-w-full w-full lg:w-2/3">
                <!-- <div class="flex flex-row justify-center px-3">
                        <h3 class="text-base font-bold">Posts</h3>
                    </div> -->
                <CreatePost v-if="props.user.username == authUser.username"></CreatePost>
                <TransitionGroup name="fade">
                    <PostCard v-for="post in props.posts" :key="post.id" :post="post"></PostCard>
                </TransitionGroup>
            </div>
        </div>
    </div>
</AuthenticatedLayout></template>

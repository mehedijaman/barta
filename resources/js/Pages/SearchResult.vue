<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import CreatePost from '@/Pages/Post/CreatePost.vue';
import PostCard from '@/Pages/Post/PostCard.vue';
import UserProfileCard from '@/Components/UserProfileCard.vue';
import { computed } from 'vue';

const props = defineProps({
    posts:Object,
    users:Object,
});

const totalUsers = computed(() => props.users.length);
const totalPosts = computed(() => props.posts.length);
</script>

<template>
    <Head title="Search Result" />

    <AuthenticatedLayout>

        <h1 v-if="totalUsers == 0 && totalPosts == 0" class="text-center text-2xl font-bold p-4">Nothing Found !</h1>

        <template v-else>
            <h1 v-if="totalUsers == 0" class="text-center text-2xl font-bold p-4">No People Found !</h1>
            <h1 v-else class="text-center text-2xl font-bold p-4">Peoples ({{ totalUsers }}):</h1>
            <UserProfileCard v-for="user in users" :key="user.id" :user="user"></UserProfileCard>

            <h1 v-if="totalPosts == 0" class="text-center text-2xl font-bold p-4">No Post Found !</h1>
            <h1 v-else class="text-center text-2xl font-bold p-4">Posts ({{ totalPosts }}):</h1>
            <PostCard v-for="post in props.posts" :key="post.id" :post="post"></PostCard>
        </template>

    </AuthenticatedLayout>
</template>

<style>

</style>

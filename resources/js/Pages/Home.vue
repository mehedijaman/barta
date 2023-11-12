<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import CreatePost from '@/Pages/Post/CreatePost.vue';
import PostCard from '@/Pages/Post/PostCard.vue';

const props = defineProps({
    posts:Object
});
</script>

<template>
    <Head title="Home" />

    <AuthenticatedLayout>
        <CreatePost></CreatePost>
        <PostCard v-for="(post, index) in props.posts" :key="index" :post="post"></PostCard>
    </AuthenticatedLayout>
</template>

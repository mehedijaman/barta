<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import CreatePost from '@/Pages/Post/CreatePost.vue';
import PostCard from '@/Pages/Post/PostCard.vue';
import { ref, onMounted, onUnmounted } from 'vue';

const props = defineProps({
    posts:Object
});

const pageMeta = { name: 'description', content: 'Description Text' };
</script>

<template>
    <Head title="Home" :meta="pageMeta" />

    <AuthenticatedLayout>
        <CreatePost></CreatePost>
        <TransitionGroup name="fade">
            <PostCard v-for="post in props.posts" :key="post.id" :post="post"></PostCard>
        </TransitionGroup>
    </AuthenticatedLayout>
</template>

<style>

</style>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import CreatePost from './CreatePost.vue';
import PostCard from './PostCard.vue';

const props = defineProps({
    posts:Object
});
</script>

<template>
    <Head title="Post List" />
    <AuthenticatedLayout>
        <CreatePost></CreatePost>
        <TransitionGroup name="fade">
            <PostCard v-for="post in props.posts" :key="post.id" :post="post"></PostCard>
        </TransitionGroup>
    </AuthenticatedLayout>
</template>

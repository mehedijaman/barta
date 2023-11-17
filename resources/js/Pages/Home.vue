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
        <TransitionGroup name="fade">
            <PostCard v-for="post in props.posts" :key="post.id" :post="post"></PostCard>
        </TransitionGroup>
    </AuthenticatedLayout>
</template>

<style>

</style>

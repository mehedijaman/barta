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
    <Head title="Mehedi Jaman" />
    <AuthenticatedLayout>
        <CreatePost></CreatePost>
        <PostCard v-for="(post, index) in props.posts" :key="index" :post="post"></PostCard>
    </AuthenticatedLayout>
</template>

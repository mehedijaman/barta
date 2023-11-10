<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import PostCreate from '@/Components/PostCreate.vue';
import PostCard from '@/Components/PostCard.vue';
import ToastNotification from '@/Components/ToastNotification.vue';

const props = defineProps({
    posts:Object
});
</script>

<template>
    <Head title="Discover" />

    <AuthenticatedLayout>
        <ToastNotification></ToastNotification>
        <PostCreate></PostCreate>
        <PostCard v-for="(post, index) in props.posts" :key="index" :post="post"></PostCard>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import PostCard from './Post/PostCard.vue';

const props = defineProps({
    posts:Object,
    user:Object
});
</script>

<template>
    <Head :title="props.user.name" />
    <AuthenticatedLayout>
        <PostCard v-for="(post, index) in props.posts" :key="index" :post="post"></PostCard>
    </AuthenticatedLayout>
</template>

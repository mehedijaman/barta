<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import PostCreate from '@/Components/PostCreate.vue';
import PostCard from '@/Components/PostCard.vue';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
            <PostCreate></PostCreate>
            <PostCard></PostCard>
            <PostCard></PostCard>
            <PostCard></PostCard>
            <PostCard></PostCard>
            <PostCard></PostCard>
    </AuthenticatedLayout>
</template>

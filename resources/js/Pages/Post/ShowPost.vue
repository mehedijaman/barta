<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import PostCard from './PostCard.vue';

const props = defineProps({
    post:Object
});
</script>

<template>
    <Head title="Post Details" />
    <AuthenticatedLayout>
        <PostCard :post="props.post"></PostCard>
    </AuthenticatedLayout>
</template>

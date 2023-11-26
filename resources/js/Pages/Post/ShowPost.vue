<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import PostCard from './PostCard.vue';
import CreateComment from '../Comment/CreateComment.vue';
import CommentList from '../Comment/CommentList.vue';

const props = defineProps({
    post:Object
});
</script>

<template>
    <Head title="Post Details" />
    <AuthenticatedLayout>
        <PostCard :post="props.post"></PostCard>
        <CreateComment :post="props.post"></CreateComment>
        <CommentList :comments="props.post.comments"></CommentList>
    </AuthenticatedLayout>
</template>

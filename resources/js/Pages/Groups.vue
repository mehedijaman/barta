<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import PostCard from './Post/PostCard.vue';
import { computed } from 'vue';
import { usePage } from '@inertiajs/vue3';
import CreatePost from './Post/CreatePost.vue';
import { Link } from '@inertiajs/vue3';
import UserTimeLineLayout from '@/Layouts/UserTimeLineLayout.vue';

const page = usePage();
const authUser = page.props.auth.user;

const props = defineProps({
    posts: Object,
    user: Object
});

const total = {
    'posts': computed(() => props.posts ? props.posts.length : 0),
    'friends': 0,
    'groups': 0
}
</script>

<template>
    <UserTimeLineLayout :user="props.user" :total="total">
        <h1>Groups</h1>
    </UserTimeLineLayout>
</template>

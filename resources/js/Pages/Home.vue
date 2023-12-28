<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import CreatePost from '@/Pages/Post/CreatePost.vue';
import PostCard from '@/Pages/Post/PostCard.vue';
import { ref, onMounted, onUnmounted, reactive } from 'vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps({
    posts:Object
});
const posts = reactive(props.posts.data);
let currentPage = ref(props.posts.current_page);

const pageMeta = { name: 'description', content: 'Description Text' };

const loadMore = () => {
    currentPage.value++;
    if (props.posts.current_page < props.posts.last_page) {
        axios.get('?page=' + (currentPage.value))
        .then((response) => {
            console.log(currentPage.value);
            posts.push(...response.data.data);
        })
    }
}
</script>

<template>
    <Head title="Home" :meta="pageMeta" />

    <AuthenticatedLayout>
        <CreatePost></CreatePost>
        <TransitionGroup name="fade">
            <PostCard v-for="post in posts" :key="post.id" :post="post"></PostCard>
        </TransitionGroup>
        <PrimaryButton @click="loadMore()" class="m-4">
            Load More
        </PrimaryButton>
    </AuthenticatedLayout>
</template>

<style>

</style>

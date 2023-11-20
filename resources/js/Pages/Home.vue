<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import CreatePost from '@/Pages/Post/CreatePost.vue';
import PostCard from '@/Pages/Post/PostCard.vue';
import { ref, onMounted, onUnmounted } from 'vue';
import { debounce } from 'lodash/function';

const props = defineProps({
    posts:Object
});

const posts = ref(props.posts.data);

async function nextPosts(){
    // const res = await fetch(props.posts.next_page_url);
    // const data = await res.json();
    console.log(props.posts.links.next);
    // posts.value = [...posts.value, ...data.data];
}

onMounted(() => {
    const handleScroll = debounce((e) => {
        const pixelsFromBottom = document.documentElement.offsetHeight - document.documentElement.scrollTop - window.innerHeight;
        if(pixelsFromBottom < 200 ){
            nextPosts();
        }
    }, 100);

    window.addEventListener('scroll', handleScroll);
});

onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll);
});
</script>

<template>
    <Head title="Home" />

    <AuthenticatedLayout>
        <CreatePost></CreatePost>
        <TransitionGroup name="fade">
            <PostCard v-for="post in posts" :key="post.id" :post="post"></PostCard>
        </TransitionGroup>
    </AuthenticatedLayout>
</template>

<style>

</style>

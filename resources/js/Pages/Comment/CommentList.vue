<script setup>
import { computed } from 'vue';
import CommentCard from './CommentCard.vue';

const props = defineProps({
    comments:Array
})

const totalComments = computed(() => props.comments.length);
</script>
<template>
    <div class="flex flex-col space-y-6 max-w-2xl mx-auto">
        <hr class="mt-4"/>
        <p class="text-lg font-semibold">Comments ({{ totalComments }})</p>
        <CommentCard v-for="(comment,index) in props.comments" :comment="comment" :key="index"></CommentCard>
    </div>
</template>

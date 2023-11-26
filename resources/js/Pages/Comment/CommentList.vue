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
        <TransitionGroup name="fade">
            <CommentCard v-for="comment in props.comments" :comment="comment" :key="comment.id"></CommentCard>
        </TransitionGroup>
    </div>
</template>

<script setup>
import{ reactive, computed } from 'vue';
import { router, useForm } from '@inertiajs/vue3';
import toast from '@/Stores/toast';
import InputError from '@/Components/InputError.vue';
import { usePage } from '@inertiajs/vue3';
import UserProfilePhoto from '@/Components/UserProfilePhoto.vue';

const page = usePage();
const authUser = computed(() => page.props.auth.user);

const props = defineProps({
    post:Object
});

const form = useForm({
    postId:props.post.id,
    content: null,
    image: null
});

function createComment() {
    form.post(route('comments.store'), {
        forceFormData:true,
        preserveScroll:true,
        onSuccess: () => {
            form.reset();
            toast.add({
                message: 'Comment Published successfully'
            });
        }
    });
}

</script>
<template>
    <div class="bg-white border-[1px] border-gray-100 rounded-lg shadow p-4 sm:px-6 max-w-2xl mt-4 mx-auto">
        <form @submit.prevent="createComment()" class="space-y-3">
            <div>
                <div class="flex items-start /space-x-3/">
                    <!-- <div class="flex-shrink-0">
                        <UserProfilePhoto :photo="user.image"></UserProfilePhoto>
                    </div> -->

                    <!-- Content -->
                    <div class="text-gray-700 font-normal w-full">
                        <textarea v-model="form.content"
                            class="flex w-full h-auto min-h-[40px] px-3 py-2 text-sm bg-gray-100 focus:bg-white border border-sm rounded-lg border-neutral-300 ring-offset-background placeholder:text-neutral-400 focus:border-neutral-300 focus:outline-none focus:ring-1 focus:ring-offset-0 focus:ring-neutral-400 disabled:cursor-not-allowed disabled:opacity-50 text-gray-900"
                            name="barta" rows="2" placeholder="Write a comment..."></textarea>
                            <InputError class="mt-2" :message="form.errors.content" />
                    </div>
                </div>
            </div>

            <div>
                <!-- Card Bottom Action Buttons -->
                <div class="flex items-center justify-between">
                    <div class="flex gap-4 text-gray-600">
                        <!-- Upload Picture Button -->
                        <div>
                            <input type="file" @input="form.image = $event.target.files[0]" name="picture" id="picture" class="hidden" />
                            <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                                {{ form.progress.percentage }}%
                            </progress>

                            <label for="picture"
                                class="-m-2 flex gap-2 text-xs items-center rounded-full p-2 text-gray-600 hover:text-gray-800 cursor-pointer">
                                <span class="sr-only">Picture</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                </svg>
                            </label>
                        </div>
                        <!-- /Upload Picture Button -->

                        <!-- GIF Button -->
                        <button type="button"
                            class="-m-2 flex gap-2 text-xs items-center rounded-full p-2 text-gray-600 hover:text-gray-800">
                            <span class="sr-only">GIF</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12.75 8.25v7.5m6-7.5h-3V12m0 0v3.75m0-3.75H18M9.75 9.348c-1.03-1.464-2.698-1.464-3.728 0-1.03 1.465-1.03 3.84 0 5.304 1.03 1.464 2.699 1.464 3.728 0V12h-1.5M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />
                            </svg>
                        </button>
                        <!-- /GIF Button -->

                        <!-- Emoji Button -->
                        <button type="button"
                            class="-m-2 flex gap-2 text-xs items-center rounded-full p-2 text-gray-600 hover:text-gray-800">
                            <span class="sr-only">Emoji</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.182 15.182a4.5 4.5 0 01-6.364 0M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm-.375 0h.008v.015h-.008V9.75zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75zm-.375 0h.008v.015h-.008V9.75z" />
                            </svg>
                        </button>
                        <!-- /Emoji Button -->
                    </div>

                    <div>
                        <button type="submit"
                            class="-m-2 flex gap-2 text-xs items-center rounded-full px-4 py-2 font-semibold bg-gray-800 hover:bg-black text-white">
                            Post
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script setup>
import UpdateInfo from './Sections/UpdateInfo.vue';
import UpdatePassword from './Sections/UpdatePassword.vue';

defineProps({
    user: Object,
});
</script>

<template>
    <Head title="- Profile" />
    <!-- <div>Profile</div> -->
    <UpdateInfo :user="user" />
    <UpdatePassword />
</template>
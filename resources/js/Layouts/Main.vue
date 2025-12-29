<script setup>
    import { useDarkMode } from '../theme'
    import NavLink from '../Components/NavLink.vue';
    const { isDark, toggle } = useDarkMode()

</script>

<template>
    <header class="bg-slate-800 text-white">
        <nav class="p-6 mx-auto max-w-screen-lg flex items-center justify-between">
            <!-- <Link :href="route('home')">Home</Link> -->
            <NavLink routeName="home" componentName="Home">Home</NavLink>
            <div class="flex items-center justify-between space-x-6">
                <NavLink routeName="register" componentName="Auth/Register">Register</NavLink>
                <button @click="toggle" class="hover:bg-slate-600 w-6 h-6 grid place-items-center rounded-full hover:outline outline-1 outline-white">
                    <i :class="isDark ? 'fa-regular fa-moon': 'fa-solid fa-moon'"></i>
                    <!-- <i :class="isDark ? 'fa-solid fa-circle-half-stroke': 'fa-solid fa-circle-half-stroke'"></i> -->
                </button>
            </div>
        </nav>
    </header>

    <main class="p-6">
        <slot />
    </main>
</template>

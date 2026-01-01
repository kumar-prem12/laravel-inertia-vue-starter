<script setup>
import { useDarkMode } from '../theme'
import NavLink from '../Components/NavLink.vue';
const { isDark, toggle } = useDarkMode()
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'
const page = usePage()
const user = computed(() => page.props.auth.user)

</script>

<template>
    <header class="bg-slate-800 text-white">
        <nav class="p-6 mx-auto max-w-screen-lg flex items-center justify-between">
            <NavLink routeName="home" componentName="Home">
                Home
            </NavLink>

            <div class="flex items-center space-x-4">

                <!-- Guest links -->
                <template v-if="!$page.props.auth.user">
                    <NavLink routeName="register" componentName="Auth/Register">
                        Register
                    </NavLink>

                    <NavLink routeName="login" componentName="Auth/Login">
                        Login
                    </NavLink>
                </template>

                <!-- Auth user -->
                <template v-else>
                    <NavLink routeName="logout" method="post" as="button">
                        Logout
                    </NavLink>
                </template>

                <!-- Dark mode toggle -->
                <button @click="toggle" class="hover:bg-slate-600 w-6 h-6 grid place-items-center
               rounded-full hover:outline outline-1 outline-white">
                    <i :class="isDark ? 'fa-regular fa-moon' : 'fa-solid fa-moon'"></i>
                </button>

            </div>
        </nav>
    </header>


    <main class="p-6">
        <slot />
    </main>
</template>

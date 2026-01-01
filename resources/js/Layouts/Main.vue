<script setup>
import { useToast, useModal } from '@erag/vue-toastification';
import { useDarkMode } from '../theme'
import NavLink from '../Components/NavLink.vue';
import { computed , watch} from 'vue'
import { usePage, router } from '@inertiajs/vue3'
const { isDark, toggle } = useDarkMode()
const page = usePage()
const user = computed(() => page.props.auth.user)
const toast = useToast();
const modal = useModal();

watch(
  () => page.props.flash.toast,
  newFlash => {
    if (newFlash?.type) {
      toast[newFlash?.type](newFlash?.message, '', 4000 , 'top-right');
    }
  },
  { deep: true }
);

const logout = async () => {
    const confirm = await modal.confirm({
        title: 'Logout',
        message: 'Do you really want to logout?',
        confirmText: 'Logout',
        type: 'danger'
    });

    if (confirm) {
        router.post(route('logout'))
    }
};


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
                    <button @click="logout">
                        Logout
                    </button>
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

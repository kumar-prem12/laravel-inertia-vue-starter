import { ref, watch } from 'vue'

const isDark = ref(
    localStorage.getItem('theme') === 'dark' ||
    (!localStorage.getItem('theme') &&
    window.matchMedia('(prefers-color-scheme: dark)').matches)
)

watch(isDark, (value) => {
    const html = document.documentElement
    html.classList.toggle('dark', value)
    localStorage.setItem('theme', value ? 'dark' : 'light')
  }, { immediate: true })

export function useDarkMode() {
  const toggle = () => {
    isDark.value = !isDark.value
  }
  return { isDark, toggle }
}

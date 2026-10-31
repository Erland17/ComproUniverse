<template>
  <div class="inline-flex items-center rounded-lg bg-[#071913] p-1 border border-[#1b3d32] shadow-inner select-none">
    <button
      @click="setLanguage('id')"
      class="px-2.5 py-1 rounded-md text-[11px] font-bold tracking-wider transition-all duration-200 flex items-center gap-1 cursor-pointer"
      :class="currentLang === 'id' 
        ? 'bg-[#dfb74c] text-[#0a1f18] shadow-sm' 
        : 'text-stone-400 hover:text-white'"
    >
      <span>🇮🇩</span>
      <span>ID</span>
    </button>
    <button
      @click="setLanguage('en')"
      class="px-2.5 py-1 rounded-md text-[11px] font-bold tracking-wider transition-all duration-200 flex items-center gap-1 cursor-pointer"
      :class="currentLang === 'en' 
        ? 'bg-[#dfb74c] text-[#0a1f18] shadow-sm' 
        : 'text-stone-400 hover:text-white'"
    >
      <span>🇬🇧</span>
      <span>EN</span>
    </button>
  </div>
</template>

<script setup>
import { computed } from 'vue'
import { i18n } from '../i18n.js'

const currentLang = computed(() => i18n.lang)

function setLanguage(lang) {
  i18n.setLang(lang)
}
</script>

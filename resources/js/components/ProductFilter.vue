<template>
  <div>
    <!-- Interactive Filter Tabs -->
    <div class="flex flex-wrap items-center justify-center gap-2 sm:gap-3 mb-12">
      <button 
        v-for="cat in categories" 
        :key="cat.key"
        @click="selectedCategory = cat.key"
        class="px-4 sm:px-5 py-2.5 rounded-full text-xs font-bold tracking-wider transition-all duration-300 select-none cursor-pointer flex items-center gap-2"
        :class="selectedCategory === cat.key 
          ? 'bg-[#dfb74c] text-[#0a1f18] shadow-lg shadow-[#c59b27]/25 scale-105' 
          : 'bg-[#0f2d23] text-stone-300 hover:text-white border border-[#234b3c] hover:border-[#c59b27]/50'"
      >
        <span>{{ cat.label }}</span>
        <span 
          class="text-[10px] px-1.5 py-0.2 rounded-full font-mono"
          :class="selectedCategory === cat.key ? 'bg-[#0a1f18] text-[#dfb74c]' : 'bg-[#1b4d3e] text-stone-300'"
        >
          {{ getCategoryCount(cat.key) }}
        </span>
      </button>
    </div>

    <!-- Product Grid with Vue TransitionGroup -->
    <transition-group 
      name="product-list" 
      tag="div" 
      class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8"
    >
      <div 
        v-for="prod in filteredProducts" 
        :key="prod.name"
        class="bg-[#0f2d23] border border-[#234b3c] rounded-2xl overflow-hidden hover:border-[#dfb74c] hover:shadow-2xl hover:shadow-[#c59b27]/15 transition-all duration-300 flex flex-col justify-between group"
      >
        <!-- Photo Container -->
        <div class="relative h-60 overflow-hidden bg-stone-900">
          <img 
            :src="prod.image" 
            :alt="prod.name" 
            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
            loading="lazy"
          />
          <div class="absolute inset-0 bg-gradient-to-t from-[#0f2d23] via-transparent to-black/30"></div>
          
          <!-- Promo / Tag Badge -->
          <div class="absolute top-4 left-4 flex flex-col gap-1 items-start">
            <span class="px-3 py-1 rounded-full bg-[#c59b27] text-[#0a1f18] font-bold text-[10px] uppercase tracking-wider shadow">
              {{ prod.tag }}
            </span>
            <span v-if="prod.discount" class="px-2 py-0.5 rounded bg-red-600 text-white font-extrabold text-[9px] uppercase tracking-wider shadow">
              {{ prod.discount }}
            </span>
          </div>

          <!-- Category -->
          <span class="absolute bottom-3 left-4 text-xs font-mono text-stone-300 uppercase tracking-wider">
            {{ prod.category }}
          </span>
        </div>

        <!-- Content Details -->
        <div class="p-6 flex-1 flex flex-col justify-between space-y-4">
          <div>
            <h3 class="font-serif-luxury text-xl font-bold text-white group-hover:text-[#dfb74c] transition">
              {{ prod.name }}
            </h3>
            <p class="text-xs text-stone-300 mt-2 leading-relaxed">
              {{ getLocalizedDesc(prod) }}
            </p>
          </div>

          <div class="space-y-3 pt-3 border-t border-[#1c4436]">
            <div class="flex items-center justify-between text-xs">
              <span class="text-stone-400">{{ t('productsSec.portionLabel') }}</span>
              <span class="font-medium text-stone-200">{{ prod.weight }}</span>
            </div>
            <div class="flex items-center justify-between text-xs">
              <span class="text-stone-400">{{ t('productsSec.priceTokopedia') }}</span>
              <span class="font-extrabold text-[#dfb74c] text-sm">{{ prod.price_retail }}</span>
            </div>
            
            <div class="grid grid-cols-2 gap-2 pt-1">
              <a 
                href="https://www.tokopedia.com/tungbobenhil" 
                target="_blank"
                class="py-2.5 rounded-lg bg-emerald-700/80 hover:bg-emerald-600 text-white text-[11px] font-bold text-center transition flex items-center justify-center gap-1 border border-emerald-500/30"
              >
                <span>{{ t('productsSec.btnBuyOnline') }}</span>
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
              </a>
              <a 
                href="#contact" 
                class="py-2.5 rounded-lg bg-[#14382c] hover:bg-[#dfb74c] hover:text-[#0a1f18] text-stone-200 text-[11px] font-bold text-center transition border border-[#c59b27]/30"
              >
                {{ t('productsSec.btnBulkResto') }}
              </a>
            </div>
          </div>
        </div>
      </div>
    </transition-group>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue'
import { i18n } from '../i18n.js'

function t(key) {
  return i18n.t(key)
}

const props = defineProps({
  initialProducts: {
    type: Array,
    default: () => []
  }
})

const categories = computed(() => [
  { key: 'all', label: t('productsSec.all') },
  { key: 'meat', label: t('productsSec.meat') },
  { key: 'banchan', label: t('productsSec.banchan') },
  { key: 'soup', label: t('productsSec.soup') }
])

const selectedCategory = ref('all')

function getCategoryCount(catKey) {
  if (catKey === 'all') return props.initialProducts.length
  return props.initialProducts.filter(p => matchCategory(p, catKey)).length
}

function matchCategory(prod, key) {
  const cat = prod.category.toLowerCase()
  if (key === 'meat') return cat.includes('meat') || cat.includes('beef') || cat.includes('ribs')
  if (key === 'banchan') return cat.includes('kimchi') || cat.includes('noodle') || cat.includes('dimsum')
  if (key === 'soup') return cat.includes('soup')
  return true
}

function getLocalizedDesc(prod) {
  if (i18n.lang === 'en' && prod.desc_en) {
    return prod.desc_en
  }
  return prod.desc
}

const filteredProducts = computed(() => {
  if (selectedCategory.value === 'all') return props.initialProducts
  return props.initialProducts.filter(p => matchCategory(p, selectedCategory.value))
})
</script>

<style scoped>
.product-list-enter-active,
.product-list-leave-active {
  transition: all 0.4s ease;
}

.product-list-enter-from {
  opacity: 0;
  transform: translateY(20px) scale(0.96);
}

.product-list-leave-to {
  opacity: 0;
  transform: translateY(20px) scale(0.96);
}

.product-list-move {
  transition: transform 0.4s ease;
}
</style>

<template>
  <div 
    class="relative mx-auto max-w-md lg:max-w-none select-none"
    @mousemove="handleMouseMove"
    @mouseleave="handleMouseLeave"
  >
    <!-- Dynamic Ambient Glow around Card -->
    <div 
      class="absolute inset-0 rounded-3xl blur-2xl transition-all duration-300 pointer-events-none"
      :style="{
        background: `radial-gradient(circle at ${glowX}% ${glowY}%, rgba(223, 183, 76, 0.35), rgba(185, 28, 28, 0.25) 45%, rgba(20, 56, 44, 0.6) 80%)`
      }"
    ></div>

    <!-- PROMO / SPECIAL OFFER BADGE -->
    <div class="absolute -top-4 -right-2 z-20 bg-gradient-to-r from-red-600 via-rose-600 to-amber-600 text-white text-[11px] font-extrabold px-4 py-1.5 rounded-full shadow-xl border border-rose-300/50 flex items-center gap-1.5 animate-pulse">
      <span class="w-2 h-2 rounded-full bg-yellow-300 animate-ping"></span>
      <span class="tracking-wider uppercase">{{ t('promoCard.badge') }}</span>
    </div>

    <!-- 3D Card Shell with Reactive Micro-Tilt -->
    <div 
      class="relative bg-gradient-to-b from-[#14382c] via-[#0f2d23] to-[#071913] border-2 border-[#c59b27]/60 rounded-3xl p-6 sm:p-7 shadow-2xl overflow-hidden transition-all duration-200 ease-out"
      :style="{
        transform: `perspective(1000px) rotateX(${tiltX}deg) rotateY(${tiltY}deg)`
      }"
    >
      <!-- Top Card Header: Live Tokopedia Benhil & Kelapa Gading Stock -->
      <div class="flex justify-between items-center pb-4 border-b border-[#1b3d32]">
        <div class="flex items-center gap-2">
          <span class="relative flex h-2.5 w-2.5">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
            <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-emerald-500"></span>
          </span>
          <span class="text-xs font-bold uppercase tracking-wider text-[#dfb74c]">{{ t('promoCard.readyToCook') }}</span>
        </div>
        <div class="flex items-center gap-1 text-[11px] text-stone-300 font-mono">
          <span>{{ t('promoCard.stockStatus') }}</span>
        </div>
      </div>

      <!-- Meat Interactive Visual Plate -->
      <div 
        class="relative my-5 rounded-2xl overflow-hidden border border-[#c59b27]/40 bg-[#071913] group shadow-inner cursor-pointer"
        @click="switchFeaturedMeat"
      >
        <div class="relative h-64 sm:h-72 overflow-hidden">
          <transition name="fade-meat" mode="out-in">
            <img 
              :key="activeMeat.name"
              :src="activeMeat.image" 
              :alt="activeMeat.name" 
              class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-105 animate-sizzle"
            />
          </transition>

          <div class="absolute inset-0 pointer-events-none flex justify-center items-end pb-8">
            <div class="w-12 h-24 bg-gradient-to-t from-white/25 to-transparent blur-md rounded-full animate-steam-1"></div>
            <div class="w-10 h-28 bg-gradient-to-t from-white/20 to-transparent blur-md rounded-full animate-steam-2 ml-4"></div>
          </div>

          <div class="absolute inset-x-0 bottom-0 h-28 bg-gradient-to-t from-[#071913] via-[#071913]/70 to-transparent"></div>

          <!-- Interactive Click Prompt Pill -->
          <div class="absolute top-3 right-3 px-3 py-1 rounded-full bg-black/70 backdrop-blur-md border border-white/20 text-[10px] text-stone-300 flex items-center gap-1.5 shadow">
            <span>{{ t('promoCard.clickHint') }}</span>
            <span class="text-[#dfb74c] font-bold">↻</span>
          </div>

          <!-- Discount Badge Tag on Image -->
          <div class="absolute top-3 left-3 px-3 py-1 rounded-md bg-red-600/95 text-white font-black text-[11px] tracking-wider uppercase shadow-lg">
            {{ activeMeat.promoBadge }}
          </div>

          <!-- Price & Title Tag -->
          <div class="absolute bottom-3 left-4 right-4 flex justify-between items-end">
            <div>
              <span class="px-2 py-0.5 rounded bg-[#c59b27] text-[#0a1f18] font-bold text-[10px] tracking-wider uppercase shadow">
                {{ activeMeat.category }}
              </span>
              <h3 class="font-serif-luxury text-xl sm:text-2xl font-bold text-white drop-shadow mt-1">
                {{ activeMeat.name }}
              </h3>
            </div>
            <div class="text-right">
              <p class="text-[10px] text-stone-400 line-through">{{ activeMeat.originalPrice }}</p>
              <p class="text-base sm:text-lg font-extrabold text-[#dfb74c]">{{ activeMeat.promoPrice }}</p>
            </div>
          </div>
        </div>

        <!-- Description Box -->
        <div class="p-4 bg-[#0a1f18] text-xs text-stone-300 leading-relaxed border-t border-[#1b3d32]">
          <div class="flex items-center gap-1.5 text-[#dfb74c] font-semibold mb-1">
            <svg class="w-4 h-4 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
            <span>{{ activeMeat.highlight }}</span>
          </div>
          <p class="text-stone-300 text-[11px] leading-normal">
            {{ activeMeat.desc }}
          </p>
        </div>
      </div>

      <!-- Quick Delivery Details -->
      <div class="space-y-2 pt-1 text-xs">
        <div class="flex items-center justify-between py-1.5 border-b border-[#1b3d32] text-stone-300">
          <span class="text-stone-400">{{ t('promoCard.orderOfficial') }}</span>
          <a href="https://www.tokopedia.com/tungbobenhil" target="_blank" class="font-bold text-[#dfb74c] hover:underline flex items-center gap-1">
            <span>Tokopedia: @tungbobenhil</span>
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
          </a>
        </div>
        <div class="flex items-center justify-between py-1.5 border-b border-[#1b3d32] text-stone-300">
          <span class="text-stone-400">{{ t('promoCard.courier') }}</span>
          <span class="font-semibold text-white">{{ t('promoCard.courierVal') }}</span>
        </div>
        <div class="flex items-center justify-between py-1.5 text-stone-300">
          <span class="text-stone-400">{{ t('promoCard.bonus') }}</span>
          <span class="font-semibold text-emerald-300">{{ t('promoCard.bonusVal') }}</span>
        </div>
      </div>

      <!-- Action Button -->
      <div class="mt-4 grid grid-cols-2 gap-3">
        <a 
          href="https://www.tokopedia.com/tungbobenhil" 
          target="_blank"
          class="py-3 text-center rounded-xl bg-gradient-to-r from-emerald-600 to-teal-600 hover:brightness-110 text-white text-xs font-bold tracking-wider uppercase transition shadow-md flex items-center justify-center gap-1.5"
        >
          <span>{{ t('promoCard.btnBuyTokopedia') }}</span>
          <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
        </a>
        <a 
          href="#products" 
          class="py-3 text-center rounded-xl bg-[#14382c] hover:bg-[#1b4d3e] text-[#dfb74c] text-xs font-bold tracking-wider uppercase border border-[#c59b27]/40 transition shadow-md"
        >
          {{ t('promoCard.btnFullCatalog') }} &rarr;
        </a>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue'
import { i18n } from '../i18n.js'

function t(key) {
  return i18n.t(key)
}

const meats = computed(() => [
  {
    name: 'Woosamgyup Thinly Sliced Beef',
    category: 'Best Seller #1 Ready To Cook',
    promoBadge: i18n.lang === 'id' ? 'DISKON 15% • TOKOPEDIA' : '15% OFF • TOKOPEDIA',
    originalPrice: 'Rp 140.000',
    promoPrice: 'Rp 120.000',
    highlight: i18n.lang === 'id' ? 'Daging Iris Tipis Marinasi + Free Dipping Sauce' : 'Thinly Sliced Marinated Beef + Free Dipping Sauce',
    desc: i18n.lang === 'id' ? 'Bumbu manis gurih meresap sempurna. Cepat matang dalam 2 menit di teppan grill tanpa ribet!' : 'Sweet savory marinade thoroughly soaked. Cooks within 2 minutes on the grill!',
    image: 'https://images.unsplash.com/photo-1544025162-d76694265947?auto=format&fit=crop&w=800&q=80'
  },
  {
    name: 'Suwon Galbi Bone-In Short Ribs',
    category: 'Signature Gourmet',
    promoBadge: i18n.lang === 'id' ? 'PROMO HEMAT BUNDLE' : 'BUNDLE SAVINGS',
    originalPrice: 'Rp 310.000',
    promoPrice: 'Rp 265.000',
    highlight: i18n.lang === 'id' ? 'Iga Sapi Belah Khas Suwon Korea 250g' : 'Traditional Suwon Butterflied Short Ribs 250g',
    desc: i18n.lang === 'id' ? 'Iga tebal empuk termarinasi sari buah pir murni dan kecap fermentasi tradisional berstandar restoran bintang 5.' : 'Thick tender ribs marinated in pure Korean pear juice and traditional aged soy sauce.',
    image: 'https://images.unsplash.com/photo-1558030006-450675393462?auto=format&fit=crop&w=800&q=80'
  },
  {
    name: 'Tungbo Jumulleok Beef Cubes',
    category: 'Chef Special BBQ',
    promoBadge: i18n.lang === 'id' ? 'NEW EXCLUSIVE' : 'NEW EXCLUSIVE',
    originalPrice: 'Rp 165.000',
    promoPrice: 'Rp 145.000',
    highlight: i18n.lang === 'id' ? 'Potongan Daging Lembut dengan Minyak Wijen Murni' : 'Tender Beef Cubes Tossed in Pure Toasted Sesame Oil',
    desc: i18n.lang === 'id' ? 'Tekstur daging dadu yang lembut dengan aroma minyak wijen panggang otentik Korea.' : 'Tender bite-sized steak cuts infused with fragrant Korean sesame oil seasoning.',
    image: 'https://images.unsplash.com/photo-1555939594-58d7cb561ad1?auto=format&fit=crop&w=800&q=80'
  }
])

const meatIndex = ref(0)
const activeMeat = computed(() => meats.value[meatIndex.value])

const tiltX = ref(0)
const tiltY = ref(0)
const glowX = ref(50)
const glowY = ref(50)

function switchFeaturedMeat() {
  meatIndex.value = (meatIndex.value + 1) % meats.value.length
}

function handleMouseMove(e) {
  const rect = e.currentTarget.getBoundingClientRect()
  const x = e.clientX - rect.left
  const y = e.clientY - rect.top
  
  glowX.value = (x / rect.width) * 100
  glowY.value = (y / rect.height) * 100
  
  tiltX.value = ((y / rect.height) - 0.5) * -6
  tiltY.value = ((x / rect.width) - 0.5) * 6
}

function handleMouseLeave() {
  tiltX.value = 0
  tiltY.value = 0
  glowX.value = 50
  glowY.value = 50
}
</script>

<style scoped>
.fade-meat-enter-active,
.fade-meat-leave-active {
  transition: opacity 0.35s ease, transform 0.35s ease;
}

.fade-meat-enter-from {
  opacity: 0;
  transform: scale(0.96);
}

.fade-meat-leave-to {
  opacity: 0;
  transform: scale(1.04);
}
</style>

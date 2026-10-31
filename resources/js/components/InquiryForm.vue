<template>
  <div class="bg-[#0f2d23] border border-[#234b3c] rounded-2xl p-8 shadow-2xl relative overflow-hidden">
    <!-- Success Banner -->
    <transition name="fade">
      <div v-if="submitted" class="p-8 bg-[#1b4d3e] border border-[#dfb74c] rounded-2xl text-center space-y-3">
        <div class="w-14 h-14 bg-[#dfb74c] text-[#0a1f18] rounded-full flex items-center justify-center mx-auto font-bold text-2xl shadow-lg animate-bounce">
          ✓
        </div>
        <h4 class="font-serif-luxury text-2xl font-bold text-white">{{ t('form.successTitle') }}, {{ form.name }}!</h4>
        <p class="text-xs text-stone-200 max-w-md mx-auto leading-relaxed">
          {{ t('form.successDesc') }}
        </p>
        <button 
          @click="resetForm" 
          class="mt-4 px-5 py-2.5 rounded-lg bg-[#0a1f18] text-xs font-semibold text-stone-300 hover:text-white border border-[#234b3c] transition cursor-pointer"
        >
          {{ t('form.btnNew') }}
        </button>
      </div>
    </transition>

    <!-- Interactive Form -->
    <div v-if="!submitted">
      <h3 class="font-serif-luxury text-2xl font-bold text-white mb-2">{{ t('form.title') }}</h3>
      <p class="text-xs text-stone-300 mb-6">{{ t('form.subtitle') }}</p>

      <form @submit.prevent="handleSubmit" class="space-y-4">
        <div class="grid sm:grid-cols-2 gap-4">
          <div>
            <label class="block text-xs font-medium text-stone-300 mb-1">{{ t('form.nameLabel') }}</label>
            <input 
              v-model="form.name" 
              type="text" 
              required 
              placeholder="e.g. Budi Santoso" 
              class="w-full px-4 py-3 rounded-lg bg-[#081913] border border-[#234b3c] text-stone-100 text-sm focus:outline-none focus:border-[#dfb74c] transition"
            >
          </div>
          <div>
            <label class="block text-xs font-medium text-stone-300 mb-1">{{ t('form.companyLabel') }}</label>
            <input 
              v-model="form.company" 
              type="text" 
              required 
              placeholder="e.g. K-Grill Resto / Private Gathering" 
              class="w-full px-4 py-3 rounded-lg bg-[#081913] border border-[#234b3c] text-stone-100 text-sm focus:outline-none focus:border-[#dfb74c] transition"
            >
          </div>
        </div>

        <div class="grid sm:grid-cols-2 gap-4">
          <div>
            <label class="block text-xs font-medium text-stone-300 mb-1">{{ t('form.phoneLabel') }}</label>
            <input 
              v-model="form.phone" 
              type="tel" 
              required 
              placeholder="0812xxxxxxxx" 
              class="w-full px-4 py-3 rounded-lg bg-[#081913] border border-[#234b3c] text-stone-100 text-sm focus:outline-none focus:border-[#dfb74c] transition"
            >
          </div>
          <div>
            <label class="block text-xs font-medium text-stone-300 mb-1">{{ t('form.serviceLabel') }}</label>
            <select 
              v-model="form.service" 
              class="w-full px-4 py-3 rounded-lg bg-[#081913] border border-[#234b3c] text-stone-100 text-sm focus:outline-none focus:border-[#dfb74c] transition"
            >
              <option value="Suplai Daging Iris & Marinasi BBQ (Woosamgyup/Galbi)">Suplai Daging Iris & Marinasi BBQ (Woosamgyup/Galbi)</option>
              <option value="Korean BBQ Catering & Live Station Event">Korean BBQ Catering & Live Station Event</option>
              <option value="Bumbu & Saus Tradisional Korea (Bulk Pack)">Bumbu & Saus Tradisional Korea (Bulk Pack)</option>
              <option value="Sayuran Segar Hidroponik & Artisan Kimchi">Sayuran Segar Hidroponik & Artisan Kimchi</option>
              <option value="Kemitraan Retail Supermarket / Reseller">Kemitraan Retail Supermarket / Reseller</option>
            </select>
          </div>
        </div>

        <div>
          <label class="block text-xs font-medium text-stone-300 mb-1">{{ t('form.notesLabel') }}</label>
          <textarea 
            v-model="form.notes" 
            rows="3" 
            placeholder="Kebutuhan volume daging atau perkiraan tanggal katering..." 
            class="w-full px-4 py-3 rounded-lg bg-[#081913] border border-[#234b3c] text-stone-100 text-sm focus:outline-none focus:border-[#dfb74c] transition"
          ></textarea>
        </div>

        <button 
          type="submit" 
          :disabled="isSubmitting"
          class="w-full py-4 rounded-xl bg-gradient-to-r from-[#c59b27] via-[#dfb74c] to-[#c59b27] text-[#0a1f18] font-bold text-sm tracking-wide shadow-xl hover:brightness-110 active:scale-[0.99] transition flex items-center justify-center gap-2 cursor-pointer disabled:opacity-50"
        >
          <span v-if="!isSubmitting">{{ t('form.btnSubmit') }} &rarr;</span>
          <span v-else>{{ t('form.submitting') }}</span>
        </button>
      </form>
    </div>
  </div>
</template>

<script setup>
import { ref, reactive } from 'vue'
import { i18n } from '../i18n.js'

function t(key) {
  return i18n.t(key)
}

const isSubmitting = ref(false)
const submitted = ref(false)

const form = reactive({
  name: '',
  company: '',
  phone: '',
  service: 'Suplai Daging Iris & Marinasi BBQ (Woosamgyup/Galbi)',
  notes: ''
})

function handleSubmit() {
  isSubmitting.value = true
  setTimeout(() => {
    isSubmitting.value = false
    submitted.value = true
  }, 500)
}

function resetForm() {
  form.name = ''
  form.company = ''
  form.phone = ''
  form.notes = ''
  submitted.value = false
}
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.3s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>

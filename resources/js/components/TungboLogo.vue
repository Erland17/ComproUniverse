<template>
  <a href="#hero" class="flex flex-col items-center group cursor-pointer select-none py-1">
    <!-- Stempel Bulat Terracotta di Tengah Atas -->
    <div class="w-8 h-8 flex items-center justify-center mb-0.5">
      <svg class="w-full h-full" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
        <circle cx="50" cy="50" r="45" stroke="#c86446" stroke-width="3.5"/>
        <path d="M26 42 L50 24 L74 42" stroke="#c86446" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"/>
        <line x1="50" y1="24" x2="50" y2="76" stroke="#c86446" stroke-width="3" stroke-linecap="round"/>
        <line x1="34" y1="52" x2="66" y2="52" stroke="#c86446" stroke-width="3" stroke-linecap="round"/>
        <path d="M38 65 Q50 74 62 65" stroke="#c86446" stroke-width="3" fill="none" stroke-linecap="round"/>
        <circle cx="50" cy="38" r="3" fill="#c86446"/>
      </svg>
    </div>

    <!-- Teks: | TUNGB O (dengan underline hanya pada huruf O) | -->
    <div class="flex items-center gap-2 leading-none">
      <span class="text-[#c59b27] text-xl font-light opacity-80 select-none">|</span>
      
      <span class="text-white font-extrabold tracking-[0.24em] text-2xl uppercase font-sans flex items-center">
        TUNGB<span class="border-b-2 border-white pb-0.5 ml-0.5 leading-none">O</span>
      </span>

      <span class="text-[#c59b27] text-xl font-light opacity-80 select-none">|</span>
    </div>

    <!-- Garis Pembatas Emas Tipis Rapi -->
    <div class="w-full h-[1px] bg-gradient-to-r from-transparent via-[#c59b27]/70 to-transparent my-1"></div>

    <!-- Subteks: AUTHENTIC KOREAN FOOD -->
    <p class="text-[8.5px] tracking-[0.32em] text-[#dfb74c] font-bold uppercase text-center font-sans leading-none">
      AUTHENTIC KOREAN FOOD
    </p>
  </a>
</template>

<script setup>
</script>

import { createApp } from 'vue';

import TungboLogo from './components/TungboLogo.vue';
import MeatShowcase from './components/MeatShowcase.vue';
import ProductFilter from './components/ProductFilter.vue';
import InquiryForm from './components/InquiryForm.vue';
import LanguageSwitcher from './components/LanguageSwitcher.vue';
import { i18n } from './i18n.js';

const app = createApp({
  setup() {
    return {
      i18n,
      t: (key) => i18n.t(key)
    };
  }
});

app.component('tungbo-logo', TungboLogo);
app.component('meat-showcase', MeatShowcase);
app.component('product-filter', ProductFilter);
app.component('inquiry-form', InquiryForm);
app.component('language-switcher', LanguageSwitcher);

app.mount('#app');

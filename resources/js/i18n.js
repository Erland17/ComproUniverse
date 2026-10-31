import { reactive } from 'vue';

// Read initial saved language from localStorage if exists, default to 'id'
const savedLang = typeof window !== 'undefined' ? localStorage.getItem('tungbo_lang') || 'id' : 'id';

export const i18n = reactive({
  lang: savedLang,
  setLang(l) {
    this.lang = l;
    if (typeof window !== 'undefined') {
      localStorage.setItem('tungbo_lang', l);
    }
  },
  t(key) {
    const keys = key.split('.');
    let val = translations[this.lang];
    for (const k of keys) {
      if (!val || val[k] === undefined) return key;
      val = val[k];
    }
    return val;
  }
});

export const translations = {
  id: {
    nav: {
      home: 'Beranda',
      products: 'Katalog Daging',
      catering: 'Portofolio Catering',
      services: 'Layanan Bisnis',
      about: 'Tentang Kami',
      testimonials: 'Testimoni',
      contact: 'Kontak'
    },
    topBar: {
      delivery: 'Pengiriman Jabodetabek & Bali',
      hubs: 'Dual Hubs: Kelapa Gading & Bendungan Hilir',
      tokopedia: 'Tokopedia: @tungbobenhil'
    },
    hero: {
      badge: 'Authentic Korean Gourmet & Catering Supply',
      title1: 'Sensasi Korean BBQ',
      title2: 'Autentik & Daging Marinasi',
      title3: 'Siap Masak.',
      desc: 'Distributor resmi irisan daging sapi Woosamgyup, iga bakar Suwon Galbi, bumbu marinasi khas Korea, artisan kimchi, dan layanan katering eksklusif. Menyuplai jaringan resto Horeca, supermarket terkemuka, hingga pesanan cepat langsung via Tokopedia Tungbo Benhil.',
      btnCatalog: 'Katalog Daging & Menu',
      btnCatering: 'Lihat Portofolio Catering',
      trustHubs: '2 Hubs',
      trustHubsSub: 'Kelapa Gading & Benhil',
      trustCold: 'Cold-Chain',
      trustColdSub: 'Suhu Beku 100% Terjaga',
      trustHalal: 'Halal & Safe',
      trustHalalSub: 'Standar Higienis Horeca'
    },
    promoCard: {
      badge: '✨ PROMO SPESIAL TOKOPEDIA • HEMAT S/D 35RB',
      readyToCook: 'Ready-To-Cook Frozen Beef',
      stockStatus: '100% Segar',
      clickHint: 'Klik ganti varian',
      orderOfficial: 'Order Online Resmi',
      courier: 'Pilihan Kurir Aman',
      courierVal: 'GoSend / Grab Instant (Jaga Rantai Beku)',
      bonus: 'Bonus Khusus',
      bonusVal: 'Free Signature Dipping Sauce Pack',
      btnBuyTokopedia: 'Beli di Tokopedia',
      btnFullCatalog: 'Katalog Lengkap'
    },
    productsSec: {
      badge: 'Katalog Resmi Tokopedia & Horeca',
      title: 'Pilihan Daging Sapi & Hidangan Autentik',
      subtitle: 'Daging marinasi siap masak (Ready to Cook), dipotong dengan standar presisi Korea, dan dikemas vakum higienis dengan rantai dingin disiplin.',
      all: 'Semua Produk',
      meat: '🥩 Daging Sapi & BBQ',
      banchan: '🥢 Banchan, Kimchi & Noodle',
      soup: '🍲 Sup & Retort Pouch',
      portionLabel: 'Kemasan & Isi:',
      priceTokopedia: 'Harga di Tokopedia:',
      btnBuyOnline: 'Beli Online',
      btnBulkResto: 'Suplai Bulk Resto'
    },
    tokopediaBanner: {
      title: 'Pesan Online Langsung di Tokopedia Tungbo Benhil',
      subtitle: 'Layanan pengiriman kurir instan/sameday (GoSend/GrabExpress) menjaga daging tetap beku dan segar sampai di tangan Anda.',
      btn: 'Kunjungi Tokopedia @tungbobenhil'
    },
    cateringSec: {
      badge: 'Showcase Portofolio',
      title: 'Pengalaman Korean BBQ Catering & Live Station Event',
      subtitle: 'Dokumentasi jamuan katering autentik Korea untuk resepsi pernikahan, gala dinner korporasi, dan perayaan privat eksklusif.',
      btnEvent: 'Konsultasi Event Serupa',
      igHint: 'Lihat dokumentasi video live grill lainnya di Highlight Instagram @tungbo.id',
      igBtn: 'Buka Instagram Story Highlight'
    },
    servicesSec: {
      badge: 'Solusi Bisnis & Horeca',
      title: 'Pilar Layanan Pasokan & Kuliner Tungbo',
      subtitle: 'Mulai dari pasokan rutin daging beku restoran, bumbu formula master chef, hingga sayuran segar bebas pestisida.',
      btnConsult: 'Konsultasi Layanan'
    },
    aboutSec: {
      badge: 'Tentang Tungbo Indonesia',
      title: 'Dedikasi Mutu Autentik Sejak 2019',
      visionTitle: 'Visi Perusahaan',
      missionTitle: 'Misi Utama',
      dualHubTitle: 'Dual Logistical Centers',
      dualHubSub: 'Hub Kelapa Gading & Hub Bendungan Hilir',
      dualHubDesc: 'Memastikan rantai distribusi daging tiba segar & cepat beku',
      btnContact: 'Hubungi Kami'
    },
    testiSec: {
      badge: 'Testimoni Klien',
      title: 'Kepercayaan Mitra F&B dan Penikmat Kuliner',
      partnersLabel: 'Mitra Distribusi Resmi & Supermarket'
    },
    contactSec: {
      badge: 'Kemitraan & Pemesanan',
      title: 'Mulai Kerjasama Pasokan Daging & Katering',
      desc: 'Hubungi tim kami untuk pengadaan suplai rutin restoran BBQ Anda, penawaran harga bumbu dalam jumlah bulk, atau pemesanan katering Korean BBQ.',
      hubsLabel: 'Pusat Distribusi (Dual Hub)',
      hubsVal: 'Kelapa Gading & Bendungan Hilir, Jakarta',
      emailLabel: 'Email Korespondensi Bisnis',
      phoneLabel: 'WhatsApp & Telepon Resmi'
    },
    form: {
      title: 'Form Permintaan Sampel & Penawaran',
      subtitle: 'Lengkapi data usaha atau acara Anda. Tim perwakilan kami akan memberikan kalkulasi harga terbaik.',
      nameLabel: 'Nama PIC / Kontak',
      companyLabel: 'Nama Restoran / Perusahaan / Acara',
      phoneLabel: 'Nomor WhatsApp Aktif',
      serviceLabel: 'Kategori Kebutuhan',
      notesLabel: 'Estimasi Volume / Catatan Khusus',
      btnSubmit: 'Kirimkan Permintaan Penawaran',
      submitting: 'Memproses...',
      successTitle: 'Terima Kasih!',
      successDesc: 'Permintaan penawaran telah kami rekam. Tim sales Tungbo akan menghubungi Anda via WhatsApp dalam waktu 1x24 jam.',
      btnNew: 'Kirimkan Form Baru'
    }
  },
  en: {
    nav: {
      home: 'Home',
      products: 'Meat Catalog',
      catering: 'Catering Portfolio',
      services: 'Business Services',
      about: 'About Us',
      testimonials: 'Testimonials',
      contact: 'Contact'
    },
    topBar: {
      delivery: 'Jabodetabek & Bali Delivery',
      hubs: 'Dual Hubs: Kelapa Gading & Bendungan Hilir',
      tokopedia: 'Tokopedia: @tungbobenhil'
    },
    hero: {
      badge: 'Authentic Korean Gourmet & Catering Supply',
      title1: 'Sensational Korean BBQ',
      title2: 'Authentic & Marinated Meat',
      title3: 'Ready to Cook.',
      desc: 'Official distributor of thinly sliced Woosamgyup, marinated Suwon Galbi ribs, traditional Korean sauces, artisanal kimchi, and bespoke catering services. Supplying Horeca restaurant chains, premium supermarkets, and instant orders via Tokopedia Tungbo Benhil.',
      btnCatalog: 'Meat Catalog & Menu',
      btnCatering: 'View Catering Portfolio',
      trustHubs: '2 Hubs',
      trustHubsSub: 'Kelapa Gading & Benhil',
      trustCold: 'Cold-Chain',
      trustColdSub: '100% Frozen Integrity',
      trustHalal: 'Halal & Safe',
      trustHalalSub: 'Horeca Hygiene Certified'
    },
    promoCard: {
      badge: '✨ TOKOPEDIA SPECIAL PROMO • SAVE UP TO 35K',
      readyToCook: 'Ready-To-Cook Frozen Beef',
      stockStatus: '100% Fresh',
      clickHint: 'Click to switch meat',
      orderOfficial: 'Official Online Store',
      courier: 'Safe Delivery Courier',
      courierVal: 'GoSend / Grab Instant (Cold Chain Protected)',
      bonus: 'Exclusive Bonus',
      bonusVal: 'Free Signature Dipping Sauce Pack',
      btnBuyTokopedia: 'Buy on Tokopedia',
      btnFullCatalog: 'Full Catalog'
    },
    productsSec: {
      badge: 'Official Tokopedia & Horeca Catalog',
      title: 'Premium Beef & Authentic Korean Dishes',
      subtitle: 'Ready-to-cook marinated meats cut with Korean culinary precision and vacuum-packed under strict cold chain safety.',
      all: 'All Products',
      meat: '🥩 Beef & BBQ',
      banchan: '🥢 Banchan, Kimchi & Noodles',
      soup: '🍲 Soups & Retort Pouch',
      portionLabel: 'Package & Net Weight:',
      priceTokopedia: 'Price on Tokopedia:',
      btnBuyOnline: 'Order Online',
      btnBulkResto: 'Horeca Bulk Supply'
    },
    tokopediaBanner: {
      title: 'Order Online Directly on Tokopedia Tungbo Benhil',
      subtitle: 'Instant / Same-day courier delivery (GoSend/GrabExpress) ensures meats arrive fully frozen and fresh at your doorstep.',
      btn: 'Visit Tokopedia @tungbobenhil'
    },
    cateringSec: {
      badge: 'Portfolio Showcase',
      title: 'Korean BBQ Live Station & Catering Experience',
      subtitle: 'Live Korean culinary banquet experiences for weddings, corporate gala dinners, and private executive celebrations.',
      btnEvent: 'Inquire for Similar Event',
      igHint: 'Watch our live grill documentation on Instagram Story Highlight @tungbo.id',
      igBtn: 'Open Instagram Highlights'
    },
    servicesSec: {
      badge: 'Business & Horeca Solutions',
      title: 'Tungbo Supply Pillars & Culinary Services',
      subtitle: 'From consistent frozen meat supplies for restaurant chains, master chef marinade formulas, to fresh hydroponic greens.',
      btnConsult: 'Consult Business Services'
    },
    aboutSec: {
      badge: 'About Tungbo Indonesia',
      title: 'Dedicated to Authenticity Since 2019',
      visionTitle: 'Our Vision',
      missionTitle: 'Core Missions',
      dualHubTitle: 'Dual Logistical Centers',
      dualHubSub: 'Kelapa Gading & Bendungan Hilir Hubs',
      dualHubDesc: 'Guaranteeing fast frozen delivery across Jabodetabek and Bali',
      btnContact: 'Contact Us'
    },
    testiSec: {
      badge: 'Client Testimonials',
      title: 'Trusted by F&B Partners & Food Enthusiasts',
      partnersLabel: 'Official Retail Partners & Supermarkets'
    },
    contactSec: {
      badge: 'Partnership & Orders',
      title: 'Initiate Meat Supply & Catering Inquiry',
      desc: 'Connect with our representatives for restaurant supply quotations, bulk marinade pricing, or bespoke Korean BBQ live station catering.',
      hubsLabel: 'Distribution Centers (Dual Hub)',
      hubsVal: 'Kelapa Gading & Bendungan Hilir, Jakarta',
      emailLabel: 'Business Email Correspondence',
      phoneLabel: 'Official WhatsApp & Hotline'
    },
    form: {
      title: 'Sample Request & Quotation Form',
      subtitle: 'Complete your business or event details. Our sales representative will provide competitive bulk pricing.',
      nameLabel: 'Contact Person / PIC Name',
      companyLabel: 'Restaurant / Business / Event Name',
      phoneLabel: 'Active WhatsApp Number',
      serviceLabel: 'Service Category',
      notesLabel: 'Volume Estimation / Special Notes',
      btnSubmit: 'Submit Quotation Request',
      submitting: 'Processing...',
      successTitle: 'Thank You!',
      successDesc: 'Your request has been received. Our sales team will reach out via WhatsApp within 24 hours.',
      btnNew: 'Send Another Request'
    }
  }
};

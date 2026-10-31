<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display the Tungbo Indonesia showcase company profile.
     * Updated with Tokopedia Benhil product data, real catering events, and DKV-standard layout.
     */
    public function index()
    {
        $company = [
            'name' => 'Tungbo Indonesia',
            'tagline' => 'Authentic Korean Food • Ready-To-Cook & Premium Catering',
            'subtagline' => 'Distributor Daging Sapi Marinasi BBQ Khas Korea, Aneka Banchan Autentik, dan Solusi Live Station Catering Terpercaya.',
            'primary_color' => '#14382c',
            'accent_color' => '#c29b38',
            'phone' => '+62 812-9018-8729',
            'email' => 'sales@tungbo.id',
            'tokopedia' => 'https://www.tokopedia.com/tungbobenhil',
            'instagram' => 'https://www.instagram.com/tungbo.id/?hl=en',
            'instagram_handle' => '@tungbo.id',
            'linktree' => 'https://linktr.ee/tungbo.id',
            'hubs' => [
                'Hub Kelapa Gading (North Jakarta Hub)',
                'Hub Bendungan Hilir (Central Jakarta Hub)',
                'Coverage: Jabodetabek & Bali'
            ],
            'address' => 'Kelapa Gading & Bendungan Hilir, Jakarta (Pengiriman Beku Instan Jabodetabek & Bali)',
            'year_established' => '2019',
        ];

        $stats = [
            ['value' => '100+ ', 'label' => 'Resto & Catering Partner', 'desc' => 'Menjadi rantai pasok restoran BBQ & cloud kitchen terkemuka'],
            ['value' => '25+ Ton', 'label' => 'Distribusi Daging / Bulan', 'desc' => 'Daging impor premium cold-chain teruji higienis'],
            ['value' => '100%', 'label' => 'Resep Autentik Tradisional', 'desc' => 'Formula racikan kecap asin pir Korea & bahan asli'],
            ['value' => '4.9 ★', 'label' => 'Rating Kepuasan Tokopedia', 'desc' => 'Ribuan ulasan positif pembeli online di Jakarta & sekitarnya'],
        ];

        // 6 Produk Resmi dari Tokopedia Tungbo Benhil & Catalog
        $products = [
            [
                'category' => 'Ready To Cook Marinated Beef',
                'name' => 'Tungbo Woosamgyup Thinly Sliced Beef',
                'tag' => 'BEST SELLER #1',
                'discount' => 'HEMAT 15%',
                'price_retail' => 'Rp 120.000',
                'desc' => 'Daging sapi iris tipis berkualitas tinggi dengan rendaman bumbu kecap manis gurih khas Korea. Cepat matang 2 menit & sudah termasuk Free Dipping Sauce.',
                'image' => 'https://images.unsplash.com/photo-1544025162-d76694265947?auto=format&fit=crop&w=800&q=80',
                'weight' => 'Pack 250g / Pouch Beku Vacuum'
            ],
            [
                'category' => 'Premium Marinated Ribs',
                'name' => 'Tungbo Suwon Galbi Bone-in Short Ribs',
                'tag' => 'SIGNATURE CHEF CHOICE',
                'discount' => 'SPECIAL BUNDLE',
                'price_retail' => 'Rp 265.000',
                'desc' => 'Potongan iga sapi belah bertulang khas kota Suwon, Korea Selatan. Daging tebal, lembut, termarinasi sari buah pir murni yang meleleh di lidah.',
                'image' => 'https://images.unsplash.com/photo-1558030006-450675393462?auto=format&fit=crop&w=800&q=80',
                'weight' => 'Pack 250g (Iga Sapi Potong Belah)'
            ],
            [
                'category' => 'Chef Special BBQ',
                'name' => 'Tungbo Jumulleok Beef Tender Cubes',
                'tag' => 'CHEF SPECIAL',
                'discount' => 'LIMITED BATCH',
                'price_retail' => 'Rp 145.000',
                'desc' => 'Daging sapi potong dadu empuk yang dibumbui minyak wijen murni panggang, lada hitam, dan garam laut Korea. Sangat harum saat dipanggang di teppan.',
                'image' => 'https://images.unsplash.com/photo-1555939594-58d7cb561ad1?auto=format&fit=crop&w=800&q=80',
                'weight' => 'Pack 250g / Vacuum Sealed'
            ],
            [
                'category' => 'Authentic Korean Noodle',
                'name' => 'Tungbo Classic Japchae Glass Noodles',
                'tag' => 'POPULAR BANCHAN',
                'discount' => null,
                'price_retail' => 'Rp 65.000',
                'desc' => 'Sohun ubi jalar Korea kenyal ditumis wangi dengan irisan jamur shiitake, wortel, bayam segar, daging sapi, dan lumuran minyak wijen khas Tungbo.',
                'image' => 'https://images.unsplash.com/photo-1569718212165-3a8278d5f624?auto=format&fit=crop&w=800&q=80',
                'weight' => 'Pack 300g (Siap Panaskan / Ready to Heat)'
            ],
            [
                'category' => 'Traditional Fresh Kimchi',
                'name' => 'Artisan Fresh Baechu Kimchi Tungbo',
                'tag' => 'NATURALLY FERMENTED',
                'discount' => 'PROBIOTIK ALAMI',
                'price_retail' => 'Rp 45.000 - Rp 85.000',
                'desc' => 'Sawi putih segar hasil panen mitra kebun pilihan difermentasi secara higienis menggunakan Gochugaru asli. Renyah, asam-segar seimbang, tanpa pengawet.',
                'image' => 'https://images.unsplash.com/photo-1583032015879-bf72d1f05470?auto=format&fit=crop&w=800&q=80',
                'weight' => 'Jar Kaca 350g & Pouch 500g'
            ],
            [
                'category' => 'Hearty Korean Warm Soup',
                'name' => 'Tungbo Spicy Yukgaejang Beef Soup',
                'tag' => 'RICH BROTH',
                'discount' => null,
                'price_retail' => 'Rp 75.000',
                'desc' => 'Sup kuah daging sapi suwir pedas kaya rempah daun bawang dan pakis gosari yang dimasak perlahan berjam-jam menghasilkan kuah kaldu merah gurih nagih.',
                'image' => 'https://images.unsplash.com/photo-1547592180-85f173990554?auto=format&fit=crop&w=800&q=80',
                'weight' => 'Pouch Retort 500ml (2 Porsi)'
            ]
        ];

        // Portfolio Catering Event Tungbo dari Instagram (@tungbo.id Highlights: Catering, CNY, Ganjang Gejang, Wedding)
        $catering_portfolios = [
            [
                'title' => 'Live Grill BBQ Station • Corporate Gala Dinner',
                'client' => 'Multinational Tech Company Jakarta',
                'guest_count' => '250+ Tamu',
                'description' => 'Showcase panggangan Woosamgyup & Suwon Galbi langsung di hadapan para tamu dengan peralatan grill modern ramah asap.',
                'image' => 'https://images.unsplash.com/photo-1555939594-58d7cb561ad1?auto=format&fit=crop&w=800&q=80',
                'tag' => 'Corporate Event'
            ],
            [
                'title' => 'Exclusive Korean Wedding Reception Banquet',
                'client' => 'Private Garden Wedding Jakarta',
                'guest_count' => '400+ Tamu',
                'description' => 'Set buffet hidangan lengkap: Korean BBQ, Japchae, Mandu Station, dan Artisan Kimchi Bar yang menghadirkan atmosfer jamuan mewah.',
                'image' => 'https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=800&q=80',
                'tag' => 'Wedding Feast'
            ],
            [
                'title' => 'Intimate Family Gathering & Birthday Pop-Up',
                'client' => 'Private Residence Pantai Indah Kapuk',
                'guest_count' => '50 Tamu',
                'description' => 'Paket intimate BBQ live chef di area hunian privat dengan penyajian daging potong segar dan minuman pendamping khas Korea.',
                'image' => 'https://images.unsplash.com/photo-1544025162-d76694265947?auto=format&fit=crop&w=800&q=80',
                'tag' => 'Private Gathering'
            ]
        ];

        $services = [
            [
                'id' => 'meat-distributor',
                'badge' => 'Distribusi Daging Utama',
                'title' => 'Suplai Daging Iris & Marinasi Horeca',
                'desc' => 'Pasokan konsisten Woosamgyup, Suwon Galbi, dan Shortplate dengan ketebalan presisi untuk resto BBQ, cafe & hotel di Jabodetabek & Bali.',
                'image' => 'https://images.unsplash.com/photo-1544025162-d76694265947?auto=format&fit=crop&w=800&q=80',
                'features' => ['Standar potongan konsisten', 'Formula marinasi asli Suwon', 'Jaminan rantai dingin beku']
            ],
            [
                'id' => 'korean-catering',
                'badge' => 'Live Station Event',
                'title' => 'Korean Food & BBQ Catering Service',
                'desc' => 'Layanan katering interaktif live grill BBQ, set buffet hidangan autentik Korea, tumpeng Korea, dan corporate meal box untuk acara perayaan & korporasi.',
                'image' => 'https://images.unsplash.com/photo-1555939594-58d7cb561ad1?auto=format&fit=crop&w=800&q=80',
                'features' => ['Peralatan grill modern smokeless', 'Chef & tim grillmaster berpengalaman', 'Lengkap banchan, kimchi & soup station']
            ],
            [
                'id' => 'korean-sauces',
                'badge' => 'Formula Autentik Master Chef',
                'title' => 'Bumbu, Saus & Paste Khas Korea',
                'desc' => 'Koleksi saus marinasi rahasia, Gochujang, Doenjang, pure sesame oil, dan kaldu dasar berstandar rasa otentik yang konsisten untuk ekspansi cabang.',
                'image' => 'https://images.unsplash.com/photo-1589302168068-964664d93dc0?auto=format&fit=crop&w=800&q=80',
                'features' => ['Resep otentik Korea', 'Konsistensi rasa multi-outlet', 'Kemasan bulk drum & pail']
            ],
            [
                'id' => 'fresh-vegetables',
                'badge' => 'Segar & Fermentasi Alami',
                'title' => 'Sayuran Segar Hidroponik & Artisan Kimchi',
                'desc' => 'Suplai daun perilla segar, selada romaine, serta artisan Baechu Kimchi dan Radish Kimchi fermentasi alami yang renyah dan kaya probiotik.',
                'image' => 'https://images.unsplash.com/photo-1590301157890-4810ed352733?auto=format&fit=crop&w=800&q=80',
                'features' => ['Sortir grade A harian segar', 'Kimchi renyah kaya probiotik', 'Bebas pengawet sintetis']
            ]
        ];

        $about = [
            'story' => 'Berangkat dari kecintaan pada cita rasa kuliner Korea asli yang kaya rasa, **Tungbo Indonesia** hadir menjembatani kebutuhan bahan makanan bermutu tinggi (*Ready To Cook*) dan katering profesional. Mengoperasikan dua pusat logistik terpadu di **Kelapa Gading** dan **Bendungan Hilir**, Tungbo telah menjadi pilihan utama ribuan keluarga dan mitra kuliner di Jabodetabek hingga Bali.',
            'vision' => 'Menjadi pusat rantai pasok dan representasi katering kuliner Korea autentik terbaik di Indonesia dengan keunggulan higienitas dan cita rasa.',
            'missions' => [
                'Menyediakan daging iris berstandar Horeca dengan formula marinasi tradisional yang kaya rasa.',
                'Menjamin kesegaran bahan melalui sistem cold chain disiplin dan pengiriman instan terpercaya.',
                'Memberikan pengalaman bersantap Korean BBQ interaktif dan berkesan pada setiap layanan katering.',
                'Menjaga kemudahan akses produk bagi penikmat kuliner melalui marketplace Tokopedia dan gerai swalayan.'
            ],
            'values' => [
                ['title' => 'Autentisitas Rasa', 'desc' => 'Menggunakan bumbu impor asli Korea dan resep turun-temurun tanpa rekayasa rasa kimia.'],
                ['title' => 'Integritas Cold Chain', 'desc' => 'Sistem suhu beku terjaga ketat dari persiapan hingga tiba di dapur konsumen.'],
                ['title' => 'Dual Hub Distribution', 'desc' => 'Keberadaan hub Kelapa Gading & Benhil mempercepat pengiriman instan ke seluruh Jabodetabek.'],
                ['title' => 'Standar Higienis Prima', 'desc' => 'Proses pengolahan bersih berstandar industri makanan dengan pengemasan vakum kedap udara.']
            ]
        ];

        $testimonials = [
            [
                'quote' => 'Daging Woosamgyup dan Suwon Galbi dari Tungbo kualitas marinasinya luar biasa meresap. Konsistensi kelembutan dagingnya membuat pelanggan resto kami selalu repeat order.',
                'author' => 'Chef Michael S.',
                'role' => 'Executive Chef, Korean BBQ Grill Resto Group',
                'rating' => 5
            ],
            [
                'quote' => 'Beli rutin lewat Tokopedia Tungbo Benhil untuk stok di rumah. Pengiriman instan cepat, daging tiba masih beku batu dan bumbunya benar-benar seperti makan di Gangnam!',
                'author' => 'Natasha Wijaya',
                'role' => 'Verified Buyer Tokopedia',
                'rating' => 5
            ],
            [
                'quote' => 'Live station katering Korean BBQ Tungbo saat wedding kami benar-benar jadi primadona tamu undangan. Aromanya harum, pelayanannya sigap, dan penataannya sangat elegan.',
                'author' => 'Clarissa Gunawan & Kevin',
                'role' => 'Wedding Hosts Jakarta',
                'rating' => 5
            ]
        ];

        $partners = [
            'Ranch Market', 'The Foodhall', 'Farmers Market', 'Lotte Mart', 'Tokopedia Official', 'Shopee Mall'
        ];

        $instagram_posts = [
            [
                'title' => 'Catering Live Station Experience @ Wedding Jakarta',
                'likes' => '2.4k',
                'comments' => '138',
                'category' => 'Catering Event',
                'image' => 'https://images.unsplash.com/photo-1555939594-58d7cb561ad1?auto=format&fit=crop&w=600&q=80'
            ],
            [
                'title' => 'Signature Suwon Galbi Sizzling Grill',
                'likes' => '1.9k',
                'comments' => '94',
                'category' => 'Highlight BBQ',
                'image' => 'https://images.unsplash.com/photo-1544025162-d76694265947?auto=format&fit=crop&w=600&q=80'
            ],
            [
                'title' => 'Fresh Baechu Kimchi Homemade Batch Harvest',
                'likes' => '1.2k',
                'comments' => '56',
                'category' => 'Artisan Kimchi',
                'image' => 'https://images.unsplash.com/photo-1583032015879-bf72d1f05470?auto=format&fit=crop&w=600&q=80'
            ],
            [
                'title' => 'Now Ready at Tokopedia Tungbo Benhil & Kelapa Gading Hub',
                'likes' => '3.1k',
                'comments' => '204',
                'category' => 'Store Update',
                'image' => 'https://images.unsplash.com/photo-1589302168068-964664d93dc0?auto=format&fit=crop&w=600&q=80'
            ]
        ];

        return view('company.index', compact('company', 'stats', 'services', 'products', 'catering_portfolios', 'about', 'testimonials', 'partners', 'instagram_posts'));
    }
}

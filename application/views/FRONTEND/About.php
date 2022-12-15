<!-- Start Page Title Area -->
<section class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h1><?= $language['title_about_us']; ?></h1>
            <ul>
                <?php if ($getLang) : ?>
                    <li><a href="<?= base_url() . '?lang=' . $getLang; ?>">Home</a></li>
                <?php else : ?>
                    <li><a href="<?= base_url(); ?>">Home</a></li>
                <?php endif; ?>
                <li><?= $language['title_about_us']; ?></li>
            </ul>
        </div>
    </div>
</section>
<!-- End Page Title Area -->

<!-- Start About Area -->
<section class="about-area ptb-70">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12">
                <div class="about-content">
                    <span class="sub-title">AED.co.id</span>
                    <h2>Distributor AED Indonesia</h2>
                    <p style="text-align: justify;"><a href="<?= base_url(); ?>" class="fw-bolder">AED.co.id</a> merupakan salah satu <span class="fw-bolder fst-italic">one stop solutions for Automated External Defibrillator (AED)</span> di Jakarta, Indonesia. Kami terus berkomitmen menjadi distributor dalam menyediakan berbagai <span class="fst-italic">brand</span> alat kedokteran AED dengan harga bersaing serta akan terus kami perbaharui setiap waktunya agar dapat memenuhi kebutuhan Anda. Platform e-commerce ini merupakan salah satu pemasaran AED secara digital dari <span class="fw-bolder">PT. Kurnia Teknologi Indonesia (KTI)</span> yang berdiri sejak tahun 2019.</p>
                </div>
            </div>

            <div class="col-lg-6 col-md-12">
                <div class="about-image">
                    <img src="<?= base_url('@static/img/about/banner-about-us-1.png'); ?>" alt="image">

                    <div class="shape">
                        <img src="<?= base_url('@static/img/about/about-shape1.png'); ?>" alt="image">
                        <img src="<?= base_url('@static/img/about/about-shape2.png'); ?>" alt="image">
                    </div>
                </div>
            </div>
        </div>

        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12">
                <div class="about-image">
                    <img src="<?= base_url('@static/img/about/banner-about-us-2.png'); ?>" alt="image">

                    <div class="shape">
                        <img src="<?= base_url('@static/img/about/about-shape1.png'); ?>" alt="image">
                        <img src="<?= base_url('@static/img/about/about-shape2.png'); ?>" alt="image">
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12">
                <div class="about-content">
                    <p style="text-align: justify;">Induk perusahaan kami. <span class="fw-bolder">PT. Kurnia Safety Supplies (KSS)</span> sudah berpengalaman selama 17 tahun sebagai distributor terdepan produk alat keselamatan dan kesehatan kerja (<span class="fst-italic">occupational health and safety</span>) yang berkualitas sejak tahun 2003 yang melayani berbagai perusahaan kecil, menengah, besar hingga multinasional yang ada di Jakarta hingga seluruh wilayah Indonesia.</p>
                    <p style="text-align: justify;">Anak perusahaan KSS yakni, PT. Kurnia Teknologi Indonesia (KTI) dikhususkan sebagai penyedia alat AED berbagai <span class="fst-italic">brand global</span> melalui platform <span class="fst-italic">e-commerce </span><a href="<?= base_url(); ?>" class="fw-bolder">AED.co.id</a> untuk memenuhi kebutuhan berbagai kalangan industri, institusi pendidikan, perkantoran, pusat hiburan, perbelanjaan, hotel serta layanan <span class="fst-italic">pre-hospital</span> seperti <span class="fst-italic">ambulance</span>.</p>
                </div>
            </div>
        </div>

        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12">
                <div class="about-content">
                    <p style="text-align: justify;">Dengan banyaknya kasus henti jantung mendadak (<span class="fst-italic">sudden cardiac arrest</span>) yang terjadi di keseharian masyarakat yang berdasarkan data dari Perhimpunan Dokter Spesialis Kardiovaskular Indonesia (PERKI) yakni 300.000 hingga 350.000 kasus setiap tahunnya, maka kami siap berkomitmen menjadi distributor resmi untuk melengkapi semua kebutuhan alat kedokteran serta <span class="fst-italic">occupational health and safety berjenis Automated External Defibrillator (AED)</span>.</p>
                </div>
            </div>

            <div class="col-lg-6 col-md-12">
                <div class="about-image">
                    <img src="<?= base_url('@static/img/about/banner-about-us-3.png'); ?>" alt="image">

                    <div class="shape">
                        <img src="<?= base_url('@static/img/about/about-shape1.png'); ?>" alt="image">
                        <img src="<?= base_url('@static/img/about/about-shape2.png'); ?>" alt="image">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End About Area -->

<section class="facility-area bg-f7f8fa pb-1 pt-1"></section>
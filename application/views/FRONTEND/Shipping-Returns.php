<!-- Start Page Title Area -->
<section class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h1><?= $language['title_shipping_return']; ?></h1>
            <ul>
                <?php if ($getLang) : ?>
                    <li><a href="<?= base_url() . '?lang=' . $getLang; ?>">Home</a></li>
                <?php else : ?>
                    <li><a href="<?= base_url(); ?>">Home</a></li>
                <?php endif; ?>
                <li><?= $language['title_shipping_return']; ?></li>
            </ul>
        </div>
    </div>
</section>
<!-- End Page Title Area -->

<!-- Start Shipping & Returns -->
<section class="privacy-policy-area ptb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="privacy-policy-content">
                    <h3>Metode Pengiriman</h3>
                    <p style="text-align: justify;"><span class="mycolorfont">AED.co.id</span> mengirimkan barang pesanan ke seluruh wilayah Indonesia, bekerja sama dengan jasa pengiriman, kami pastikan pengiriman barang Anda aman. Perlu diperhatikan bahwa biaya pengiriman tidak hanya ditentukan dari berat produk, tetapi ditentukan pula oleh dimensi kemasan berdasarkan kriteria yang telah ditetapkan oleh mitra jasa pengiriman kami.</p>

                    <h3>Jangka Waktu Pengiriman</h3>
                    <p style="text-align: justify;">Semua pesanan dikirim dari kantor atau gudang kami dengan estimasi waktu pengiriman:</p>

                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <table class="table">
                                <tr>
                                    <td>Jabodetabek</td>
                                    <td class="text-center">2 - 8 hari kerja</td>
                                </tr>
                                <tr>
                                    <td>Luar Jabodetabek</td>
                                    <td class="text-center">3 - 20 hari kerja</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <h3>Biaya dan Aturan Pengiriman</h3>
                    <p style="text-align: justify;">Berikut poin penting mengenai biaya dan aturan pengiriman pada <span class="mycolorfont">AED.co.id</span>:</p>

                    <ul>
                        <li>
                            <span style="text-align: justify;">Biaya pengiriman akan mengacu pada ketentuan prosedur yang ditetapkan di <span class="mycolorfont">AED.co.id</span>.</span>
                        </li>
                        <li>
                            <span style="text-align: justify;">Pihak customer berkewajiban mengisi formulir pemesanan secara lengkap di <span class="mycolorfont">AED.co.id</span>.</span>
                        </li>
                        <li>
                            <span style="text-align: justify;">Apabila terjadi kehilangan / kerusakan barang maka sepenuhnya merupakan tanggungjawab dari Perusahaan Jasa Pengiriman dan oleh karenanya <span class="mycolorfont">AED.co.id</span> dibebaskan dari segala tuntutan ganti rugi / hukum.</span>
                        </li>
                        <li>
                            <span style="text-align: justify;">Segala biaya pengiriman yang terjadi setelah transaksi ditanggung oleh customer kecuali diatur sebelumnya di dalam perjanjian lain.</span>
                        </li>
                    </ul>

                    <h3>Pengembalian Barang</h3>
                    <p style="text-align: justify;"><span class="fw-bolder fst-italic">Apakah setiap barang dapat dikembalikan?</span> Tidak. Kami hanya menerima pengembalian barang dengan kondisi sama seperti saat Anda terima tanpa merusak segel untuk kasus barang sebagai berikut:</p>
                    <ul>
                        <li>
                            <span style="text-align: justify;">Cacat produksi</span>
                        </li>
                        <li>
                            <span style="text-align: justify;">Masalah Teknis</span>
                        </li>
                        <li>
                            <span style="text-align: justify;">Barang yang salah kirim</span>
                        </li>
                    </ul>

                    <p style="text-align: justify;"><span class="fw-bolder fst-italic">Kriteria apa saja yang harus dipenuhi untuk pengembalian barang?</span> Barang yang masih terdapat “warranty seals” dan kartu garansi. Barang tidak akan diterima pengembaliannya apabila:</p>

                    <ul>
                        <li>
                            <span style="text-align: justify;"><span class="fst-italic">Warranty seals</span> rusak atau hilang</span>
                        </li>
                        <li>
                            <span style="text-align: justify;">Dikembalikan tanpa kemasan asli dan tidak disertakan dengan aksesoris terkait (buku panduan, sertifikat keaslian, dll)</span>
                        </li>
                        <li>
                            <span style="text-align: justify;">Segel kemasan rusak</span>
                        </li>
                        <li>
                            <span style="text-align: justify;">Anda juga harus memberitahukan kepada kami dalam waktu 2 hari kerja setelah menerima pesanan.</span>
                        </li>
                    </ul>

                    <p style="text-align: justify;"><span class="fw-bolder fst-italic">Bagaimana cara mengajukan pengembalian barang?</span> Anda dapat mengirim permintaan ke customer service kami dengan judul <span class="fw-bolder">“REFUND PRODUCT - ORDER NUMBER ()”</span> dan menyertakan informasi di bawah ini:</p>

                    <ul>
                        <li>
                            <span style="text-align: justify;">Nomor order</span>
                        </li>
                        <li>
                            <span style="text-align: justify;">Nomor SKU dan nama barang</span>
                        </li>
                        <li>
                            <span style="text-align: justify;">Alasan dikembalikan</span>
                        </li>
                        <li>
                            <span style="text-align: justify;">Foto produk yang rusak</span>
                        </li>
                    </ul>

                    <p style="text-align: justify;"><span class="fw-bolder fst-italic">Apakah barang yang dikembalikan akan diganti dengan yang baru?</span> Ya, barang akan diganti dengan produk yang sama. Jika opsi barang tidak tersedia, maka akan diberi pilihan sebagai berikut:</p>

                    <ul>
                        <li>
                            <span style="text-align: justify;">Pengembalian dana dalam bentuk transfer bank</span>
                        </li>
                        <li>
                            <span style="text-align: justify;">Menunggu sampai barang tersedia (tidak ada batasan waktu)</span>
                        </li>
                        <li>
                            <span style="text-align: justify;">Menukar dengan barang yang sama namun berbeda <span class="fst-italic">brand</span> dan jika harga pengganti lebih murah maka kelebihan uang akan dikembalikan.</span>
                        </li>
                    </ul>

                    <p style="text-align: justify;"><span class="fw-bolder fst-italic">Apa yang harus dilakukan jika saya menerima pesanan tidak lengkap?</span> Jika barang yang dikirimkan sesuai dengan jumlah pada konfirmasi pengiriman atau surat jalan, maka sisa barang yang belum akan dikirimkan terpisah. Namun jika barang yang diterima tidak sesuai dengan konfirmasi pengiriman atau surat jalan, silahkan menghubungi customer service kami. Kami akan segera mengirimkan barang yang kurang atau bagian produk yang hilang.</p>

                    <h3>Layanan Pelanggan</h3>
                    <p style="text-align: justify;">Untuk pertanyaan ataupun keluhan, pelanggan dapat menghubungi kami di <a href="tel: +628118111703" class="fw-bold">(+62) 8118111703</a> atau via email di <a href="mailto: info@aed.co.id" class="fw-bold">info@aed.co.id</a></p>

                </div>
            </div>
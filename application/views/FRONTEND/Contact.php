<?= $this->session->flashdata('success'); ?>
<?= $this->session->flashdata('errors'); ?>

<!-- Start Page Title Area -->
<section class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h1><?= $language['title_contact_us']; ?></h1>
            <ul>
                <?php if ($getLang) : ?>
                    <li><a href="<?= base_url() . '?lang=' . $getLang; ?>">Home</a></li>
                <?php else : ?>
                    <li><a href="<?= base_url(); ?>">Home</a></li>
                <?php endif; ?>
                <li><?= $language['title_contact_us']; ?></li>
            </ul>
        </div>
    </div>
</section>
<!-- End Page Title Area -->

<!-- Start Contact Area -->
<section class="contact-info-area pt-70 pb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="single-contact-info-box">
                    <div class="icon">
                        <i class="flaticon-placeholder"></i>
                    </div>
                    <h5><?= $language['title_address']; ?></h5>
                    <p>
                        <a href="<?= $getBasicConfiguration['ConfigAddressUrl']; ?>" target="_blank">
                            <small><?= $getBasicConfiguration['ConfigAddress']; ?></small><br />
                        </a>
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="single-contact-info-box">
                    <div class="icon">
                        <i class="flaticon-phone-ringing"></i>
                    </div>
                    <h5><?= $language['title_phone']; ?></h5>
                    <p><small><a href="tel:<?= hp($getBasicConfiguration['ConfigPhone']); ?>">Hotline: <?= $getBasicConfiguration['ConfigPhone']; ?> Ext. <?= $getBasicConfiguration['ConfigExt']; ?></a></small></p>
                    <p><small><a href="https://wa.me/<?= hp($getBasicConfiguration['ConfigWhatsapp']); ?>" target="_blank">Whatsapp: <?= $getBasicConfiguration['ConfigWhatsapp']; ?></a></small></p>
                    <p><a href="#"></a></p>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="single-contact-info-box">
                    <div class="icon">
                        <i class="flaticon-email"></i>
                    </div>
                    <h5><?= $language['title_email']; ?></h5>
                    <p><small><a href="mailto:<?= $getBasicConfiguration['ConfigEmail']; ?>"><?= $getBasicConfiguration['ConfigEmail']; ?></a></small></p>
                    <p><a href="#"></a></p>
                    <p><a href="#"></a></p>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="single-contact-info-box">
                    <div class="icon">
                        <i class="flaticon-clock"></i>
                    </div>
                    <h5><?= $language['title_operational_hour']; ?></h5>
                    <p><small>Senin - Jum'at</small></p>
                    <p><small>8:00AM - 8:00PM</small></p>
                    <p><a href="#"></a></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="contact-area pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="contact-form">
                    <h3><?= $language['title_question']; ?></h2>
                        <?php echo form_open('frontend_controller/customer_question'); ?>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="name" class="form-control" id="name" required data-error="Please enter your name">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label><?= $language['title_email']; ?></label>
                                    <input type="email" name="email" class="form-control" id="email" required data-error="Please enter your email">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label><?= $language['title_phone_number']; ?></label>
                                    <input type="text" name="phone_number" class="form-control" id="phone_number" required data-error="Please enter your phone number">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label><?= $language['title_subject']; ?></label>
                                    <input type="text" name="subject" class="form-control" id="subject">
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label><?= $language['title_message']; ?></label>
                                    <textarea name="message" id="message" class="form-control" cols="30" rows="6" required data-error="Please enter your message"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <input type="hidden" name="session" value="<?= $this->session->userdata('r_sess_user_id'); ?>">
                                <button type="submit" class="default-btn"><?= $language['title_send_message']; ?></button>
                                <div id="msgSubmit" class="h3 text-center hidden"></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                </div>
            </div>

            <div class="col-lg-4 col-md-12">
                <div class="contact-image text-center">
                    <img src="<?= base_url('@static/img/contact.png'); ?>" alt="contact.png">
                </div>
            </div>
        </div>
    </div>
</section>

<div id="maps">
    <iframe src="<?= $getBasicConfiguration['ConfigMapsEmbed']; ?>" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></iframe>
</div>
<!-- End Contact Area -->
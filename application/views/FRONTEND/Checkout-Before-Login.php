<div class="alert-container-remove">
    <div class="alert alert-success d-flex align-items-center alert-dismissible fade show mb-0" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </svg>
        <div>Items removed successfully from cart</div>
    </div>
</div>

<div class="alert-container-quotation">
    <div class="alert alert-success d-flex align-items-center alert-dismissible fade show mb-0" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </svg>
        <div>Quotation has been sent successfully, please wait for more information.</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>

<div class="alert-container-sending-error">
    <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show mb-0" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </svg>
        <div>Quotation sending error!</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>

<?= $this->session->flashdata('success'); ?>
<?= $this->session->flashdata('errors'); ?>

<!-- Start Page Title Area -->
<section class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h1>Checkout</h1>
            <ul>
                <li><a href="<?= base_url(); ?>">Home</a></li>
                <li>Checkout</li>
            </ul>
        </div>
    </div>
</section>
<!-- End Page Title Area -->

<!-- Start Checkout Area -->
<section class="checkout-area ptb-70">
    <div class="container">
        <div class="user-actions mb-5">
            <!-- <i class='bx bx-log-in'></i>
            <span>Returning customer? <a href="javascript:referer();" id="referer">Click here to login</a></span> -->
        </div>

        <form id="quotitation">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="billing-details">
                        <h3 class="title">Billing Details</h3>

                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Country <span class="required">*</span></label>
                                    <input type="text" name="country" class="form-control" value="<?= $this->session->flashdata('valueCountry'); ?>" />
                                    <?= $this->session->flashdata('errorCountry'); ?>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>First Name <span class="required">*</span></label>
                                    <input type="text" name="first_name" class="form-control" value="<?= $this->session->flashdata('valueFirstName'); ?>" />
                                    <?= $this->session->flashdata('errorFirstName'); ?>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Last Name <span class="required">*</span></label>
                                    <input type="text" name="last_name" class="form-control" value="<?= $this->session->flashdata('valueLastName'); ?>" />
                                    <?= $this->session->flashdata('errorLastName'); ?>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Company Name</label>
                                    <input type="text" name="company" class="form-control" value="<?= $this->session->flashdata('valueCompany'); ?>" />
                                    <?= $this->session->flashdata('errorCompany'); ?>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-6">
                                <div class="form-group">
                                    <label>Address <span class="required">*</span></label>
                                    <input type="text" name="address" class="form-control" value="<?= $this->session->flashdata('valueAddress'); ?>" />
                                    <?= $this->session->flashdata('errorAddress'); ?>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-6">
                                <div class="form-group">
                                    <label>Town / City <span class="required">*</span></label>
                                    <input type="text" name="city" class="form-control" value="<?= $this->session->flashdata('valueCity'); ?>" />
                                    <?= $this->session->flashdata('errorCity'); ?>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>State<span class="required">*</span></label>
                                    <input type="text" name="state" class="form-control" value="<?= $this->session->flashdata('valueState'); ?>" />
                                    <?= $this->session->flashdata('errorState'); ?>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Postcode / Zip <span class="required">*</span></label>
                                    <input type="number" name="postcode" class="form-control" value="<?= $this->session->flashdata('valuePostcode'); ?>" />
                                    <?= $this->session->flashdata('errorPostcode'); ?>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Email Address <span class="required">*</span></label>
                                    <input type="email" name="email" class="form-control" value="<?= $this->session->flashdata('valueEmail'); ?>" />
                                    <?= $this->session->flashdata('errorEmail'); ?>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Phone <span class="required">*</span></label>
                                    <input type="number" name="phone" class="form-control" value="<?= $this->session->flashdata('valuePhone'); ?>" />
                                    <?= $this->session->flashdata('errorPhone'); ?>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <textarea name="notes" id="notes" cols="30" rows="5" placeholder="Order Notes" class="form-control"><?= $this->session->flashdata('valueNotes'); ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="order-details">
                        <h3 class="title">Your Order</h3>

                        <div class="order-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Product Name</th>
                                        <th scope="col" class="text-center">Price</th>
                                        <th scope="col" class="text-center">Qty</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>

                                <tbody id="tableCheckout">
                                    <!-- loop products in cart -->

                                    <!-- end loop products in cart -->
                                </tbody>
                                <tbody id="tableSubTotalCheckout">

                                </tbody>
                                <tbody id="tableTotalVatCheckout">

                                </tbody>
                                <tbody id="tableGrandTotalCheckout">

                                </tbody>
                            </table>
                        </div>

                        <div class="payment-box">
                            <div class="payment-method">

                            </div>

                            <div id="btnCheckout">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" class="csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
        </form>
    </div>
</section>
<!-- End Checkout Area -->

<section class="facility-area bg-f7f8fa pb-1 pt-1"></section>
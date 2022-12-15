<!-- © 2018 Shift Technologies. All rights reserved. -->
<table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed;background-color:#f9f9f9" id="bodyTable">
    <tbody>
        <tr>
            <td style="padding-right:10px;padding-left:10px;" align="center" valign="top" id="bodyCell">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" class="wrapperBody" style="max-width:100%">
                    <tbody>
                        <tr>
                            <td align="center" valign="top">
                                <table border="0" cellpadding="0" cellspacing="0" width="100%" class="tableCard" style="background-color:#fff;border-color:#e5e5e5;border-style:solid;border-width:0 1px 1px 1px;">
                                    <tbody>
                                        <tr>
                                            <td style="background-color:#000;font-size:1px;line-height:3px" class="topBorder" height="3">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td style="padding-top: 20px; padding-bottom: 20px; padding-left: 20px; border-bottom: 1px solid;" align="" valign="middle" class="emailLogo">
                                                <a href="#" style="text-decoration:none" target="_blank">
                                                    <img alt="" border="0" src="https://demo.aed.co.id/@static/img/logo.png" style="width:100%;max-width:150px;height:auto;display:block;float:right;margin-right:10px;" width="150">
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding-left:20px;padding-right:20px; padding-top: 20px;" valign="top" class="containtTable ui-sortable">
                                                <table border="0" cellpadding="0" cellspacing="0" width="100%" class="tableDescription" style="">
                                                    <tbody>
                                                        <tr>
                                                            <td style="padding-bottom: 20px;" valign="top" class="description">
                                                                <p class="text" style="color:#666;font-weight:bold;font-family:'Open Sans',Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;font-style:normal;letter-spacing:normal;line-height:22px;text-transform:none;padding:0;margin:0"><?= $CompanyName; ?></p>
                                                                <p class="text" style="color:#666;font-family:'Open Sans',Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;font-style:normal;letter-spacing:normal;line-height:22px;text-transform:none;padding:0;margin:0"><?= $CompanyAddress; ?></p>
                                                                <p class="text" style="color:#666;font-family:'Open Sans',Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;font-style:normal;letter-spacing:normal;line-height:22px;text-transform:none;padding:0;margin:0"><?= $CompanyPhone; ?></p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding-bottom: 20px;" valign="top" class="description">
                                                                <p class="text" style="color:#666;font-family:'Open Sans',Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;font-style:normal;letter-spacing:normal;line-height:22px;text-transform:none;padding:0;margin:0">Customer:</p>
                                                                <hr />
                                                                <p class="text" style="color:#666;font-family:'Open Sans',Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;font-style:normal;letter-spacing:normal;line-height:22px;text-transform:none;padding:0;margin:0"><?= $InvoiceFirstName . " " .  $InvoiceLastName; ?></p>
                                                                <p class="text" style="color:#666;font-family:'Open Sans',Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;font-style:normal;letter-spacing:normal;line-height:22px;text-transform:none;padding:0;margin:0"><?= $InvoiceAddress . ', ' .  $InvoiceCity . ', ' . $InvoiceState . ', ' . $InvoicePostcode . ', ' .  $InvoiceCountry; ?></p>
                                                                <p class="text" style="color:#666;font-family:'Open Sans',Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;font-style:normal;letter-spacing:normal;line-height:22px;text-transform:none;padding:0;margin:0"><?= $InvoicePhone; ?></p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table width="100%" id="twoCellTable" cellspacing="0" cellpadding="10" style="margin-bottom: 20px;border-width:1px; border-color:#444444;border-style:solid;" align="center">
                                                    <thead>
                                                        <tr>
                                                            <td style="border:1px solid black;">
                                                                <p class="text" style="color:#666;font-family:'Open Sans',Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;font-style:normal;letter-spacing:normal;line-height:22px;text-transform:none;padding:0;margin:0">Product</p>
                                                            </td>
                                                            <td style="border:1px solid black;">
                                                                <p class="text" style="color:#666;font-family:'Open Sans',Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;font-style:normal;letter-spacing:normal;line-height:22px;text-transform:none;padding:0;margin:0">Unit Price</p>
                                                            </td>
                                                            <td align="center" style="border:1px solid black;">
                                                                <p class="text" style="color:#666;font-family:'Open Sans',Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;font-style:normal;letter-spacing:normal;line-height:22px;text-transform:none;padding:0;margin:0">Qty</p>
                                                            </td>
                                                            <td style="border:1px solid black;">
                                                                <p class="text" style="color:#666;font-family:'Open Sans',Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;font-style:normal;letter-spacing:normal;line-height:22px;text-transform:none;padding:0;margin:0">Total</p>
                                                            </td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($getCart as $cart) : ?>
                                                            <tr>
                                                                <td style="border:1px solid black;">
                                                                    <p class="text" style="color:#666;font-family:'Open Sans',Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;font-style:normal;letter-spacing:normal;line-height:22px;text-transform:none;padding:0;margin:0"><?= $cart['ProductName']; ?></p>
                                                                </td>
                                                                <td style="border:1px solid black;">
                                                                    <p class="text" style="color:#666;font-family:'Open Sans',Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;font-style:normal;letter-spacing:normal;line-height:22px;text-transform:none;padding:0;margin:0"><?= number_format($cart['ProductPrice'], 0, ',', '.'); ?> IDR</p>
                                                                </td>
                                                                <td align="center" style="border:1px solid black;">
                                                                    <p class="text" style="color:#666;font-family:'Open Sans',Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;font-style:normal;letter-spacing:normal;line-height:22px;text-transform:none;padding:0;margin:0"><?= $cart['ProductQty']; ?></p>
                                                                </td>
                                                                <td style="border:1px solid black;">
                                                                    <p class="text" style="color:#666;font-family:'Open Sans',Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;font-style:normal;letter-spacing:normal;line-height:22px;text-transform:none;padding:0;margin:0"><?= number_format($cart['ProductTotal'], 0, ',', '.'); ?> IDR</p>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                                <hr />
                                                <table border="0" cellpadding="0" cellspacing="0" width="100%" class="tableDescription" style="">
                                                    <tbody>
                                                        <tr>
                                                            <td width="60%" style="padding-bottom: 20px;text-align:right" valign="top" class="description">
                                                                <p class="text" style="color:#666;font-weight:bold;font-family:'Open Sans',Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;font-style:normal;letter-spacing:normal;line-height:22px;text-transform:none;padding:0;margin:0">Sub Total</p>
                                                            </td>
                                                            <td style="padding-bottom: 20px;text-align:right" valign="top" class="description">
                                                                <p class="text" style="color:#666;font-weight:bold;font-family:'Open Sans',Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;font-style:normal;letter-spacing:normal;line-height:22px;text-transform:none;padding:0;margin:0"><?= number_format($SubTotal, 0, ',', '.'); ?> IDR</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="60%" style="padding-bottom: 20px;text-align:right" valign="top" class="description">
                                                                <p class="text" style="color:#666;font-weight:bold;font-family:'Open Sans',Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;font-style:normal;letter-spacing:normal;line-height:22px;text-transform:none;padding:0;margin:0">Tax</p>
                                                            </td>
                                                            <td style="padding-bottom: 20px;text-align:right" valign="top" class="description">
                                                                <p class="text" style="color:#666;font-weight:bold;font-family:'Open Sans',Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;font-style:normal;letter-spacing:normal;line-height:22px;text-transform:none;padding:0;margin:0"><?= number_format($TotalTax, 0, ',', '.'); ?> IDR</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="60%" style="padding-bottom: 20px;text-align:right" valign="top" class="description">
                                                                <p class="text" style="color:#666;font-weight:bold;font-family:'Open Sans',Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;font-style:normal;letter-spacing:normal;line-height:22px;text-transform:none;padding:0;margin:0">Total Billing</p>
                                                            </td>
                                                            <td style="padding-bottom: 20px;text-align:right" valign="top" class="description">
                                                                <p class="text" style="color:#666;font-weight:bold;font-family:'Open Sans',Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;font-style:normal;letter-spacing:normal;line-height:22px;text-transform:none;padding:0;margin:0"><?= number_format($TotalBilling, 0, ',', '.'); ?> IDR</p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table border="0" cellpadding="0" cellspacing="0" width="100%" class="space">
                                    <tbody>
                                        <tr>
                                            <td style="font-size:1px;line-height:1px" height="30">&nbsp;</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table border="0" cellpadding="0" cellspacing="0" width="100%" class="wrapperFooter" style="max-width:600px">
                    <tbody>
                        <tr>
                            <td align="center" valign="top">
                                <table border="0" cellpadding="0" cellspacing="0" width="100%" class="footer">
                                    <tbody>
                                        <tr>
                                            <td style="padding-top:10px;padding-bottom:10px;padding-left:10px;padding-right:10px" align="center" valign="top" class="socialLinks">
                                                <a href="https://www.youtube.com/user/zollmedical" style="display: inline-block;" target="_blank" class="twitter">
                                                    <img alt="" border="0" src="http://email.aumfusion.com/vespro/img/social/light/youtube.png" style="height:auto;width:100%;max-width:40px;margin-left:2px;margin-right:2px" width="40">
                                                </a>
                                                <a href="https://www.instagram.com/kurniateknologi/" style="display: inline-block;" target="_blank" class="instagram">
                                                    <img alt="" border="0" src="http://email.aumfusion.com/vespro/img/social/light/instagram.png" style="height:auto;width:100%;max-width:40px;margin-left:2px;margin-right:2px" width="40">
                                                </a>
                                                <a href="https://www.linkedin.com/company/pt-kurnia-teknologi-indonesia-kti/" style="display: inline-block;" target="_blank" class="linkdin">
                                                    <img alt="" border="0" src="http://email.aumfusion.com/vespro/img/social/light/linkdin.png" style="height:auto;width:100%;max-width:40px;margin-left:2px;margin-right:2px" width="40">
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 10px 10px 5px;" align="center" valign="top" class="brandInfo">
                                                <p class="text" style="color:#bbb;font-family:'Open Sans',Helvetica,Arial,sans-serif;font-size:12px;font-weight:400;font-style:normal;letter-spacing:normal;line-height:20px;text-transform:none;text-align:center;padding:0;margin:0">AED.co.id. | Jl. Griya Agung No.47-48. | Sunter Agung, Tanjung Priok, Jakarta Utara, DKI Jakarta 14350.</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 0px 10px 10px;" align="center" valign="top" class="footerEmailInfo">
                                                <p class="text" style="color:#bbb;font-family:'Open Sans',Helvetica,Arial,sans-serif;font-size:12px;font-weight:400;font-style:normal;letter-spacing:normal;line-height:20px;text-transform:none;text-align:center;padding:0;margin:0">If you have any quetions please contact us <a href="#" style="color:#bbb;text-decoration:underline" target="_blank">info@aed.co.id.</a></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-size:1px;line-height:1px" height="30">&nbsp;</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size:1px;line-height:1px" height="30">&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
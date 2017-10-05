<script src="<?php echo base_url(); ?>asset/js/ajax.js"></script>
<link href="<?php echo base_url(); ?>asset/css/select2.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url(); ?>asset/js/select2.js"></script>

<?php $cart = $this->cart->contents() ; ?>

<div class="box-background">

        <div class="row">
            <div class="col-md-12">


                <div class="form-group">
                    <label class="col-sm-5 control-label">Order No.</label>

                    <div class="col-sm-7">
                        <input type="text" value="<?php echo $this->session->userdata('order_no'); ?>" disabled class="form-control ">
                    </div>
                </div>

            </div>
        </div>

</div>

<div class="box-body">

    <div class="row">

        <div class="col-md-12">

                <div class="input-group">
                      <span class="input-group-btn">
                        <button type="submit" class="btn bg-blue" type="button" data-placement="top" data-toggle="tooltip">Pelanggan</button>
                      </span>
                    <select id="customer" style="width: 100%;" name="customer" onchange="getCustomer(this)">
                        <option value="">Select Customer</option>
                        <?php  $customer = $this->db->get('tbl_customer')->result(); ?>
                        <?php if (!empty($customer)): ?>
                            <?php foreach ($customer as $item) : ?>
                                <option value="<?php echo $item->customer_id; ?>" <?php echo $this->session->userdata('customer_id') == $item->customer_id ?'selected':'' ?>>
                                    <?php echo $item->customer_code.'-'.$item->customer_name ?>
                                </option>
                            <?php endforeach; ?>
                        <?php endif; ?>

                    </select>
                    <input type="hidden" name="customer_flag" value="customer">
                </div>

        </div>


    </div>
</div>

<form method="post" action="<?php echo base_url()?>admin/order/save_order">

        <div class="box-background" id="order">
            <div class="box-body">
                <div class="row">

                    <div class="col-md-12">


                       <div class="form-group">
                            <label class="col-sm-5 control-label">Sub Total</label>

                            <div class="col-sm-7">
                                <input type="text" value="<?php
                                if(empty($cart)){
                                    echo $this->localization->currency(0.00);
                                }else{ echo $this->localization->currency($this->cart->total());  }

                                ?>" disabled  class="form-control unite">
                            </div>
                        </div>

                        <?php $total_tax = 0.00 ?>
                        <?php if (!empty($cart)): foreach ($cart as $item) : ?>
                            <?php $total_tax += $item['tax'] ?>
                        <?php endforeach; endif ?>

                        <div class="form-group">
                            <label class="col-sm-5 control-label">Pajak</label>

                            <div class="col-sm-7">
                                <input type="text" value="<?php
                                if(empty($cart)){
                                    echo $this->localization->currency(0.00);
                                }else {
                                    echo $this->localization->currency($total_tax) ;
                                }
                                ?>" disabled class="form-control unite">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-5 control-label">Diskon</label>

                            <div class="col-sm-7">
                                <?php $discount = $this->session->userdata('discount') ?>
                                <div class="input-group">
                                    <input type="number" class="form-control" onchange="discountValue(this.value)"
                                           value="<?php if(!empty($discount)) {echo $discount ; }else{ echo '0'; }?>" >
                                    <span class="input-group-addon">%</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12" style="margin-bottom: 5px"></div>


                        <?php if(!empty($discount)): ?>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">Potongan Harga</label>

                            <div class="col-sm-7">
                                <?php
                                $cart_total = $this->cart->total();
                                $discount_amount = (($cart_total + $total_tax) * $discount ) /100;
                                ?>
                                <input type="text" value="<?php echo $this->localization->currency($discount_amount);
                                ?>" disabled class="form-control unite">
                            </div>
                        </div>
                    <?php endif ?>





                    </div>


                </div>

            </div>
            <!-- /.box-body -->
        </div>

    <?php $cart_total = $this->cart->total();
    if(!empty($discount)){
        $grand_total = $cart_total + $total_tax - $discount_amount;
    }else{
        $grand_total = $cart_total + $total_tax;
    }
    ?>

        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-sm-4 control-label" style="padding-top: 5px; font-size: 15px">Total :</label>

                        <div class="col-sm-8">
                            <h2><?php
                                if(empty($cart)){
                                    echo $this->localization->currencyFormat(0.00) ;
                                }else {
                                    echo $this->localization->currencyFormat($grand_total) ;
                                }
                                ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="box-background">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">

                        <div class="form-group">
                            <label class="col-sm-5 control-label">Tipe Pembayaran</label>

                            <div class="col-sm-7">
                                <select name="payment_method" class="form-control" id="order_payment_type">
                                    <option value="cash">Tunai Lunas</option>
                                    <option value="cheque">Debit Lunas</option>
                                    <option value="card">Kartu Kredit</option>
                                    <option value="pending">Pembayaran Menunggak</option>
                                    <option value="in_part">Pembayaran Sebagian</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12" style="display: none" id="payment">

                        <div class="form-group">
                            <label class="col-sm-5 control-label">No Kartu</label>

                            <div class="col-sm-7">
                                <input class="form-control" name="payment_ref">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12" style="display: none" id="in_part">

                        <div class="form-group">
                            <label class="col-sm-5 control-label">Uang Muka</label>

                            <div class="col-sm-7">
                                <input class="form-control" placeholder="10000" name="payment_ref">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 order-panel"  id="shipping">
                            <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                                <li class="active"><a href="#shipping_address" data-toggle="tab">Alamat Kirim</a></li>
                                <li><a href="#note" data-toggle="tab">Catatan</a></li>
                            </ul>
                        <div id="my-tab-content" class="tab-content">

                            <!-- ***************  Cart Tab Start ****************** -->
                                <div class="tab-pane active" id="shipping_address">
                                    <div class="form-group">
                                        <label>Alamat Pengiriman</label>
                                        <?php
                                                $address = $this->session->userdata('address');
                                                $breaks = array("<br />","<br>","<br/>");
                                                $address = str_ireplace($breaks, "", $address);
                                        ?>
                                        <textarea class="form-control" rows="4" name="shipping_address" placeholder="Enter ..." ><?php if(!empty($address)) echo $address ?></textarea>

                                    </div>
                                </div>
                                <div class="tab-pane" id="note">
                                    <div class="form-group">
                                        <label>Catatan Pemesanan</label>
                                        <textarea class="form-control" name="note" rows="4" placeholder="Enter ..."></textarea>

                                    </div>
                                </div>


                    </div>


                </div>
            </div>
        </div>


        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" id="btn_order" class="btn bg-navy btn-block btn-flat " type="submit" <?php echo !empty($cart)?'':'disabled' ?>>Submit
                    </button>
                </div>
            </div>
        </div>

            <!-- hidden field -->

            <input type="hidden" name="customer_id" value="<?php  echo $this->session->userdata('customer_code') ?>">
            <input type="hidden" value="<?php echo $this->session->userdata('order_no'); ?>" name="order_no">
            <input type="hidden" value="<?php echo $grand_total; ?>" name="grand_total">
            <input type="hidden" value="<?php echo $total_tax; ?>" name="total_tax">
            <input type="hidden" value="<?php if(!empty($discount_amount)) echo $discount_amount ; ?>" name="discount_amount">
            <input type="hidden" value="<?php if(!empty($discount)) {echo number_format($discount, 0, '.', ',') ; }else{ echo '0'; }
            ?>" name="discount">
</form>

<script>
    $(document).ready(function() {

        $('.box-body').css({"border-top":"0px solid #ccc"});

        $("#customer").select2({
            placeholder: "Select a State",
            allowClear: true
        });

    });

</script>
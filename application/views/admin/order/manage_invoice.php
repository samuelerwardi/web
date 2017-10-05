
<!--Massage-->
<?php echo message_box('success'); ?>
<?php echo message_box('error'); ?>
<!--/ Massage-->


<section class="content">
    <div class="row">
        <div class="col-md-12">

            <div class="box box-primary ">
                <div class="box-header box-header-background with-border">
                        <h3 class="box-title ">Kelola Faktur</h3>
                </div>



                <div class="box-body">


                    <div id="printableArea">
                        <!-- Table -->
                        <table id="datatable-responsive" class="table table-striped table-bordered datatable-buttons">
                            <thead ><!-- Table head -->
                            <tr>
                                <th class="active">ID</th>
                                <th class="active">No Faktur</th>
                                <th class="active">No Pesanan</th>
                                <th class="active">Waktu</th>
                                <th class="active">Pelanggan</th>
                                <th class="active">Pembayaran</th>
                                <th class="active">Total Tagihan</th>
                                <th class="active">Aksi</th>

                            </tr>
                            </thead><!-- / Table head -->
                            <tbody><!-- / Table body -->
                            <?php $counter =1 ; ?>
                            <?php if (!empty($invoice)): foreach ($invoice as $v_invoice) : ?>
                                <tr class="custom-tr">
                                    <td class="vertical-td">
                                        <?php echo  $counter ?>
                                    </td>
                                    <td class="vertical-td highlight">
                                        <a href="<?php echo base_url()?>admin/order/order_invoice/<?php echo $v_invoice->invoice_no ?>">INV-<?php echo $v_invoice->invoice_no ?></a>
                                    </td>
                                    <td class="vertical-td highlight">
                                        <a href="<?php echo base_url()?>admin/order/view_order/<?php echo $v_invoice->order_no ?>">ORD-<?php echo $v_invoice->order_no ?></a>
                                    </td>
                                    <td class="vertical-td"><?php echo $this->localization->dateFormat($v_invoice->invoice_date) ?></td>
                                    <td class="vertical-td"><?php echo $v_invoice->customer_name ?></td>
                                    <td class="vertical-td"><?php if($v_invoice->payment_method=='in_part'){ echo 'Bayar Sebagian'; }elseif($v_invoice->payment_method=='cash'){ echo 'Lunas';}elseif($v_invoice->payment_method=='cheque'){ echo 'Via Kartu Debit';}elseif($v_invoice->payment_method=='card'){ echo 'Via Kartu Kredit';}else{ echo 'Menunggak'; } ?></td>
                                    <td class="vertical-td currency"><?php echo $this->localization->currencyFormat($v_invoice->grand_total) ?></td>
                                    
                                    <td class="vertical-td">

                                        <div class="btn-group dropdown">
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                More                                  <span class="caret"></span>
                                            </button>

                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="<?php echo base_url()?>admin/order/order_invoice/<?php echo $v_invoice->invoice_no ?>"><i class="glyphicon glyphicon-search text-success"></i>View Invoice</a>
                                                </li>

                                                <li>
                                                    <a onclick="return confirm('Are you sure want to cancel this order ?');" href="<?php echo base_url()?>admin/order/cancel_order/<?php echo $v_invoice->invoice_no ?>/<?php echo $v_invoice->order_no ?>"><i class="fa fa-times-circle-o text-danger"></i><span class="text-danger">Cancel Order</span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>

                                </tr>
                            <?php
                                $counter++;
                            endforeach;
                            ?><!--get all sub category if not this empty-->
                            <?php else : ?> <!--get error message if this empty-->
                                <td colspan="8">
                                    <strong>There is no record for display</strong>
                                </td><!--/ get error message if this empty-->
                            <?php endif; ?>
                            </tbody><!-- / Table body -->
                        </table> <!-- / Table -->
                        </div>

                </div><!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!--/.col end -->
    </div>
    <!-- /.row -->
</section>




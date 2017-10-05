
<!--Massage-->
<?php echo message_box('success'); ?>
<?php echo message_box('error'); ?>
<!--/ Massage-->


<section class="content">
    <div class="row">
        <div class="col-md-12">

            <div class="box box-primary ">
                <div class="box-header box-header-background with-border">
                        <h3 class="box-title ">Mengelola Pesanan</h3>
                </div>



                <div class="box-body">

                    <div id="printableArea">

                        <!-- Table -->
                        <table id="datatable" class="table table-striped table-bordered datatable-buttons">
                            <thead ><!-- Table head -->
                            <tr>
                                <th class="active">ID</th>
                                <th class="active">No Faktur</th>
                                <th class="active">Waktu</th>
                                <th class="active">Status</th>
                                <th class="active">Total Tagihan</th>
                                <th class="active">Sisa Tagihan</th>
                                <th class="active">Pembayaran</th>
                                <th class="active">Pelanggan</th>
                                <th class="active">Aksi</th>

                            </tr>
                            </thead><!-- / Table head -->
                            <tbody><!-- / Table body -->
                            <?php $counter =1 ; ?>
                            <?php if (!empty($order)): foreach ($order as $v_order) : ?>
                                <tr class="custom-tr">
                                    <td class="vertical-td">
                                        <?php echo  $counter ?>
                                    </td>
                                    <td class="vertical-td highlight">
                                        <a href="<?php echo base_url()?>admin/order/view_order/<?php echo $v_order->order_no ?>">ORD-<?php echo $v_order->order_no ?></a>
                                    </td>
                                    <td class="vertical-td"><?php echo $this->localization->dateFormat($v_order->order_date)?></td>
                                    <td class="vertical-td">
                                        <?php
                                          if($v_order->order_status == 0){
                                              echo '<span class="label label-warning">Pending</span>';
                                          }elseif($v_order->order_status == 1){
                                              echo '<span class="label label-danger">Pesanan Batal</span>';
                                        }else{
                                              echo '<span class="label label-info">Pesanan Lunas</span>';
                                        }
                                        ?>
                                    </td>
                                    <td class="vertical-td currency"><?php echo $this->localization->currencyFormat($v_order->grand_total)  ?></td>
                                    <td class="vertical-td currency"><?php if($v_order->payment_method=='in_part'){ echo $this->localization->currencyFormat($v_order->grand_total-$v_order->payment_ref); }else{echo $this->localization->currencyFormat($v_order->grand_total-$v_order->grand_total); }  ?></td>
                                    <td class="vertical-td"><?php if($v_order->payment_method=='in_part'){ echo 'Bayar Sebagian'; }elseif($v_order->payment_method=='cash'){ echo 'Lunas';}elseif($v_order->payment_method=='cheque'){ echo 'Via Kartu Debit';}elseif($v_order->payment_method=='card'){ echo 'Via Kartu Kredit';}else{ echo 'Menunggak'; } ?></td>
                                    <td class="vertical-td"><?php echo $v_order->customer_name ?></td>

                                    <td class="vertical-td">

                                        <div class="btn-group dropdown">
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                More <span class="caret"></span>
                                            </button>

                                            <ul class="dropdown-menu">

                                                <li>
                                                    <a href="<?php echo base_url()?>admin/order/view_order/<?php echo $v_order->order_no ?>"><i class="glyphicon glyphicon-search text-success"></i><span>View Order</span></a>
                                                </li>

                                                <?php if($v_order->order_status == 0){?>
                                                    <li>
                                                        <a href="<?php echo base_url()?>admin/order/change_status/<?php echo $v_order->order_no ?>" data-target="#modalSmall" data-toggle="modal"><i class="glyphicon glyphicon-edit"></i><span>Merubah Status</span></a>
                                                    </li>
                                                <?php }?>

                                                <?php if($v_order->order_status == 1 || $v_order->order_status == 0 ){?>
                                                    <li>
                                                        <a onclick="return confirm('Are you sure want to delete this order');" href="<?php echo base_url()?>admin/order/delete_order/<?php echo $v_order->order_no ?>"><i class="fa fa-trash-o text-danger"></i><span class="text-danger">Delete</span></a>
                                                    </li>
                                                <?php }?>

                                            </ul>
                                        </div>
                                    </td>

                                </tr>
                            <?php
                                $counter++;
                            endforeach;
                            ?><!--get all sub category if not this empty-->
                            <?php else : ?> <!--get error message if this empty-->
                                <td colspan="6">
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





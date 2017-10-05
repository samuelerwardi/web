<?php
$info = $this->session->userdata('business_info');
if(!empty($info->currency))
{
    $currency = $info->currency ;
}else
{
    $currency = '$';
}
?>
<!--Massage-->
<?php echo message_box('success'); ?>
<?php echo message_box('error'); ?>
<!--/ Massage-->


<section class="content">
    <div class="row">
        <div class="col-md-12">

            <div class="box box-primary">
                <div class="box-header box-header-background with-border">
                        <h3 class="box-title ">Riwayat Pembelanjaan</h3>
                </div>


                <div class="box-body">

                        <!-- Table -->

                    <table id="datatable" class="table table-striped table-bordered datatable-buttons">
                        <thead ><!-- Table head -->
                        <tr>
                            <th class="active">ID</th>
                            <th class="active">Faktur</th>
                            <th class="active">Nama Suplayer</th>
                            <th class="active">Waktu Pembelanjaan</th>
                            <th class="active">Total</th>
                            <th class="active">Penambah Data</th>
                            <th class="active">Aksi</th>

                        </tr>
                        </thead><!-- / Table head -->
                        <tbody><!-- / Table body -->
                        <?php $counter =1 ; ?>
                        <?php if (!empty($purchase)): foreach ($purchase as $v_purchase) : ?>
                            <tr class="custom-tr">
                                <td class="vertical-td">
                                    <?php echo  $counter ?>
                                </td>
                                <td class="vertical-td highlight">
                                    <a href="<?php echo base_url()?>admin/purchase/purchase_invoice/<?php echo $v_purchase->purchase_id ?>">PUR-<?php echo $v_purchase->purchase_order_number ?></a>
                                </td>
                                <td class="vertical-td"><?php echo $v_purchase->supplier_name ?></td>
                                <td class="vertical-td"><?php echo $this->localization->dateFormat($v_purchase->datetime) ?></td>
                                <td class="vertical-td currency"><?php echo $this->localization->currencyFormat($v_purchase->grand_total) ?></td>
                                <td class="vertical-td"><?php echo $v_purchase->purchase_by ?></td>

                                <td class="vertical-td">
                                    <?php echo btn_view('admin/purchase/purchase_invoice/' . $v_purchase->purchase_id); ?>

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

                </div><!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!--/.col end -->
    </div>
    <!-- /.row -->
</section>





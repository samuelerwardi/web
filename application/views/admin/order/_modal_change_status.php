
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Merubah Status</h4>
</div>
<div class="modal-body wrap-modal wrap" style="max-height: 900px;">

    <form method="post" id="OrderForm" action="<?php echo site_url("admin/order/order_confirmation") ?>">
        <div class="well well-sm">
            <div class="form-group">
                <label>Merubah Status</label>
                <select name="order_status" class="form-control" id="order_status">
                    <option value="">Select Status</option>
                    <option value="2">Pembayaran Lunas</option>
                    <option value="1">Pesanan Di Batalkan</option>
                </select>
            </div>
        </div>


        <div class="well well-sm" id="shipping" style="display: none">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="shipping_address" rows="4" class="form-control"><?php echo $order->shipping_address ?></textarea>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Catatan</label>
                        <textarea name="note" rows="4" class="form-control"><?php echo $order->note ?></textarea>
                    </div>
                </div>

            </div>
        </div>


        <!--    Credit Card Payment-->
        <div class="well well-sm" id="payment" style="display: none">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Tipe Pembayaran</label>
                        <select class="form-control" name="payment_method" id="payment_method">
                            <option value="cash">Tunai Lunas</option>
                            <option value="cheque">Debit Lunas</option>
                            <option value="card">Kartu Kredit</option>
                        </select>
                    </div>

                    <div style="display: none" id="payment_ref">
                        <div class="form-group">
                            <label>No Referensi</label>
                            <input type="text" class="form-control" id="payment_ref" name="payment_ref">
                        </div>
                    </div>

                </div>
            </div>
        </div>



        <table class="table table-bordered">            
            <tr>
                <td class="active"><strong>Total</strong></td>
                <td><strong><?php echo $this->localization->currencyFormat($order->grand_total); ?></strong></td>
            </tr>
            <?php if($order->payment_method=='in_part'){ ?>
            <tr>
                <td class="active"><strong>Pembayaran Di Muka</strong></td>
                <td><strong><?php echo $this->localization->currencyFormat($order->payment_ref); ?></strong></td>
            </tr>
            <tr>
                <td class="active"><strong>Sisa Pembayaran</strong></td>
                <td><strong><?php echo $this->localization->currencyFormat($order->grand_total-$order->payment_ref); ?></strong></td>
            </tr>
            <?php } ?>
        </table>

        <!--        Hidden text field-->
        <input type="hidden" value="<?php echo $order->order_id ?>" name="order_id">
        <input type="hidden" value="<?php echo $order->order_no ?>" name="order_no">

        <button type="submit" id="sbtn" class="btn-flat btn bg-olive btn-block"><strong>Save</strong></button>

    </form>

</div>


<script>
    $('#modalSmall').on('loaded.bs.modal', function () {


        $(function () {


            $('#order_status').change(function () {
                var val = $("#order_status").val();

                if (val == '2')
                {
                    $('#payment').show();
                    $('#shipping').show();

                } else
                {
                    $('#payment').hide();
                    $('#shipping').hide();
                }
            });


            $('#payment_method').change(function () {
                var val = $("#payment_method").val();

                if (val == 'cheque')
                {
                    $('#payment_ref').show();
                } else if (val == 'card')
                {
                    $('#payment_ref').show();


                } else
                {
                    $('#payment_ref').hide();
                }
            });

        });



    });
</script>
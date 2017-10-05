
<!-- Page Content Start -->
<!-- ================== -->

<div class="wraper container-fluid">

    <div class="row">
        <div class="col-lg-3 col-sm-6 col-sx-12">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h2>
                        <?php
                        if (!empty($revenue->grand_total)) {
                            echo $this->localization->currencyFormat($revenue->grand_total);
                        } else {
                            echo $this->localization->currencyFormat(0);
                        }
                        ?>
                    </h2>
                    <p>Omset Bulan Ini</p>
                </div>
                <div class="icon">
                    <i class="fa fa-bar-chart-o"></i>
                </div>
                <span class="small-box-footer">
                    <?php echo date('F'); ?>
                </span>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-sm-6 col-sx-12">
            <!-- small box -->
            <div class="small-box bg-purple">
                <div class="inner">
                    <h2>
                        <?php
                        if (!empty($revenue->grand_total)) {
                            $profit = $revenue->grand_total - $profit->buying_price - $revenue->total_tax - $revenue->discount_amount;
                            echo $this->localization->currencyFormat($profit);
                        } else {
                            echo $this->localization->currencyFormat(0);
                        }
                        ?>
                    </h2>
                    <p> Keuntungan Bulan Ini</p>
                </div>
                <div class="icon">
                    <i class="fa fa-money"></i>
                </div>
                <span class="small-box-footer">
                    <?php echo date('F'); ?>
                </span>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-sm-6 col-sx-12">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h2><?php echo $quantity_sales ?></h2>
                    <p>Jumlah Penjualan</p>
                </div>
                <div class="icon">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <span class="small-box-footer">
                    <?php echo date('F'); ?>
                </span>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-sm-6 col-sx-12">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h2><?php echo $this->localization->currencyFormat($stock_value); ?></h2>
                    <p>Harga Seluruh Stok</p>
                </div>
                <div class="icon">
                    <i class="fa fa-suitcase"></i>
                </div>
                <span class="small-box-footer">
                    Harga dasar keseluruhan stok
                </span>
            </div>
        </div><!-- ./col -->
    </div>


    <div class="row">
        <div class="col-md-8">
            <div class="portlet"><!-- /primary heading -->
                <div class="portlet-heading">
                    <h3 class="portlet-title text-dark text-uppercase">
                        Grafik Dalam 1 Tahun
                    </h3>
                </div>
                <div id="portlet1" class="panel-collapse collapse in">
                    <div class="portlet-body">
                        <div id="morris-bar-example" style="height: 250px;"></div>

                        <div class="row text-center m-t-30 m-b-30 chart-table">
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <h4>
                                    <?php
                                    if (!empty($today_sale)) {
                                        echo $this->localization->currency($today_sale->grand_total);
                                    } else {
                                        echo $this->localization->currency(0);
                                    }
                                    ?>
                                </h4>
                                <small class="text-muted"> Omset Hari Ini</small>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <h4>
                                    <?php
                                    if (!empty($revenue->grand_total)) {
                                        echo $this->localization->currency($weekly_sales->grand_total);
                                    } else {
                                        echo $this->localization->currency(0);
                                    }
                                    ?>
                                </h4>
                                <small class="text-muted">Omset Minggu Ini</small>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <h4>
                                    <?php
                                    if (!empty($revenue->grand_total)) {
                                        echo $this->localization->currency($revenue->grand_total);
                                    } else {
                                        echo $this->localization->currency(0);
                                    }
                                    ?>
                                </h4>
                                <small class="text-muted">Omset Bulan Ini</small>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">

                                <h4>
                                    <?php
                                    if (!empty($yearly_sale->grand_total)) {
                                        echo $this->localization->currency($yearly_sale->grand_total);
                                    } else {
                                        echo $this->localization->currency(0);
                                    }
                                    ?>
                                </h4>
                                <small class="text-muted">Omset Tahun Ini</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Portlet -->

        </div>
        <!-- end col -->

        <div class="col-md-4">
            <div class="portlet"><!-- /primary heading -->
                <div class="portlet-heading">
                    <h3 class="portlet-title text-dark text-uppercase">
                        Populer Tahun <strong><?php echo date(Y) ?></strong>
                    </h3>
                </div>
                <div id="portlet2" class="panel-collapse collapse in">
                    <div class="portlet-body" style="height: 400px">

                        <table class="table no-margin">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>KODE</th>
                                    <th>NAMA PRODUK</th>
                                    <th>JLM</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($top_sell_product)):
                                    $top_product = array_slice($top_sell_product, 0, 5);
                                    $i = 1;
                                    ?>
                                    <?php foreach ($top_product as $item): ?>
                                        <tr>
                                            <td ><?php echo $i ?></td>
                                            <td class="highlight"><?php echo $item->product_code ?></td>
                                            <td><?php echo $item->product_name ?></td>
                                            <td class="highlight"><strong><?php echo $item->quantity ?></strong></td>
                                            <?php $i ++ ?>
                                        </tr>
                                    <?php endforeach;
                                else:
                                    ?>
                                    <tr style="column-span: 4">
                                        <td><strong>No Records Found</strong></td>
                                    </tr>

<?php endif ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End row -->





</div>
<!-- Page Content Ends -->
<!-- ================== -->



<div class="wraper container-fluid">
    <div class="row">

        <div class="col-md-8">
            <div class="portlet"><!-- /primary heading -->
                <div class="portlet-heading">
                    <h3 class="portlet-title text-dark text-uppercase">
                        Status Pesanan
                    </h3>
                </div>
                <div id="portlet2" class="panel-collapse collapse in">
                    <div class="portlet-body" style="height: 400px">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                    <tr>
                                        <th>NO FAKTUR</th>
                                        <th>PELANGGAN</th>
                                        <th>WAKTU</th>
                                        <th>STATUS</th>
                                        <th>TOTAL PESANAN</th>
                                    </tr>
                                </thead>
                                <tbody>

<?php if ($order_info): foreach ($order_info as $v_order): ?>
                                            <tr>
                                                <td><a href="<?php echo base_url() ?>admin/order/view_order/<?php echo $v_order->order_no ?>">OR<?php echo $v_order->order_no ?></a></td>
                                                <td><?php echo $v_order->customer_name ?></td>
                                                <td><?php echo $this->localization->dateFormat($v_order->order_date) ?></td>
                                                <td>
                                                    <?php if ($v_order->order_status == 0) { ?>
                                                        <span class="label label-warning">PENDING</span>
                                                    <?php } elseif ($v_order->order_status == 1) { ?>
                                                        <span class="label label-danger">PESANAN BATAL</span>
                                                    <?php } else { ?>
                                                        <span class="label label-info">PESANAN LUNAS</span>
        <?php } ?>

                                                </td>
                                                <td class="highlight"><strong><?php echo $this->localization->currencyFormat($v_order->grand_total) ?></strong></td>
                                            </tr>
                                        <?php endforeach;
                                    else:
                                        ?>
                                        <tr style="column-span: 5">
                                            <td><strong>No Records Found</strong></td>
                                        </tr>

<?php endif ?>
                                </tbody>
                            </table>
                        </div><!-- /.table-responsive -->
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="portlet"><!-- /primary heading -->
                <div class="portlet-heading">
                    <h4 class="portlet-title text-dark text-uppercase">
                        Populer Bulan <?php echo date(F) ?>
                    </h4>
                </div>
                <div id="portlet2" class="panel-collapse collapse in">
                    <div class="portlet-body" style="height: 400px">

                        <table class="table no-margin">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>KODE PRODUK</th>
                                    <th>NAMA PRODUK</th>
                                    <th>JLM</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($top_sell_product_month)):
                                    $top_product = array_slice($top_sell_product_month, 0, 5);
                                    $i = 1;
                                    ?>
    <?php foreach ($top_product as $item): ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td class="highlight"><?php echo $item->product_code ?></td>
                                            <td><?php echo $item->product_name ?></td>
                                            <td class="highlight"><strong><?php echo $item->quantity ?></strong></td>
                                        <?php $i ++ ?>
                                        </tr>
    <?php endforeach;
else:
    ?>
                                    <tr style="column-span: 4">
                                        <td><strong>No Records Found</strong></td>
                                    </tr>

<?php endif ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>



    </div>
</div>




<script>

    $(function () {
        //Bar chart
        Morris.Bar({
            element: 'morris-bar-example',
            data: [
<?php
foreach ($yearly_sales_report as $name => $v_result):
    $month_name = date('M', strtotime($year . '-' . $name)); // get full name of month by date query
    ?>
                    {x: '<?php echo $month_name; ?>',
                        a: <?php
    if (!empty($v_result)) {
        foreach ($v_result as $result) {
            echo round($result->grand_total);
        }
    }
    ?>,
                        b: <?php echo round($result->profit) ?>,
                        c: <?php echo round($result->purchase) ?>
                    },

<?php endforeach; ?>

            ],
            xkey: 'x',
            ykeys: ['a', 'b', 'c'],
            labels: ['Revenue', 'Profit', 'Purchase'],
            barColors: ['#3bc0c3', '#1a2942', '#5F5AAB']
        });

    });
</script>
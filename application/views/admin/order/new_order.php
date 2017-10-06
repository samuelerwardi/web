<script src="<?php echo base_url(); ?>asset/js/ajax.js"></script>
<script src="<?php echo base_url(); ?>asset/js/bootstrap-notify.js"></script>
<link href="<?php echo base_url(); ?>asset/css/animate.css" rel="stylesheet" type="text/css"/>
<!--Massage-->
<?php echo message_box('success'); ?>
<?php echo message_box('error'); ?>
<!--/ Massage-->
<?php $cart = $this->cart->contents(); ?>
<?php 
    // echo "<pre>";
    // print_r($cart);
    // echo "</pre>";
?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="portlet"><!-- /primary heading -->
                <div class="portlet-heading">
                    <h3 class="portlet-title text-dark text-uppercase">
                        Penjualan
                    </h3>
                    <div class="pull-right">
                        <h1 class="portlet-title text-dark text-uppercase">
                            <a href="<?php echo site_url('admin/order/new_order') ?>" class="btn btn-success btn-xs">Buat
                                Pesanan Baru</a>
                            <a href="<?php echo site_url('admin/order/manage_invoice') ?>"
                               class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                        </h1>
                    </div>
                </div>
                <div id="portlet2" class="panel-collapse collapse in">
                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-md-8">

                                <div class="box  box-warning">
                                    <div class="box-header box-header-background-light with-border">
                                        <h3 class="box-title ">Produk</h3>
                                    </div>
                                    <div class="box-body order-panel">
                                        <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                                            <li class="active"><a href="#product-list" data-toggle="tab">List
                                                    Pesanan</a>
                                            </li>
                                            <li><a href="#search-product" data-toggle="tab">Pencarian Produk</a></li>
                                        </ul>
                                        <div id="my-tab-content" class="tab-content">
                                            <!-- ***************  Cart Tab Start ****************** -->
                                            <div class="tab-pane active" id="product-list">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <form method="post"
                                                              action="<?php echo base_url(); ?>admin/order/add_cart_item_by_barcode">
                                                            <div class="input-group">
                                                                <span class="input-group-btn">
                                                                    <button type="submit" class="btn bg-blue"
                                                                            type="button">Barcode</button>
                                                                </span>
                                                                <input type="text" name="barcode" class="form-control"
                                                                       placeholder="Scan Product Barcode" autofocus>
                                                            </div>
                                                        </form>
                                                        <!-- /input-group -->
                                                    </div>
                                                    <!-- /.col-lg-6 -->
                                                </div>
                                                <br/>
                                                <div id="cart_content">
                                                    <?php echo $this->view('admin/order/cart/cart.php'); ?>
                                                </div>

                                            </div>

                                            <!-- ***************  Add Product Tab Start ****************** -->
                                            <div class="tab-pane" id="search-product">
                                                <form id="addToCart" method="post"
                                                      action="<?php echo base_url(); ?>admin/order/add_cart_items">
                                                    <div class="table-responsive">
                                                        <!-- Table -->
                                                        <table id="datatable"
                                                               class="table table-striped table-bordered cart-buttons"
                                                               style="width: 100%">
                                                            <thead><!-- Table head -->
                                                            <tr>
                                                                <th class="col-sm-1 active">
                                                                    <input type="checkbox" class="checkbox-inline"
                                                                           id="parent_present"/>
                                                                </th>
                                                                <th class="active">Barkot</th>
                                                                <th class="active">Nama Produk</th>
                                                                <th class="active">Attribute</th>
                                                                <th class="active">Stok</th>
                                                                <th class="active col-md-1">Belanja</th>

                                                            </tr>
                                                            </thead>

                                                            <!-- / Table head -->
                                                            <tbody><!-- / Table body -->

                                                            <?php $counter = 1; ?>
                                                            <?php if (!empty($product)): foreach ($product

                                                            as $v_product) : ?>
                                                            <?php if (empty($v_product->attribute)): ?>
                                                                <tr>
                                                                    <td class="col-sm-1">
                                                                        <input name="product_barcode[]"
                                                                               value="<?php echo $v_product->product_code ?>"
                                                                               class="child_present" type="checkbox"/>
                                                                    </td>
                                                                    <td class="highlight">
                                                                        <a href="<?php echo base_url() . 'admin/product/view_product/' . $v_product->product_id ?>"
                                                                           data-toggle="modal" data-target="#myModal">
                                                                            <?php echo $v_product->product_code ?>
                                                                        </a>
                                                                    </td>
                                                                    <td class="vertical-td"><?php echo $v_product->product_name ?></td>
                                                                    <td class="vertical-td">
                                                                        <?php echo "Total Attribute : " . count($v_product->attribute) ?>
                                                                    </td>
                                                                    <td class="">
                                                                        <?php
                                                                        if ($v_product->notify_quantity >= $v_product->product_quantity) {
                                                                            ?>
                                                                            <span
                                                                                    class="label label-warning"><?php echo $v_product->product_quantity ?></span>
                                                                        <?php } else { ?>
                                                                            <?php echo $v_product->product_quantity ?>
                                                                        <?php } ?>
                                                                    </td>
                                                                    <td class="col-md-1 ">
                                                                        <input type="hidden" name="product_id"
                                                                               value="<?php echo $v_product->product_code ?>">
                                                                        <a href="<?php echo base_url() ?>admin/order/add_cart_item/<?php echo $v_product->product_code ?>"
                                                                           data-original-title="Add to Cart"
                                                                           class="btn btn-primary btn-xs" title=""
                                                                           data-toggle="tooltip" data-placement="top">
                                                                            <i class="fa fa-shopping-cart"></i></a>
                                                                    </td>
                                                                </tr>
                                                            <?php else: ?>
                                                                <tr>
                                                                    <td class="col-sm-1">
                                                                        <input value="<?php echo $v_product->product_code ?>"
                                                                               class="child_present hidden" type="checkbox" disabled/>
                                                                    </td>
                                                                    <td class="highlight">
                                                                        <a href="<?php echo base_url() . 'admin/product/view_product/' . $v_product->product_id ?>"
                                                                           data-toggle="modal" data-target="#myModal">
                                                                            <?php echo $v_product->product_code ?>
                                                                        </a>
                                                                    </td>
                                                                    <td class="vertical-td"><?php echo $v_product->product_name ?></td>
                                                                    <td class="vertical-td">
                                                                        <?php echo "Total Attribute : " . count($v_product->attribute) ?>
                                                                    </td>
                                                                    <td class="">
                                                                        <?php
                                                                        if ($v_product->notify_quantity >= $v_product->product_quantity) {
                                                                            ?>
                                                                            <span
                                                                                    class="label label-warning"><?php echo $v_product->product_quantity ?></span>
                                                                        <?php } else { ?>
                                                                            <?php echo $v_product->product_quantity ?>
                                                                        <?php } ?>
                                                                    </td>
                                                                    <td class="col-md-1 "></td>
                                                                </tr>
                                                            <?php foreach ($v_product->attribute as $key_attribute => $value_attribute): ?>
                                                            <tr>
                                                                <td class="col-sm-1">
                                                                    <input name="product_barcode[]"
                                                                           value="<?php echo $v_product->product_code ?>-<?php echo $value_attribute->attribute_id ?>"
                                                                           class="child_present" type="checkbox"/>
                                                                </td>
                                                                <td class="vertical-td">
                                                                    <label class="hidden"><?php echo $v_product->product_code ?></label> 
                                                                </td>
                                                                <td class="vertical-td">
                                                                    <label class="hidden"><?php echo $v_product->product_name ?></label>
                                                                </td>
                                                                <td class="vertical-td">
                                                                    <?php echo $value_attribute->attribute_name ?>
                                                                </td>
                                                                <td class="vertical-td currency">
                                                                    <?php echo $value_attribute->attribute_value ?>
                                                                </td>
                                                                <td class="col-md-1 ">
                                                                    <input type="hidden" name="product_id"
                                                                           value="<?php echo $v_product->product_code ?>">
                                                                    <a href="<?php echo base_url() ?>admin/order/add_cart_item/<?php echo $v_product->product_code ?>/<?php echo $value_attribute->attribute_id ?>"
                                                                       data-original-title="Add to Cart"
                                                                       class="btn btn-primary btn-xs" title=""
                                                                       data-toggle="tooltip" data-placement="top">
                                                                        <i class="fa fa-shopping-cart"></i></a>
                                                                </td>
                                                                <?php endforeach ?>
                                                                <?php endif ?>
                                                                <?php endforeach ?>
                                                                <?php else : ?> <!--get error message if this empty-->
                                                                    <td colspan="12">
                                                                        <strong>There is no record for display</strong>
                                                                    </td><!--/ get error message if this empty-->
                                                                <?php endif; ?>
                                                            </tbody>
                                                            <!-- / Table body -->
                                                        </table>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->
                            </div>
                            <!--/.col end -->
                            <!-- *********************** Purchase ************************** -->
                            <div class="col-md-4 col-sm-12">
                                <div class="box">
                                    <div class="box-header with-border box-header-background">
                                        <h3 class="box-title ">Ringkasan Pemesanan</h3>
                                    </div>
                                    <div id="cart_summary">
                                        <?php echo $this->view('admin/order/cart/cart_summary.php') ?>
                                    </div>
                                </div>
                                <!-- /.box -->
                            </div>
                            <!--/.col end -->
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $().ready(function () {
        // validate signup form on keyup and submit
        $("#newform").validate({
            rules: {
                product_name: "required",
                qty: "required",
                product_name: {
                    required: true
                },
                qty: {
                    required: true,
                    number: true
                },
                price: {
                    required: true,
                    number: true

                }

            },
            highlight: function (element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function (element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            errorElement: 'span',
            errorClass: 'help-block',
            errorPlacement: function (error, element) {
                if (element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            },
            messages: {
                product_name: {
                    required: "Please enter Product Name"
                }
            }
        });
    });</script>
<?php
$cart_msg = $this->session->flashdata('cart_msg');
if (!empty($cart_msg)) {
    ?>
    <script>
        $.notify({
            // options
            <?php if ($cart_msg == 'add') { ?>
            icon: 'glyphicon glyphicon-ok-sign',
            message: '  Product add to cart successfully!'
            <?php } else { ?>
            icon: 'glyphicon glyphicon-ok-sign',
            message: '  Delete from cart successfully!'
            <?php } ?>
        }, {
            // settings
            element: 'body',
            position: null,
            <?php if ($cart_msg == 'add') { ?>
            type: "info",
            <?php } else { ?>
            type: "danger",
            <?php } ?>
            allow_dismiss: true,
            newest_on_top: false,
            showProgressbar: false,
            placement: {
                from: "top",
                align: "right"
            },
            offset: 60,
            spacing: 10,
            z_index: 1031,
            delay: 5000,
            timer: 1000,
            mouse_over: null,
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            },
            onShow: null,
            onShown: null,
            onClose: null,
            onClosed: null,
            icon_type: 'class',
            template: '<div data-notify="container" class="col-xs-11 col-sm-2 alert alert-{0}" role="alert">' +
            '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
            '<span data-notify="icon"></span> ' +
            '<span data-notify="title">{1}</span> ' +
            '<span data-notify="message">{2}</span>' +
            '<div class="progress" data-notify="progressbar">' +
            '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
            '</div>' +
            '<a href="{3}" target="{4}" data-notify="url"></a>' +
            '</div>'
        });
    </script>
<?php } ?>

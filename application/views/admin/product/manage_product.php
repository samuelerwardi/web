<link href="<?php echo base_url(); ?>asset/css/select2.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url(); ?>asset/js/select2.js"></script>
<!--Massage-->
<?php echo message_box('success'); ?>
<?php echo message_box('error'); ?>
<!--/ Massage-->
<?php if (!empty($product_opnames) && !empty($this->input->get("opname_date"))): ?>
    <section class="content">
        <div class="row">
            <form action="<?php echo base_url() ?>admin/product/product_action" method="post">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header box-header-background with-border">
                            <h3 class="box-title ">Kelola Produk</h3>
                            <div class="box-tools">
                                <div class="input-group ">
                                    <select class="form-control pull-right" name="action" style="width: 150px;" required>
                                        <option value="">Select..</option>
                                        <option value="0">Opname</option>
                                        <option value="1">Aktif</option>
                                        <option value="2">Tidak Aktif</option>
                                        <option value="3">Dihapus</option>
                                    </select>
                                    <span class="input-group-btn">
                                          <button type="submit" class="btn btn-default" type="button">Action</button>
                                        </span>
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="col-md-12" style="padding: 0px;margin-bottom: 20px;">
                                <label>Opname</label>
                                    <select id="opname_date" style="width: 100%;" name="opname_date">
                                        <option value="">Select Opname</option>
                                        <?php if (!empty($opnames) && is_array($opnames)): ?>
                                            <?php foreach ($opnames as $key => $value): ?>
                                                <option><?php echo $value["inventory_id"] ?></option>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </select>
                            </div>
                            <!-- Table -->
                            <table id="datatable" class="table table-striped table-bordered datatable-buttons">
                                <thead><!-- Table head -->
                                <tr>
                                    <th class="active">Gambar</th>
                                    <th class="active">Kode</th>
                                    <th class="active">Nama Produk</th>
                                    <th class="active">Kategori</th>
                                    <th class="active">Total Stok</th>
                                    <th class="active">Total Stok Opname</th>
                                    <th class="active">Status</th>
                                    <th class="active">Aksi</th>

                                </tr>
                                </thead><!-- / Table head -->
                                <tbody><!-- / Table body -->

                                <?php if (!empty($product_opnames)): foreach ($product_opnames as $v_product) : ?>
                                    <tr class="custom-tr">
                                        <td class="product-img">
                                            <?php if (!empty($v_product->filename)): ?>
                                                <img src="<?php echo base_url() . $v_product->filename ?>"/>
                                            <?php else: ?>
                                                <img src="<?php echo base_url() ?>img/product.png" alt="Product Image">
                                            <?php endif; ?>
                                        </td>
                                        <td class="vertical-td highlight">
                                            <a href="<?php echo base_url() . 'admin/product/view_product/' . $v_product->product_id ?>"
                                               data-toggle="modal" data-target="#myModal">
                                                <?php echo $v_product->product_code ?>
                                            </a>
                                        </td>
                                        <td class="vertical-td"><?php echo $v_product->product_name ?></td>
                                        <td class="vertical-td"><?php echo $v_product->category_name . ' > ' . $v_product->subcategory_name ?></td>
                                        <td class="vertical-td currency">
                                            <?php
                                                echo $v_product->product_quantity
                                            ?>
                                        </td>
                                        <td class="vertical-td">
                                            <input type="text" name="stok_opname[<?php echo $v_product->product_id ?>]" disabled class="form-control input-opname-qty" placeholder="Qty Opname" value="<?php echo $v_product->product_quantity_opname ?>">
                                            <input type="text" name="stok_opname_keterangan[<?php echo $v_product->product_id ?>]" disabled class="form-control input-opname-keterangan fadeIn" placeholder="Keterangan Opname" value="<?php echo $v_product->keterangan_opname ?>">
                                        </td>
                                        <td class="vertical-td">
                                            <?php
                                            if ($v_product->status == 0) { ?>
                                                <span class="label label-warning"><?php echo 'Inactive' ?></span>
                                            <?php } else { ?>
                                                <span class="label bg bg-olive"><?php echo 'Active' ?></span>
                                            <?php } ?>

                                        </td>
                                        <td class="vertical-td">
                                            <div class="btn-group">
                                                <a href="<?php echo base_url() . 'admin/product/add_product/' . $v_product->product_id ?>"
                                                   class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
                                                <a href="<?php echo base_url() . 'admin/product/view_product/' . $v_product->product_id ?>"
                                                   class="btn btn-xs bg-olive" data-toggle="modal" data-target="#myModal"><i
                                                            class="glyphicon glyphicon-search"></i></a>
                                                <a href="<?php echo base_url() . 'admin/product/delete_product/' . $v_product->product_id ?>"
                                                   class="btn btn-xs btn-danger"><i
                                                            class="glyphicon glyphicon-trash"></i></a>
                                            </div>
                                        </td>

                                    </tr>
                                    <?php
                                endforeach;?>

                                    <!--get all sub category if not this empty-->
                                <?php else : ?> <!--get error message if this empty-->
                                    <td colspan="8">
                                        <strong>There is no data to display</strong>
                                    </td><!--/ get error message if this empty-->
                                <?php endif; ?>
                                </tbody><!-- / Table body -->
                            </table> <!-- / Table -->

                        </div><!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!--/.col end -->
            </form>
        </div>
        <!-- /.row -->
    </section>
<?php else: ?>
    <section class="content">
        <div class="row">
            <form action="<?php echo base_url() ?>admin/product/product_action" method="post">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header box-header-background with-border">
                            <h3 class="box-title ">Kelola Produk</h3>
                            <div class="box-tools">
                                <div class="input-group ">
                                    <select class="form-control pull-right" name="action" style="width: 150px;" required>
                                        <option value="">Select..</option>
                                        <option value="0">Opname</option>
                                        <option value="1">Aktif</option>
                                        <option value="2">Tidak Aktif</option>
                                        <option value="3">Dihapus</option>
                                    </select>
                                    <span class="input-group-btn">
                                          <button type="submit" class="btn btn-default" type="button">Action</button>
                                        </span>
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="col-md-12" style="padding: 0px;margin-bottom: 20px;">
                                <label>Opname</label>
                                    <select id="opname_date" style="width: 100%;" name="opname_date">
                                        <option value="">Select Opname</option>
                                        <?php if (!empty($opnames) && is_array($opnames)): ?>
                                            <?php foreach ($opnames as $key => $value): ?>
                                                <option>
                                                    <?php echo $value["inventory_id"] ?>
                                                </option>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </select>
                            </div>
                            <!-- Table -->
                            <table id="datatable" class="table table-striped table-bordered datatable-buttons">
                                <thead><!-- Table head -->
                                <tr>
                                    <th class="col-sm-1 active" style="width: 21px">
                                        <input type="checkbox"
                                               class="checkbox-inline"
                                               id="parent_present"/></th>
                                    <th class="active">Gambar</th>
                                    <th class="active">Kode</th>
                                    <th class="active">Nama Produk</th>
                                    <th class="active">Kategori</th>
                                    <th class="active">Total Stok</th>
                                    <th class="active">Total Stok Opname</th>
                                    <th class="active">Status</th>
                                    <th class="active">Aksi</th>

                                </tr>
                                </thead><!-- / Table head -->
                                <tbody><!-- / Table body -->

                                <?php if (!empty($product)): foreach ($product as $v_product) : ?>
                                    <tr class="custom-tr">
                                        <td class="vertical-td"><input name="product_id[]"
                                                                       value="<?php echo $v_product->product_id ?>"
                                                                       class="child_present" type="checkbox"/></td>
                                        <td class="product-img">
                                            <?php if (!empty($v_product->filename)): ?>
                                                <img src="<?php echo base_url() . $v_product->filename ?>"/>
                                            <?php else: ?>
                                                <img src="<?php echo base_url() ?>img/product.png" alt="Product Image">
                                            <?php endif; ?>
                                        </td>
                                        <td class="vertical-td highlight">
                                            <a href="<?php echo base_url() . 'admin/product/view_product/' . $v_product->product_id ?>"
                                               data-toggle="modal" data-target="#myModal">
                                                <?php echo $v_product->product_code ?>
                                            </a>
                                        </td>
                                        <td class="vertical-td"><?php echo $v_product->product_name ?></td>
                                        <td class="vertical-td"><?php echo $v_product->category_name . ' > ' . $v_product->subcategory_name ?></td>
                                        <td class="vertical-td currency">
                                            <?php
                                            if ($v_product->notify_quantity >= $v_product->product_quantity) { ?>
                                                <span class="label label-warning"><?php echo $v_product->product_quantity ?></span>
                                                <input type="hidden" name="stok_komputer[<?php echo $v_product->product_id ?>]" value="<?php echo $v_product->product_quantity ?>">
                                            <?php } else { ?>
                                                <?php echo $v_product->product_quantity ?>
                                                <input type="hidden" name="stok_komputer[<?php echo $v_product->product_id ?>]" value="<?php echo $v_product->product_quantity ?>">
                                            <?php } ?>

                                        </td>
                                        <td class="vertical-td">
                                            <input type="text" name="stok_opname[<?php echo $v_product->product_id ?>]" class="form-control input-opname-qty" placeholder="Qty Opname">
                                            <input type="text" name="stok_opname_keterangan[<?php echo $v_product->product_id ?>]" class="form-control hidden input-opname-keterangan fadeIn" placeholder="Keterangan Opname">
                                        </td>
                                        <td class="vertical-td">
                                            <?php
                                            if ($v_product->status == 0) { ?>
                                                <span class="label label-warning"><?php echo 'Inactive' ?></span>
                                            <?php } else { ?>
                                                <span class="label bg bg-olive"><?php echo 'Active' ?></span>
                                            <?php } ?>

                                        </td>
                                        <td class="vertical-td">
                                            <div class="btn-group">
                                                <a href="<?php echo base_url() . 'admin/product/add_product/' . $v_product->product_id ?>"
                                                   class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
                                                <a href="<?php echo base_url() . 'admin/product/view_product/' . $v_product->product_id ?>"
                                                   class="btn btn-xs bg-olive" data-toggle="modal" data-target="#myModal"><i
                                                            class="glyphicon glyphicon-search"></i></a>
                                                <a href="<?php echo base_url() . 'admin/product/delete_product/' . $v_product->product_id ?>"
                                                   class="btn btn-xs btn-danger"><i
                                                            class="glyphicon glyphicon-trash"></i></a>
                                            </div>
                                        </td>

                                    </tr>
                                    <?php
                                endforeach;?>

                                    <!--get all sub category if not this empty-->
                                <?php else : ?> <!--get error message if this empty-->
                                    <td colspan="8">
                                        <strong>There is no data to display</strong>
                                    </td><!--/ get error message if this empty-->
                                <?php endif; ?>
                                </tbody><!-- / Table body -->
                            </table> <!-- / Table -->

                        </div><!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!--/.col end -->
            </form>
        </div>
        <!-- /.row -->
    </section>    
<?php endif ?>

<script>
    $('body').on('hidden.bs.modal', '.modal', function () {
        $(this).removeData('bs.modal');
    });
    $(".input-opname-qty").on("focus", function(){
        $(this).siblings().addClass("fadeIn").removeClass("hidden");
        // console.log($(this).siblings().removeClass("hidden"));
    });
    $("#opname_date").select2();

    $("#opname_date").on("change", function(){
        window.location.href = "?opname_date=" + $(this).val();
    });
</script>
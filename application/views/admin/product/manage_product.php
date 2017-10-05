<!--Massage-->
<?php echo message_box('success'); ?>
<?php echo message_box('error'); ?>
<!--/ Massage-->


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


                        <!-- Table -->
                    <table id="datatable" class="table table-striped table-bordered datatable-buttons">
                            <thead ><!-- Table head -->
                            <tr>
                                <th class="col-sm-1 active" style="width: 21px"><input type="checkbox" class="checkbox-inline" id="parent_present" /></th>
                                <th class="active">Gambar</th>
                                <th class="active">Kode</th>
                                <th class="active">Nama Produk</th>
                                <th class="active">Kategori</th>
                                <th class="active">Total Stok</th>
                                <th class="active">Status</th>
                                <th class="active">Aksi</th>

                            </tr>
                            </thead><!-- / Table head -->
                            <tbody><!-- / Table body -->

                            <?php if (!empty($product)): foreach ($product as $v_product) : ?>
                                <tr class="custom-tr">
                                    <td class="vertical-td"><input name="product_id[]" value="<?php echo $v_product->product_id ?>" class="child_present" type="checkbox" /></td>
                                    <td class="product-img">
                                        <?php if (!empty($v_product->filename)):  ?>
                                            <img src="<?php echo base_url() . $v_product->filename ?>" />
                                        <?php else:?>
                                            <img src="<?php echo base_url() ?>img/product.png" alt="Product Image">
                                        <?php endif; ?>
                                    </td>
                                    <td class="vertical-td highlight">
                                        <a href="<?php echo base_url().'admin/product/view_product/'. $v_product->product_id ?>"  data-toggle="modal" data-target="#myModal" >
                                            <?php echo $v_product->product_code ?>
                                        </a>
                                    </td>
                                    <td class="vertical-td"><?php echo $v_product->product_name ?></td>
                                    <td class="vertical-td"><?php echo $v_product->category_name .' > '. $v_product->subcategory_name?></td>
                                    <td class="vertical-td currency">
                                        <?php
                                            if($v_product->notify_quantity >= $v_product->product_quantity)
                                            { ?>
                                                <span class="label label-warning"><?php echo $v_product->product_quantity ?></span>
                                        <?php } else { ?>
                                                <?php echo $v_product->product_quantity ?>
                                                <?php } ?>

                                    </td>
                                    <td class="vertical-td">
                                        <?php
                                        if($v_product->status == 0)
                                        { ?>
                                            <span class="label label-warning"><?php echo 'Inactive' ?></span>
                                        <?php } else { ?>
                                            <span class="label bg bg-olive"><?php echo 'Active' ?></span>
                                        <?php } ?>

                                    </td>
                                    <td class="vertical-td">

                                        <div class="btn-group">
                                            <a href="<?php echo base_url().'admin/product/add_product/'. $v_product->product_id ?>" class="btn btn-xs btn-default" ><i class="fa fa-pencil"></i></a>
                                            <a href="<?php echo base_url().'admin/product/view_product/'. $v_product->product_id ?>" class="btn btn-xs bg-olive" data-toggle="modal" data-target="#myModal" ><i class="glyphicon glyphicon-search"></i></a>
                                            <a href="<?php echo base_url().'admin/product/delete_product/'. $v_product->product_id ?>" class="btn btn-xs btn-danger" ><i class="glyphicon glyphicon-trash"></i></a>
                                        </div>
                                    </td>

                                </tr>
                            <?php

                            endforeach;
                            ?><!--get all sub category if not this empty-->
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

<script>
    $('body').on('hidden.bs.modal', '.modal', function() {
        $(this).removeData('bs.modal');
    });

</script>




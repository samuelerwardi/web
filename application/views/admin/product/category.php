<!--Massage-->
<?php echo message_box('success'); ?>
<?php echo message_box('error'); ?>
<!--/ Massage-->


<section class="content">
    <div class="row">
        <div class="col-md-12">

            <div class="box box-primary">
                <div class="box-header box-header-background with-border">

                        <h3 class="box-title ">Kategori Produk</h3>

                </div>
                <!-- /.box-header -->
                <div class="box-background">
                <!-- form start -->
                <form role="form" enctype="multipart/form-data"

                      action="<?php echo base_url(); ?>admin/product/save_category/<?php
                      if (!empty($category_info->category_id)) {
                          echo $category_info->category_id;
                      }
                      ?>" method="post">

                    <div class="row">

                        <div class="col-md-6 col-sm-12 col-xs-12 col-md-offset-3">

                                <!-- /.Company Name -->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kategori <span class="required">*</span></label>
                                    <input type="text" required name="category_name" placeholder="Category Name"
                                           value="<?php
                                           if (!empty($category_info->category_name)) {
                                               echo $category_info->category_name;
                                           }
                                           ?>"
                                           class="form-control">
                                </div>

                                <button type="submit" class="btn bg-navy btn-flat" type="submit">Simpan Data
                                </button><br/><br/>

                            <!-- /.box-body -->

                        </div>
                    </div>

                </form>
                    </div>
                <div class="box-footer">

                </div>

                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                <table class="table table-bordered table-striped" id="dataTables-example">
                    <thead>
                    <tr>
                        <th class="active col-sm-1">ID</th>
                        <th class="active">Nama Kategori</th>
                        <th class=" active col-sm-2">Aksi</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $key = 1 ?>
                    <?php if (!empty($all_category)): foreach ($all_category as $v_category) : ?><!--get all category if not this empty-->
                        <tr>
                            <td><?php echo $key ?></td>
                            <!--Serial No> -->
                            <td><?php echo $v_category->category_name ?></td>
                            <td>
                                <div class="btn-group">
                                    <a href="<?php echo base_url().'admin/product/category/'. $v_category->category_id ?>" class="btn btn-xs btn-default" ><i class="fa fa-pencil"></i></a>
                                    <a href="<?php echo base_url().'admin/product/delete_category/'. $v_category->category_id ?>" class="btn btn-xs btn-danger" ><i class="glyphicon glyphicon-trash"></i></a>
                                </div>

                            </td>
                        </tr>
                    <?php
                    $key++;
                    endforeach;
                    ?><!--get all category if not this empty-->
                    <?php else : ?> <!--get error message if this empty-->
                        <td colspan="3">
                            <strong>There is no record for display</strong>
                        </td><!--/ get error message if this empty-->
                    <?php
                    endif; ?>
                    </tbody>
                </table>

                    </div>
                </div>
            </div>
            <!-- /.box -->
        </div>
        <!--/.col end -->
    </div>
    <!-- /.row -->
</section>




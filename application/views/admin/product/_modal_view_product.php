
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel"><?php echo $product->product_name ?></h4>
</div>
<div class="modal-body wrap-modal wrap" style="max-height: 900px;">

    <div class="row">
        <div class="col-sm-6 col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-thumbnail">
                        <?php if(!empty($product->filename)){?>
                            <img src="<?php echo base_url() . $product->filename; ?>" class="img-circle" alt="Product Image"/>
                        <?php }else{?>
                            <img src="<?php echo base_url(); ?>img/product.png" class="img-circle" alt="Product Image"/>
                        <?php } ?>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="product-barcode">
                        <img src="<?php echo base_url() . $product->barcode ?>" />
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-8">

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th class="active" colspan="2"><?php echo $product->product_name ?></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="col-sm-3">Kode Produk</td>
                    <td><?php echo $product->product_code ?></td>
                </tr>
                <tr>
                    <td class="col-sm-3 ">Nama Produk</td>
                    <td class=""><?php echo $product->product_name ?></td>
                </tr>
                <tr>
                    <td class="col-sm-3">Deskripsi</td>
                    <td><?php echo $product->product_note ?></td>
                </tr>
                <tr>
                    <td class="col-sm-3 ">Kategori produk</td>
                    <td class=""><?php echo $product->category_name ?></td>
                </tr>
                <tr>
                    <th class="active" colspan="2" >Harga Produk</th>
                </tr>
                <tr>
                    <td class="col-sm-3">Harga Suplayer</td>
                    <td class=""><?php echo $this->localization->currencyFormat($product->buying_price) ?></td>
                </tr>
                <tr>
                    <td class="col-sm-3">Harga Jual</td>
                    <td><?php echo $this->localization->currencyFormat($product->selling_price) ?></td>
                </tr>

                <tr>
                    <th class="active" colspan="2">Promosi</th>
                </tr>
                <tr>
                    <td class="col-sm-3">Waktu Awal</td>
                    <td><?php echo $product->start_date ?></td>
                </tr>
                <tr>
                    <td class="col-sm-3">Waktu Akhir</td>
                    <td><?php echo $product->end_date ?></td>
                </tr>
                <tr>
                    <td class="col-sm-3">Harga</td>
                    <td><?php echo $this->localization->currencyFormat($product->offer_price) ?></td>
                </tr>

                <tr>
                    <th class="active" colspan="2">Harga Reseller</th>
                </tr>

                <tr>
                    <td class="no-border" colspan="2">

                        <table class="table table-bordered nowrap">
                            <thead>
                            <tr>
                                <th>
                                    Jumlah
                                </th>
                                <th>
                                    Harga
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($tier_price as $v_tier_price){ ?>
                            <tr>
                                <td><?php echo $v_tier_price->quantity_above?></td>
                                <td><?php echo $v_tier_price->tier_price?></td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </td>
                </tr>

                <tr>
                    <th class="active" colspan="2">Atribut</th>
                </tr>

                <tr>
                    <td class="no-border" colspan="2">

                        <table class="table table-bordered nowrap">
                            <thead>
                            <tr>
                                <th>
                                    Atribut
                                </th>
                                <th>
                                    Jumlah
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($attribute as $v_attribute){ ?>
                                <tr>
                                    <td><?php echo $v_attribute->attribute_name?></td>
                                    <td><?php echo $v_attribute->attribute_value?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </td>
                </tr>

                <tr>
                    <th class="active" colspan="2">Tag</th>
                </tr>
                <tr>
                    <td colspan="2">
                        <?php foreach($product_tags as $v_tag){
                            echo '<span class="label label-default">'.$v_tag->tag .'</span> &nbsp;&nbsp;';
                        }?>


                    </td>
                </tr>


                </tbody>
            </table>

        </div>
    </div>


    <div class="modal-footer" >

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
            <a href="<?php echo base_url(); ?>admin/product/add_product/<?php echo $product_id ?>" type="button" class="btn btn-primary">Ubah Produk</a>

        </div>

</div>



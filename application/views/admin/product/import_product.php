<script src="<?php echo base_url(); ?>asset/js/ajax.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url(); ?>asset/js/tag-it.js" type="text/javascript" charset="utf-8"></script>
<link href="<?php echo base_url(); ?>asset/css/jquery.tagit.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>asset/css/tagit.ui-zendesk.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="<?php echo base_url(); ?>asset/js/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>




<!-- View massage -->
<?php echo message_box('success'); ?>
<?php echo message_box('error'); ?>
<?php $info = $this->session->userdata('business_info'); ?>
<div class="content">
<div class="col-sm-12">
<div class="panel panel-primary">
    <div class="panel-heading">
    <h3 class="panel-title">  Upload csv file </h3>
      </div>
        <div class="panel-body">
            <form method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>admin/product/save_product" id="form" >
              <div class="form-group">
                <label for="exampleInputFile">Upload File</label>
                <input type="file" name="userfile" id="fileField" required />
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Tanggal Opname</label>
                <input type="text" class="form-control datepicker" id="delimiter" name="delimiter" placeholder="Tanggal Opname">
              </div>
              <button type="submit" class="btn btn-danger">Upload File</button>
            </form> 
        </div>
      <div class="panel-footer"></div>
    </div>
</div>
<div class="col-sm-12">
 <div class="box">
<div class="box-body table-responsive">
<?php
                if (@$_FILES['filecsv']['error'] === UPLOAD_ERR_OK) {
                    
                    if(strlen(trim($_POST['delimiter'])) < 1){
                        echo '<div class="alert alert-danger" role="alert">Tanggal Opname Belum di isi !</div>';
                        exit();
                    }
                    
                    
                    $ext = pathinfo($_FILES['filecsv']['name'], PATHINFO_EXTENSION);
                    $filename = $_FILES['filecsv']['name'] . '' . md5(date('m/d/Y h:i:s a', time())) . '.' . $ext;
                    move_uploaded_file($_FILES["filecsv"]["tmp_name"],dirname(__FILE__) . '/' . $filename);
                    if(strtolower($ext)=='csv')
                    {
                        echo '<table class="table table-bordered table-striped">';
                        $str ='';
                        $row = 1;
                        if (($handle = fopen($filename, "r")) !== FALSE) {
                            while (($data = fgetcsv($handle, 1000, trim($_POST['delimiter']))) !== FALSE) {
                                $str .= '<tr>';
                                $num = count($data);
                                //echo "<p> $num fields in line $row: <br /></p>\n";
                                $row++;
                                for ($c=0; $c < $num; $c++) {
                                    $str .= '<td>' . $data[$c] . "</td>";
                                }
                                $str .= '<tr>';
                            }
                            fclose($handle);
                        }
                        echo $str;
                        echo '</table>';
                    }else{
                         echo '<div class="alert alert-danger" role="alert"><strong>Bangke!</strong> kan judulnya Upload file csv, napa lo upload file .'.$ext.' ?</div>';
                         
                    }
     
                }else{
                         echo '<div class="alert alert-danger" role="alert">Jangan lupa sertakan file csv nya sebelum upload !</div>';
    
                }

?>
</div>
</div>
</div>
</div>

<script type="text/javascript">
    $("#form button[type=submit]").click(function(){
        $.ajaxLoader.show();
    });
</script>
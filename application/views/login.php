<?php $this->load->view('admin/components/header'); ?>
<link href="<?php echo base_url(); ?>asset/css/animation.css" rel="stylesheet">

<body class="login-page">

    <?php
    $error = $this->session->userdata('error');
    if (!empty($error)) {
        ?>
        <div class="alert alert-danger"><?php
            echo $error;
            ?></div>
    <?php }$this->session->unset_userdata('error'); ?>

    <div class="login-box">
        <div class="login-logo animated fadeInDown" data-animation="fadeInDown">
            <a href="<?php echo base_url() ?>"><b>INVENTORI</b>Sistem </a>
        </div><!-- /.login-logo -->
        <div class="login-box-body  animated fadeInUp" data-animation="fadeInUp">
            <p class="login-box-msg">Login untuk memulai aktifitas</p>

            <?php echo form_open('login'); ?>
            <?php echo validation_errors(); ?>
            <?php echo $this->session->flashdata('error'); ?>
            <div class="form-group has-feedback">
                <input type="text" name="user_name" class="form-control" placeholder="Username" required="required" />
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Password" required="required" />
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <button type="submit" class="btn bg-orange btn-block btn-flat">L O G I N</button>
            </div>
            <div class="row">

                <div class="col-xs-12">

                </div><!-- /.col -->
            </div>
            <?php echo form_close() ?>



            <a href="<?php echo base_url() ?>forget_password">Lupa password</a><br>

        </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->


</body>
</html>
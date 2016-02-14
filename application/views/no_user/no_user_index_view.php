<!DOCTYPE html>
<?php $this->load->view('plantillas/header'); ?>
<h1>Ajedrez Online</h1>

<h2>Building...</h2>
<div id="contenedor">
    <div id="clogin" class="container">

        <?php
        $atributos = array('class' => 'form-signin');
        echo form_open(base_url() . "no_user/login", $atributos);
        ?>


        <label for="username">Username</label><input class="form-control" type="text" id="username" name="username" value="" required autofocus></br>


        <label for="password">Password</label><input class="form-control" type="password" id="password" name="password" value="" required>
        <div class="checkbox">
            <label>
                <input type="checkbox" id="rememberme" name="rememberme" value="" >
                Recordar Username
            </label>
        </div>
        <input class="btn btn-lg btn-block btn-primary" type="submit" id="submit" name="submit" value="login">   


        <?php echo form_close(); ?>


    </div>

    <div id="cregistro">

        <strong>No posees cuenta? , Registrate aca</strong>
        <a href="<?php echo base_url() . 'no_user/registro' ?>"><button>Registrate</button></a>

    </div>

    <?php
    if (isset($mensaje)) {
        ?>

        <span><?php echo $mensaje ?></span>

    <?php } ?>

</div>

<!--<div>
    Sesion en el momento

    <strong><?php echo $this->session->userdata('session_id'); ?></strong></br>
    <strong><?php echo $this->session->userdata('ip_address'); ?></strong></br>
    <strong><?php echo $this->session->userdata('user_agent'); ?></strong></br>
    <strong><?php echo $this->session->userdata('last_activity'); ?></strong></br>
    <strong><?php echo $this->session->userdata('username'); ?></strong>
     <strong><?php echo $this->session->userdata('email'); ?></strong>
</div>-->

<?php $this->load->view('plantillas/footer'); ?>
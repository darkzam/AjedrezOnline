
<?php $this->load->view('plantillas/header'); ?>
<h1>Ajedrez Online</h1>

<h2>Building...</h2>
<div id="contenedor" class="container">

    <div id="cregistro">
        <h3>Registrate</h3>
        <?php
        $atributos = array('class' => 'form-signin');
        echo form_open(current_url(), $atributos);
        ?>


        <label for="username">Username</label><input class="form-control" type="text" id="username" name="username" value="" required></br>

        <label for="password">Password</label><input class="form-control" type="password" id="password" name="password" value="" required>


        <label for="email">Email</label><input class="form-control" type="text" id="email" name="email" value="" required>


        <input class="btn btn-lg btn-block btn-primary" type="submit" id="submit" name="submit" value="Registrar">   


        <?php echo form_close(); ?>

    </div>
    <?php
    if (isset($mensaje)) {
        ?>

        <span><?php echo $mensaje ?></span>

    <?php } ?>

</div>

<!--<div>
    Sesion en el momento
    
    <strong><?php echo $this->session->userdata('session_id');?></strong></br>
    <strong><?php echo $this->session->userdata('ip_address');?></strong></br>
    <strong><?php echo $this->session->userdata('user_agent');?></strong></br>
    <strong><?php echo $this->session->userdata('last_activity');?></strong>
    
</div>-->

<?php $this->load->view('plantillas/footer'); ?>
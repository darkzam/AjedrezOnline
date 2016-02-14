
<?php $this->load->view('plantillas/header'); ?>
<h1>Ajedrez Online</h1>
<h2>Bienvenido! <?php echo $user; ?></h2>
<a href="<?php echo current_url() . '/logout'; ?>"><button>Logout</button></a>
<h3>Building...</h3>


<?php
if (isset($mensaje)) {
    ?>

    <span><?php echo $mensaje ?></span>

<?php } ?>


<div id="contenedor" class="container">

    <canvas id="tablero" width="800" height="800">
    </canvas>


</div>

<!--<div>
    Sesion en el momento
    
    <strong><?php echo $this->session->userdata('session_id'); ?></strong></br>
    <strong><?php echo $this->session->userdata('ip_address'); ?></strong></br>
    <strong><?php echo $this->session->userdata('user_agent'); ?></strong></br>
    <strong><?php echo $this->session->userdata('last_activity'); ?></strong>
    
</div>-->

<?php $this->load->view('plantillas/footer'); ?>
<script src="<?php echo $directorio_includes.'/scripts/tablero.js'?>" type="text/javascript"></script>
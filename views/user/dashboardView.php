<?php ob_start(); ?>
<div class="container">
    <h1>Dashboard</h1>
    <div class="row">
        <div class="col-4">
            <?php include './views/layout/menu-dashboard.php'; ?>
        </div>
        <div class="col-8">
            <p>Bonjour <?php echo $_SESSION['user']['nom'] . " " . $_SESSION['user']['prenom'] ?></p>
            <p>Veuillez cliquer sur un des liens pour administrer</p>
        </div>
    </div>

</div>

<?php
    $content = ob_get_clean(); 
    $title = "Dashboard";
    require('./views/layout/template.php');
?>
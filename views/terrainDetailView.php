<?php ob_start(); ?>
<div class="container">
    <h1><?php echo $terrain['nom'] ?> <span class="badge yellow"><?php echo $terrain["surface"] ?></span></h1>
    <section class="mt-40 mb-40">
        <div class="row">
            <div class="col-12">
                <div class="image">
                    <img src="./assets/images/terrain1.jpg" height="300px" alt="">
                </div>
            </div>
        </div>
           
        <div class="row">
            <div class="col-8">
                <div class="mt-20 mb-30">
                    <h2 class="mb-10">Description</h2>
                    <p><?php echo $terrain['description'] ?></p>
                </div>
                <div class="mb-30">
                    <h2 class="mb-10">Adresse</h2>
                    <p><?php echo $terrain['adresse'] ?></p>
                </div>
                <div class="mb-30">
                    <h2 class="mb-10">Prix</h2>
                    <p><?php echo $terrain['prix'] ?> €/heure</p>
                </div>
                <div class="mb-30">
                    <h2 class="mb-10">Options</h2>
                    <p><?php echo $terrain['options'] ?></p>
                </div>
            </div>
            <div class="col-4">
                <div id="search-terrain" class="cadre">
                    <?php 
                        if (isset($errors) && count($errors) > 0) {
                            echo "<div style='background:#ff000017;padding:10px'>";
                            foreach ($errors as $error) {
                                echo "<p style='color:red;'>$error</p>";
                            }
                            echo "</div>";
                        }
                    ?>
                    <form  class="form" action="index.php?p=booking&id=<?php echo $terrain['id'] ?>" method="post">
                        <label class="mb-10" for="dateresa">Date et heure de reservation</label>
                        <input type="datetime-local" id="dateresa" class="full" name="dateresa">
                        <p class="mb-20">Vous pouvez reserver 1h max par reservation</p>
                        <button type="submit" class="btn btn-blue full" name="reserver">Réserver</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>


<?php
    $content = ob_get_clean(); 
    $title = "Accueil";
    require('./views/layout/template.php');
?>
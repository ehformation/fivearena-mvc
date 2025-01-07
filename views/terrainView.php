<?php ob_start(); ?>
<div class="container">
    <h1>Nos terrains</h1>
    <section class=" mt-40 mb-40">
        <div class="row">
            <?php if($terrains) : ?>
                <?php foreach ($terrains as $terrain): ?>
                    <div class="col-4">
                        <div class="item">
                            <div class="image">
                                <img src="./assets/images/terrain1.jpg" alt="">
                            </div>
                            <div class="meta">
                                <p class="badge yellow"><?php echo $terrain["surface"] ?></p>
                            </div>
                            <h3 class="mb-10"><?php echo $terrain["nom"] ?></h3>
                            <p class="mb-10"><i class="fa-solid fa-map-pin"></i><?php echo $terrain["adresse"] ?></p>
                            <p class="bold yellow"><?php echo $terrain["prix"] ?>$/heure</p>
                            <a href="index.php?p=terrain&id=<?php echo $terrain["id"] ?>" class="btn btn-yellow full mt-20">Réserver</a>
                        </div>
                    </div>
                <?php endforeach ?>
            <?php else :  ?>
                <p>Aucun terrains n'existe</p>
            <?php endif;  ?>   
        </div>
    </section>
    </div>





    
    
        
            
        </div>
        <div class="swiper-pagination"></div>
    </div>


<?php
    $content = ob_get_clean(); 
    $title = "Accueil";
    require('./views/layout/template.php');
?>
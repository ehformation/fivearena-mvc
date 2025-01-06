<?php ob_start(); ?>
<div class="container">
    <h1>Accueil</h1>
    <section class=" mt-40 mb-40">
        <div class="mb-10 center">Terrains mis en avant</div>
        <h3 class="mb-30 center ">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Beatae velit
            voluptatibus
            laboriosam.</h3>
            <div class="swiper carousel-terrain">
                <div class="swiper-wrapper">
                    <?php if($terrains) : ?>
                        <?php foreach ($terrains as $terrain): ?>
                            <div class="swiper-slide">
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
                </div>
                <div class="swiper-pagination"></div>
            </div>
    </section>
</div>

<?php
    $content = ob_get_clean(); 
    $title = "Accueil";
    require('./views/layout/template-frontpage.php');
?>
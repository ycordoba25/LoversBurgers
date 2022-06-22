<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ordersoft</title>
    <!-- Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://kit.fontawesome.com/0dc3b1d201.js" crossorigin="anonymous"></script>
    <!-- Styles -->
    <link rel="stylesheet" href="<?= URL ?>public/css/header.css">
    <link rel="stylesheet" href="<?= URL ?>public/css/footer.css">
    <link rel="stylesheet" href="<?= URL ?>public/css/style.css">
    <link rel="stylesheet" href="<?= URL ?>public/css/view_product.css">
</head>

<body>
    <?php require_once 'views/templates/header.php'; ?>
    <?php require_once 'views/templates/modales.php'; ?>
    <div class="principal__container">
        <?php
        foreach ($producto as $p) {
        ?>
            <div class="second__container">
                <div class="second__container--img">
                    <img src="<?= $p->getImagen() ?>" alt="">
                </div>
                <div class="second__container--details">
                    <h2><?= $p->getNombre() ?></h2>
                    <p><?= $p->getDesc() ?></p>
                    <form class="form">
                        <div class="details--price--quantity">
                            <div class="details--price">
                                <h3>Precio</h3>
                                <span>$<?= $p->getPrecio() ?></span>
                            </div>
                        <?php
                    }
                        ?>
                            <div class="star">
                                <span class="material-icons">
                                    star
                                </span>
                                <span class="details--price--rating"><?= $total ?></span>
                            </div>
                            <div class="counter">
                                <button class="subtract" disabled>-</button>
                                <div>1</div>
                                <button type="button">+</button>
                            </div>
                        <?php
                        if (!isset($_SESSION['cliente'])) {
                        ?>
                            <button type="button" class="data-btn" onclick="openModal()">AÑADIR AL CARRITO</button>
                            <?php
                        } else {
                            foreach ($producto as $p) {
                            ?>
                                <!-- <form action="cliente/agregarproducto" method="POST"> -->
                            <button type="button" class="data-btn"><a class="color-a" href="<?=URL?>cliente/agregarproducto/<?=$p->getId()?>/<?= $p->getPrecio() ?>/<?= $_SESSION['cliente']->getDocumento() ?>">AÑADIR AL CARRITO</a></button>
                                <!-- </form> -->
                            <?php
                            }
                            ?>
                        <?php
                        }
                        ?>
                        </div>
                        <textarea class="data--txt" name="desc" rows="9" cols="40" placeholder="Escribe instrucciones especiales"></textarea>
                        <button class="data-btn" type="button">COMPRAR</button>
                    </form>
                </div>
            </div>
            <?php
            foreach ($valoraciones as $v) {
            ?>
                <div class="third__container">
                    <div class="user__rating">
                        <h4><?= $v->getCliente() ?></h4>
                        <div class="rating__star">
                            <?php
                            for ($i = 0; $i < $v->getCalificacion(); $i++) {
                            ?>
                                <span class="material-icons">star</span> <!-- Estrella completa: star -->
                            <?php
                            }
                            ?>
                            <?php
                            for ($i = 0; $i < (5 - $v->getCalificacion()); $i++) {
                            ?>
                                <span class="material-icons">star_outline</span><!-- Estrella vacia: star_outline -->
                            <?php
                            }
                            ?>
                        </div>
                        <textarea class="data--txt" name="desc" rows="5" cols="40" disabled><?= $v->getComentario() ?></textarea>
                    </div>
                </div>
            <?php
            }
            ?>
    </div>
    <?php require_once 'views/templates/footer.php'; ?>
    <script src="<?= URL ?>public/js/app.js"></script>
</body>

</html>
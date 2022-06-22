<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="<?= URL ?>public/css/admin_product.css">
    <link rel="stylesheet" href="<?= URL ?>public/css/footer.css">
</head>

<body>
    <?php require_once 'views/administrador/header-admin.php'; ?>
    <section class="container--register">
        <div class="container__content--register">
            <form class="container__content--form" enctype="multipart/form-data" action="<?= URL ?>administrador/registrar" method="post">
                <div class="data">
                    <label class="data--lbl" for="nombre">Nombre</label>
                    <input class="data--inpt" type="text" placeholder="Nombre del producto" name="nombre" required>

                    <label class="data--lbl" for="desc">Descripción</label>
                    <textarea class="data--txt" name="descr" rows="9" cols="50" placeholder="Descripción del producto" required></textarea>

                    <label class="data--lbl" for="categoria">Categoria</label>
                    <select class="data--inpt" name="id_categoria">
                        <?php
                        foreach ($categorias as $c) {
                        ?>
                            <option value="<?= $c->getId() ?>"><?= $c->getNombre() ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <label class="data--lbl" for="precio">Precio</label>
                    <input class="data--inpt" type="number" min="0" placeholder="Precio del producto" name="precio" required>
                </div>
                <div class="f__content--register">
                    <label class="data--lbl" for="c-imagen">Imagen del Producto</label>
                    <img id="preview" src="" alt="Imagen del producto" name="c-imagen">
                    <input  type="file" name="archivo[]" id="file" accept=".jpg,.png,.tiff,.psd,.bmp,.eps,.svg" onchange="previewImage();" />
                    <button class="data--btn" type="submit">Registar Producto</button>
                </div>
            </form>
        </div>
    </section>
    <?php require_once 'views/templates/footer.php';?>
    <script src="<?= URL ?>public/js/preloadImage.js"></script>
</body>

</html>
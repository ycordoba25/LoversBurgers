<footer>
    <div class="container">
        <div class="f__content container__content">
            <div class="f__category-help">
                <div class="f__category">
                    <p class="f--title">Categorias</p>
                    <ul class="f__ul">
                        <?php
                        foreach ($categorias as $c) {
                        ?>
                            <li class="f__li">
                                <a class="f__li--a" href="<?= URL ?>categoria/listar?id=<?= $c->getId() ?>"><?= $c->getNombre() ?></a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
                <div class="f__help">
                    <p class="f--title">Ayuda</p>
                    <ul class="f__ul">
                        <li class="f__li">
                            <a class="f__li--a" href="">Preguntas frecuentes</a>
                        </li>
                        <li class="f__li">
                            <a class="f__li--a" href="">¿Comó comprar?</a>
                        </li>
                        <li class="f__li">
                            <a class="f__li--a" href="">Actualiza tus datos</a>
                        </li>
                        <li class="f__li">
                            <a class="f__li--a" href="">Promociones vigentes</a>
                        </li>
                        <li class="f__li">
                            <a class="f__li--a" href="">Contacto</a>
                        </li>
                    </ul>
                    <div class="f__paying">
                        <p class="f--title">Medios de pago</p>
                        <div class="f__paying__icos">
                            <img class="f__paying__icos--img" src="<?= URL ?>public/img/pagos/nequi.png">
                            <img class="f__paying__icos--img" src="<?= URL ?>public/img/pagos/paypal.png">
                            <img class="f__paying__icos--img" src="<?= URL ?>public/img/pagos/mastercard.png">
                            <img class="f__paying__icos--img" src="<?= URL ?>public/img/pagos/visa.png">
                            <img class="f__paying__icos--img" src="<?= URL ?>public/img/pagos/pse.png">
                        </div>
                    </div>
                </div>
            </div>
            <div class="f__subscribe">
                <div class="f__subscribe__content">
                    <p class="f--title">Únete ahora</p>
                    <div class="f__subscribe__input">
                        <input class="f__subscribe--input" placeholder="ejemplo@OrderSoft.com" type="text" required>
                    </div>
                    <div class="c-promo-index__btn">
                        <a class="c-promo-index__btn--a" href="">Enviar</a>
                    </div>
                    <p class="f__subscribe--p">Al suscribirte aceptas nuestas politicas de tratamiento de datos.</p>
                </div>
                <div class="f__subscribe__icos">
                    <a href=""><i class="fab fa-facebook-f"></i></a>
                    <a href=""><i class="fab fa-instagram"></i></a>
                    <a href=""><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="f-copyright container__content">
        <p class="f-copyright--p">© 2020 OrderSoft.</p>
    </div>
    <div class="f-ordersoft">
        <p class="f-ordersoft--p">Desarrollador por el equipo</p>
        <a class="f-ordersoft--a" href="">ORDERSOFT</a>
    </div>
</footer>
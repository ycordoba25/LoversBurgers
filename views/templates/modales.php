<!-- The Modal -->
<div id="id01" class="modal">
        <span onclick="document.getElementById('id01').style.display='none'" class="close"
            title="Close Modal">&times;</span>

        <!-- Modal Content Login -->
        <form id="flogin" class="modal-content animate" action="<?=URL?>cliente/login" method="post">

            <div class="container__login">
                <label for="uname"><b>Email</b></label>
                <input class="login--inpt" type="text" placeholder="Correo electronico" name="email" required>

                <label for="psw"><b>Contraseña</b></label>
                <input class="login--inpt" type="password" placeholder="Ingrese Contraseña" name="contraseña" required>

                <button class="login--btn2" type="submit">Iniciar sesion</button>

            </div>

            <div class="container__login__options">
                <button type="button" onclick="document.getElementById('id01').style.display='none'"
                    class="cancelbtn">Cancelar</button>
                <div class="container__login__options--span">
                    <span><a href="#">¿Olvidó la contraseña?</a></span>
                    <span class="btn--register" onclick="registerModal()">Crea tu cuenta</span>
                </div>
            </div>
        </form>

        <!-- Modal Content Register -->
        <form id="fregister" class="modal-content animate" style="display: none;" method="post" action="<?=URL?>cliente/registrar">

            <div class="container__login">

                <input class="register--inpt stylereg--inpt" type="text" placeholder="Nombres" name="nombres" required>

                <input class="register--inpt register--inpt--center" type="text" placeholder="Apellidos" name="apellidos"
                    required>

                <input class="register--inpt register--inpt--center" type="email" placeholder="Correo electronico"
                    name="email" required>

                <input class="register--inpt register--inpt--center" type="password" placeholder="Ingrese Contraseña"
                    name="contraseña" required>

                <input class="register--inpt register--inpt--center" type="text" placeholder="Documento" name="documento"
                    required>

                <input class="register--inpt register--inpt--center" type="text" placeholder="Celular" name="telefono"
                    required>

                <input class="register--inpt stylereg--inpt2" type="text" placeholder="Direccion" name="direccion" required>

                <button class="login--btn2" type="submit">Registrarme</button>

            </div>

            <div class="container__login__options">
                <button type="button" onclick="document.getElementById('id01').style.display='none'"
                    class="cancelbtn">Cancelar</button>
                <div class="container__login__options--span">
                    <span class="btn--register" onclick="loginModal()">Ya tengo cuenta</span>
                </div>
            </div>
        </form>
</div>
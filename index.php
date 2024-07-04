<?php
require_once('coneclinix.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Adamina&family=Merriweather:ital@1&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style75.css">

    <title>Clinix</title>
</head>

<body id="body">
    <main>
        <header>
            <div class="logo">
                <div class="containlogo">
                    <i></i>
                    <p class="">CLINIX</p>
                </div>
            </div>
            <input type="checkbox" id="check">
            <label for="check" class="check-boton">
                <i class="fa-solid fa-bars" style="color: #010101;" id="menu"></i>
            </label>

            <div class="barra">
                <label for="check" class="check-boton" id="close">
                    <i class="fa-solid fa-xmark" style="color: #0a0a0a;"></i>
                </label>

                <a href="./citas/validar_agendar.php">Agendar Cita</a>
                <a href="./citas/validar_agendar.php" >Farmacia</a>
                <a href="#somos" id="blanco">Quienes Somos</a>
                <a href="#" class="font-blanco" id="sesion">Iniciar Sesion</a>
            </div>
        </header>
        <div class="principal">
            <div class="texto">
                <h5>"Tu Mejor Opcion Para Tus Peores Momentos"</h5>
                <p> 
                    !Que esperas para hacer uso de nuestros Servicios! <br> Da Click en registrarse

                    </p>
                <button>
                <a href="./citas/registro.php">Registrarse </a>
                    
                </button>
            </div>
            <div class="mujer">
                <div class="img"></div>
            </div>
        </div>
    </main>

    <div class="intermedio"></div>
    <section class="sect1">
        <h2>Nuestros servicios</h2>
        <div class="servi1">
            <div class="box1">
                <div class="boximg1">

                </div>
                <p>Tiene a su disposición una farmacia en la cual encontraras una variedad de medicamentes al mejor
                    precio y calidad.</p>
            </div>
            <div class="box2">
                <div class="boximg2">

                </div>
                <p> No tienes que hacer filas por tu cita o medicamento.</p>
            </div>
            <div class="box3">
                <div class="boximg3">

                </div>
                <p>Ofrecemos agendamiento de citas medicas con los mejores especialistas de Florencia-Caqueta.</p>
            </div>
        </div>
        <div class="servi-medio">
            <div class="box3">
                <div class="boximg3">

                </div>
                <p>Ofrecemos agendamiento de citas medicas con los mejores especialistas de Florencia-Caqueta.</p>
            </div>
            <div class="box4">
                <div class="boximg4">

                </div>
                <p>Nuestra prioridad son ustedes.</p>
            </div>
        </div>
        <div class="servi2">
            <div class="box4">
                <div class="boximg4">

                </div>
                <p>Nuestra prioridad son ustedes.</p>
            </div>
            <div class="box5">
                <div class="boximg5">

                </div>
                <p>Somos la primera plataforma de servicios de salud mas rapida y eficiente que encontraras en
                    florencia.</p>
            </div>
            <div class="box6">
                <div class="boximg6">

                </div>
                <p>Tecnologia de calidad.</p>
            </div>
        </div>
    </section>
    <div class="intermedio"></div>
    <section class="sect2" id="somos">
        <h2>Quienes somos</h2>
        <p>En CLINIX , nos enorgullecemos de ofrecer una experiencia de atención médica integral y accesible para todos
            nuestros cliente debido a que contamos con un equipo diverso y talentoso de profesionales de la salud,
            farmacéuticos y expertos en tecnología que trabajan en conjunto para brindar una atención integral e
            integrada.</p>
        <div class="mi_vi">
            <div class="mision">
                <div class="titmi">Mision</div>
                <div class="textmi">Nuestra misión es proporcionar servicios farmacéuticos y de agendamiento de citas
                    médicas con los más altos estándares de calidad, enfocados en mejorar la salud y el bienestar de
                    cada persona que confía en nosotros. Buscamos facilitar el acceso a medicamentos y servicios
                    médicos, garantizando la máxima seguridad y eficacia en cada paso de nuestro proceso.</div>
            </div>
            <div class="vision">
                <div class="titvi">Vision</div>
                <div class="textvi">Nos esforzamos por convertirnos en el principal aliado de salud para nuestra
                    comunidad, estableciendo una relación de confianza con nuestros pacientes y promoviendo un enfoque
                    preventivo y proactivo en su bienestar. Aspiramos a ser reconocidos como un referente de excelencia
                    en el campo de la atención médica y farmacéutica en carrera30A #9.</div>
            </div>
        </div>
    </section>
    <div class="intermedio">

    </div>
    <br>
    <section class="sect3">
        <h2>¿Tienes alguna sugerencia que quieras compartir sobre nuestra plataforma de servicios de citas médicas y
            medicamentos?</h2>
        <p>Valoramos enormemente la opinión de nuestros clientes, ya que su retroalimentación nos ayuda a mejorar
            continuamente nuestra plataforma y brindarles la mejor experiencia posible. Te invitamos a dejarnos tus
            comentarios en la caja a continuación</p>
        <div class="caja_co">
            <form action="./citas/validar_agendar.php" method="POST" class="form_suge">
                <textarea name="sugerencia" cols="30" rows="5" placeholder="Ingresa el texto"></textarea>
                <button type="submit" class="enviar" name="enviar">Enviar</button>
            </form>
        </div>
        <div class="agrade">
            ¡Agradecemos tu participación!
        </div>
    </section>
    <div class="intermedio">

    </div>
    <footer id="footer">
        <div class="foo1">
            <strong>Nos Ubicamos en:</strong>
            <p>Centro Tecnologico de la Amazonia</p>
            <div class="map"><iframe id="gmap_canvas"
                    src="https://maps.google.com/maps?q=sena+florencia-caqueta&t=&z=11&ie=UTF8&iwloc=&output=embed"
                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div>

        </div>
        <div class="foo2">
            <strong>Horario de atención</strong>
            <p>Agendamiento de citas de luenes a viernes de 6:00am a 5:00pm</p>
            <p>Farmacia las 24 horas del día de lunes a viernes</p>
            <br>
            <strong>Redes Sociales :</strong>
            <div class="logosfo">
                <a href=""><i class="fa-brands fa-facebook" style="color: #6e6e6e;"></i></a>
                <a href=""><i class="fa-brands fa-instagram" style="color: #6e6e6e;"></i></a>
                <a href=""><i class="fa-brands fa-twitter" style="color: #6e6e6e;"></i></a>
            </div>

            <br>
            <p>© 2023 ClLINIX EPS en Liquidación. Todos los derechos reservados.</p>
        </div>
    </footer>
    <div class="modal">
        <div class="container">
            <br>
            <form action="./citas/validar_ingreso.php" class="form_sesion" method="post">
                <div class="se_text">
                    <h2>Iniciar Sesión</h2> <i id="o_p"><i class="fa-solid fa-xmark"
                            style="color: #050505;"></i></i>
                </div>
                <input type="email" name="correo" placeholder="Correo" required>

                <input type="password" name="pass" id="pass" placeholder="Contraseña">
                <p>Si olvido su contraseña da click <a href="./citas/contrase.php">Recuperar</a></p>

                <button type="submit" class="boto">Enviar</button>
                <div class="raya">
                    <hr>
                    <P>O</P>
                    <hr>
                </div>

            </form>
            <a href="./citas/registro.php" id="botosesion">Registrar</a>
            <br>
        </div>
    </div>
            <form action="./citas/cerrar.php" method="post" id="cerrarsesion">
                <button type="submit" class="boto">Cerrar Sesion</button>
                <button type="button" class="boto" id="cancell">Cancelar</button>
            </form>


</body>

</html>

<!-- index.html -->

<script>
    /*
    document.getElementById("sesion").addEventListener("click", function () {
        // Crear el modal y agregarlo al body
        var modal = document.createElement("div");
        modal.classList.add("modal");
        fetch("sesion.html")
            .then(response => response.text())
            .then(data => {
                modal.innerHTML = data;
                document.body.appendChild(modal);

                // Agregar la clase 'modal-open' al body para bloquear el scroll detrás del modal
                document.body.classList.add("modal-open");
            });

        // Cerrar el modal cuando se haga clic fuera de él
        modal.addEventListener("click", function (event) {
            if (event.target === modal) {
                document.body.removeChild(modal);
                document.body.classList.remove("modal-open");
            }
        });
    });*/

        const ini= document.querySelector('#sesion');
        const modal= document.querySelector('.modal');
        const closee = document.querySelector('#o_p');
        const sec1 = document.querySelector('.sect1');
        const sec2 = document.querySelector('.sect2');
        const sec3 = document.querySelector('.sect3');
        const sec4 = document.querySelector('#footer');

        // Función para mostrar la sección de Agendar citas
        function abrir() {
            modal.style.display = 'flex';
            modal.style.visibility = 'visible';
            sec1.style.display = 'none';
            sec2.style.display = 'none';
            sec3.style.display = 'none';
            sec4.style.display = 'none';

        }

        // Función para mostrar la sección de Mis citas
        function cerrar() {
            modal.style.display = 'none';
            modal.style.visibility = 'hidden';
            sec1.style.display = 'flex';
            sec2.style.display = 'flex';
            sec3.style.display = 'flex';
            sec4.style.display = 'flex';
        }

        // Agregar eventos a los enlaces
        ini.addEventListener('click', abrir);
        closee.addEventListener('click', cerrar);
</script>

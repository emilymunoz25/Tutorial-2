<?php
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'docente'){
    header("Location: ../verificacion.php");
    exit();
}
$activePage = 'ciclos';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ciclos | TutorVideos</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <header>
        <div class="confirm-row">
            <img src="../img/logo.png" class="confirm-logo-img" alt="Logo">
        </div>

        <div class="text-center-header">
            <h1>Ciclos de Multiplicación</h1>
            <p>Explora las tablas de multiplicar con ciclos.</p>
        </div>

        <div class="topbar-settings">
            <div class="accessibility-tools">
                <div class="language-selector">
                    <label for="idioma">Idioma:</label>

                    <select id="idioma">
                        <option>Español</option>
                        <option>English</option>
                        <option>Français</option>
                    </select>
                </div>

                <button class="theme-btn">
                    🌙 Modo Oscuro
                </button>
            </div>
        </div>
    </header>

    <nav><?php include 'menuDocente.inc.php'; ?></nav>

    <section>
        <h1>Tabla de Multiplicar del 4</h1>
        <p>Tabla generada con un ciclo del 0 al 10:</p>
        <div>
            <?php
            for ($i = 0; $i <= 10; $i++) {
                $resultado = 4 * $i;
                echo "4 x $i = $resultado<br>";
            }
            ?>
        </div>

        <h1>Generar Tabla Personalizada</h1>
        <form action="ciclos.php" method="post">
            <label for="numero">Ingresa un número:</label>
            <input type="number" id="numero" name="numero" min="1" max="20" required>
            <button type="submit" name="generar">Generar Tabla</button>
        </form>

        <?php
        if (isset($_POST['generar'])) {
            $numero = intval($_POST['numero']);
            echo "<h2>Tabla de Multiplicar del $numero</h2>";
            echo "<div>";
            for ($i = 0; $i <= 10; $i++) {
                $resultado = $numero * $i;
                echo "$numero x $i = $resultado<br>";
            }
            echo "</div>";
        }
        ?>

        <h1>Selector de Fecha</h1>
        <form action="ciclos.php" method="post">
            <label for="dia">Día:</label>
            <select id="dia" name="dia">
                <option value="">Selecciona un día</option>
                <?php
                for ($dia = 1; $dia <= 31; $dia++) {
                    echo "<option value=\"$dia\">$dia</option>";
                }
                ?>
            </select>

            <label for="mes">Mes:</label>
            <select id="mes" name="mes">
                <option value="">Selecciona un mes</option>
                <?php
                $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
                for ($i = 1; $i <= 12; $i++) {
                    echo "<option value=\"$i\">".$meses[$i-1]."</option>";
                }
                ?>
            </select>

            <label for="anio">Año:</label>
            <select id="anio" name="anio">
                <option value="">Selecciona un año</option>
                <?php
                for ($anio = 1900; $anio <= 2100; $anio++) {
                    echo "<option value=\"$anio\">$anio</option>";
                }
                ?>
            </select>

            <button type="submit" name="mostrar_fecha">Mostrar Fecha</button>
        </form>

        <?php
        if (isset($_POST['mostrar_fecha'])) {
            $dia = isset($_POST['dia']) && $_POST['dia'] !== '' ? intval($_POST['dia']) : 'No seleccionado';
            $mes = isset($_POST['mes']) && $_POST['mes'] !== '' ? intval($_POST['mes']) : 'No seleccionado';
            $anio = isset($_POST['anio']) && $_POST['anio'] !== '' ? intval($_POST['anio']) : 'No seleccionado';
            
            $meses_nombres = array("", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
            $mes_nombre = is_numeric($mes) ? $meses_nombres[$mes] : 'No seleccionado';
            
            echo "<h2>Fecha Seleccionada</h2>";
            echo "<p>Día: $dia</p>";
            echo "<p>Mes: $mes_nombre</p>";
            echo "<p>Año: $anio</p>";
            
            if ($dia !== 'No seleccionado' && $mes !== 'No seleccionado' && $anio !== 'No seleccionado') {
                echo "<p><strong>Fecha completa: $dia de $mes_nombre de $anio</strong></p>";
            }
        }
        ?>
    </section>

    <footer class="main-footer">

        <div class="footer-grid">

            <div class="footer-brand">
                <h3>TutorVideos</h3>
                <p>
                    Plataforma educativa interactiva con cursos,
                    tutoriales y herramientas de aprendizaje digital.
                </p>
            </div>

            <div class="footer-links">
                <h4>Enlaces</h4>

                <p href="homedocente.php">Inicio</p>
                <p href="curso1.php">Curso 1</p>
                <p href="curso2.php">Curso 2</p>
                <p href="ia.php">IA</p>
            </div>

            <div class="footer-contact">
                <h4>Contacto</h4>

                <p>📧 soporte@tutorvideos.com</p>
                <p>📍 Popayán, Colombia</p>
                <p>📞 +57 300 000 0000</p>
            </div>

            <div class="footer-social">
                <h4>Síguenos</h4>

                <div class="social-icons">
                    <p href="#">Facebook</p>
                    <p href="#">Instagram</p>
                    <p href="#">YouTube</p>
                </div>
            </div>

        </div>

        <div class="footer-bottom">
            <p>
                © 2025 TutorVideos - Colegio Mayor del Cauca.
                Todos los derechos reservados.
            </p>
        </div>

    </footer>
    <div class="accessibility-float" title="Opciones de accesibilidad">
        👩🏻‍💻
    </div>    
</body>
</html>
</content>
<parameter name="filePath">c:\xampp\htdocs\TutorVideos\docentes\ciclos.php
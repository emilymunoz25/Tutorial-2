<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'docente') {
    header("Location: ../verificacion.php");
    exit();
}
$activePage = 'vectores';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vectores | TutorVideos</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>
    <header>
        <div class="confirm-row">
            <img src="../img/logo.png" class="confirm-logo-img" alt="Logo">
        </div>

        <div class="text-center-header">
            <h1>Vectores en PHP</h1>
            <p>Aprende sobre vectores (arrays) en PHP con ejemplos prácticos.</p>
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
        <h2>Ejemplos de Vectores</h2>
        <p>A continuación, se muestran ejemplos de vectores escalares y asociativos en PHP.</p>

        <div class="grid">
            <article class="card">
                <h3>Vectores Indexados</h3>
                <p>Ejemplo de un vector con colores:</p>
                <pre>
<?php
$colores = ["rojo", "verde", "azul"];
echo "Posición 0: " . $colores[0] . "\n";
echo "Posición 1: " . $colores[1] . "\n";
echo "Posición 2: " . $colores[2] . "\n";
echo "Colores: " . implode(", ", $colores) . "\n";
?>
                </pre>
            </article>

            <article class="card">
                <h3>Vector Mixto</h3>
                <p>Un vector con diferentes tipos de datos:</p>
                <pre>
<?php
$mixto = [42, "Hola", 3.14, true];
echo "Posición 0: " . $mixto[0] . "\n";
echo "Posición 1: " . $mixto[1] . "\n";
echo "Posición 2: " . $mixto[2] . "\n";
?>
                </pre>
                <p>Recorriendo con for:</p>
                <pre>
<?php
for ($k = 0; $k <= 2; $k++) {
    echo $mixto[$k] . "\n";
}
?>
                </pre>
            </article>

            <article class="card">
                <h3>Recorriendo con foreach</h3>
                <p>Usando foreach para el vector de colores:</p>
                <pre>
<?php
foreach ($colores as $color) {
    echo "Color: " . $color . "\n";
}
?>



                </pre>
            </article>

            <article class="card">
                <h3>Vector Asociativo</h3>
                <p>Ejemplo de un equipo de fútbol:</p>
                <pre>
<?php
$equipo = [
    "Portero" => "Alvaro Montero",
    "Lateral derecho" => "Duván Vergara",
    "lateral izquierdo" => "Duván Zapata",
    "Central derecho" => "Yerry Mina",
    "Central izquierdo" => "Davinson Sánchez",
    "volante de marca" => "Wilmar Barrios",
    "puntas" => "Luis Díaz",
];

foreach ($equipo as $posicion => $nombre) {
    echo $posicion . ": " . $nombre . "\n";
}
?>
                </pre>
            </article>
        </div>
    </section>

    <?php
    if (isset($_POST['Enviar'])) {
        $idioma = $_POST['idioma'];
        echo "Idioma seleccionado: " . $idioma;
        foreach ($idioma as $nombre) {
            echo "Idioma: " . $nombre . "\n";
        }
    }

    ?>

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
<?php
session_start();
require_once 'Animal.php';

$activePage = 'funciones';
$mensajeFormulario = '';
$mensajeDb = '';

if (!isset($_SESSION['animales'])) {
    $_SESSION['animales'] = [];
}

function piropo()
{
    return "Hola, eres muy guapa";
}

function piropo2($mensaje)
{
    return $mensaje;
}

function emilyrResponde()
{
    return "Hola, soy Emily, un saludo desde la funcion";
}

function obtenerConexionAnimales()
{
    $config = require __DIR__ . '/config/database.php';
    $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";

    return new PDO($dsn, $config['user'], $config['password'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accion = $_POST['accion'] ?? '';

    if ($accion === 'limpiar_sesion') {
        $_SESSION['animales'] = [];
        $mensajeFormulario = 'Lista de animales limpiada correctamente.';
    }

    if ($accion === 'guardar_sesion' || $accion === 'guardar_db') {
        $nombre = trim($_POST['nombre'] ?? '');
        $edad = (int) ($_POST['edad'] ?? 0);
        $raza = trim($_POST['raza'] ?? '');

        if ($nombre === '' || $edad <= 0 || $raza === '') {
            $mensajeFormulario = 'Completa nombre, edad valida y raza.';
        } else {
            $animal = new Animal();
            $animal->setNombre($nombre);
            $animal->setEdad($edad);
            $animal->setRaza($raza);

            $_SESSION['animales'][] = [
                'nombre' => $animal->getNombre(),
                'edad' => $animal->getEdad(),
                'raza' => $animal->getRaza(),
            ];

            $mensajeFormulario = 'Animal agregado al vector de sesion.';

            if ($accion === 'guardar_db') {
                try {
                    $pdo = obtenerConexionAnimales();
                    $stmt = $pdo->prepare('INSERT INTO animales (nombre, edad, raza) VALUES (:nombre, :edad, :raza)');
                    $stmt->execute([
                        ':nombre' => $animal->getNombre(),
                        ':edad' => $edad,
                        ':raza' => $animal->getRaza(),
                    ]);
                    $mensajeDb = 'Animal guardado tambien en la base de datos.';
                } catch (PDOException $e) {
                    $mensajeDb = 'No se pudo guardar en BD. Crea la base con database/tutorvideos_animales.sql.';
                }
            }
        }
    }
}

$animal = new Animal();
$animal->setNombre("Firulais");
$animal->setEdad(5);
$animal->setRaza("Labrador");

$vectorAnimales = ["Perro", "Gato", "Conejo", "Loro"];
$matrizSecciones = [
    ["seccion" => "A", "animal" => "Perro", "cantidad" => 2],
    ["seccion" => "B", "animal" => "Gato", "cantidad" => 3],
    ["seccion" => "C", "animal" => "Conejo", "cantidad" => 1],
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funciones | TutorVideos</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <header>
        <div class="confirm-row">
            <img src="./img/logo.png" class="confirm-logo-img" alt="Logo">
        </div>

        <div class="text-center-header">
            <<h1>Funciones y Objetos en PHP</h1>
            <p>Ejemplo practico con funciones, clases, arreglos, matriz, sesiones y base de datos.</p>
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

    <nav><?php include 'menu.inc.php'; ?></nav>

    <section>
        <h1>Funciones</h1>
        <div class="grid">
            <article class="card">
                <span class="tag">Funcion simple</span>
                <h3>piropo()</h3>
                <p><?= htmlspecialchars(piropo()) ?></p>
            </article>
            <article class="card">
                <span class="tag">Parametro</span>
                <h3>piropo2($mensaje)</h3>
                <p><?= htmlspecialchars(piropo2("Hola, soy un mensaje")) ?></p>
            </article>
            <article class="card">
                <span class="tag">Return</span>
                <h3>emilyrResponde()</h3>
                <p><?= htmlspecialchars(emilyrResponde()) ?></p>
            </article>
        </div>
    </section>

    <section>
        <h1>PHP Orientado a Objetos</h1>
        <p>Una clase es un molde para crear objetos. Define propiedades y metodos que los objetos pueden usar.</p>

        <table>
            <tr>
                <th>Propiedad</th>
                <th>Valor</th>
            </tr>
            <tr>
                <td>Nombre</td>
                <td><?= htmlspecialchars($animal->getNombre()) ?></td>
            </tr>
            <tr>
                <td>Edad</td>
                <td><?= htmlspecialchars((string) $animal->getEdad()) ?></td>
            </tr>
            <tr>
                <td>Raza</td>
                <td><?= htmlspecialchars($animal->getRaza()) ?></td>
            </tr>
        </table>
    </section>

    <section>
        <h1>Formulario de animales</h1>
        <p>Este formulario permite agregar varios animales a un vector guardado en la sesion. Tambien puedes probar el guardado en MySQL.</p>

        <?php if ($mensajeFormulario !== ''): ?>
            <div class="notice success"><?= htmlspecialchars($mensajeFormulario) ?></div>
        <?php endif; ?>

        <?php if ($mensajeDb !== ''): ?>
            <div class="notice info-message"><?= htmlspecialchars($mensajeDb) ?></div>
        <?php endif; ?>

        <form action="funciones.php" method="post">
            <div class="form-grid">
                <div>
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Firulais" required>
                </div>
                <div>
                    <label for="edad">Edad</label>
                    <input type="number" id="edad" name="edad" min="1" placeholder="5" required>
                </div>
                <div>
                    <label for="raza">Raza</label>
                    <input type="text" id="raza" name="raza" placeholder="Labrador" required>
                </div>
            </div>

            <button type="submit" name="accion" value="guardar_sesion">Agregar a sesion</button>
            <button type="submit" name="accion" value="guardar_db">Agregar y guardar en BD</button>
            <button type="submit" name="accion" value="limpiar_sesion">Limpiar lista</button>
        </form>

        <h2>Animales agregados en sesion</h2>
        <?php if (count($_SESSION['animales']) > 0): ?>
            <table>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Raza</th>
                </tr>
                <?php foreach ($_SESSION['animales'] as $index => $item): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= htmlspecialchars($item['nombre']) ?></td>
                        <td><?= htmlspecialchars((string) $item['edad']) ?></td>
                        <td><?= htmlspecialchars($item['raza']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No hay animales agregados todavia.</p>
        <?php endif; ?>
    </section>

    <section>
        <h1>Vector y matriz</h1>
        <div class="grid">
            <article class="card">
                <span class="tag">Vector</span>
                <h3>Lista simple</h3>
                <ul class="example-list">
                    <?php foreach ($vectorAnimales as $item): ?>
                        <li><?= htmlspecialchars($item) ?></li>
                    <?php endforeach; ?>
                </ul>
            </article>

            <article class="card">
                <span class="tag">Matriz</span>
                <h3>Secciones por animal</h3>
                <table class="compact-table">
                    <tr>
                        <th>Seccion</th>
                        <th>Animal</th>
                        <th>Cantidad</th>
                    </tr>
                    <?php foreach ($matrizSecciones as $fila): ?>
                        <tr>
                            <td><?= htmlspecialchars($fila['seccion']) ?></td>
                            <td><?= htmlspecialchars($fila['animal']) ?></td>
                            <td><?= htmlspecialchars((string) $fila['cantidad']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </article>
        </div>
    </section>

    <section>
        <h1>Base de datos para XAMPP</h1>
        <p>Crea una base llamada <strong>tutorvideos</strong> y una tabla llamada <strong>animales</strong>.</p>
        <div class="code-box">
            <pre>CREATE DATABASE IF NOT EXISTS tutorvideos;

CREATE TABLE animales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    edad INT NOT NULL,
    raza VARCHAR(100) NOT NULL,
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);</pre>
        </div>
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

                <p href="home.php">Inicio</p>
                <p href="catalogo.php">Cursos</p>
                <p href="preguntas.php">FAQ</p>
                <p href="mision.php">Misión</p>
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

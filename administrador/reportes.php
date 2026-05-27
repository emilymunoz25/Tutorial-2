<?php
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin'){
    header("Location: ../verificacion.php");
    exit();
}
$activePage = 'reportes';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes | TutorVideos</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <header>
        <div class="confirm-row">
            <img src="../img/logo.png" class="confirm-logo-img" alt="Logo">
        </div>

        <div class="text-center-header">
            <h2>Reportes y Analytics</h2>
            <p>Visualiza métricas y genera informes del sistema.</p>
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

    <nav><?php include 'menuAdmin.inc.php'; ?></nav>

    <section>
        <h1>Dashboard de Reportes</h1>
        <div class="report-filters">
            <form action="#" method="get">
                <select name="periodo">
                    <option>Última semana</option>
                    <option>Último mes</option>
                    <option>Último trimestre</option>
                    <option>Último año</option>
                </select>
                <button type="submit">Generar Reporte</button>
            </form>
        </div>

        <div class="grid">
            <article class="card">
                <h3>Usuarios Activos</h3>
                <p class="metric">12,456</p>
                <p class="change positive">+8.2% vs mes anterior</p>
            </article>
            <article class="card">
                <h3>Completaciones de Cursos</h3>
                <p class="metric">3,421</p>
                <p class="change positive">+12.5% vs mes anterior</p>
            </article>
            <article class="card">
                <h3>Ingresos</h3>
                <p class="metric">$45,678</p>
                <p class="change positive">+15.3% vs mes anterior</p>
            </article>
            <article class="card">
                <h3>Satisfacción</h3>
                <p class="metric">4.7/5</p>
                <p class="change neutral">Sin cambios</p>
            </article>
        </div>

        <div class="charts">
            <h2>Gráficos de Tendencia</h2>
            <div class="chart-placeholder">
                <p>[Aquí irían gráficos de usuarios, ingresos, etc.]</p>
            </div>
        </div>

        <div class="export">
            <a href="#" class="btn">Exportar a PDF</a>
            <a href="#" class="btn">Exportar a Excel</a>
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

                <p href="admin.php">Panel Admin</p>
                <p href="cursos.php">Cursos</p>
                <p href="reportes.php">Reportes</p>
                <p href="usuarios.php">Usuarios</p>
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
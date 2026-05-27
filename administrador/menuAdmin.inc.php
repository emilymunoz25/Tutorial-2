<?php
$activePage = $activePage ?? '';
?>
<ul>
    <li><a href="admin.php" class="<?= $activePage === 'admin' ? 'active' : '' ?>">Panel Admin</a></li>
    <li><a href="usuarios.php" class="<?= $activePage === 'usuarios' ? 'active' : '' ?>">Usuarios</a></li>
    <li><a href="cursos.php" class="<?= $activePage === 'cursos' ? 'active' : '' ?>">Cursos</a></li>
    <li><a href="reportes.php" class="<?= $activePage === 'reportes' ? 'active' : '' ?>">Reportes</a></li>
    <li><a href="ia.php" class="<?= $activePage === 'ia' ? 'active' : '' ?>">IA</a></li>
    <li><a href="config.php" class="<?= $activePage === 'config' ? 'active' : '' ?>">Configuración</a></li>
    <li><a href="../cerrar.php" class="<?= $activePage === 'cerrar' ? 'active' : '' ?>">Cerrar Sesión</a></li>
</ul>


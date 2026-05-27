<?php
$activePage = $activePage ?? ''; 
?>
<ul>
    <li><a href="homedocente.php" class="<?= $activePage === 'inicio' ? 'active' : '' ?>">Inicio</a></li>
    <li><a href="perfil.php" class="<?= $activePage === 'perfil' ? 'active' : '' ?>">Perfil</a></li>
    <li><a href="formacion.php" class="<?= $activePage === 'formacion' ? 'active' : '' ?>">Formación</a></li>
    <li><a href="curso1.php" class="<?= $activePage === 'curso1' ? 'active' : '' ?>">Curso 1</a></li>
    <li><a href="curso2.php" class="<?= $activePage === 'curso2' ? 'active' : '' ?>">Curso 2</a></li>
    <li><a href="ciclos.php" class="<?= $activePage === 'ciclos' ? 'active' : '' ?>">Ciclos</a></li>
    <li><a href="vectores.php" class="<?= $activePage === 'vectores' ? 'active' : '' ?>">Vectores</a></li>
    <li><a href="ia.php" class="<?= $activePage === 'ia' ? 'active' : '' ?>">IA</a></li>
    <li><a href="cerrar.php" class="<?= $activePage === 'cerrar' ? 'active' : '' ?>">Cerrar Sesión</a></li>
</ul>




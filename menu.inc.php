<?php 
$activePage = $activePage ?? '';
?>

<ul>
    <li><a href="home.php" class="<?= $activePage === 'home' ? 'active' : '' ?>">Home</a></li>
    <li><a href="mision.php" class="<?= $activePage === 'mision' ? 'active' : '' ?>">Misión</a></li>
    <li><a href="vision.php" class="<?= $activePage === 'vision' ? 'active' : '' ?>">Visión</a></li>
    <li><a href="catalogo.php" class="<?= $activePage === 'catalogo' ? 'active' : '' ?>">Catálogo</a></li>
    <li><a href="preguntas.php" class="<?= $activePage === 'faq' ? 'active' : '' ?>">FAQ</a></li>
    <li><a href="cerrar.php" class="<?= $activePage === 'cerrar' ? 'active' : '' ?>">Cerrar Sesión</a></li>
</ul>
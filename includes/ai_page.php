<?php
require_once __DIR__ . '/ai_client.php';

$result = null;
$task = $_POST['task'] ?? 'consulta';
$topic = trim($_POST['topic'] ?? '');
$level = trim($_POST['level'] ?? '');
$details = trim($_POST['details'] ?? '');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($topic === '') {
        $result = [
            'ok' => false,
            'provider' => 'Formulario',
            'content' => 'Escribe un tema para que la IA pueda ayudarte.',
        ];
    } else {
        $result = tutorvideos_ai_generate($task, $topic, $level, $details);
    }
}
?>
<section>
    <h1>Asistente IA para videos</h1>
    <p>Genera guiones, ideas de video o preguntas para encontrar mejores recursos educativos.</p>

    <form action="" method="post" class="ai-form">
        <div class="form-grid">
            <div>
                <label for="task">Que necesitas</label>
                <select id="task" name="task">
                    <option value="consulta" <?= $task === 'consulta' ? 'selected' : '' ?>>Preguntar por videos</option>
                    <option value="guion" <?= $task === 'guion' ? 'selected' : '' ?>>Crear guion educativo</option>
                    <option value="video_did" <?= $task === 'video_did' ? 'selected' : '' ?>>Generar avatar con D-ID</option>
                    <option value="video_minimax" <?= $task === 'video_minimax' ? 'selected' : '' ?>>Generar video con MiniMax</option>
                    <option value="video" <?= $task === 'video' ? 'selected' : '' ?>>Generar video con Runway</option>
                    <option value="audio" <?= $task === 'audio' ? 'selected' : '' ?>>Narrar texto con ElevenLabs</option>
                </select>
            </div>
            <div>
                <label for="level">Nivel educativo</label>
                <input type="text" id="level" name="level" value="<?= htmlspecialchars($level) ?>" placeholder="Basico, grado 10, universitario">
            </div>
        </div>

        <div class="form-block">
            <label for="topic">Tema del video</label>
            <input type="text" id="topic" name="topic" value="<?= htmlspecialchars($topic) ?>" placeholder="Ej: Ecuaciones lineales, fotosintesis, HTML basico" required>
        </div>

        <div class="form-block">
            <label for="details">Detalles o enfoque</label>
            <textarea id="details" name="details" rows="6" placeholder="Duracion, publico, tono, objetivos, recursos disponibles, o el texto completo que quieres narrar..."><?= htmlspecialchars($details) ?></textarea>
        </div>

        <button type="submit">Generar con IA</button>
    </form>

    <?php if ($result): ?>
        <div class="ai-result <?= $result['ok'] ? 'success' : 'error' ?>">
            <h2>Respuesta de <?= htmlspecialchars($result['provider']) ?></h2>
            <pre><?= htmlspecialchars($result['content']) ?></pre>
            <?php if (!empty($result['audio_url'])): ?>
                <audio controls src="<?= htmlspecialchars($result['audio_url']) ?>"></audio>
            <?php endif; ?>
            <?php if (!empty($result['video_url'])): ?>
                <video controls src="<?= htmlspecialchars($result['video_url']) ?>"></video>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</section>

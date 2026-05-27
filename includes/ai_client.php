<?php

function tutorvideos_ai_config(): array
{
    return require __DIR__ . '/../config/ai.php';
}

function tutorvideos_ai_build_prompt(string $task, string $topic, string $level, string $details): string
{
    $taskLabels = [
        'consulta' => 'Responder una consulta sobre videos educativos recomendados',
        'guion' => 'Crear un guion para un video educativo',
        'video' => 'Crear una propuesta completa para generar un video con IA',
    ];

    $taskLabel = $taskLabels[$task] ?? $taskLabels['consulta'];
    $levelText = $level !== '' ? $level : 'nivel general';
    $detailsText = $details !== '' ? $details : 'Sin detalles adicionales.';

    return "Actua como asistente pedagogico de TutorVideos.\n"
        . "Tarea: {$taskLabel}.\n"
        . "Tema: {$topic}.\n"
        . "Nivel educativo: {$levelText}.\n"
        . "Detalles del docente o administrador: {$detailsText}.\n\n"
        . "Entrega una respuesta en espanol, clara y lista para usar. "
        . "Si la tarea es video, incluye titulo, objetivo, guion narrado, escenas, recursos visuales, prompt para generador de video y recomendaciones de revision docente.";
}

function tutorvideos_ai_generate(string $task, string $topic, string $level, string $details): array
{
    $config = tutorvideos_ai_config();
    $provider = strtolower(trim((string) $config['provider']));
    $prompt = tutorvideos_ai_build_prompt($task, $topic, $level, $details);

    if ($task === 'video') {
        return tutorvideos_ai_runway_video($config, $topic, $level, $details);
    }

    if ($task === 'video_minimax') {
        return tutorvideos_ai_minimax_video($config, $topic, $level, $details);
    }

    if ($task === 'video_did') {
        return tutorvideos_ai_did_video($config, $topic, $level, $details);
    }

    if ($task === 'audio') {
        return tutorvideos_ai_elevenlabs($config, $task, $topic, $level, $details);
    }

    if ($provider === 'gemini' && !empty($config['api_key'])) {
        return tutorvideos_ai_gemini($config, $prompt);
    }

    if ($provider === 'pollinations') {
        return tutorvideos_ai_pollinations($config, $prompt);
    }

    return tutorvideos_ai_demo($task, $topic, $level, $details);
}

function tutorvideos_ai_gemini(array $config, string $prompt): array
{
    if (!function_exists('curl_init')) {
        return tutorvideos_ai_error('La extension cURL de PHP no esta activa en XAMPP.');
    }

    $model = rawurlencode((string) $config['model']);
    $url = "https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent?key=" . urlencode((string) $config['api_key']);
    $payload = json_encode([
        'contents' => [
            [
                'parts' => [
                    ['text' => $prompt],
                ],
            ],
        ],
    ]);

    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
        CURLOPT_POSTFIELDS => $payload,
        CURLOPT_TIMEOUT => (int) $config['timeout'],
    ]);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curlError = curl_error($ch);
    curl_close($ch);

    if ($response === false || $curlError !== '') {
        return tutorvideos_ai_error('No se pudo conectar con Gemini: ' . $curlError);
    }

    $data = json_decode($response, true);
    if ($httpCode >= 400) {
        $message = $data['error']['message'] ?? 'Error desconocido del proveedor.';
        return tutorvideos_ai_error("Gemini respondio con error {$httpCode}: {$message}");
    }

    $text = $data['candidates'][0]['content']['parts'][0]['text'] ?? '';
    if ($text === '') {
        return tutorvideos_ai_error('Gemini no devolvio contenido util.');
    }

    return [
        'ok' => true,
        'provider' => 'Gemini',
        'content' => $text,
    ];
}

function tutorvideos_ai_pollinations(array $config, string $prompt): array
{
    if (!function_exists('curl_init')) {
        return tutorvideos_ai_error('La extension cURL de PHP no esta activa en XAMPP.');
    }

    $url = 'https://text.pollinations.ai/' . rawurlencode($prompt);
    $headers = [];

    if (!empty($config['api_key'])) {
        $headers[] = 'Authorization: Bearer ' . $config['api_key'];
    }

    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_TIMEOUT => (int) $config['timeout'],
    ]);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curlError = curl_error($ch);
    curl_close($ch);

    if ($response === false || $curlError !== '') {
        return tutorvideos_ai_error('No se pudo conectar con Pollinations: ' . $curlError);
    }

    if ($httpCode >= 400) {
        return tutorvideos_ai_error("Pollinations respondio con error {$httpCode}.");
    }

    return [
        'ok' => true,
        'provider' => 'Pollinations',
        'content' => trim($response),
    ];
}

function tutorvideos_ai_elevenlabs(array $config, string $task, string $topic, string $level, string $details): array
{
    if (empty($config['api_key'])) {
        return tutorvideos_ai_error('Falta configurar AI_API_KEY con tu clave de ElevenLabs.');
    }

    if (!function_exists('curl_init')) {
        return tutorvideos_ai_error('La extension cURL de PHP no esta activa en XAMPP.');
    }

    $text = trim($details);
    if ($task !== 'audio') {
        $text = "TutorVideos. " . tutorvideos_ai_demo($task, $topic, $level, $details)['content'];
    }

    if ($text === '') {
        return tutorvideos_ai_error('Escribe el texto que quieres convertir en narracion.');
    }

    $voiceId = rawurlencode((string) $config['elevenlabs_voice_id']);
    $outputFormat = rawurlencode((string) $config['elevenlabs_output_format']);
    $url = "https://api.elevenlabs.io/v1/text-to-speech/{$voiceId}?output_format={$outputFormat}";

    $payload = json_encode([
        'text' => $text,
        'model_id' => (string) $config['elevenlabs_model'],
    ]);

    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json',
            'Accept: audio/mpeg',
            'xi-api-key: ' . (string) $config['api_key'],
        ],
        CURLOPT_POSTFIELDS => $payload,
        CURLOPT_TIMEOUT => (int) $config['timeout'],
    ]);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curlError = curl_error($ch);
    curl_close($ch);

    if ($response === false || $curlError !== '') {
        return tutorvideos_ai_error('No se pudo conectar con ElevenLabs: ' . $curlError);
    }

    if ($httpCode >= 400) {
        $data = json_decode($response, true);
        $message = $data['detail']['message'] ?? $data['detail'] ?? 'Error desconocido del proveedor.';
        if (is_array($message)) {
            $message = json_encode($message);
        }
        return tutorvideos_ai_error("ElevenLabs respondio con error {$httpCode}: {$message}");
    }

    $audioDir = __DIR__ . '/../generated/audio';
    if (!is_dir($audioDir) && !mkdir($audioDir, 0775, true)) {
        return tutorvideos_ai_error('No se pudo crear la carpeta generated/audio.');
    }

    $filename = 'narracion_' . date('Ymd_His') . '_' . substr(sha1($text), 0, 8) . '.mp3';
    $audioPath = $audioDir . '/' . $filename;

    if (file_put_contents($audioPath, $response) === false) {
        return tutorvideos_ai_error('No se pudo guardar el audio generado.');
    }

    return [
        'ok' => true,
        'provider' => 'ElevenLabs',
        'content' => "Narracion generada correctamente.\nArchivo: generated/audio/{$filename}",
        'audio_url' => '../generated/audio/' . $filename,
    ];
}

function tutorvideos_ai_runway_video(array $config, string $topic, string $level, string $details): array
{
    if (empty($config['runway_api_key'])) {
        return tutorvideos_ai_error('Falta configurar RUNWAYML_API_SECRET con tu clave de Runway.');
    }

    if (!function_exists('curl_init')) {
        return tutorvideos_ai_error('La extension cURL de PHP no esta activa en XAMPP.');
    }

    $prompt = tutorvideos_ai_runway_prompt($topic, $level, $details);
    $duration = max(2, min(10, (int) $config['runway_duration']));

    $payload = json_encode([
        'model' => (string) $config['runway_model'],
        'promptText' => $prompt,
        'ratio' => (string) $config['runway_ratio'],
        'duration' => $duration,
    ]);

    $created = tutorvideos_ai_runway_request(
        'POST',
        'https://api.dev.runwayml.com/v1/text_to_video',
        $config,
        $payload
    );

    if (!$created['ok']) {
        return $created;
    }

    $taskId = $created['data']['id'] ?? '';
    if ($taskId === '') {
        return tutorvideos_ai_error('Runway no devolvio un ID de tarea.');
    }

    $attempts = max(1, (int) $config['video_poll_attempts']);
    $sleepSeconds = max(5, (int) $config['video_poll_seconds']);
    $task = null;

    for ($i = 0; $i < $attempts; $i++) {
        if ($i > 0) {
            sleep($sleepSeconds);
        }

        $statusResponse = tutorvideos_ai_runway_request(
            'GET',
            'https://api.dev.runwayml.com/v1/tasks/' . rawurlencode($taskId),
            $config
        );

        if (!$statusResponse['ok']) {
            return $statusResponse;
        }

        $task = $statusResponse['data'];
        $status = strtoupper((string) ($task['status'] ?? ''));

        if ($status === 'SUCCEEDED') {
            $outputUrl = $task['output'][0] ?? '';
            if ($outputUrl === '') {
                return tutorvideos_ai_error('Runway marco la tarea como completa, pero no envio URL de video.');
            }

            return tutorvideos_ai_save_runway_video($outputUrl, $taskId);
        }

        if ($status === 'FAILED' || $status === 'CANCELED') {
            $failure = $task['failure'] ?? $task['failureCode'] ?? 'La tarea no pudo completarse.';
            if (is_array($failure)) {
                $failure = json_encode($failure);
            }
            return tutorvideos_ai_error("Runway termino con estado {$status}: {$failure}");
        }
    }

    $lastStatus = $task['status'] ?? 'PENDING';
    return [
        'ok' => true,
        'provider' => 'Runway',
        'content' => "La tarea de video fue creada y sigue procesandose.\nID de tarea: {$taskId}\nEstado actual: {$lastStatus}\nVuelve a intentar en unos minutos si aun no aparece el video.",
        'task_id' => $taskId,
    ];
}

function tutorvideos_ai_runway_prompt(string $topic, string $level, string $details): string
{
    $topic = $topic !== '' ? $topic : 'un tema educativo';
    $level = $level !== '' ? $level : 'nivel general';
    $details = $details !== '' ? $details : 'video educativo claro, visual y apto para estudiantes';

    $prompt = "Video educativo en espanol sobre {$topic}, para {$level}. "
        . "Estilo visual limpio, academico y moderno, composicion clara, textos grandes, ritmo pausado, escenas utiles para explicar el concepto. "
        . "Detalles: {$details}. Sin logos, sin marcas de agua, sin texto ilegible.";

    return mb_substr($prompt, 0, 1000, 'UTF-8');
}

function tutorvideos_ai_runway_request(string $method, string $url, array $config, ?string $payload = null): array
{
    $headers = [
        'Authorization: Bearer ' . (string) $config['runway_api_key'],
        'X-Runway-Version: ' . (string) $config['runway_version'],
    ];

    if ($payload !== null) {
        $headers[] = 'Content-Type: application/json';
    }

    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => $method,
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_TIMEOUT => (int) $config['timeout'],
    ]);

    if ($payload !== null) {
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    }

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curlError = curl_error($ch);
    curl_close($ch);

    if ($response === false || $curlError !== '') {
        return tutorvideos_ai_error('No se pudo conectar con Runway: ' . $curlError);
    }

    $data = json_decode($response, true);
    if ($httpCode >= 400) {
        $message = $data['error'] ?? $data['message'] ?? $data['detail'] ?? $data ?? 'Error desconocido del proveedor.';
        if (is_array($message)) {
            $message = json_encode($message, JSON_UNESCAPED_UNICODE);
        }
        return tutorvideos_ai_error("Runway respondio con error {$httpCode}: {$message}");
    }

    if (!is_array($data)) {
        return tutorvideos_ai_error('Runway devolvio una respuesta no valida.');
    }

    return [
        'ok' => true,
        'provider' => 'Runway',
        'data' => $data,
    ];
}

function tutorvideos_ai_save_runway_video(string $outputUrl, string $taskId): array
{
    $ch = curl_init($outputUrl);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_TIMEOUT => 180,
    ]);

    $video = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curlError = curl_error($ch);
    curl_close($ch);

    if ($video === false || $curlError !== '') {
        return tutorvideos_ai_error('Runway genero el video, pero no se pudo descargar: ' . $curlError);
    }

    if ($httpCode >= 400) {
        return tutorvideos_ai_error("Runway genero el video, pero la descarga devolvio error {$httpCode}.");
    }

    $videoDir = __DIR__ . '/../generated/video';
    if (!is_dir($videoDir) && !mkdir($videoDir, 0775, true)) {
        return tutorvideos_ai_error('No se pudo crear la carpeta generated/video.');
    }

    $filename = 'video_' . date('Ymd_His') . '_' . substr(sha1($taskId), 0, 8) . '.mp4';
    $videoPath = $videoDir . '/' . $filename;

    if (file_put_contents($videoPath, $video) === false) {
        return tutorvideos_ai_error('No se pudo guardar el video generado.');
    }

    return [
        'ok' => true,
        'provider' => 'Runway',
        'content' => "Video generado correctamente.\nArchivo: generated/video/{$filename}\nID de tarea: {$taskId}",
        'video_url' => '../generated/video/' . $filename,
        'task_id' => $taskId,
    ];
}

function tutorvideos_ai_minimax_video(array $config, string $topic, string $level, string $details): array
{
    if (empty($config['minimax_api_key'])) {
        return tutorvideos_ai_error('Falta configurar MINIMAX_API_KEY con tu clave de MiniMax.');
    }

    if (!function_exists('curl_init')) {
        return tutorvideos_ai_error('La extension cURL de PHP no esta activa en XAMPP.');
    }

    $prompt = tutorvideos_ai_minimax_prompt($topic, $level, $details);
    $duration = max(6, min(10, (int) $config['minimax_duration']));

    $payload = json_encode([
        'model' => (string) $config['minimax_model'],
        'prompt' => $prompt,
        'duration' => $duration,
        'resolution' => (string) $config['minimax_resolution'],
    ]);

    $created = tutorvideos_ai_minimax_request(
        'POST',
        'https://api.minimax.io/v1/video_generation',
        $config,
        $payload
    );

    if (!$created['ok']) {
        return $created;
    }

    $taskId = $created['data']['task_id'] ?? '';
    if ($taskId === '') {
        return tutorvideos_ai_error('MiniMax no devolvio un ID de tarea.');
    }

    $attempts = max(1, (int) $config['video_poll_attempts']);
    $sleepSeconds = max(10, (int) $config['video_poll_seconds']);
    $statusData = null;

    for ($i = 0; $i < $attempts; $i++) {
        if ($i > 0) {
            sleep($sleepSeconds);
        }

        $statusResponse = tutorvideos_ai_minimax_request(
            'GET',
            'https://api.minimax.io/v1/query/video_generation?task_id=' . rawurlencode($taskId),
            $config
        );

        if (!$statusResponse['ok']) {
            return $statusResponse;
        }

        $statusData = $statusResponse['data'];
        $status = strtolower((string) ($statusData['status'] ?? ''));

        if ($status === 'success') {
            $fileId = $statusData['file_id'] ?? '';
            if ($fileId === '') {
                return tutorvideos_ai_error('MiniMax completo la tarea, pero no envio file_id.');
            }

            return tutorvideos_ai_save_minimax_video($config, $fileId, $taskId);
        }

        if ($status === 'fail' || $status === 'failed') {
            $message = $statusData['error_message'] ?? 'La tarea no pudo completarse.';
            return tutorvideos_ai_error("MiniMax termino con estado {$status}: {$message}");
        }
    }

    $lastStatus = $statusData['status'] ?? 'Processing';
    return [
        'ok' => true,
        'provider' => 'MiniMax',
        'content' => "La tarea de video fue creada y sigue procesandose.\nID de tarea: {$taskId}\nEstado actual: {$lastStatus}\nVuelve a intentar en unos minutos si aun no aparece el video.",
        'task_id' => $taskId,
    ];
}

function tutorvideos_ai_minimax_prompt(string $topic, string $level, string $details): string
{
    $topic = $topic !== '' ? $topic : 'un tema educativo';
    $level = $level !== '' ? $level : 'nivel general';
    $details = $details !== '' ? $details : 'video educativo claro, visual y apto para estudiantes';

    $prompt = "Video educativo en espanol sobre {$topic}, para {$level}. "
        . "Estilo limpio, moderno y academico. Movimiento suave [Static shot], buena iluminacion, elementos visuales claros. "
        . "Detalles: {$details}. Sin logos, sin marcas de agua, sin texto ilegible.";

    return mb_substr($prompt, 0, 2000, 'UTF-8');
}

function tutorvideos_ai_minimax_request(string $method, string $url, array $config, ?string $payload = null): array
{
    $headers = [
        'Authorization: Bearer ' . (string) $config['minimax_api_key'],
    ];

    if ($payload !== null) {
        $headers[] = 'Content-Type: application/json';
    }

    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => $method,
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_TIMEOUT => (int) $config['timeout'],
    ]);

    if ($payload !== null) {
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    }

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curlError = curl_error($ch);
    curl_close($ch);

    if ($response === false || $curlError !== '') {
        return tutorvideos_ai_error('No se pudo conectar con MiniMax: ' . $curlError);
    }

    $data = json_decode($response, true);
    if ($httpCode >= 400) {
        $message = $data['base_resp']['status_msg'] ?? $data['error'] ?? $data['message'] ?? $data ?? 'Error desconocido del proveedor.';
        if (is_array($message)) {
            $message = json_encode($message, JSON_UNESCAPED_UNICODE);
        }
        return tutorvideos_ai_error("MiniMax respondio con error {$httpCode}: {$message}");
    }

    if (!is_array($data)) {
        return tutorvideos_ai_error('MiniMax devolvio una respuesta no valida.');
    }

    $statusCode = $data['base_resp']['status_code'] ?? 0;
    if ((int) $statusCode !== 0) {
        $message = $data['base_resp']['status_msg'] ?? 'Error desconocido del proveedor.';
        return tutorvideos_ai_error("MiniMax respondio con error: {$message}");
    }

    return [
        'ok' => true,
        'provider' => 'MiniMax',
        'data' => $data,
    ];
}

function tutorvideos_ai_save_minimax_video(array $config, string $fileId, string $taskId): array
{
    $retrieved = tutorvideos_ai_minimax_request(
        'GET',
        'https://api.minimax.io/v1/files/retrieve?file_id=' . rawurlencode($fileId),
        $config
    );

    if (!$retrieved['ok']) {
        return $retrieved;
    }

    $downloadUrl = $retrieved['data']['file']['download_url'] ?? '';
    if ($downloadUrl === '') {
        return tutorvideos_ai_error('MiniMax no devolvio URL de descarga para el video.');
    }

    $ch = curl_init($downloadUrl);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_TIMEOUT => 180,
    ]);

    $video = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curlError = curl_error($ch);
    curl_close($ch);

    if ($video === false || $curlError !== '') {
        return tutorvideos_ai_error('MiniMax genero el video, pero no se pudo descargar: ' . $curlError);
    }

    if ($httpCode >= 400) {
        return tutorvideos_ai_error("MiniMax genero el video, pero la descarga devolvio error {$httpCode}.");
    }

    $videoDir = __DIR__ . '/../generated/video';
    if (!is_dir($videoDir) && !mkdir($videoDir, 0775, true)) {
        return tutorvideos_ai_error('No se pudo crear la carpeta generated/video.');
    }

    $filename = 'minimax_' . date('Ymd_His') . '_' . substr(sha1($taskId), 0, 8) . '.mp4';
    $videoPath = $videoDir . '/' . $filename;

    if (file_put_contents($videoPath, $video) === false) {
        return tutorvideos_ai_error('No se pudo guardar el video generado.');
    }

    return [
        'ok' => true,
        'provider' => 'MiniMax',
        'content' => "Video generado correctamente.\nArchivo: generated/video/{$filename}\nID de tarea: {$taskId}\nFile ID: {$fileId}",
        'video_url' => '../generated/video/' . $filename,
        'task_id' => $taskId,
    ];
}

function tutorvideos_ai_did_video(array $config, string $topic, string $level, string $details): array
{
    if (empty($config['did_api_key'])) {
        return tutorvideos_ai_error('Falta configurar DID_API_KEY con tu clave de D-ID.');
    }

    if (!function_exists('curl_init')) {
        return tutorvideos_ai_error('La extension cURL de PHP no esta activa en XAMPP.');
    }

    $text = tutorvideos_ai_did_script($topic, $level, $details);
    $payload = json_encode([
        'source_url' => (string) $config['did_source_url'],
        'script' => [
            'type' => 'text',
            'input' => $text,
            'provider' => [
                'type' => 'microsoft',
                'voice_id' => (string) $config['did_voice_id'],
            ],
        ],
        'name' => 'TutorVideos D-ID',
    ]);

    $created = tutorvideos_ai_did_request(
        'POST',
        'https://api.d-id.com/talks',
        $config,
        $payload
    );

    if (!$created['ok']) {
        return $created;
    }

    $talkId = $created['data']['id'] ?? '';
    if ($talkId === '') {
        return tutorvideos_ai_error('D-ID no devolvio un ID de video.');
    }

    $attempts = max(1, (int) $config['video_poll_attempts']);
    $sleepSeconds = max(5, (int) $config['video_poll_seconds']);
    $talk = null;

    for ($i = 0; $i < $attempts; $i++) {
        if ($i > 0) {
            sleep($sleepSeconds);
        }

        $statusResponse = tutorvideos_ai_did_request(
            'GET',
            'https://api.d-id.com/talks/' . rawurlencode($talkId),
            $config
        );

        if (!$statusResponse['ok']) {
            return $statusResponse;
        }

        $talk = $statusResponse['data'];
        $status = strtolower((string) ($talk['status'] ?? ''));

        if ($status === 'done') {
            $resultUrl = $talk['result_url'] ?? '';
            if ($resultUrl === '') {
                return tutorvideos_ai_error('D-ID marco el video como listo, pero no envio result_url.');
            }

            return tutorvideos_ai_save_did_video($resultUrl, $talkId);
        }

        if ($status === 'error' || $status === 'rejected') {
            $message = $talk['error']['description'] ?? $talk['error']['message'] ?? 'La tarea no pudo completarse.';
            return tutorvideos_ai_error("D-ID termino con estado {$status}: {$message}");
        }
    }

    $lastStatus = $talk['status'] ?? 'created';
    return [
        'ok' => true,
        'provider' => 'D-ID',
        'content' => "El video de avatar fue creado y sigue procesandose.\nID de video: {$talkId}\nEstado actual: {$lastStatus}\nVuelve a intentar en unos minutos si aun no aparece el video.",
        'task_id' => $talkId,
    ];
}

function tutorvideos_ai_did_script(string $topic, string $level, string $details): string
{
    $topic = $topic !== '' ? $topic : 'un tema educativo';
    $level = $level !== '' ? $level : 'nivel general';

    if ($details !== '') {
        $text = $details;
    } else {
        $text = "Hola. Bienvenidos a TutorVideos. Hoy aprenderemos sobre {$topic}. "
            . "Esta explicacion esta pensada para {$level}. "
            . "Veremos la idea principal, un ejemplo sencillo y una pregunta final para comprobar lo aprendido.";
    }

    return mb_substr($text, 0, 3500, 'UTF-8');
}

function tutorvideos_ai_did_request(string $method, string $url, array $config, ?string $payload = null): array
{
    $headers = [
        'Authorization: Basic ' . (string) $config['did_api_key'],
    ];

    if ($payload !== null) {
        $headers[] = 'Content-Type: application/json';
    }

    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => $method,
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_TIMEOUT => (int) $config['timeout'],
    ]);

    if ($payload !== null) {
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    }

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curlError = curl_error($ch);
    curl_close($ch);

    if ($response === false || $curlError !== '') {
        return tutorvideos_ai_error('No se pudo conectar con D-ID: ' . $curlError);
    }

    $data = json_decode($response, true);
    if ($httpCode >= 400) {
        $message = $data['message'] ?? $data['error']['description'] ?? $data['error'] ?? $data ?? 'Error desconocido del proveedor.';
        if (is_array($message)) {
            $message = json_encode($message, JSON_UNESCAPED_UNICODE);
        }
        return tutorvideos_ai_error("D-ID respondio con error {$httpCode}: {$message}");
    }

    if (!is_array($data)) {
        return tutorvideos_ai_error('D-ID devolvio una respuesta no valida.');
    }

    return [
        'ok' => true,
        'provider' => 'D-ID',
        'data' => $data,
    ];
}

function tutorvideos_ai_save_did_video(string $resultUrl, string $talkId): array
{
    $ch = curl_init($resultUrl);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_TIMEOUT => 180,
    ]);

    $video = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curlError = curl_error($ch);
    curl_close($ch);

    if ($video === false || $curlError !== '') {
        return tutorvideos_ai_error('D-ID genero el video, pero no se pudo descargar: ' . $curlError);
    }

    if ($httpCode >= 400) {
        return tutorvideos_ai_error("D-ID genero el video, pero la descarga devolvio error {$httpCode}.");
    }

    $videoDir = __DIR__ . '/../generated/video';
    if (!is_dir($videoDir) && !mkdir($videoDir, 0775, true)) {
        return tutorvideos_ai_error('No se pudo crear la carpeta generated/video.');
    }

    $filename = 'did_' . date('Ymd_His') . '_' . substr(sha1($talkId), 0, 8) . '.mp4';
    $videoPath = $videoDir . '/' . $filename;

    if (file_put_contents($videoPath, $video) === false) {
        return tutorvideos_ai_error('No se pudo guardar el video generado.');
    }

    return [
        'ok' => true,
        'provider' => 'D-ID',
        'content' => "Video de avatar generado correctamente.\nArchivo: generated/video/{$filename}\nID de video: {$talkId}",
        'video_url' => '../generated/video/' . $filename,
        'task_id' => $talkId,
    ];
}

function tutorvideos_ai_demo(string $task, string $topic, string $level, string $details): array
{
    $topic = $topic !== '' ? $topic : 'el tema indicado';
    $level = $level !== '' ? $level : 'nivel general';
    $details = $details !== '' ? $details : 'Ajustar el lenguaje al grupo y validar datos antes de publicar.';

    $content = "Modo demostracion activo.\n\n"
        . "Titulo sugerido: {$topic} explicado paso a paso\n"
        . "Nivel: {$level}\n\n"
        . "Objetivo: que el estudiante comprenda {$topic} mediante una explicacion breve, visual y verificable.\n\n"
        . "Guion base:\n"
        . "1. Presenta el problema o pregunta inicial.\n"
        . "2. Explica el concepto con un ejemplo cotidiano.\n"
        . "3. Muestra un procedimiento en pantalla con pausas para tomar apuntes.\n"
        . "4. Cierra con una pregunta de comprobacion y una actividad corta.\n\n"
        . "Prompt para generador de video:\n"
        . "Video educativo en espanol sobre {$topic}, estilo claro y academico, escenas limpias, textos grandes, ritmo pausado, ejemplos visuales, sin informacion no verificada.\n\n"
        . "Notas del usuario: {$details}\n\n"
        . "Cuando configures una API key real, esta respuesta se reemplazara por la salida del proveedor.";

    if ($task === 'consulta') {
        $content = "Modo demostracion activo.\n\n"
            . "Para buscar o recomendar videos sobre {$topic}, revisa estos criterios:\n"
            . "1. Que el video declare objetivo y publico objetivo.\n"
            . "2. Que dure entre 5 y 12 minutos para una primera explicacion.\n"
            . "3. Que incluya ejemplos, resumen y actividad.\n"
            . "4. Que el docente valide fecha, fuentes y exactitud.\n\n"
            . "Consulta refinada sugerida: videos educativos de {$topic} para {$level} con ejemplos practicos.";
    }

    return [
        'ok' => true,
        'provider' => 'Demo',
        'content' => $content,
    ];
}

function tutorvideos_ai_error(string $message): array
{
    return [
        'ok' => false,
        'provider' => 'Sistema',
        'content' => $message,
    ];
}

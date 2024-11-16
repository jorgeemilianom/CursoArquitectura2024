<?php

function renderTemplate($html, $variables) {
    // Expresión regular para encontrar {{variable}} en la plantilla
    $pattern = '/\{\{(\w+)\}\}/';

    // Función de reemplazo
    $htmlResultante = preg_replace_callback($pattern, function ($matches) use ($variables) {
        $variable = $matches[1];
        // Si la variable existe en el array, la reemplazamos, si no, dejamos el marcador
        return isset($variables[$variable]) ? $variables[$variable] : $matches[0];
    }, $html);

    return $htmlResultante;
}

// Ejemplo de HTML con variables y array de valores
$html = "
    <html>
    <head><title>{{title}}</title></head>
    <body>
        <h1>Bienvenido, {{username}}</h1>
        <p>Este es tu mensaje: {{message}}</p>
        <footer>{{footer}}</footer>
    </body>
    </html>
";

// Cargar el contenido del archivo HTML en una variable
$html = file_get_contents('template.html');

$variables = [
    'title' => 'Página de Bienvenida',
    'username' => 'Jorge',
    'message' => 'Gracias por unirte a nuestra comunidad.',
    'footer' => 'Derechos reservados © 2024'
];

// Renderizar la plantilla
$htmlRenderizado = renderTemplate($html, $variables);
echo $htmlRenderizado;

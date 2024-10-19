<?php
/*
    Explicación: ¿Cómo funciona PHP del lado del servidor?
    ------------------------------------------------------

    1. PHP es un lenguaje de programación del lado del servidor.
       - Cuando un cliente (como un navegador) solicita una página que contiene código PHP, 
         el código PHP se ejecuta en el servidor.
       - El cliente nunca ve el código PHP, solo ve el resultado que PHP genera, generalmente HTML.

    2. Servidores web como Apache y Nginx
       - PHP se ejecuta en combinación con servidores web como Apache o Nginx.
       - Estos servidores web reciben las solicitudes HTTP y, cuando detectan un archivo .php,
         lo pasan al motor de PHP para que lo procese.

    3. El motor PHP y el servidor web
       - El servidor web (Apache o Nginx) no ejecuta PHP por sí mismo.
       - Cuando llega una solicitud de un archivo .php, el servidor lo envía al motor de PHP para que lo procese.
       - El motor de PHP ejecuta el código y genera HTML como salida.

    4. Proceso de una solicitud:
       a. El cliente hace una solicitud HTTP para una página .php.
       b. El servidor web (Apache o Nginx) recibe la solicitud y detecta el archivo .php.
       c. El servidor web pasa el archivo al motor de PHP para que lo ejecute.
       d. PHP ejecuta el código y genera HTML.
       e. El servidor web envía el HTML generado de vuelta al cliente.
       f. El navegador del cliente recibe el HTML y lo muestra.

    Ejemplo: Vamos a mostrar cómo PHP y HTML se mezclan para generar una respuesta dinámica.
*/

// Código HTML que será enviado directamente al cliente
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explicación PHP</title>
</head>
<body>
    <h1>Bienvenido a nuestra página de ejemplo PHP</h1>

    <!-- Código PHP para generar contenido dinámico -->
    <?php
        // Definimos una variable con el nombre del usuario
        $nombre = "Juan";

        // Usamos PHP para generar un saludo dinámico
        echo "<p>Hola, $nombre. ¡Gracias por visitar nuestro sitio!</p>";

        // PHP también se puede usar para mostrar la fecha actual
        echo "<p>La fecha de hoy es: " . date('Y-m-d') . "</p>";
    ?>

    <!-- Más HTML que se enviará tal cual al cliente -->
    <p>Este es un ejemplo básico de cómo PHP interactúa con HTML.</p>

    <?php
    /*
        Ejemplo de cómo PHP puede realizar cálculos en el servidor.
        Imaginemos que queremos calcular la suma de dos números y mostrar el resultado.
    */
    
    // Definimos dos números
    $num1 = 10;
    $num2 = 20;

    // Realizamos la suma en PHP
    $suma = $num1 + $num2;

    // Mostramos el resultado al cliente
    echo "<p>La suma de $num1 y $num2 es: $suma</p>";
    ?>

    <!-- PHP también puede manejar estructuras de control como bucles -->
    <h2>Números del 1 al 5 generados con PHP:</h2>
    <ul>
    <?php
        // Usamos un bucle for en PHP para generar una lista de números
        for ($i = 1; $i <= 5; $i++) {
            echo "<li>Número: $i</li>";
        }
    ?>
    </ul>

    <!-- 
        Conclusión:
        Como puedes ver, PHP se ejecuta en el servidor para generar contenido dinámico.
        Todo el código PHP se procesa en el servidor y el navegador del cliente solo recibe HTML.
    -->
</body>
</html>

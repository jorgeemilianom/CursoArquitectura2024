<?php

/*

Las expresiones regulares (regex) son secuencias de caracteres que definen patrones de búsqueda en cadenas de texto. En PHP, se usan principalmente con funciones que permiten buscar, comparar y manipular texto mediante estos patrones.


Sintaxis básica de expresiones regulares
/.../ delimitan la expresión.
^ indica el inicio de una cadena.
$ indica el final de una cadena.
. coincide con cualquier carácter excepto saltos de línea.
*, +, ?, {n,m} cuantificadores para definir la cantidad de coincidencias.


Ejemplo básico:

/^hola$/ coincide exactamente con "hola".
/^\d{3}-\d{2}-\d{4}$/ coincide con un formato de número de seguro social como "123-45-6789".

\d{3} busca exactamente 3 dígitos.
*/

<?php

$telefono = "123-456-7890";
$patron = "/^\d{3}-\d{3}-\d{4}$/";

if (preg_match($patron, $telefono)) {
    echo "El formato del teléfono es válido.";
} else {
    echo "El formato del teléfono no es válido.";
}


$texto = "Mi número es 123-456-7890";
$patron = "/\d{3}-\d{3}-\d{4}/";
$reemplazo = "XXX-XXX-XXXX";

$resultado = preg_replace($patron, $reemplazo, $texto);
echo $resultado;  // Salida: "Mi número es XXX-XXX-XXXX"




$texto = "Correo 1: example@domain.com, Correo 2: user@site.org";
$patron = "/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/";

preg_match_all($patron, $texto, $correos);
print_r($correos[0]);

/*
Array
(
    [0] => example@domain.com
    [1] => user@site.org
)

*/


$contraseña = "abc123XY";
$patron = "/^[a-zA-Z0-9]{8}$/";

if (preg_match($patron, $contraseña)) {
    echo "La contraseña es válida.";
} else {
    echo "La contraseña no es válida.";
}

/*
^: Comienza al inicio de la cadena.
[a-zA-Z0-9]: Coincide con cualquier letra minúscula, mayúscula o número.
{8}: Especifica que deben ser exactamente 8 caracteres.
$: Asegura que termine después de los 8 caracteres (para evitar coincidencias parciales).

*/



$url = "producto/12345";
$patron = "/^producto\/\d+$/";

if (preg_match($patron, $url)) {
    echo "La URL es válida.";
} else {
    echo "La URL no es válida.";
}

/*
^: Comienza al inicio de la cadena.
producto\/: Coincide exactamente con la palabra "producto" seguida de un /. El \ se usa para escapar el carácter /.
\d+: Coincide con uno o más dígitos (0-9).
$: Asegura que la coincidencia sea hasta el final de la cadena.

*/


$plantilla = "Hola, {{nombre}}! Bienvenido a {{sitio}}.";
$patron = "/\{\{([a-zA-Z0-9_]+)\}\}/";

preg_match_all($patron, $plantilla, $matches);

print_r($matches[1]);  // Mostrará los nombres de variables dentro de los corchetes.

/*

\{: Coincide con el carácter {.
([a-zA-Z0-9_]+): Captura el nombre de la variable, que puede contener letras, números o guiones bajos. El nombre de la variable se guarda en un grupo de captura (por eso los paréntesis).
\}: Coincide con el carácter }.

*/
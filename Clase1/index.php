<?php

# Tamaño
# Peso
# Color
# Cantidad_de_plata
# cantidad_de_tarjetas
# cantidad_de_bolsillos
# material
# estado


class Billetera {
    public $tamaño;
    public $peso;
    public $color;
    public $cantidad_de_plata;
    public $cantidad_de_tarjetas;
    public $cantidad_de_bolsillos;
    public $material;
    public $estado;
}

echo "Datos de mi billetera:";

$billetera_jorge = new Billetera();
echo $billetera_jorge->tamaño = 'grande';
echo '<br>';
echo $billetera_jorge->peso = 200;
echo '<br>';
echo $billetera_jorge->color = 'azul';
echo '<br>';
echo $billetera_jorge->cantidad_de_plata = 1000;
echo '<br>';
echo $billetera_jorge->cantidad_de_tarjetas = 5;
echo '<br>';
echo $billetera_jorge->cantidad_de_bolsillos = 2;
echo '<br>';
echo $billetera_jorge->material = 'plástico';
echo '<br>';
echo $billetera_jorge->estado = 'lleno';
echo '<br>';


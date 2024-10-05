<?php

// S - Single Responsibility Principle (SRP)
// Cada clase debe tener una única responsabilidad.
class EmailSender
{
    public function send($email, $message)
    {
        // Lógica para enviar un correo electrónico
        echo "Enviando email a: $email\n";
    }
}

class UserRegistration
{
    private $emailSender;

    public function __construct(EmailSender $emailSender)
    {
        $this->emailSender = $emailSender;
    }

    public function register($email, $password)
    {
        // Lógica de registro de usuario
        echo "Usuario registrado con email: $email\n";

        // Enviar un email de bienvenida
        $this->emailSender->send($email, "Bienvenido!");
    }
}

// O - Open/Closed Principle (OCP)
// Las clases deben estar abiertas a extensión, pero cerradas a modificación.
abstract class PaymentMethod
{
    abstract public function pay($amount);
}

class CreditCardPayment extends PaymentMethod
{
    public function pay($amount)
    {
        echo "Pagando $amount con tarjeta de crédito\n";
    }
}

class PaypalPayment extends PaymentMethod
{
    public function pay($amount)
    {
        echo "Pagando $amount con PayPal\n";
    }
}

// D - Dependency Inversion Principle (DIP)
// Las clases deben depender de abstracciones, no de implementaciones concretas.
class Order
{
    private $paymentMethod;

    public function __construct(PaymentMethod $paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
    }

    public function process($amount)
    {
        $this->paymentMethod->pay($amount);
    }
}

// I - Interface Segregation Principle (ISP)
// Las interfaces específicas son mejores que una sola interfaz general.
interface Printable
{
    public function printDocument();
}

interface Scannable
{
    public function scanDocument();
}

class Printer implements Printable
{
    public function printDocument()
    {
        echo "Imprimiendo documento\n";
    }
}

class Scanner implements Scannable
{
    public function scanDocument()
    {
        echo "Escaneando documento\n";
    }
}

// L - Liskov Substitution Principle (LSP)
// Las clases derivadas deben ser sustituibles por sus clases base.
class Rectangle
{
    protected $width;
    protected $height;

    public function setWidth($width)
    {
        $this->width = $width;
    }

    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function getArea()
    {
        return $this->width * $this->height;
    }
}

class Square extends Rectangle
{
    public function setWidth($width)
    {
        $this->width = $width;
        $this->height = $width;
    }

    public function setHeight($height)
    {
        $this->width = $height;
        $this->height = $height;
    }
}

// Ejecución de ejemplos
$emailSender = new EmailSender();
$userRegistration = new UserRegistration($emailSender);
$userRegistration->register("user@example.com", "password123");

$creditCardPayment = new CreditCardPayment();
$order = new Order($creditCardPayment);
$order->process(100);

$printer = new Printer();
$printer->printDocument();

$rectangle = new Rectangle();
$rectangle->setWidth(4);
$rectangle->setHeight(5);
echo "Área del rectángulo: " . $rectangle->getArea() . "\n";

$square = new Square();
$square->setWidth(4);
echo "Área del cuadrado: " . $square->getArea() . "\n";

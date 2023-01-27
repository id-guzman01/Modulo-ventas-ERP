<?php

require('../Vistas/fpdf/fpdf.php');


global $email, $telefono;
class PDF extends FPDF
{
    
    
// Cabecera de página
function Header()
{

    // Logo
    /*$this->Cell(20);
    $this->Image('../Vistas/img/user1.png',10,8,33);
    $this->Ln(20);*/
    // Arial bold 15
    $this->SetFont('Arial','B',36);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->SetTextColor(0,187,45);
    $this->Cell(30,10,'Factura' ,0,0,'C');
    // Salto de línea
    $this->Ln(20);

}

function guardar($email, $telefono){
    $this->email = $email;
    $this->telefono = $telefono;
}



// Pie de página
function Footer()
{
    
    // Posición: a 1,5 cm del final
    $this->SetY(-19);

    
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    
    $this->Cell(0,4,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}

function DarleColorFondo(){
    
    // Colores de los bordes, fondo y texto
    $this->SetDrawColor(0,187,45);
    $this->SetFillColor(0,187,45);
    $this->SetTextColor(255, 255, 255);
    // Ancho del borde (1 mm)
    //$this->SetLineWidth(1);
    // Título
    $this->Cell(20,9,utf8_decode('Codigo'),1,0,'C',true);
    $this->Cell(80,9,utf8_decode('Nombre'),1,0,'C',true);
    $this->Cell(20,9,utf8_decode('Cantidad'),1,0,'C',true);
    $this->Cell(30,9,utf8_decode('Valor'),1,0,'C',true);
    $this->Cell(30,9,utf8_decode('Total'),1,1,'C',true);
    // Salto de línea
}

function crearTitulosPrimarios(){

    // Colores de los bordes, fondo y texto
    $this->SetDrawColor(0,187,45);
    $this->SetFillColor(0,187,45);
    $this->SetTextColor(255, 255, 255);
    // Ancho del borde (1 mm)
    //$this->SetLineWidth(1);
    // Título
    $this->Cell(73,9,utf8_decode('Datos del cliente:'),1,0,'C',true);


    $this->SetDrawColor(255, 255, 255);
    $this->SetFillColor(255, 255, 255);
    $this->SetTextColor(255, 255, 255);
    $this->Cell(35,9,utf8_decode(''),1,0,'C',true);


    $this->SetDrawColor(0,187,45);
    $this->SetFillColor(0,187,45);
    $this->SetTextColor(255, 255, 255);
    $this->Cell(72,9,utf8_decode('Datos del vendedor:'),1,1,'C',true);

    $this->SetDrawColor(255, 255, 255);
    $this->SetFillColor(255, 255, 255);
    $this->SetTextColor(10,10,10);
    


    // Salto de línea

}

function crearTituloVentas(){

    // Colores de los bordes, fondo y texto
    $this->SetDrawColor(0,187,45);
    $this->SetFillColor(0,187,45);
    $this->SetTextColor(255, 255, 255);

    $this->SetFont('Arial','',12);

    // Ancho del borde (1 mm)
    //$this->SetLineWidth(1);
    // Título
    $this->Cell(73,9,utf8_decode('Datos de la empresa:'),1,0,'C',true);


    $this->SetDrawColor(255, 255, 255);
    $this->SetFillColor(255, 255, 255);
    $this->SetTextColor(255, 255, 255);
    $this->Cell(35,9,utf8_decode(''),1,0,'C',true);


    $this->SetDrawColor(0,187,45);
    $this->SetFillColor(0,187,45);
    $this->SetTextColor(255, 255, 255);
    $this->Cell(72,9,utf8_decode('Datos de la factura:'),1,1,'C',true);

    $this->SetDrawColor(255, 255, 255);
    $this->SetFillColor(255, 255, 255);
    $this->SetTextColor(10,10,10);
    


    // Salto de línea
}

function ParteFinalDeLaFactura($total){

    

    
    $this->Cell(100,9,utf8_decode(''),1,0,'C',true);

    $this->SetFont('Arial','',12);
    
    $this->Cell(50,9,utf8_decode('Subtotal:'),1,0,'L',true);

    $this->SetFont('Arial','',11);
    
    $this->Cell(30,9,utf8_decode($total),1,1,'L',true);

}

function Inicio(){
    $this->SetDrawColor(255, 255, 255);
    $this->SetFillColor(255, 255, 255);
    $this->SetTextColor(255, 255, 255);
}

function Medio(){
    $this->SetDrawColor(0,187,45);
    $this->SetFillColor(0,187,45);
    $this->SetTextColor(255, 255, 255);
}

function Final(){
    $this->SetDrawColor(255, 255, 255);
    $this->SetFillColor(255, 255, 255);
    $this->SetTextColor(10,10,10);
}


}


?>


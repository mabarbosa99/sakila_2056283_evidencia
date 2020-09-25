<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;
use App\Artista;
class PDFController extends Controller
{
    public function index(){
        //crear el objeto odf
        $pdf = new Fpdf();
        //añadir pagina
        $pdf->AddPage();
        //Sacar el PDF al navegador 
        //establecer punto (10,10) para comenzar a pintar
        $pdf->SetXY(10,10);
        //establecen tipo de letra 
        $pdf->SetFont('Arial','B',14);
        //Establecer color de relleno a las celdas de la tabla
        $pdf->SetFillColor(114,242,200);
        //establecer un contenido para mostrar
        $pdf->Cell(100, 10, "Nombre artista",1,0,"C",1);
        $pdf->Cell(50, 10, utf8_decode("Número Albumes"),1,1,"C",1);
        //Recorrer el arrglo de artistas para mostras
        //artista y número de disco por artista
        $artistas= Artista::all();
        $pdf->SetFont('Arial','I',11);
        //Establecer color de relleno a las celdas de la tabla
         $pdf->SetFillColor(214,168,240);
        foreach($artistas as $a){
            $pdf->Cell(100, 10, substr($a->Name,0,50),1,0,"C",1);
            $pdf->Cell(50, 10,$a->albumes()->count(),1,1,"C",1);
        }
        //utilizar objeto response
        $response = response($pdf->Output());
        //definir el tipo mime
        $response->header("Content-Type",'application/pdf');
        //retornar respuesta la navegador 
        return $response;
    }
}

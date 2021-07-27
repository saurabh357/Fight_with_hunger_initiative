<?php
require('fpdf.php');


// $db = new PDO('mysql:host=localhost; dbname=project','root', '') ;
$db = new mysqli('localhost', 'root', '', 'project');

class myPDF extends FPDF{
    function header(){
        $this->SetFont('Arial','B',14);
        $this->Cell(276,5,'Receiver List',0,0,'C');
        $this->Ln();
        $this->SetFont('Times','',12);
        $this->Cell(276,10,'Wastage Food Reduction Trough Donation System',0,0,'C');
        $this->Ln(20);
    }
    function footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','',8);
        $this->Cell(0,10,'Page'.$this->PageNo().'/{nb}',0,0,'C');
    }
    function headerTable(){
        $this->SetFont('Times','B',12);
        //$this->Cell(20,10,'ID',1,0,'C');
        $this->Cell(110,10,'Name',1,0,'C');
        $this->Cell(50,10,'Email',1,0,'C');
        $this->Cell(30,10,'Contact',1,0,'C');
        $this->Cell(110,10,'Address',1,0,'C');
       
        $this->Ln();
    }
    function viewTable($db){
        $this->SetFont('Times','',12);
        $stmt=$db->query('SELECT id,name,email,phone,address FROM receivers');
        
        while($rows=$stmt->fetch_assoc())
        {
            // var_dump($rows);die();  
           // $this->Cell(20,10,$rows->id,1,0,'C');
            $this->Cell(110,10,$rows['name'],1,0,'C');
            $this->Cell(50,10,$rows['email'],1,0,'C');
            $this->Cell(30,10,$rows['phone'],1,0,'C');
            $this->Cell(110,10,$rows['address'],1,0,'C');
           
            $this->Ln();
        }
    }
}


$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->headerTable();
$pdf->viewTable($db);
$pdf->Output();
?>
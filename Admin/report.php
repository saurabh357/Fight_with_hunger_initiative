<?php
require('fpdf.php');


// $db = new PDO('mysql:host=localhost; dbname=project','root', '') ;
$db = new mysqli('localhost', 'root', '', 'project');

class myPDF extends FPDF{
    function header(){
        $this->SetFont('Arial','B',14);
        $this->Cell(276,5,'Post List',0,0,'C');
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
        $this->Cell(50,10,'Title',1,0,'C');
        $this->Cell(30,10,'Category Name',1,0,'C');
        $this->Cell(120,10,'Content',1, 0,'C');
       
        $this->Ln();
    }
    function viewTable($db){
        $this->SetFont('Times','',12);
        $stmt=$db->query('SELECT posts.*, categories.name as category_name, donners.name as donner_name FROM `posts`
        LEFT JOIN categories ON posts.category_id=categories.id 
        LEFT JOIN donners ON posts.donner_id=donners.id ORDER by id ASC');
        
        while($rows=$stmt->fetch_assoc())
        {
            // var_dump($rows);die();  
           // $this->Cell(20,10,$rows->id,1,0,'C');
            $this->Cell(50,10,$rows['title'],1,0,'C');
            $this->Cell(30,10,$rows['category_name'],1,0,'C');
            $this->Cell(120,10,$rows['content'],1,0, 'L');
           
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
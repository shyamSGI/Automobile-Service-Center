<?php
    session_start();
   // require 'connection.php';
   
   define('HOST','localhost');
        define('USER','root');
       	define('PASS','');
	define('DB','jcauto');
	
        $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');
    error_reporting(0);    
   
   
    //if(!isset($_SESSION['email'])){
        //header('location: login.php');
  //  }
    $user_id=$_SESSION['id'];
  

require('pdf/fpdf.php');
							 
//require('fpdf.php');

//Connect to your database
include 'connection.php';
ob_start();
//Create new pdf file
$pdf=new FPDF();

//Disable automatic page break
$pdf->SetAutoPageBreak(false);

//Add first page
$pdf->AddPage();

//set initial y axis position per page
$y_axis_initial = 55;

$pdf->Image('img/jc.jpg',10,10,-300);

//print column titles
$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',12);
$pdf->SetY($y_axis_initial);
$pdf->SetX(25);
$pdf->Cell(30,6,'Date',1,0,'L',1);
$pdf->Cell(100,6,'Customer Name',1,0,'L',1);
$pdf->Cell(30,6,'Total',1,0,'R',1);

$y_axis=55;
$row_height = 10;
$y_axis = $y_axis + $row_height;


//Select the Products you want to show in your PDF file
//$result=mysql_query('select Code,Name,Price from Products ORDER BY Code',$link);
			$sql1= "SELECT date,customer_name,amount FROM sales ORDER BY id";
									$arr1=mysqli_query($con,$sql1);
//initialize counter
$i = 0;

//Set maximum rows per page
$max = 25;

//Set Row Height
$row_height = 6;





while($arrr = mysqli_fetch_array($arr1))
{
    //If the current row is the last one, create new page and print column title
    if ($i == $max)
    {
        $pdf->AddPage();

        //print column titles for the current page
        $pdf->SetY($y_axis_initial);
        $pdf->SetX(25);
        $pdf->Cell(30,6,'Date',1,0,'L',1);
        $pdf->Cell(100,6,'Customer Name',1,0,'L',1);
        $pdf->Cell(30,6,'Total',1,0,'R',1);
        
        //Go to next row
        $y_axis = $y_axis + $row_height;
        
        //Set $i variable to 0 (first row)
        $i = 0;
    }

    $code = $arrr['date'];
    $price = $arrr['customer_name'];
    $name = "Rs : ".$arrr['amount'];

    $pdf->SetY($y_axis);
    $pdf->SetX(25);
    $pdf->Cell(30,6,$code,1,0,'L',1);
    $pdf->Cell(100,6,$price,1,0,'L',1);
    $pdf->Cell(30,6,$name,1,0,'R',1);

    //Go to next row
    $y_axis = $y_axis + $row_height;
    $i = $i + 1;
} 

//Send file
$pdf->Output();
  

  
?>

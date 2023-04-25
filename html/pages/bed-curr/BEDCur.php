<?php
require('../bed-fpdf/fpdf.php');




class PDF extends FPDF
{

    // Page header

}

$pdf = new PDF('P', 'mm', 'Legal');
//left top right
$pdf->SetMargins(10, 10, 10);
$pdf->AddPage();

// Logo(x axis, y axis, height, width)
$pdf->Image('../../assets/images/auth/logo.jpg', 20, 5, 15, 15);
// text color
$pdf->SetTextColor(255, 0, 0);
// font(font type,style,font size)
$pdf->SetFont('Arial', 'B', 18);
// Dummy cell
$pdf->Cell(50);
// //cell(width,height,text,border,end line,[align])
$pdf->Cell(110, 5, 'Saint Francis of Assisi College Las ' . utf8_decode('Piñas ') . 'Campus', 0, 0, 'C'); // Line break
$pdf->Ln(6);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial', '', 10, 'C');
// dummy cell
$pdf->Cell(50);
// //cell(width,height,text,border,end line,[align])
$pdf->Cell(90, 3, 'Admiral Talon 5 Las ' . utf8_decode('Piñas'), 0, 0, 'C');
// Line break
$pdf->Ln(6);
$pdf->SetFont('Arial', 'B', 10, 'C');
// dummy cell
$pdf->Cell(50);
// //cell(width,height,text,border,end line,[align])
$pdf->Cell(90, 4, 'Basic Education Curriculum', 0, 0, 'C');
// Line break
$pdf->Ln(4);
$pdf->SetFont('Arial', 'B', 10, 'C');

$pdf->Cell(50);
// //cell(width,height,text,border,end line,[align])
$pdf->Cell(90, 4, '(Effective Academic Year)', 0, 1, 'C');
// Line break
$pdf->Ln(4);




//cell(width,height,text,border,end line,[align])
//student name
$pdf->Cell(15, 5, 'Name:', 0, 0);
$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(115, 5, '', 'B', 0); //end of line


//student no
$pdf->SetFont('Arial', '', '10');
$pdf->Cell(25, 5, 'Student No:', 0, 0);
$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(30, 5, '', 'B', 1); //end of line

$pdf->Cell(10, 5, '', 0, 1);
$pdf->Cell(10, 5, '', 0, 1);
$pdf->Cell(10, 5, '', 0, 0);


$pdf->Cell(45, 5, 'PRESCHOOL', 0, 1);
$pdf->SetFont('Arial', '', '9');
// SUBJECTS

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'Reading', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'Language', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'Science', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'Writing', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'Mathematics', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'AP', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'Filipino', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'ICT', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

// End Pre School

$pdf->Cell(10, 5, '', 0, 1);
$pdf->Cell(10, 5, '', 0, 0);

$pdf->Cell(45, 5, 'Grade 1', 0, 1);
$pdf->SetFont('Arial', '', '9');
// SUBJECTS

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'English', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'Mathematics', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'Science', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'AP', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'Filipino', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'ESP', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'ICT', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'MAPE', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'GCP', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);
// End grade 1 //////////////////////////

$pdf->Cell(10, 5, '', 0, 1);
$pdf->Cell(10, 5, '', 0, 0);

$pdf->Cell(45, 5, 'Grade 2', 0, 1);
$pdf->SetFont('Arial', '', '9');
// SUBJECTS

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'English', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'Mathematics', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'Science', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'AP', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'Filipino', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'ESP', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'ICT', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'MAPE', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'GCP', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);


//  END ///////////////////////////////////

$pdf->Cell(10, 5, '', 0, 1);
$pdf->Cell(10, 5, '', 0, 0);

$pdf->Cell(45, 5, 'Grade 3', 0, 1);
$pdf->SetFont('Arial', '', '9');
// SUBJECTS

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'English', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'Mathematics', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'Science', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'AP', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'Filipino', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'ESP', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'ICT', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'MAPE', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'GCP', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

// End 3 ////////////////////////////////

$pdf->Cell(10, 5, '', 0, 1);
$pdf->Cell(10, 5, '', 0, 0);

$pdf->Cell(45, 5, 'Grade 4', 0, 1);
$pdf->SetFont('Arial', '', '9');
// SUBJECTS

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'English', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'Mathematics', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'Science', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'AP', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'Filipino', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'ESP', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'ICT', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'MAPE', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'HELE', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'GCP', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

//////////////////////////////////////
$pdf->AddPage();

$pdf->Cell(10, 5, '', 0, 1);
$pdf->Cell(10, 5, '', 0, 0);

$pdf->Cell(45, 5, 'Grade 5', 0, 1);
$pdf->SetFont('Arial', '', '9');
// SUBJECTS

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'English', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'Mathematics', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'Science', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'AP', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'Filipino', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'ESP', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'ICT', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'MAPE', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'HELE', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'GCP', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

/////////////////////////////////////////
$pdf->Cell(10, 5, '', 0, 1);
$pdf->Cell(10, 5, '', 0, 0);

$pdf->Cell(45, 5, 'Grade 6', 0, 1);
$pdf->SetFont('Arial', '', '9');
// SUBJECTS

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'English', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'Mathematics', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'Science', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'AP', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'Filipino', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'ESP', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'ICT', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'MAPE', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'HELE', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(5, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 'B', 0);
$pdf->Cell(90, 5, 'GCP', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(10, 5, '', 0, 1);
$pdf->Output();

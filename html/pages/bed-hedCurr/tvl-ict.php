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
$pdf->Cell(110, 5, 'Saint Francis of Assisi College Las '. utf8_decode('Piñas ') . 'Campus',0,0, 'C');
// Line break
$pdf->Ln(5);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial', '', 10, 'C');
// dummy cell
$pdf->Cell(50);
// //cell(width,height,text,border,end line,[align])
$pdf->Cell(90, 3, '045 Admiral Village, Talon 3, Las ' . utf8_decode('Piñas') . ' City, 1740',0,0, 'C');
// Line break
$pdf->Ln(8);
$pdf->SetFont('Arial', 'B', 10, 'C');
// dummy cell
$pdf->Cell(50);
// //cell(width,height,text,border,end line,[align])
$pdf->Cell(90, 4, 'Senior High School Department', 0, 0, 'C');
// Line break
$pdf->Ln(4);
$pdf->SetFont('Arial', 'B', 10, 'C');
// dummy cell
$pdf->Cell(50);
// //cell(width,height,text,border,end line,[align])
$pdf->Cell(90, 4, 'Track:Academic', 0, 0, 'C');
// Line break
$pdf->Ln(4);
$pdf->SetFont('Arial', 'B', 10, 'C');
// dummy cell
$pdf->Cell(50);
// //cell(width,height,text,border,end line,[align])
$pdf->Cell(90, 4, 'Information and Communication Technology Strand (ICT)', 0, 1, 'C');

// Line break

$pdf->SetFont('Arial', '', 10, 'C');
// dummy cell
$pdf->Cell(50);
// //cell(width,height,text,border,end line,[align])
$pdf->Cell(90, 4, '', 0, 1, 'C'); // for effective year
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

//dummy cells
$pdf->Cell(20, 5, '', 0, 1);
$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(20, 5, 'CODE', 0, 0);
$pdf->Cell(90, 5, 'Description', 0, 0, 'C');
$pdf->Cell(34, 5, 'UNITS', 0, 0, 'C');
$pdf->Cell(60, 5, 'Pre-Requisites', 0, 1);


$pdf->Cell(10, 5, '', 0, 1);
$pdf->Cell(10, 5, '', 0, 1);
$pdf->Cell(10, 5, '', 0, 0);


$pdf->Cell(45, 5, 'Grade 11, First Semester', 0, 1);
$pdf->SetFont('Arial', '', '9');
// SUBJECTS

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(18, 4, 'CORE', 0, 0);
$pdf->Cell(15, 4, '111', 0, 0);
$pdf->Cell(90, 4, 'Oral Communication', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(18, 4, 'CORE', 0, 0);
$pdf->Cell(15, 4, '112', 0, 0);
$pdf->Cell(90, 4, 'Komunikasyon at Panaliksik at Wikang Filipino at Kulturang Pilipino', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(18, 4, 'CORE', 0, 0);
$pdf->Cell(15, 4, '113', 0, 0);
$pdf->Cell(90, 4, 'Contemporary Philippine Arts from the Regions', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(18, 4, 'CORE', 0, 0);
$pdf->Cell(15, 4, '114', 0, 0);
$pdf->Cell(90, 4, 'General Mathematics', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(18, 4, 'CORE', 0, 0);
$pdf->Cell(15, 4, '115', 0, 0);
$pdf->Cell(90, 4, 'Earth and Life Science(Lec/Lab)', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(18, 4, 'CORE', 0, 0);
$pdf->Cell(15, 4, '116', 0, 0);
$pdf->SetFont('Arial', '', '8');
$pdf->Cell(90, 4, 'Personal Development', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(18, 4, 'CORE', 0, 0);
$pdf->Cell(15, 4, '117', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(90, 4, 'Physical Education and Health 1', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(18, 4, 'CORE', 0, 0);
$pdf->Cell(15, 4, '118', 0, 0);
$pdf->Cell(90, 4, 'Franciscan Orientation', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(18, 4, 'APPLIED', 0, 0);
$pdf->Cell(15, 4, '111', 0, 0);
$pdf->SetFont('Arial', '', '8');
$pdf->Cell(90, 4, 'Qualitative Research in Daily Life', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);



// LAST LINE PER SEM
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(18, 4, 'ICT', 0, 0);
$pdf->Cell(15, 4, '111', 0, 0);
$pdf->Cell(90, 4, 'Computer Systems Servicing 1', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(9, 4, '', 'B', 0);
$pdf->Cell(7, 4, '', 'B', 1);


$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', '', '10');
$pdf->Cell(102, 5, '', 0, 0);
$pdf->Cell(32, 6, 'TOTAL', 0, 0);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(10, 6, '', 0, 1);
$pdf->Cell(180, 6, '', 0, 1);
$pdf->Cell(180, 6, '', 0, 1);



//YEAR , SEMESTER
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(45, 5, 'Grade 11, Second Semester', 0, 1);


// SUBJECTS
$pdf->SetFont('Arial', '', '9');

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(18, 4, 'CORE', 0, 0);
$pdf->Cell(15, 4, '121', 0, 0);
$pdf->Cell(90, 4, 'Reading and Writing', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(18, 4, 'CORE', 0, 0);
$pdf->Cell(15, 4, '122', 0, 0);
$pdf->Cell(90, 4, 'Pagbasa at Pagsulat ng iba\'t ibang Teksto Tungo sa Pananaliksik', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(18, 4, 'CORE', 0, 0);
$pdf->Cell(15, 4, '123', 0, 0);
$pdf->Cell(90, 4, 'Introduction to Philosophy of the Human Person', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(18, 4, 'CORE', 0, 0);
$pdf->Cell(15, 4, '124', 0, 0);
$pdf->Cell(90, 4, 'Statistics and Probability', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(18, 4, 'CORE', 0, 0);
$pdf->Cell(15, 4, '125', 0, 0);
$pdf->Cell(90, 4, 'Physical Science', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(18, 4, 'CORE', 0, 0);
$pdf->Cell(15, 4, '126', 0, 0);
$pdf->Cell(90, 4, '21st Century Literature from the philippines and the World', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(18, 4, 'CORE', 0, 0);
$pdf->Cell(15, 4, '127', 0, 0);
$pdf->Cell(90, 4, 'Physical Education and Health 2', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(18, 4, '', 0, 0);
$pdf->Cell(10, 4, 'CORE 117', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(18, 4, 'CORE', 0, 0);
$pdf->Cell(15, 4, '128', 0, 0);
$pdf->Cell(90, 4, 'Franciscan Core Values', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(18, 4, '', 0, 0);
$pdf->Cell(10, 4, 'CORE 118', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(18, 4, 'APPLIED', 0, 0);
$pdf->Cell(15, 4, '121', 0, 0);
$pdf->Cell(90, 4, 'English for Academic and Professional Purposes', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);


// LAST LINE PER SEM
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(18, 4, 'ICT', 0, 0);
$pdf->Cell(15, 4, '121', 0, 0);
$pdf->Cell(90, 4, 'Computer Systems Servicing 2', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(9, 4, '', 'B', 0);
$pdf->Cell(7, 4, '', 'B', 1);



$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', '', '10');
$pdf->Cell(102, 5, '', 0, 0);
$pdf->Cell(32, 6, 'TOTAL', 0, 0);
$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(10, 6, '', 0, 1);
$pdf->Cell(180, 6, '', 0, 1);
$pdf->Cell(180, 6, '', 0, 1);


//YEAR , SEMESTER
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(45, 5, 'Grade 12, First Semester', 0, 1);

// SUBJECTS
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(18, 4, 'UCSPLP12ICTA', 0, 0);
$pdf->Cell(15, 4, '', 0, 0);
$pdf->Cell(90, 4, 'Understanding Culture, Society and Politics (LP)', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(18, 4, 'MILLP12ICTA', 0, 0);
$pdf->Cell(15, 4, '', 0, 0);
$pdf->Cell(90, 4, 'Media and Information Literacy (LP)', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(18, 4, 'PEHCLP12ICTA', 0, 0);
$pdf->Cell(15, 4, '', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(90, 4, 'Physical Education and Health 3 (LP)', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(18, 4, 'QNRLP12ICTA', 0, 0);
$pdf->Cell(15, 4, '', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(90, 4, 'Quantitative Research in Daily Life (LP)', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, 'APPLIED 111', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(18, 4, 'PSFPLLP12ICTA', 0, 0);
$pdf->Cell(15, 4, '', 0, 0);
$pdf->Cell(90, 4, 'Pagsulat sa Filipino sa Piling Larang(LP)', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);


// LAST LINE PER SEM
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(18, 4, 'CSSCLP12ICTA', 0, 0);
$pdf->Cell(15, 4, '', 0, 0);
$pdf->Cell(90, 4, 'Computer Systems Servicing  NCII (LP)', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(9, 4, '', 'B', 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', '', '10');
$pdf->Cell(102, 5, '', 0, 0);
$pdf->Cell(32, 6, 'TOTAL', 0, 0);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(10, 6, '', 0, 1);
$pdf->Cell(180, 6, '', 0, 1);
$pdf->Cell(180, 6, '', 0, 1);






//YEAR , SEMESTER
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(45, 5, 'Grade 12, Second Semester', 0, 1);
$pdf->SetFont('Arial', '', '9');

// SUBJECTS

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(18, 4, 'ENTLP12ICTA', 0, 0);
$pdf->Cell(15, 4, '', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(90, 4, 'Entrepreneurship (LP)', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(18, 4, 'EMPLP12ICTA', 0, 0);
$pdf->Cell(15, 4, '', 0, 0);
$pdf->Cell(90, 4, 'Empowerment Technologies (LP)', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(18, 4, 'PEHDLP12ICTA', 0, 0);
$pdf->Cell(15, 4, '', 0, 0);
$pdf->Cell(90, 4, 'Physical Education and Health 4 (LP)', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(18, 4, 'IIILP12ICTA', 0, 0);
$pdf->Cell(15, 4, '', 0, 0);
$pdf->Cell(90, 4, 'Inquiries, Investigations and Immersion (LP)', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, 'APPLIED 121', 0, 1);


// LAST LINE PER SEM
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(18, 4, 'INTLP12ICTA', 0, 0);
$pdf->Cell(15, 4, '', 0, 0);
$pdf->Cell(90, 4, 'Internship (LP)', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(9, 4, '', 'B', 0);
$pdf->Cell(7, 4, '', 'B', 1);

$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', '', '10');
$pdf->Cell(102, 5, '', 0, 0);
$pdf->Cell(32, 6, 'TOTAL', 0, 0);
$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(10, 6, '', 0, 1);
$pdf->Cell(180, 6, '', 0, 1);
$pdf->Cell(180, 6, '', 0, 1);


$pdf->Output();
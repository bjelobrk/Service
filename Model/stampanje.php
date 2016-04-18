<?php

class MyPDF extends FPDF
{
function header()
{
global $title;
$this->setFont("Times", '', 26);

$this->cell(0, 0, $title, 0, 1, 'C');
$this->image("images/php.jpg", 150, 10.5);

$this->ln(40); // odvaja od gornje strane
}

}
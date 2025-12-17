<?php

function addPageFrame(TCPDF $pdf)
{
    $pdf->SetLineWidth(0.5);
    $pdf->SetDrawColor(0, 102, 204); 

    // Top border
    $pdf->Line(10, 10, 200, 10);

    // Bottom border
    $pdf->Line(10, 287, 200, 287);
}

function addNewStyledPage(TCPDF $pdf)
{
    $pdf->AddPage();
    addPageFrame($pdf);
}

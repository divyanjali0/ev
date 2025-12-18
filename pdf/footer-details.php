<?php
/**
 * Adds a fixed footer to the current TCPDF page
 *
 * @param TCPDF $pdf
 * @param string $phone   
 * @param string $email
 * @param string $website 
 */
function addFooter(TCPDF $pdf, string $phone, string $email, string $website): void
{
    $autoPageBreak = $pdf->getAutoPageBreak();
    $bottomMargin  = $pdf->getBreakMargin();
    $pdf->SetAutoPageBreak(false, 0);

    $pdf->SetFont('helvetica', '', 10);
    $pdf->SetTextColor(69, 73, 78);

    $pageHeight   = $pdf->getPageHeight();
    $marginBottom = 15;
    $pdf->SetY($pageHeight - $marginBottom - 5);

    $whatsappNumber = preg_replace('/\D+/', '', $phone);
    $whatsappUrl    = "https://wa.me/{$whatsappNumber}";

    // Footer text
    $phoneText   = "{$phone}";
    $emailText   = " | {$email} | ";
    $websiteText = "{$website}";

    $totalWidth =
        $pdf->GetStringWidth($phoneText) +
        $pdf->GetStringWidth($emailText) +
        $pdf->GetStringWidth($websiteText);

    $startX = ($pdf->getPageWidth() - $totalWidth) / 2;
    $pdf->SetX($startX);

    $pdf->Write(5, $phoneText, $whatsappUrl);

    $pdf->Write(5, $emailText);

    // Website link
    $pdf->SetTextColor(69, 73, 78); 
    $pdf->Write(5, $websiteText, "https://{$website}");

    // Restore settings
    $pdf->SetTextColor(69, 73, 78);
    $pdf->SetAutoPageBreak($autoPageBreak, $bottomMargin);
}

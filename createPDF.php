 <?php
session_start();
$listOfToken = $_SESSION['array_token'];
$n = count($listOfToken);

$content = '';
for ($j = 0; $j < $n; $j ++) {
    $content .= '<p>' . $listOfToken[$j] . '</p>';
}
echo $content;

require_once ('tcpdf/tcpdf.php');
$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
ob_start();
$obj_pdf->SetCreator(PDF_CREATOR);
$obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");
$obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
$obj_pdf->setHeaderFont(Array(
    PDF_FONT_NAME_MAIN,
    '',
    PDF_FONT_SIZE_MAIN
));
$obj_pdf->setFooterFont(Array(
    PDF_FONT_NAME_DATA,
    '',
    PDF_FONT_SIZE_DATA
));
$obj_pdf->SetDefaultMonospacedFont('helvetica');
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);
$obj_pdf->setPrintHeader(false);
$obj_pdf->setPrintFooter(false);
$obj_pdf->SetAutoPageBreak(TRUE, 10);
$obj_pdf->SetFont('helvetica', '', 12);
$obj_pdf->AddPage();

$obj_pdf->writeHTML($content);
ob_end_clean();
$obj_pdf->Output('/Tokeny.pdf', 'FI');

?>
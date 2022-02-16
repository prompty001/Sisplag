<?php
    use Dompdf\Dompdf;

    require_once ("../lib/dompdf/autoload.inc.php");

    $dompdf = new Dompdf();
    //$dompdf->loadHtml(str: "<h1> Teste </h1>");

    ob_start();
    include("impress_consultaescola.php");
    $dompdf->loadHtml(ob_get_clean());

    //$dompdf->setPaper(size: "A4");

    $dompdf->render();
    $dompdf->stream( "file.pdf", ["Attachment" => false]);
    

?>
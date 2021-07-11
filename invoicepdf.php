
<?php 

session_start();
if(!isset($_SESSION['userData']))
{
    die("login required");
}

require_once 'dompdf/autoload.inc.php';
$orderid=$_GET['orderid'];
use Dompdf\Dompdf;

$document=new Dompdf();

$ch = curl_init("localhost/project/pdf.php?orderid=$orderid");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
$content = curl_exec($ch);
curl_close($ch);

// echo $content;
$document->loadHtml($content);
$document->set_option('isRemoteEnabled', true);

$document->SetPaper('A4','landscap');


$document->render();


$document->stream('Invoice',array('Attachment'=>0));

?>
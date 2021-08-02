<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require FCPATH.'vendor/autoload.php';

use Dompdf\Dompdf;

class Mypdf
{
  protected $ci;

  public function __construct()
  {
        $this->ci =& get_instance();
  }

  public function generate($view, $data = array(), $filename = 'Laporan', $paper = 'A4', $orientation='portrait')
  {
    $dompdf = new Dompdf();
    $html = $this->ci->load->view($view, $data, TRUE);
    $dompdf->loadHtml($html);
    $dompdf->set_option('isRemoteEnabled', true);
    $dompdf->setPaper($paper, $orientation);
    // Render the HTML as PDF
    $dompdf->render();
      $dompdf->stream( $filename . ".pdf", array("Attachment" => FALSE));

  }

}

/* End of file Mypdf.php */
/* Location: ./application/libraries/Mypdf.php */

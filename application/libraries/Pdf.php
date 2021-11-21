<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

class Pdf extends Dompdf {

    public function __construct() {
        parent::__construct();
    }

    protected function ci() {
        return get_instance();
    }

    public function load_view($view, $data = array()) {
        $dompdf = new Dompdf();
        $html = $this->ci()->load->view($view, $data, TRUE);

        $dompdf->loadHtml($html);

        $dompdf->setPaper('legal', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();
        $time = time();

        // Output the generated PDF to Browser
        $dompdf->stream("post-qualification-report-" . $time, array("Attachment"=>0));
        // $dompdf->stream("file-" . $time);
    }

}


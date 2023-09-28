<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Route_Validation
{

    public function validate_route($route)
    {
        if (isset($route)) {
            $this->load->view('./modules/admin_dashboard');
            return;
        }
        if ($route == "crud") {
            $this->load->view('./modules/admin_dashboard');
        }
    }
}

?>
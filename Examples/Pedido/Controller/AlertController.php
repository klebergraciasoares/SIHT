<?php
/**
* Controller for Class Alert
* @package       Controller
*/
  class AlertController extends Controller
  {
    public function RequestAlerts()
    {
      $retorno = new stdClass();
      $retorno->alerts = $this->getAlerts();
      $this->clearAlerts();
      echo json_encode($retorno);
    }   
  }
?>
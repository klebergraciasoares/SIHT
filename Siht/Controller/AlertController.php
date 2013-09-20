<?php
/**
* Class AlertController 
* 
* @package    Siht.Controller
* @author     getsiht <www.getsiht.com>
* @version    1.0
* @link       http://getsiht.com Siht Project
* @copyright  getsiht project 2013
*/  
  class AlertController extends Controller
  {
    public static function setAlert(Alert $alert){
      Session::setValue("SH_ALERTS",$alert,true);
    }

    public static function getAlerts(){      
      return Session::getValue("SH_ALERTS");
    }

    public static function clearAlerts(){      
      Session::setValue("SH_ALERTS",array());
    }

    public static function showAlerts(){       
      $html="";
      if(is_array(self::getAlerts()))
            foreach (self::getAlerts() as $alert)
              $html.=$alert->getHtml();
              
          self::clearAlerts();

          return $html;
    }

    public static function requestAlerts()
    {
      $retorno = new stdClass();
      $retorno->alerts = self::getAlerts();
      self::clearAlerts();
      echo json_encode($retorno);
    }
  }
?>
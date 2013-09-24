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
  class PanelController extends Controller
  {
    public static function setPanel(Panel $panel){
      Session::setValue("SH_PANELS",$panel,true);
    }

    public static function getPanels(){      
      return Session::getValue("SH_PANELS");
    }

    public static function clearPanels(){
      Session::setValue("SH_PANELS",array());
    }

    public static function showPanels(){       
      $html="";
      
      if(is_array(self::getPanels()))
        foreach (self::getPanels() as $panel)
          $html.=$panel->getHtml();
              
      self::clearPanels();
      return $html;
    }

    public static function requestPanels()
    {
      $retorno = new stdClass();
      $retorno->panels = self::getPanels();
      self::clearPanels();
      echo json_encode($retorno);
    }
  }
?>
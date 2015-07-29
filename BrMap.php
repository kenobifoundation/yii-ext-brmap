<?php

/**
 * BrMap extension class.
 * Map of Brazil (html5, svg, js) - Interactive map for data visualizations. Bundled into a single Javascript file.
 * 
 * @version 2.0 
 * @package    Extension
 * @author     Fernando Rosa <nando.megaman@gmail.com>
 * @copyright  (c) 2015 Fernando Rosa
 * @uses brMap https://github.com/nandomegaman/brmap
 */

class BrMap extends CInputWidget {

    public $elementId;
    public $cssClass; //green, gray, blue, orange
	public $responsive;
	public $width;
	public $selectStates = array();
	public $callOnClick = 'function(element, uf){ /* js.. */ }';
	public $callOnMouseOver = 'function(element, uf){ /* js.. */ }';
    
    public function run() {
        $dir = dirname(__FILE__);
        $dirUrl = Yii::app()->getAssetManager()->publish($dir);
        $clientScript = Yii::app()->getClientScript();
        $clientScript->registerScriptFile($dirUrl.'/assets/brmap.js');
        $clientScript->registerCssFile($dirUrl.'/assets/brmap.css');
        $params = '';
    	if(!isset($this->elementId))
    		throw new Exception('{elementId} is required!');
		$params .= 'element: "#'.$this->elementId.'",';    			
    	if(isset($this->cssClass))
    		$params .= 'cssClass: "'.$this->cssClass.'",';
    	if(isset($this->responsive))
    		$params .= 'responsive: '.($this->responsive ? "true" : "false").',';
    	if(isset($this->width))
    		$params .= 'width: '.$this->width.',';	
		if(!empty($this->selectStates))
			$params .= 'selectStates: '.CJavaScript::encode($this->selectStates).',';		
		$params .= 'callbacks: { onClick : '.$this->callOnClick.', onMouseOver : '.$this->callOnMouseOver.'},';			
        $clientScript->registerScript(__CLASS__.'brmap_','brMap({ '.rtrim($params,",").' });', CClientScript::POS_END);
    }    
        
}

?>
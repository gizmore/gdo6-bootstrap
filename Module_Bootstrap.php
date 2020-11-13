<?php
namespace GDO\Bootstrap;

use GDO\Core\GDO_Module;
use GDO\Core\Module_Core;
use GDO\DB\GDT_Checkbox;

/**
 * Bootstrap4 includes.
 * Can be made non include if only a theme needs it.
 * Has JQuery and Moment dependency
 * 
 * @author gizmore
 * @version 6.10
 * @since 6.06
 */
final class Module_Bootstrap extends GDO_Module
{
	public $module_priority = 15;
	
	public function getDependencies() { return ['JQuery', 'Moment']; }
	
	public function getConfig()
	{
	    return [
	        GDT_Checkbox::make('include_bootstrap')->initial('1'),
	    ];
	}
	public function cfgIncludeBootstrap() { return $this->getConfigValue('include_bootstrap'); }
	
	public function onIncludeScripts()
	{
	    if ($this->cfgIncludeBootstrap())
	    {
	        $this->onIncludeBootstrap4();
	    }
	}
	
	public function onIncludeBootstrap4()
	{
	    $min = Module_Core::instance()->cfgMinifyJS() === 'no' ? '' : '.min';
	    
	    $this->addBowerJavascript("bootstrap/dist/js/bootstrap.bundle$min.js");
	    $this->addBowerCSS("bootstrap/dist/css/bootstrap$min.css");
	    
	    $this->addCSS("css/gdo-bootstrap.css");
	}
	
}

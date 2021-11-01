<?php
namespace GDO\Bootstrap;

use GDO\Core\GDO_Module;
use GDO\DB\GDT_Checkbox;
use GDO\Javascript\Module_Javascript;

/**
 * Bootstrap4 includes.
 * Can be made non include if only a theme needs it.
 * Has JQuery and Moment dependency
 * 
 * @author gizmore
 * @version 6.10.4
 * @since 6.6.0
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
	    $min = Module_Javascript::instance()->jsMinAppend();
	    
	    $this->addBowerJS("bootstrap/dist/js/bootstrap.bundle$min.js");
	    $this->addBowerCSS("bootstrap/dist/css/bootstrap$min.css");
	    
	    $this->addCSS("css/gdo-bootstrap.css");
	}
	
}

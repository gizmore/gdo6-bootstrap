<?php
namespace GDO\Bootstrap;

use GDO\Core\GDO_Module;
use GDO\Core\Module_Core;

final class Module_Bootstrap extends GDO_Module
{
	public $module_priority = 10;
	
	public function getDependencies() { return ['JQuery']; }
	
	public function onIncludeScripts()
	{
		$min = Module_Core::instance()->cfgMinifyJS() === 'no' ? '' : '.min';

		$this->addBowerJavascript("bootstrap/dist/js/bootstrap.bundle$min.js");
		$this->addBowerCSS("bootstrap/dist/css/bootstrap$min.css");

		$this->addCSS("css/gdo-bootstrap.css");
	}
	
}

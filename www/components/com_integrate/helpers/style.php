<?php
// no direct access
defined('_JEXEC') or die('Restricted access');

class IntegrateHelpersStyle
{
	function load()
	{
		$document = JFactory::getDocument();

		//stylesheets
		$document->addStylesheet(JURI::base().'components/com_integrate/assets/css/style.css');

		//javascripts
		$document->addScript(JURI::base().'components/com_integrate/assets/js/integrate.js');

	}
}
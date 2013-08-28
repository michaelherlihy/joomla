<?php // No direct access

defined( '_JEXEC' ) or die( 'Restricted access' );

//sessions
jimport( 'joomla.session.session' );
 
//load tables
JTable::addIncludePath(JPATH_COMPONENT.'/tables');

//load classes
JLoader::registerPrefix('Integrate', JPATH_COMPONENT);

//Load plugins
JPluginHelper::importPlugin('Integrate');
 
//Load styles and javascripts @SEE helpers/style.php
IntegrateHelpersStyle::load();

//application
$app = JFactory::getApplication();
 
// Require specific controller if requested
$controller = $app->input->get('controller','default');
// Create the controller
$classname  = 'IntegrateControllers'.ucwords($controller);
$controller = new $classname();
 
// Perform the Request task
$controller->execute();
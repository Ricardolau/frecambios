<?php
// No permitir acceso directo al archivo
defined('_JEXEC') or die;
JHtml::_('behavior.tabstate');

// requerir archivo de ayuda
if (!JFactory::getUser()->authorise('core.manage', 'com_fabricanterecambios'))
{
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

// Convert in chosen all selects with class chzn-select
JHtml::_('formbehavior.chosen', 'select.chzn-select');

// Load script tools
JHtml::_('script', JUri::root() . 'administrator/components/com_frecambios/assets/js/frecambios.js', false, false);

// Obtener una instancia del controlador prefijado
$task       = JFactory::getApplication()->input->get('task');

$controller = JControllerLegacy::getInstance('frecambios');
$controller->execute(JFactory::getApplication()->input->getCmd('task'));
$controller->redirect();




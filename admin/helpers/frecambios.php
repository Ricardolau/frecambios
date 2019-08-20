<?php
// No permitir acceso directo al archivo
defined('_JEXEC') or die;

/**
 * Ayuda del componente Vehiculo.
 */
class FrecambiosHelper extends JHelperContent
{
        /**
         * Configurar la barra de enlaces.
         */
        public static function addSubmenu($submenu) 
        {
			$document = JFactory::getDocument();
			JSubMenuHelper::addEntry('<h2 class="nav-header">Tablas de Fabricantes</h2>');
            JSubMenuHelper::addEntry(JText::_('COM_FRECAMBIOS_SUBMENU_FABRICANTES'),
                                     'index.php?option=com_frecambios&view=fabricantes&extension=com_frecambios', $submenu == 'fabricantes');
            JSubMenuHelper::addEntry(JText::_('COM_FRECAMBIOS_SUBMENU_REFERENCIAS'), 'index.php?option=com_frecambios&view=referencias&extension=com_frecambios', $submenu == 'referencias');
            
            if ($submenu == 'referencias') 
            {
                    $document->setTitle(JText::_('COM_FRECAMBIOS_ADMINISTRATION_REFERENCIA'));
            }

            
            JSubMenuHelper::addEntry('Cruce referencias fabricantes con productos virtuemart','index.php?option=com_frecambios&view=crucereferenciavirts&extension=com_frecambios', $submenu == 'crucereferenciavirts');


        }
}

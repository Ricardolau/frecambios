<?php
// No permitir acceso directo al archivo
defined('_JEXEC') or die;
//~ jimport('joomla.application.component.controlleradmin');

// Entra en este controlador si los indicamos en view marcas, sino entra.
/**
 *Controlador de Virtuemartcruces
 */
class FrecambiosControllerCrucereferenciavirts extends JControllerAdmin
{
        
        
        
        /**
         * Proxy para getModel.
         * @desde       2.5
         */

         
        public function getModel($name = 'Crucerecambiosvirt', $prefix = 'FrecambiosModel') 
        {
        
                $model = parent::getModel($name, $prefix, array('ignore_request' => true));
                return $model;
        }

}


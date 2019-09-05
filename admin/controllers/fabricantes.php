<?php
// No permitir acceso directo al archivo
defined('_JEXEC') or die;
 
// Entra en este controlador si los indicamos en view marcas, sino entra.
/**
 *Controlador PruebaSimons
 */
class FrecambiosControllerFabricantes extends JControllerAdmin
{
        
        
        
        /**
         * Proxy para getModel.
         * @desde       2.5
         */

         
        public function getModel($name = 'Fabricante', $prefix = 'FrecambiosModel') 
        {
        
                $model = parent::getModel($name, $prefix, array('ignore_request' => true));
                return $model;
        }

		public function addNew()
		{
		// Get the input
		$input = JFactory::getApplication()->input;
		$pks = $input->post->get('cid', array(), 'array');
 
		// Sanitize the input
		JArrayHelper::toInteger($pks);
 
		// Get the model
		$model = $this->getModel();
 
		$return = $model->frecambios($pks);
 
		// Redirect to the list screen.
		$this->setRedirect(JRoute::_('index.php?option=com_frecambios&view=fabricantes', false));
 
		}

        public function delete () {

            $app = JFactory::getApplication();

            // Calcular si tiene hijos
            
            if (false) {
                // Si no tiene hijos
                return parent::delete();
            } else {
                $app->enqueueMessage ("CONST no se puede borrar poe que tiene hujos", 'error');
                $this->redirect ('index.php?option=...');
                return false;
            }
        }


}

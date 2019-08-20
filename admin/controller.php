
<?php

// No permitir el acceso directo al archivo
defined('_JEXEC') or die;
 

/**
 * General Controller of Vehiculo component
 */
class FrecambiosController extends JControllerLegacy
{
        protected $default_view = 'fabricantes';
        /**
         * Mostrar la tarea
         *
         * @return void
         */
        public function display($cachable = false , $urlparams = false) 
        {      
				require_once JPATH_COMPONENT . '/helpers/frecambios.php';
                // Si no existe $this->input->get('view') ponemos que es fabricantes,
            	$view   = $this->input->get('view', 'fabricantes');
				$layout = $this->input->get('layout', 'fabricantes');
				$id     = $this->input->getInt('id');
             	if ($view == 'fabricante' && $layout == 'edit' && !$this->checkEditId('com_frecambios.edit.fabricante', $id))
				{
					// Somehow the person just went to the form - we don't allow that.
					$this->setError(JText::sprintf('JLIB_APPLICATION_ERROR_UNHELD_ID', $id));
					$this->setMessage($this->getError(), 'error');
					$this->setRedirect(JRoute::_('index.php?option=com_frecambios&view=fabricantes', false));
					return false;
				}
				
           
                // configurar vista por defecto si no está configurada
                $input = JFactory::getApplication()->input;
              
                               
                $input->set('view', $input->getCmd('view', 'fabricantes'));
					
				               	
                // llamar comportamiento padre
                return parent::display();
                
                
        }
        
}

<?php
// No permitir el acceso directo al archivo
defined('_JEXEC') or die('Restricted access');

// Importar la biblioteca view de Joomla
jimport('joomla.application.component.view');

/**
 * Vista Nodelos  */
class FrecambiosViewReferencias extends JViewLegacy
{
        /**
         *Métodoo para mostrar la vista Nodelos 
         * @return void
         */
        function display($tpl = null)  {
				$this->state            = $this->get('State');
				$this->filterForm       = $this->get('FilterForm');
				$this->activeFilters    = $this->get('ActiveFilters');
				$items                  = $this->get('Items');
				$pagination             = $this->get('Pagination');               
                
		// Check for errors.
		if (count($errors = $this->get('Errors'))) 
		{
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}
                
		// Assign data to the view
		$this->items = $items;                
		$this->pagination = $pagination;                
                
                
                /* Cargamos Submenu y con el parametro 'versiones' indicamos que está seleccionada*/
                FrecambiosHelper::addSubmenu('referencias');

                // Establecer la barra de herramientas
                $this->addToolBar();
                
                // Mostrar la plantilla
                parent::display($tpl);                                
        }
        
      
        /**
         * Configurar la barra de herramientas
         */
        protected function addToolBar() 
        {
                // Ponemos el nombre del titulo de la vista y el icono que seleccionemos.
                JToolBarHelper::title(JText::_('Referencias de Fabricantes de Recambios'),'bookmark banners');
                JToolBarHelper::deleteList('', 'referencia.delete');
                JToolBarHelper::editList('referencia.edit');
                JToolBarHelper::addNew('referencia.add');
        }
}

<?php
// No permitir el acceso directo al archivo
defined('_JEXEC') or die;

// Importar la biblioteca view de Joomla
jimport('joomla.application.component.view');

/**
 * Vista Vehiculos Marcas  */
class FrecambiosViewFabricantes extends JViewLegacy
{
        /**
         *M�todoo para mostrar la vista 
         * @return void
         */
        public function display($tpl = null) 
        {
                $this->state            = $this->get('State');
				//~ $this->filterForm       = $this->get('FilterForm');
				//~ $this->activeFilters    = $this->get('ActiveFilters');
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
                /* Cargamos Submenu y con el parametro 'marcas' indicamos que est� seleccionada*/
				
				// Si no existe task entonce podemos carga el submenu
                //~ if (!isset ($_REQUEST['task'])):
				FrecambiosHelper::addSubmenu('fabricantes');
				//~ endif;
               
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
				// Funcion que a�ade, titulo pagina y bottones superiores de a�adir, edit y borrar.
                // Ponemos el nombre del titulo de la vista y el icono que seleccionemos.
                // El icono es uno que tenemos en la carpeta /media/com_vehiculo 
			    JToolbarHelper::title(JText::_('Fabricantes de recambios'),'fabricantes');
                JToolbarHelper::deleteList('', 'fabricante.delete');
                JToolbarHelper::editList('fabricante.edit');
                JToolbarHelper::addNew('fabricante.add');
                
                
        }
}

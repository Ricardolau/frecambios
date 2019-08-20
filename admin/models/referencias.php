<?php
// No permitir el acceso directo al archivo
defined('_JEXEC') or die('Restricted access');
// Importar biblioteca modellist de Joomla
jimport('joomla.application.component.modellist');
/**
 * NodeloList Model
 */
class FrecambiosModelReferencias extends JModelList
{
        
        
   	/**
	 * Constructor.
	 *
	 * @param   array  An optional associative array of configuration settings.
	 * @see     JController
	 * @since   1.6
	 */
	public function __construct($config = array())
	{
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'id', 're.id',
					'referencia', 're.referencia',
                   	'fabricante', 'fa.fabricante',
                   
                                
			);
		}

		parent::__construct($config);
	}       
        
        
        
        /**
         * Método para crear una consulta SQL para cargar los datos de la lista.
         *
         * @return      string  Una consulta SQL
         */
        protected function getListQuery()
        {
                  // Build the query
                $db = JFactory::getDBO();
                $query = $db->getQuery(true)
                        ->select('re.*')
                        ->select ('fa.fabricante as fabricante')
                        ->from('#__frecambio_referencias as re')
                        ->join('left', '#__frecambio_fabricantes as fa ON (re.idFabricante = fa.id)');
                

		// Filter by search in title
		$search = $this->getState('filter.search');
		if (!empty($search))
		{
			if (stripos($search, 'id:') === 0)
			{
                                // Search id:1234
				$query->where('re.id = ' . (int) substr($search, 3));
			}
			else
			{
                                // Search %abcd%
				$search = $db->quote('%' . str_replace(' ', '%', $db->escape(trim($search), true) . '%'));
				$query->where('(re.referencia LIKE ' . $search . ')');
			}
		}                    

                
                // Fabricante filter                
                $idFabricante = $this->getState('filter.idFabricante');
                if (is_numeric($idFabricante)) {
                       $query->where('fa.id = ' . (int) $idFabricante); 
                }                
                
                // Referencia filter                
                $idReferencia = $this->getState('filter.idReferencia');
                if (is_numeric($idReferencia)) {
                       $query->where('re.id = ' . (int) $idReferencia); 
                }                                
                
                // Add the list ordering clause.                
                $listOrder = $this->getState('list.ordering', 're.id');                
				$listDirn = $db->escape($this->getState('list.direction', 'DESC'));                                                
                $query->order($db->escape($listOrder) . ' ' . $listDirn);                
                
                return $query;
               
            
        }
}

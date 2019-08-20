<?php
// No permitir el acceso directo al archivo
defined('_JEXEC') or die;
// Importar biblioteca modellist de Joomla
//~ jimport('joomla.application.component.modellist');

class FrecambiosModelCrucereferenciavirts extends JModelList
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
					'id', 'cr.id',
					'referencia', 're.referencia'
									
				);
			}
        	parent::__construct($config);
		}
        
        
       
         protected function getListQuery()
        {
                // Build the query
                $db = JFactory::getDBO();
                $query = $db->getQuery(true)
                        ->select('cr.*')
                        ->select ('virt.product_name,re.referencia as referencia, fa.fabricante as fabricante')
                        ->from('#__frecambio_crucereferenciavirt as cr')
						->join('left', '#__virtuemart_products_es_es as virt ON (virt.virtuemart_product_id = cr.virtuemart_product_id)')
                        ->join('left', '#__frecambio_referencias as re ON (cr.idReferencia = re.id)')
                        ->join('left', '#__frecambio_fabricantes as fa ON (re.idFabricante = fa.id)');
                

                // Filter by search in title
                $search = $this->getState('filter.search');
                if (!empty($search))
                {
                    if (stripos($search, 'id:') === 0)
                    {
                                        // Search id:1234
                        $query->where('cr.id = ' . (int) substr($search, 3));
                    }elseif (stripos($search, 'id_producto:') === 0)	{
                                        // Search id:1234
                        $query->where('cr.virtuemart_product_id = ' . (int) substr($search, 12));
                    } else {
                                        // Search %abcd%
                        $search = $db->quote('%' . str_replace(' ', '%', $db->escape(trim($search), true) . '%'));
                        $query->where('virt.product_name LIKE ' . $search );
                    }
                }                    
                // Producto filter                
                $idProductos = $this->getState('filter.idProductos');
                if (is_numeric($idProductos)) {
                       $query->where('cr.virtuemart_product_id = ' . (int) $idProductos); 
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
                $listOrder = $this->getState('list.ordering', 'cr.id');                
                $listDirn = $db->escape($this->getState('list.direction', 'DESC'));                                                
                $query->order($db->escape($listOrder) . ' ' . $listDirn);                
                    
                return $query;
        }                       
        
}
        


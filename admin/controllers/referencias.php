<?php
// No permitir acceso directo al archivo
defined('_JEXEC') or die('Restricted access');
 
// importar biblioteca de controladores de Joomla!
jimport('joomla.application.component.controlleradmin');
 
/**
 * Controlador Nodelos
 */
class FrecambiosControllerReferencias extends JControllerAdmin
{
        /**
         * Proxy para getModel.
         * @desde       2.5
         */
        public function getModel($name = 'Referencia', $prefix = 'FrecambiosModel', $config = array()) 
        {
                $model = parent::getModel($name, $prefix, array('ignore_request' => true));
                return $model;
        }
        
        /**
         * Get the list of "Nodelos" filtered by marca
         */
        public function options () {
                
                $app            = JFactory::getApplication ();
                $db             = JFactory::getDbo ();
                $options        = array();
                $idFabricante   = $app->input->get('parent_id');
                
                $query = $db->getQuery (true)
                        ->select ('id as value, referencia as text')
                        ->from ('#__frecambio_referencias')
                        ->where ('idFabricante = ' . (int) $idFabricante);
                
		$db->setQuery($query);                
                
		try
		{
			$options = $db->loadObjectList();                             
		}
		catch (RuntimeException $e)
		{
			JError::raiseWarning(500, $e->getMessage);
		}                 
                
                // Send JSon encoded data
                echo json_encode($options);                               
                $app->close ();
        }
        
}

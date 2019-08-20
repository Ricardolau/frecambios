<?php
// No permitir el acceso directo al archivo
defined('_JEXEC') or die('Restricted access');

// Importar la librería table de Joomla
//~ jimport('joomla.database.table');
/**
 * Clase Referencia Table ( Referencia de Fabricantes)
 */
class FrecambiosTableReferencias extends JTable
{
        /**
         * Constructor
         *
         * @param object Database connector object
         */
        function __construct(&$db) 
        {
                parent::__construct('#__frecambio_referencias','id', $db);
        }
}

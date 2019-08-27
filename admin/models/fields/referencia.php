<?php

/**
 * @version		$Id: helloworld.php 46 2010-11-21 17:27:33Z chdemko $
 * @package		Joomla16.Tutorials
 * @subpackage	Components
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @author		Christophe Demko
 * @link		http://joomlacode.org/gf/project/helloworld_1_6/
 * @license		License GNU General Public License version 2 or later
 */

// No direct access to this file
defined('_JEXEC') or die;

// import the list field type
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

/**
 * Nodelo Form Field class for the Vehiculo component
 */
class JFormFieldReferencia extends JFormFieldList
{
	/**
	 * The field type.
	 *
	 * @var		string
	 */
	protected $type = 'Frecambio';

	/**
	 * Method to get a list of options for a list input.
	 *
	 * @return	array		An array of JHtml options.
	 */
	protected function getOptions() 
	{
		$db = JFactory::getDBO();
        // Get Referencia from form or filter form
        $fFabricante         = $this->form->getField ('idFabricante'); 
        if (empty($fFabricante)) {                        
                $idFabricante = $this->form->getField ('idFabricante', 'filter')->value;
        } else {
                $f=json_encode($this->form->getField ('idFabricante'));
                $idFabricante = $this->form->getField ('idFabricante')->value;
                
        }
              
        

        if (! empty ($idFabricante)) {
            $query = $db->getQuery(true)
                ->select('id,idFabricante,referencia')
                ->from('#__frecambio_referencias')
                ->where ('idFabricante = ' . (int) $idFabricante);

                               
            $db->setQuery((string)$query);
            $db->setQuery($query);                

                try {
                        $options = $db->loadObjectList();                             
                } catch (RuntimeException $e) {
                        JError::raiseWarning(500, $e->getMessage);
                }              
        }
		return array_merge(parent::getOptions(), $options);
	}
}

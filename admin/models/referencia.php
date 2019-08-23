<?php
// No permitir acceso directo al archivo
defined('_JEXEC') or die('Restricted access');
 
// importar librer�a modelform de Joomla
//~ jimport('joomla.application.component.modeladmin');
 
class FrecambiosModelReferencia extends JModelAdmin
{
        /**
         * Devuelve una referencia al objeto Table, siempre cre�ndolo.
         *
         * @param       type    Tipo de tabla a instanciar
         * @param       string  Prefijo para el nombre de clase de tabla. Opcional.
         * @param       array  Array de configuraci�n para el modelo. Opcional.
         * @return      JTable  Objeto de base de datos
         * @since       2.5
         */
        public function getTable($type = 'Referencias', $prefix = 'FrecambiosTable', $config = array()) 
        {
                return JTable::getInstance($type, $prefix, $config);
        }
        /**
         * M�todo para conseguir el formulario.
         *
         * @param      array   $data           Datos para el formulario.
         * @param      boolean $loadData   Verdadero si el formulario va a cargar sus propios datos (por defecto), falso si no.
         * @return      mixed                      Un objeto JForm object si funciona, false si falla
         * @since       2.5
         */
        public function getForm($data = array(), $loadData = true) 
        {
                // Get the form.
                $form = $this->loadForm('com_frecambios.referencia', 'referencia',
                                        array('control' => 'jform', 'load_data' => $loadData));
                if (empty($form)) 
                {
                        return false;
                }
                return $form;
        }
        /**
         * M�todo para obtener datos que deber�an ser inyectados al formulario.
         *
         * @return      mixed   Datos para el formulario.
         * @since       2.5
         */
        protected function loadFormData() 
        {
                // Comprueba la sesi�n para comprobar datos introducidos previamente.
                $data = JFactory::getApplication()->getUserState('com_frecambios.edit.referencia.data', array());
                if (empty($data)) 
                {
                        $data = $this->getItem();
                }
                return $data;
        }

        public function save($data)
        {                
                $usuario = $user = JFactory::getUser();
                $fecha = JFactory::getDate ();
                if ($data['id'] === 0){
                    // Es un item nuevo.
                    $data['created'] = $fecha->toSql ();
                    $data['created_by'] = $usuario->id;
                }
                $data['modified'] = $fecha->toSql ();
                $data['modified_by'] = $usuario->id;
                
                return parent::save ($data);
        }     
}

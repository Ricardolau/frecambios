<?php
// No permitir acceso directo al archivo
defined('_JEXEC') or die;
 

 

class FrecambiosModelCrucereferenciavirt extends JModelAdmin
{
        /**
         * Devuelve una referencia al objeto Table,.
         *
         * @param       type    Tipo de tabla a instanciar
         * @param       string  Prefijo para el nombre de clase de tabla. Opcional.
         * @param       array  Array de configuración para el modelo. Opcional.
         * @return      JTable  Objeto de base de datos
         * @since       2.5
         */
        public function getTable($type = 'Crucereferenciavirt', $prefix = 'FrecambiosTable', $config = array()) 
        {
                return JTable::getInstance($type, $prefix, $config);
        }
        /**
         * Método para conseguir el formulario.
         *
         * @param      array   $data           Datos para el formulario.
         * @param      boolean $loadData   Verdadero si el formulario va a cargar sus propios datos (por defecto), falso si no.
         * @return      mixed                      Un objeto JForm object si funciona, false si falla
         * @since       2.5
         */
        public function getForm($data = array(), $loadData = true) 
        {
                // Get the form.
                $form = $this->loadForm('com_frecambios.crucereferenciavirt', 'crucereferenciavirt',
                                        array('control' => 'jform', 'load_data' => $loadData));
                if (empty($form)) 
                {
                        return false;
                }
                return $form;
        }
        /**
         * Método para obtener datos que deber�an ser inyectados al formulario.
         *
         * @return      mixed   Datos para el formulario.
         * @since       2.5
         */
        protected function loadFormData() 
        {
                // Comprueba la sesi�n para comprobar datos introducidos previamente.
                $data = JFactory::getApplication()->getUserState('com_frecambios.edit.crucereferenciavirt.data', array());
                if (empty($data)) 
                {
                   $data = $this->getItem();
                }
                if ($data->idFabricante >0){
                    // esta editando.
                    error_log('Editando');
                }
                return $data;
        }
        protected function preprocessForm(JForm $form, $data, $group = 'frecambios')
        {
            if ($data->id >0 )
            {
                //~ $form->setFieldAttribute('catid', 'allowAdd', 'true');
                $db = $this->getDbo();
				$query = $db->getQuery(true)
					->select('idFabricante,referencia')
					->from('#__frecambio_referencias')
                    ->where('id = '.$data->idReferencia);
                $db->setQuery($query);
               

                try
                {
                    $registro = $db->loadObjectList();
                }
                catch (RuntimeException $e)
                {
                    $this->setError($e->getMessage());

                    return false;
                }
                $data->set('idFabricante',$registro[0]->idFabricante);
                $data->set('idReferencia',$registro[0]->referencia);

                error_log(json_encode($registro));
            }

            parent::preprocessForm($form, $data, $group);
        }

        public function save($data)
        {                
                $usuario = $user = JFactory::getUser();
                $fecha = JFactory::getDate ();
                if ($data['id'] === 0){
                    // Es nuevo.
                    $data['created'] = $fecha->toSql ();
                    $data['created_by'] = $usuario->id;
                }
                $data['modified'] = $fecha->toSql ();
                $data['modified_by'] = $usuario->id;
                
                return parent::save ($data);
        }     
}

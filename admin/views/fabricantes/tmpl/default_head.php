<?php
// No permitir el acceso directo al archivo
defined('_JEXEC') or die('Restricted Access');
$listOrder      = $this->escape($this->state->get('list.ordering', 'fa.id'));
$listDirn       = $this->escape($this->state->get('list.direction', 'DESC'));

?>

<tr>
        <th width="1%">                
			<?php echo JHtml::_('grid.checkall'); ?>
        </th>
        <th width="10">
                <?php echo JHtml::_('searchtools.sort', 'COM_FRECAMBIOS_FABRICANTE_HEADING_ID', 'fa.id', $listDirn, $listOrder); ?>
        </th>
        <th width="20">
               <?php echo JHtml::_('searchtools.sort', 'COM_FRECAMBIOS_FABRICANTE_HEADING_FABRICANTE', 'fa.fabricante', $listDirn, $listOrder); ?>
        </th>
        <th width="20">
                <?php echo JText::_('COM_FRECAMBIOS_FABRICANTE_HEADING_LOGO'); ?>
        </th>
        
</tr>

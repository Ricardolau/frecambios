<?php
// No permitir el acceso directo al archivo
defined('_JEXEC') or die('Restricted Access');
?>

<tr>
        <th width="1%">                
			<?php echo JHtml::_('grid.checkall'); ?>
        </th>
        <th width="5">
			<?php echo JHtml::_('searchtools.sort', 'COM_FRECAMBIOS_REFERENCIAS_HEADING_ID', 're.id'); ?>
        </th>
        <th width="10">
			<?php echo JHtml::_('searchtools.sort', 'COM_FRECAMBIOS_REFERENCIAS_HEADING_FABRICANTE', 'fa.fabricante'); ?>
    
        </th>
        <th width="10">
			<?php echo JHtml::_('searchtools.sort', 'COM_FRECAMBIOS_REFERENCIAS_HEADING_REFERENCIA', 're.referencia'); ?>

        </th>
        
</tr>

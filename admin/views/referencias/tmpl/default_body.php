<?php
// No permitir el acceso directo al archivo
defined('_JEXEC') or die('Restricted Access');
?>
<?php foreach($this->items as $i => $item): ?>
        <tr class="row<?php echo $i % 2; ?>">
            <td>
				<?php echo JHtml::_('grid.id', $i, $item->id); ?>
			</td>
			<td>
				<?php echo $item->id; ?>
			</td>
			<td>
				<?php echo $item->fabricante; ?>
			</td>
			<td>
				<?php echo $item->referencia; ?>
			</td>
        </tr>
<?php endforeach; ?>

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
				<?php 
				$idProducto = $item->virtuemart_product_id;
				echo '<a title="id_producto" href="index.php?option=com_virtuemart&view=product&task=edit&virtuemart_product_id='.$idProducto.'">'.$idProducto.'</a> ';
				      echo $item->product_name;
				?>
				<?php 
				//~ echo '<pre>';
				//~ echo print_r($item);
				//~ echo '</pre>';
				?>
			</td>
			
			<td>
					<?php echo $item->fecha_actualizacion; ?>
			</td>
        </tr>
<?php endforeach; ?>

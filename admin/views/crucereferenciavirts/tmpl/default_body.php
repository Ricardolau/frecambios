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
				echo '<a title="'.$idProducto.'" href="index.php?option=com_virtuemart&view=product&task=edit&virtuemart_product_id='.$idProducto.'">'.
                '<span class="icon-cart large-icon"> </span></a> ';
				      echo $item->product_name;
				?>
			</td>
			<td>
                <?php
                // Lo ideal seria mostrar Fabricantes y referencia
                echo '<span class="icon-eye large-icon" title="Id de tabla de referencia '.$item->idReferencia.'"></span>'.$item->fabricante.': '.$item->referencia;?>
			</td>
			<td>
					<?php echo $item->modified; ?>
			</td>
        </tr>
<?php endforeach; ?>

<?php
// No permitir el acceso directo al archivo
defined('_JEXEC') or die;

// Cargar el comportamiento tooltip

JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.multiselect');
JHtml::_('formbehavior.chosen', 'select');
//~ echo '<pre>';
//~ print_r($this);
//~ echo '</pre>';

?>
<form action="<?php echo JRoute::_('index.php?option=com_frecambios'); ?>" method="post" name="adminForm"  id="adminForm">
		<?php
        // Search tools bar
        //~ echo '<pre>';
        //~ print_r($this);
        //~ echo '</pre>';
        echo JLayoutHelper::render('joomla.searchtools.default', array('view' => $this));
        ?>
        <?php if (empty($this->items)) : ?>
                
                <div class="alert alert-no-items">
                        <?php echo JText::_('JGLOBAL_NO_MATCHING_RESULTS'); ?>
                </div>
                    
        <?php else : ?> 
        <table class="table table-striped">
                <thead><?php echo $this->loadTemplate('head');?></thead>
                <tfoot><?php echo $this->loadTemplate('foot');?></tfoot>
                <tbody><?php echo $this->loadTemplate('body');?></tbody>
        </table>
       <?php endif; ?>

        
			   <input type = "hidden" name = "view" value = "fabricantes"  /> 
                <input type="hidden" name="task" value="" />
                <input type="hidden" name="boxchecked" value="0" />
                <?php echo JHtml::_('form.token'); ?>
        

</form>

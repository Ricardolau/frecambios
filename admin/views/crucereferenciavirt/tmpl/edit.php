<?php
// No permitir acceso directo al archivo
defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.formvalidator');
JHtml::_('behavior.keepalive');
JFactory::getDocument()->addScriptDeclaration("
		Joomla.submitbutton = function(task)
		{
			if (task == 'crucereferenciavirt.cancel' || document.formvalidator.isValid(document.getElementById('crucereferenciavirt-form')))
			{
				Joomla.submitform(task, document.getElementById('crucereferenciavirt-form'));
			}
		};
");

?>
<form action="<?php echo JRoute::_('index.php?option=com_frecambios&layout=edit&id='.(int) $this->item->id); ?>"
      method="post" name="adminForm" id="crucereferenciavirt-form" class="form-validate">
        <fieldset class="adminform">
                <legend><?php echo JText::_( 'Cruce de fabricantes  con producto de virtuemart' ); ?></legend>
<?php
    //~ echo '<pre>';
    //~ print_r($this->form);
    //~ echo '</pre>';
?>
      
<?php foreach($this->form->getFieldset() as $field): ?>
        <div class="control-group">
			<div class="control-label">
				<?php echo $field->label;?>     
			</div>
			<div class="controls">
				<?php echo $field->input;?>
			</div>
        </div>
<?php endforeach; ?>

        </fieldset>
        <div>
                <input type="hidden" name="task" value="crucereferenciavirt.edit" />
                <?php echo JHtml::_('form.token'); ?>
        </div>
</form>

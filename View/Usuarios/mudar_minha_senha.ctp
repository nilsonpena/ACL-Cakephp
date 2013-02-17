<div class="users form">
<?php echo $this->Form->create('Usuario');?>
<fieldset>
<legend><?php echo __('Alteração da minha senha de acesso'); ?></legend>
<?php
echo $this->Form->input('id');
echo $this->Form->input('grupo_id', array('type' => 'hidden'));
echo $this->Form->input('nome', array('readonly' => true));
echo $this->Form->input('username', array('readonly' => true));
                echo $this->Form->input('password', array(
                                                        'type' => 'password',
                                                        'value' => '',
                                                        'label' =>'Nova Senha'));
                echo $this->Form->input('checkPassword', array(
                                                            'label' => 'Repita o password',
                                                            'value' => '',
                                                            'type' => 'password'));
?>
</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
<h3><?php echo __('Actions'); ?></h3>
<ul>

<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('User.id'))); ?></li>
<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index'));?></li>
<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
</ul>
</div>
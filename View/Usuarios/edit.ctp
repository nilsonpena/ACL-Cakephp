<div class="usuarios form">
    <?php echo $this->Form->create('Usuario'); ?>
    <fieldset>
        <legend><?php echo __('Edit Usuario'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('nome');
        echo $this->Form->input('data_nascimento');

        echo $this->Form->input('sexo', array(
            'options' => array(
                '0' => 'Feminino',
                '1' => 'Masculino',
                )));
        echo $this->Form->input('telefone');
        echo $this->Form->input('celular');
        echo $this->Form->input('email');
        echo $this->Form->input('grupo_id');
        echo $this->Form->input('funcionario');
        echo $this->Form->input('caixa');
        echo $this->Form->input('radiologista');
        echo $this->Form->input('fornece_desconto');
        echo $this->Form->input('aprova_desconto');
        echo $this->Form->input('username', array(
            'label' => 'Usuario',
        ));
        echo $this->Form->input('password', array(
            'value' => '',
            'label' => 'Senha'));
        echo $this->Form->input('status_usuario', array('label' => 'Ativo'));
        echo $this->Form->input('valor_usuario');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Usuario.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Usuario.id'))); ?></li>
        <li><?php echo $this->Html->link(__('List Usuarios'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Grupos'), array('controller' => 'grupos', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Grupo'), array('controller' => 'grupos', 'action' => 'add')); ?> </li>
    </ul>
</div>

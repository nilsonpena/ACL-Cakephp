<div class="usuarios view">
<h2><?php  echo __('Usuario'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data Nascimento'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['data_nascimento']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sexo'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['sexo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telefone'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['telefone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Celular'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['celular']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Grupo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($usuario['Grupo']['id'], array('controller' => 'grupos', 'action' => 'view', $usuario['Grupo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Funcionario'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['funcionario']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Caixa'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['caixa']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Radiologista'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['radiologista']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fornece Desconto'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['fornece_desconto']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Aprova Desconto'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['aprova_desconto']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status Usuario'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['status_usuario']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor Usuario'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['valor_usuario']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Usuario'), array('action' => 'edit', $usuario['Usuario']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Usuario'), array('action' => 'delete', $usuario['Usuario']['id']), null, __('Are you sure you want to delete # %s?', $usuario['Usuario']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Grupos'), array('controller' => 'grupos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Grupo'), array('controller' => 'grupos', 'action' => 'add')); ?> </li>
	</ul>
</div>

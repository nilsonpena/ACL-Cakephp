<div class="usuarios index">
	<h2><?php echo __('Usuarios'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nome'); ?></th>
			<th><?php echo $this->Paginator->sort('data_nascimento'); ?></th>
			<th><?php echo $this->Paginator->sort('sexo'); ?></th>
			<th><?php echo $this->Paginator->sort('telefone'); ?></th>
			<th><?php echo $this->Paginator->sort('celular'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('grupo_id'); ?></th>
			<th><?php echo $this->Paginator->sort('funcionario'); ?></th>
			<th><?php echo $this->Paginator->sort('caixa'); ?></th>
			<th><?php echo $this->Paginator->sort('radiologista'); ?></th>
			<th><?php echo $this->Paginator->sort('fornece_desconto'); ?></th>
			<th><?php echo $this->Paginator->sort('aprova_desconto'); ?></th>
			<th><?php echo $this->Paginator->sort('username'); ?></th>
			<th><?php echo $this->Paginator->sort('password'); ?></th>
			<th><?php echo $this->Paginator->sort('status_usuario'); ?></th>
			<th><?php echo $this->Paginator->sort('valor_usuario'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($usuarios as $usuario): ?>
	<tr>
		<td><?php echo h($usuario['Usuario']['id']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['nome']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['data_nascimento']); ?>&nbsp;</td>
		<td><?php echo $usuario['Usuario']['sexo'] ? 'M' : 'F'; ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['telefone']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['celular']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['email']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($grupos[$usuario['Grupo']['id']], array(
                            'controller' => 'grupos', 
                            'action' => 'view', $usuario['Grupo']['id'])); ?>
		</td>
		<td><?php echo $usuario['Usuario']['funcionario'] ? 'Sim' : 'Não'; ?>&nbsp;</td>
		<td><?php echo $usuario['Usuario']['caixa'] ? 'Sim' : 'Não'; ?>&nbsp;</td>
		<td><?php echo $usuario['Usuario']['radiologista'] ? 'Sim' : 'Não'; ?>&nbsp;</td>
		<td><?php echo $usuario['Usuario']['fornece_desconto'] ? 'Sim' : 'Não'; ?>&nbsp;</td>
		<td><?php echo $usuario['Usuario']['aprova_desconto'] ? 'Sim' : 'Não'; ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['username']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['password']); ?>&nbsp;</td>
		<td><?php echo $usuario['Usuario']['status_usuario'] ? 'Ativo' : 'Bloqueado'; ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['valor_usuario']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['created']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $usuario['Usuario']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $usuario['Usuario']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $usuario['Usuario']['id']), null, __('Are you sure you want to delete # %s?', $usuario['Usuario']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Usuario'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Grupos'), array('controller' => 'grupos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Grupo'), array('controller' => 'grupos', 'action' => 'add')); ?> </li>
	</ul>
</div>

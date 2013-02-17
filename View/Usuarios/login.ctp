<?php

echo $this->Session->flash('auth');
echo $this->Form->create('Usuario', array('url' => array('controller' => 'usuarios', 'action' => 'login')));
echo $this->Form->input('Usuario.username');
echo $this->Form->input('Usuario.password');
echo $this->Form->end('Login');

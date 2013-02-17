<?php

echo '<h2> Página incial </h2>';

echo 'CakePHP versão: ' . Configure::version();

echo '</p>';

echo $this->Html->link('Login', array(
    'controller' => 'usuarios',
    'action' => 'login'));
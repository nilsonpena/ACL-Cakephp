<?php

App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');

class Usuario extends AppModel {

    public $actsAs = array(
        'Acl' => array(
            'type' => 'requester'
        )
    );

    public function beforeSave($options = array()) {

        if (!empty($this->data['Usuario']['password'])) {
            //Encripita o password do usuário antes de cada save desde que o campo
            //não esteja vazio
            $this->data['Usuario']['password'] = AuthComponent::password($this->data['Usuario']['password']);
        } else {
            unset($this->data['Usuario']['password']);
        }
        return TRUE;
    }

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'nome' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'sexo' => array(
            'boolean' => array(
                'rule' => array('boolean'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'email' => array(
            'email' => array(
                'rule' => array('email'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'grupo_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'username' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'password' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'checkPassword' => array(
            'passwordBate' => array(
                'rule' => array('checaSeCampoIgual', 'password'),
                'message' => 'O password digitado não confere'
            ),
        ),
        
        'data_nascimento' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        
    );

    /**
     * Método checaSeCampoIgual
     * 
     * @param array $data array com o nome do campo e o valor digitado no
     * campo a ser comparado com o campo referência
     * @param string $fildname Nome do campo referência
     */
    public function checaSeCampoIgual($data, $fieldname) { 
        if (array_shift($data) === $this->data[$this->alias][$fieldname])
            return true;
    }

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Grupo' => array(
            'className' => 'Grupo',
            'foreignKey' => 'grupo_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    public function parentNode() {

        if (!$this->id && empty($this->data)) {
            return NULL;
        }

        if (isset($this->data['Usuario']['grupo_id'])) {
            $groupId = $this->data['Usuario']['grupo_id'];
        } else {
            $groupId = $this->field('grupo_id');
        }
        if (!$groupId) {
            return NULL;
        } else {
            return array('Grupo' => array('id' => $groupId));
        }
    }

    /**
     * O método "binNode" irá dizer a ACL para ignorar a verificação do
     * usuario = $user Aro e verificar apenas o Group de Aro.
     *
     * @access public
     * @param array $user
     * @return array
     */
    public function bindNode($user) {
        return array('model' => 'Grupo', 'foreign_key' => $user['Usuario']['grupo_id']);
    }

}

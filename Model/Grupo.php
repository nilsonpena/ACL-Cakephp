<?php
App::uses('AppModel', 'Model');
/**
 * Grupo Model
 *
 * @property Usuario $Usuario
 */
class Grupo extends AppModel {


	public $name = 'Grupo';
	public $displayField = 'nome';
    	public $actsAs = array('Acl' => array('type' => 'requester'));

    	public function parentNode() {
        	return null;
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
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Usuario' => array(
			'className' => 'Usuario',
			'foreignKey' => 'grupo_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
        
        
        public function getGrupos() {
            $grupos = $this->find('list');
            
            return $grupos;
        }

}

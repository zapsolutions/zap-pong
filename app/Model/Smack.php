<?php
App::uses('AppModel', 'Model');
/**
 * Smack Model
 *
 * @property Users $Users
 */
class Smack extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'users_id' => array(
			'uuid' => array(
				'rule' => array('uuid'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public $actsAs = array(
        'Tags.Taggable' => array()
    );

}

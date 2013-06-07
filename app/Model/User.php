<?php
App::uses('AppModel', 'Model');
App::uses('CakeEmail', 'Network/Email');
/**
 * User Model
 *
 * @property Player $Player
 */
class User extends AppModel
{

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
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
		'name' => array(
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
			'between' => array(
                'rule'    => array('between', 5, 15),
                'message' => 'Passwords must be between 5 and 15 characters.',
            ),
			'checkMatch' => array( 
            	'rule' => 'confirmPassword', 
             	'message' => 'Your passwords didn\'t match.',
            )
		),
		'password_confirm' => array(
			'between' => array(
                'rule'    => array('between', 5, 15),
                'message' => 'Passwords must be between 5 and 15 characters.',
            ),
			'checkMatch' => array( 
            	'rule' => 'confirmPassword', 
             	'message' => 'Your passwords didn\'t match.', 
            )
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Player' => array(
			'className' => 'Player',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Smack' => array(
			'className' => 'Smack',
			'foreignKey' => 'user_id',
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

/**
 * Upload behavior
 *
 * @var array
 */
	public $actsAs = array(
        'Upload.Upload' => array(
            'avatar' => array(
                'fields' => array('dir' => 'avatar_dir'),
                'thumbnailSizes' => array(
                	'thumb' => '[50x50]',
                	'profile' => '[200x200]'
                )
            )
        ),
        'Tags.Taggable' => array()
    );

    public $virtualFields = array(
    	'total_games' => 'User.wins + User.losses'
	);

/**
 * beforeSave Model Callback
 * @param array $options
 * @return bool
 */
    public function beforeSave($options = array())
    {
        if (isset($this->data['User']['password'])) {
            $hash = Security::hash($this->data['User']['password'], 'blowfish');
            $this->data['User']['password'] = $hash;
        }
        return true;
    }

	public function sendResetEmail($id = null, $secret = null, $email_address = null) {
		$email = new CakeEmail();
		$email->config('default');
		$email->viewVars(array(
			'insert' => $id,
			'secret' => $secret
		));
		$email->template('reset_password');
    	$email->emailFormat('html');
		$email->sender('no-replay@pong.zapsolutions.com', 'ZAP Pong');
		$email->from(array('no-replay@pong.zapsolutions.com' => 'ZAP Pong'));
		$email->to($email_address);
		$email->subject('ZAP Pong Password Reset');
		$email->send();
	}

    public function confirmPassword()
    { 
    	if ($this->data[$this->alias]['password'] == $this->data[$this->alias]['password_confirm']) {
    		return true;
    	}
    	return false;
    }

}

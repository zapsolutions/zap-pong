<?php
App::uses('AppModel', 'Model');
App::uses('CakeEmail', 'Network/Email');
/**
 * User Model
 *
 * @property Player $Player
 */
class User extends AppModel {

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
	);

	public $virtualFields = array(
		'total_games' => 'User.wins + User.losses'
	);

/**
 * beforeSave Model Callback
 * @param array $options
 * @return bool
 */
	public function beforeSave($options = array()) {
		if (isset($this->data['User']['password'])) {
			$hash = Security::hash($this->data['User']['password'], 'blowfish');
			$this->data['User']['password'] = $hash;
		}
		return true;
	}

/**
 * sendResetEmail method
 *
 * @return void
 */
	public function sendResetEmail($id = null, $secret = null, $email_address = null) {
		$email = new CakeEmail();
		$email->config('default')
			->viewVars(array(
				'id' => $id,
				'secret' => $secret
			))
			->template('reset_password')
			->emailFormat('html')
			->sender('no-replay@pong.zapsolutions.com', 'ZAP Pong')
			->from(array('no-replay@pong.zapsolutions.com' => 'ZAP Pong'))
			->to($email_address)
			->subject('ZAP Pong Password Reset')
			->send();
	}

/**
 * confirmPasword method
 *
 * @return void
 */
    public function confirmPassword() { 
		if ($this->data[$this->alias]['password'] == $this->data[$this->alias]['password_confirm']) {
			return true;
		}
		return false;
    }
    
/**
 * updateRatings method
 *
 * @return void
 */
	public function updateRatings($players = array()) {
		foreach ($players as $player) {
			$user = $this->find('first', array(
				'conditions' => array(
					'User.id' => $player['user_id']
				)
			));
		
			$augWins = $user['User']['wins'] + ($user['User']['sinks'] * 0.50) + ($user['User']['hits'] * 0.25);
			$augLosses = $user['User']['losses'] + ($user['User']['tks'] * 0.50) + $user['User']['decay'];
			$augSpread = $augWins - $augLosses;
		
			if ($augWins - $augLosses > 0 || $augWins - $augLosses === 0) {
				$percentage = $user['User']['wins'] / $user['User']['total_games'];
			} else {
				$percentage = $user['User']['losses'] / $user['User']['total_games'];
			}
		
			$rating = $percentage * $augSpread;
			$this->id = $player['user_id'];
			$this->saveField('rating', $rating);
		}
	}

/**
 * updateStats method
 *
 * @return void
 */
	public function updateStats($players = array(), $action = null) {
		foreach ($players as $player) {
			if ($player['result'] === '0') {
				$this->id = $player['user_id'];
				$losses = $this->field('losses') + 1;
				$this->saveField('losses', $losses);
			}
		
			if ($player['result'] === '1') {
				$this->id = $player['user_id'];
				$wins = $this->field('wins') + 1;
				$this->saveField('wins', $wins);
			}
		
			if (isset($player['actor']) && $player['actor'] === true) {
				$this->id = $player['user_id'];
				$actions = $this->field($action . 's') + 1;
				$this->saveField($action . 's', $actions);
			}
		}
	}

/**
 * updateStreaks method
 *
 * @return void
 */
	public function updateStreaks($players = array()) {
		foreach ($players as $player) {
			$user = $this->find('first', array(
				'conditions' => array(
					'User.id' => $player['user_id']
				)
			));
		
			if ($player['result'] === '1') {
				if ($user['User']['streak'] > 0 || $user['User']['streak'] == 0) {
					$streak = $user['User']['streak'] + 1;
				} else {
					$streak = 1;
				}
			}
		
			if ($player['result'] === '0') {
				if ($user['User']['streak'] < 0 || $user['User']['streak'] == 0) {
					$streak = $user['User']['streak'] - 1;
				} else {
					$streak = -1;
				}
			}
		
			$this->id = $player['user_id'];
			$this->saveField('streak', $streak);
		}
	}
}

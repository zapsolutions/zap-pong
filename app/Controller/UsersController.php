<?php
App::uses('AppController', 'Controller');
App::uses('Security', 'Utility');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

	public $helpers = array('Time');

	public function isAuthorized($user) {
		if (!empty($user)) {
			return true;
		}
		
		return parent::isAuthorized($user);
	}

/**
 * profile method
 *
 * @return void
 */
	public function dashboard() {
		// CHECK IF A GAME WAS PASSED TO DASHBOARD
		if($this->request->is('post')) {
			$teams = unserialize($this->request->data['Player']['teams']);
			$winner = $this->request->data['Player']['winner'];

			unset($this->request->data['Player']);
			
			foreach($teams as $cnt => $team) {
				if($cnt == $winner) {
					$this->request->data['Player'][0]['user_id'] = $team[0];
					$this->request->data['Player'][1]['user_id'] = $team[1];
				} else {
					$this->request->data['Player'][2]['user_id'] = $team[0];
					$this->request->data['Player'][3]['user_id'] = $team[1];
				}
			}
		}

		$user = $this->User->find('first', array(
			'conditions' => array(
				'User.id' => $this->Auth->user('id')
			)
		));
		
		$users = $this->User->find('list', array(
			'fields' => array('User.name'),
			'order'  => array('User.name ASC')
		));
		
		$this->User->Smack->recursive = 1;
		
		$smacks = $this->User->Smack->find('all', array(
			'order' => 'Smack.created DESC',
			'limit' => 5
		));
		$this->request->data = array_merge($this->request->data, $user);
		$this->set('title_for_layout', 'Dashboard');
		$this->set(compact('user', 'users', 'smacks', 'user_smacks'));
	}

/**
 * edit method
 *
 * @return void
 */
	public function edit() {
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(
					'You\'ve successfully updated your account info!',
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class'  => 'alert-success'
					)
				);
		
				return $this->redirect(array('action' => 'dashboard'));
			} else {
				$this->Session->setFlash(
					'Something went wrong with updating your account info. :-(',
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class'  => 'alert-error'
					)
				);
		
				return $this->redirect(array('action' => 'dashboard'));
			}
		} 
	}

/**
 * random_teams method
 *
 * @return void
 */
	public function random_teams($players = null) {
		if ($this->request->is('post')) {
			$numSelected = count($this->request->data['User']);
			if ($numSelected !== 4) {
				$this->Session->setFlash(
					'You\'ve selected too few or too many players. :-(',
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class'  => 'alert-error'
					)
				);
		
				return $this->redirect(array('action' => 'random_teams'));
			}
		
			$players = $this->request->data;
		
			$selection = $this->User->find('all', array(
				'conditions' => array(
					'User.id' => $players['User']
				),
				'order' => 'RAND()'
			));
		
			$this->set(compact('selection'));
		} elseif(!empty($players)) {
			$players = unserialize(urldecode($players));

			$selection = array();
			foreach($players as $player) {
				array_push($selection, $this->User->findById($player));
			}
		
			$this->set(compact('selection'));
		}
		
		$user = $this->User->find('first', array(
			'conditions' => array(
				'User.id' => $this->Auth->user('id')
			)
		));
		
		$users = $this->User->find('list', array(
			'order'  => array('User.name ASC'),
			'fields' => array('User.name')
		));
		
		$this->set('title_for_layout', 'Teams');
		$this->set(compact('user', 'users'));
	}

/**
 * forgot_password method
 *
 * @return void
 */
	public function forgot_password() {
		if ($this->request->is('post')) {
			$data = $this->request->data;
			$exists = $this->User->findByEmail($data['User']['email']);
		
			if (empty($exists)) {
				$this->Session->setFlash(
					'We couldn\'t find a user with the email address: \'' . $data['User']['email'] . '\'.',
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class'  => 'alert-error'
					)
				);
		
				return $this->redirect(array('controller' => 'users', 'action' => 'forgot_password'));
			}
		
			App::uses('String', 'Utility');
			$secretToken = Security::hash(String::uuid(), 'sha256');
			$this->loadModel('Token');
		
			$newToken = array(
				'Token' => array(
					'secret'      => $secretToken,
					'model'       => 'User',
					'foreign_key' => $exists['User']['id']
				)
			);
		
			$this->Token->save($newToken);
			$tokenID = $this->Token->id;
			$this->User->sendResetEmail($tokenID, $secretToken, $data['User']['email']);
			return $this->redirect(array('controller' => 'pages', 'action' => 'reset'));
		}
	}

/**
 * reset_password method
 *
 * @return void
 */
	public function reset_password($id = null, $secret = null) {
		$minusOneHour = date('Y-m-d H:i:s', strtotime('-1 hour', time()));
		$nowHour = date('Y-m-d H:i:s', strtotime('now', time()));
		$this->loadModel('Token');
		
		$valid_token = $this->Token->find('first', array(
			'conditions' => array(
				'Token.id'                      => $id,
				'Token.secret'                  => $secret,
				'Token.model'                   => 'User',
				'Token.created BETWEEN ? AND ?' => array($minusOneHour, $nowHour)
			)
		));
		
		if (empty($valid_token)) {
			throw new NotFoundException('Invalid or expired token.');
		}
		
		$data = $this->request->data;
		
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($data)) {
				$this->Session->setFlash(
					'Your password has been updated!',
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class'  => 'alert-success'
					)
				);
		
				return $this->redirect('/');
			} else {
				$this->Session->setFlash(
					'There was a problem updating your password.',
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class'  => 'alert-error'
					)
				);
			}	
		}
		
		$user = $this->User->find('first', array(
				'conditions' => array(
				'User.id' => $valid_token['Token']['foreign_key']
			)
		));
		
		$this->set(compact('user'));
	}
}

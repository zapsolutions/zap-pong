<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController
{

	public $helpers = array('Time');

	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow(array('add'));
	}

/**
 * profile method
 *
 * @return void
 */
	public function dashboard()
	{
		$user = $this->User->find('first', array(
			'conditions' => array(
				'User.id' => $this->Auth->user('id')
			)
		));
		$users = $this->User->find('list', array(
			'fields' => array('User.name')
		));
		$this->User->Smack->recursive = 1;
		$smacks = $this->User->Smack->find('all', array(
			'order' => 'Smack.created DESC',
			'limit' => 5
		));
		$this->request->data = $user;
		$this->set('title_for_layout', 'Dashboard');
		$this->set(compact('user', 'users', 'smacks', 'user_smacks'));
	}

/**
 * edit method
 *
 * @return void
 */
	public function edit()
	{
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(
					'You\'ve successfully updated your account info!',
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-success'
					)
				);
				$this->redirect(array('action' => 'dashboard'));
			} else {
				$this->Session->setFlash(
					'Something went wrong with updating your account info. :-(',
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-error'
					)
				);
				$this->redirect(array('action' => 'dashboard'));
			}
		} 
	}

	public function random_teams()
	{
		if ($this->request->is('post')) {
			$numSelected = count($this->request->data['User']);
			if ($numSelected !== 4) {
				$this->Session->setFlash(
					'You\'ve selected too few or too many players. :-(',
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-error'
					)
				);
				$this->redirect(array('action' => 'random_teams'));
			}
			$players = $this->request->data;
			$selection = $this->User->find('all', array(
				'conditions' => array(
					'User.id' => $players['User']
				),
				'order' => 'RAND()'
			));
			$this->set(compact('selection'));
		}
		$user = $this->User->find('first', array(
			'conditions' => array(
				'User.id' => $this->Auth->user('id')
			)
		));
		$users = $this->User->find('list', array(
			'fields' => array('User.name')
		));
		$this->set('title_for_layout', 'Teams');
		$this->set(compact('user', 'users'));
	}

	public function forgot_password()
	{
		if ($this->request->is('post')) {
			$data = $this->request->data;
			$exists = $this->User->findByEmail($data['User']['email']);
			if (empty($exists)) {
				$this->Session->setFlash(
					'We couldn\'t find a user with the email address: \'' . $data['User']['email'] . '\'.',
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-error'
					)
				);
				$this->redirect(array('controller' => 'users', 'action' => 'forgot_password'));
			}
			$secret_token = String::uuid();
			$this->loadModel('Token');
			$data = array(
				'Token' => array(
					'secret' => $token
				)
			);
			$this->Token->save($data);
			$token_id = $this->Token->id;
			$this->User->sendReset($token_id, $secret_token);
			$this->redirect(array('controller' => 'pages', 'action' => 'reset'));
		}
	}

	public function reset_password($id = null, $secret = null)
	{
		$minusOneHour = strtotime('-1 hour', time());
		$plusOneHour = strtotime('+1 hour', time());
		$this->loadModel('Token');
		$valid_token = $this->Token->find('first', array(
			'conditions' => array(
				'Token.id'        => $id,
				'Token.secret'     => $secret,
				'Token.created BETWEEN ? AND ?' => array($minusOneHour, $plusOneHour)
			)
		));
		if (!empty($valid_token)) {
			if ($this->request->is('post') || $this->request->is('put')) {
				$user = $this->User->find('first', array(
					'conditions' => array(
						'User.email' => $token_data['Token']['email']
					)
				));
				$data = $this->request->data;
				if ($this->User->save($data)) {
					$this->Session->setFlash(
						'Your password has been updated!',
						'alert',
						array(
							'plugin' => 'TwitterBootstrap',
							'class' => 'alert-success'
						)
					);
					$this->redirect('/login');
				} else {
					$this->Session->setFlash(
						'There was a problem updating your password.',
						'alert',
						array(
							'plugin' => 'TwitterBootstrap',
							'class' => 'alert-error'
						)
					);
				}	
			}
		} else {
			throw new NotFoundException('Invalid or expired token.');
		}
	}

}

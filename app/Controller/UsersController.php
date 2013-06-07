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

	}

	public function reset_password()
	{

	}

}

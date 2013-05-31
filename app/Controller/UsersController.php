<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController
{

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
		$this->set(compact('user', 'users', 'smacks'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add()
	{
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(
					__('The %s has been saved', __('user')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-success'
					)
				);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(
					__('The %s could not be saved. Please, try again.', __('user')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-error'
					)
				);
			}
		}
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
					'Something went wrong with updating your account info!',
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

}

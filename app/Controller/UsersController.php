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
		$data = $this->User->find('first', array(
				'conditions' => array(
					'User.id' => $this->Auth->user('id')
				)
			));
		$this->request->data = $data;
		$users = $this->User->find('list', array(
			'fields' => array('User.name')
		));
		$this->set('user', $data);
		$this->set(compact('users'));
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

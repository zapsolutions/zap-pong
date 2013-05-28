<?php
App::uses('AppController', 'Controller');
/**
 * Games Controller
 *
 * @property Game $Game
 */
class GamesController extends AppController
{

	public $uses = array('Game', 'User');

	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow(array('add', 'view'));
	}

/**
 * new method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Game->create();
			if ($this->Game->saveAll($this->request->data)) {
				$this->Session->setFlash(
					__('The %s has been saved!', __('game')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-success'
					)
				);
				$this->redirect('/');
			} else {
				$this->Session->setFlash(
					__('The %s could not be saved. Please, try again.', __('game')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-error'
					)
				);
			}
		} else {
			$users = $this->User->find('list', array(
				'fields' => array('name')
			));
			$this->set(compact('users'));
		}
	}

	private function __updateStats($players = array())
	{

	}
	private function __updateRatings($players = array())
	{
		
	}

}

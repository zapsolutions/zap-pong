<?php
App::uses('AppController', 'Controller');
/**
 * Games Controller
 *
 * @property Game $Game
 */
class GamesController extends AppController {

	public $uses = array('Game', 'User');

	public function isAuthorized($user) {
		if (!empty($user)) {
			return true;
		}
		return parent::isAuthorized($user);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$data = $this->request->data;
			$data['Player'][$data['Action']['key']]['actor'] = true;
			$data['Player'][$data['Action']['key']]['action'] = $data['Action']['type'];
			$this->Game->create();
			
			if ($this->Game->saveAll($data)) {
				$this->User->updateStats($data['Player'], $data['Action']['type']);
				$this->User->updateRatings($data['Player']);
				$this->User->updateStreaks($data['Player']);
			
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
					__('The %s could not be saved. Please, try again. :(', __('game')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-error'
					)
				);
			}
		} else {
			$users = $this->User->find('list', array(
				'fields' => array('name'),
				'order'  => array('User.name ASC')
			));
			
			$this->set(compact('users'));
		}
	}

}

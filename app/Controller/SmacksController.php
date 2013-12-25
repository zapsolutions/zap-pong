<?php
App::uses('AppController', 'Controller');
/**
 * Smacks Controller
 *
 * @property Smack $Smack
 */
class SmacksController extends AppController {

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
			$this->Smack->create();
			if ($this->Smack->save($this->request->data)) {
				$this->Session->setFlash(
					'Your smack talk has been successfully saved!',
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-success'
					)
				);
			
				return $this->redirect('/dashboard');
			} else {
				$this->Session->setFlash(
					'Your smack talk could not be saved. Please, try again.',
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-error'
					)
				);
			
				return $this->redirect('/dashboard');
			}
		}
	}

/**
 * load_more method
 *
 * @return void
 */
	public function load_more($offset = null) {
		$this->Smack->recursive = 1;
		$smacks = $this->Smack->find('all', array(
			'order' => 'Smack.created DESC',
			'limit' => 5,
			'offset' => $offset
		));
		$this->autoLayout = false;
		$this->set(compact('smacks'));
	}
}

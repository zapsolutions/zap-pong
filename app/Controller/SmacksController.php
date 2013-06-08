<?php
App::uses('AppController', 'Controller');
/**
 * Smacks Controller
 *
 * @property Smack $Smack
 */
class SmacksController extends AppController {

/**
 * add method
 *
 * @return void
 */
	public function add()
	{
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
				$this->redirect('/dashboard');
			} else {
				$this->Session->setFlash(
					'Your smack talk could not be saved. Please, try again.',
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-error'
					)
				);
				$this->redirect('/dashboard');
			}
		}
	}

	public function load_more($offset = null)
	{
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

<?php
App::uses('AppController', 'Controller');
/**
 * Smacks Controller
 *
 * @property Smack $Smack
 */
class SmacksController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Smack->recursive = 0;
		$this->set('smacks', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Smack->id = $id;
		if (!$this->Smack->exists()) {
			throw new NotFoundException(__('Invalid %s', __('smack')));
		}
		$this->set('smack', $this->Smack->read(null, $id));
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
					__('The %s has been saved', __('smack')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-success'
					)
				);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(
					__('The %s could not be saved. Please, try again.', __('smack')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-error'
					)
				);
			}
		}
		$users = $this->Smack->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Smack->id = $id;
		if (!$this->Smack->exists()) {
			throw new NotFoundException(__('Invalid %s', __('smack')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Smack->save($this->request->data)) {
				$this->Session->setFlash(
					__('The %s has been saved', __('smack')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-success'
					)
				);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(
					__('The %s could not be saved. Please, try again.', __('smack')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-error'
					)
				);
			}
		} else {
			$this->request->data = $this->Smack->read(null, $id);
		}
		$users = $this->Smack->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Smack->id = $id;
		if (!$this->Smack->exists()) {
			throw new NotFoundException(__('Invalid %s', __('smack')));
		}
		if ($this->Smack->delete()) {
			$this->Session->setFlash(
				__('The %s deleted', __('smack')),
				'alert',
				array(
					'plugin' => 'TwitterBootstrap',
					'class' => 'alert-success'
				)
			);
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(
			__('The %s was not deleted', __('smack')),
			'alert',
			array(
				'plugin' => 'TwitterBootstrap',
				'class' => 'alert-error'
			)
		);
		$this->redirect(array('action' => 'index'));
	}
}

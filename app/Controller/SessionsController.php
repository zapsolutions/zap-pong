<?php
App::uses('AppController', 'Controller');
/**
 *
 * Controller to handle user sessions
 */

class SessionsController extends AppController {

/**
 * login method
 *
 * @return void
 */
	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$user = $this->Auth->user();
				$this->Session->setFlash("Welcome {$user['name']}, you are now logged in!", 'alert', array(
					'plugin' => 'TwitterBootstrap',
					'class' => 'alert-success'
				));
				$this->redirect($this->Auth->loginRedirect);
			} else {
				$this->Session->setFlash('Invalid login details, please try again.');
				$this->redirect(array('controller' => 'pages', 'action' => 'display', 'goofed'));
			}
		}
		$this->set('title_for_layout', 'Login');
	}

/**
 * logout method
 *
 * @return void
 */
	public function logout() {
		$this->Session->destroy();
		$this->redirect($this->Auth->logout());
	}
}
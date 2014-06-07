<?php
App::uses('AppController', 'Controller');
/**
 * Api Controller
 *
 * @property User $User
 */
class ApiController extends AppController {

	public $uses = array('User');

	public function beforeFilter() {
		$this->Auth->allow('alpha_omega');
	}

/**
 * Returns a JSON string of the highest and lowest rated players based
 * on ranking
 */
	public function alpha_omega() {
		$champion = $this->User->find('first', array(
			'conditions' => array('User.active' => 1),
			'fields'     => array('name', 'wins', 'losses'),
			'order'      => array('User.rating DESC'),
		));

		$unchampion = $this->User->find('first', array(
			'conditions' => array('User.active' => 1),
			'fields'     => array('name', 'wins', 'losses'),
			'order'      => array('User.rating ASC'),
		));

		$data['Champion'] = $champion;
		$data['Unchampion'] = $unchampion;
		$this->set('_serialize', $data);
	}
}

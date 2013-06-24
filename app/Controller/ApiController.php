<?php
App::uses('AppController', 'Controller');
/**
 * Api Controller
 *
 * @property User $User
 */
class ApiController extends AppController
{

	public $uses = array('User');

/**
 * alpha_and_omega method
 *
 * @return void
 */
	public function alpha_omega()
	{

		$champion = $this->User->find('all', array(
			'conditions' => array('User.active' => 1),
			'fields' => array('name', 'wins', 'losses'),
			'order' => array('User.rating DESC'),
			'limit' => 1
		));

		$unchampion = $this->User->find('all', array(
			'conditions' => array('User.active' => 1),
			'fields' => array('name', 'wins', 'losses'),
			'order' => array('User.rating ASC'),
			'limit' => 1
		));

		$data['Champion'] = $champion;
		$data['Unchampion'] = $unchampion;
		$this->set(compact('data'));
		$this->autoLayout = false;
		
	}

	public function decay($secret = null)
	{
		$cronSecret = Configure::read('Cron.secret');
		if ($secret === null || $secret !== $cronSecret) {
			throw new MethodNotAllowedException('Derp.');
		}
		$users = $this->User->find('all', array(
			'conditions' => array(
				'User.modified >=' => //$now + 7 days;
			)
		));
		foreach ($users as $user) {
			// add decay
			// update rating
		}
	}

}

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
			throw new MethodNotAllowedException('');
		}

		$oneWeekAgo = date ('Y-m-d H:i:s', strtotime ('-1 week', time())); 

		$users = $this->User->find('all', array(
			'conditions' => array(
				'User.modified <=' => $oneWeekAgo
			)
		));
		
		foreach ($users as $user) {
			$this->User->id = $user['User']['id'];
			$currentDecay = $this->User->field('decay');
			$this->User->saveField('decay', $currentDecay + 1);
		}
	
		$this->loadModel('Game');
		$this->Game->updateRatings($users);
	}

}

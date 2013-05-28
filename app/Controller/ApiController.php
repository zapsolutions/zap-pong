<?php
App::uses('AppController', 'Controller');
/**
 * Players Controller
 *
 * @property Player $Player
 */
class ApiController extends AppController
{

	public $uses = array('User');

/**
 * alpha_and_omega method
 *
 * @return void
 */
	public function alpha_and_omega()
	{

		$champion = $this->User->find('all', array(
			'conditions' => array(
				'User.active' => 1
			),
			'order' => array(
				'User.rating DESC'
			),
			'limit' => 1
		));

		$unchampion = $this->User->find('all', array(
			'conditions' => array(
				'User.active' => 1
			),
			'order' => array(
				'User.rating ASC'
			),
			'limit' => 1
		));

		$data['Champion'] = $champion;
		$data['Unchampion'] = $unchampion;
		
	}

}

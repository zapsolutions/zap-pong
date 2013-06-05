<?php
App::uses('AppController', 'Controller');
/**
 * Players Controller
 *
 * @property Player $Player
 */
class BoardsController extends AppController
{

	public $uses = array('Game', 'User');

/**
 * all method
 *
 * @return void
 */
	public function all()
	{

		// By rating, main board
		$ratings = $this->User->find('all', array(
			'conditions' => array(
				'OR' => array(
					'User.wins >'   => 0,
					'User.losses >' => 0
				),
				'User.active' => 1
			),
			'order' => array(
				'User.rating DESC'
			)
		));

		// Recent games played
		$this->Game->recursive = 2;
		$games = $this->Game->find('all', array(
			'order' => array(
				'Game.created DESC'
			),
			'limit' => 3
		));

		$this->set('title_for_layout', 'Leaderboard');
		$this->set(compact('ratings', 'sinks', 'hits', 'games'));

	}


}

<?php
App::uses('AppController', 'Controller');
/**
 * Players Controller
 *
 * @property Player $Player
 */
class BoardsController extends AppController {

	public $uses = array('Game', 'User');

	public function beforeFilter() {
		parent::beforeFilter();
	}

/**
 * Finds all players sorted by rating for the leaderboard
 */
	public function all() {
		$loggedIn = $this->Auth->user('id');

		if ($loggedIn !== null) {
			$user = $this->User->find('first', array(
				'conditions' => array('User.id' => $loggedIn)
			));
			$this->set(compact('user'));
		}

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
		$this->Game->Behaviors->attach('Containable');
		$games = $this->Game->find('all', array(
			'order' => array(
				'Game.created DESC'
			),
			'contain' => array(
				'Player' => array(
					'User'
				)
			)
		));
		
		$this->set('title_for_layout', 'Leaderboard');
		$this->set(compact('ratings', 'sinks', 'hits', 'games'));
		$this->set('authenticated', $this->Auth->loggedIn());
	}
}

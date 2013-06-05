<?php
App::uses('AppController', 'Controller');
/**
 * Games Controller
 *
 * @property Game $Game
 */
class GamesController extends AppController
{

	public $uses = array('Game', 'User');

	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow(array('add', 'view'));
	}

/**
 * new method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$data = $this->request->data;
			$data['Player'][$data['Action']['key']]['actor'] = true;
			$data['Player'][$data['Action']['key']]['action'] = $data['Action']['type'];
			$this->Game->create();
			if ($this->Game->saveAll($data)) {
				$this->__updateStats($data['Player'], $data['Action']['type']);
				$this->__updateRatings($data['Player']);
				$this->__updateStreaks($data['Player']);
				$this->Session->setFlash(
					__('The %s has been saved!', __('game')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-success'
					)
				);
				$this->redirect('/');
			} else {
				$this->Session->setFlash(
					__('The %s could not be saved. Please, try again. :(', __('game')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-error'
					)
				);
			}
		} else {
			$users = $this->User->find('list', array(
				'fields' => array('name'),
				'order'  => array('User.name ASC')
			));
			$this->set(compact('users'));
		}
	}

	private function __updateStats($players = array(), $action = null)
	{
		foreach ($players as $player) {
			if ($player['result'] === '0') {
				$this->User->id = $player['user_id'];
				$losses = $this->User->field('losses') + 1;
				$this->User->saveField('losses', $losses);
			}
			if ($player['result'] === '1') {
				$this->User->id = $player['user_id'];
				$wins = $this->User->field('wins') + 1;
				$this->User->saveField('wins', $wins);
			}
			if (isset($player['actor']) && $player['actor'] === true) {
				$this->User->id = $player['user_id'];
				$actions = $this->User->field($action . 's') + 1;
				$this->User->saveField($action . 's', $actions);
			}
		}
	}
	private function __updateRatings($players = array())
	{
		foreach ($players as $player) {
			$user = $this->User->find('first', array(
				'conditions' => array(
					'User.id' => $player['user_id']
				)
			));
			$augWins = $user['User']['wins'] + ($user['User']['sinks'] * 0.50) + ($user['User']['hits'] * 0.25);
			$augLosses = $user['User']['losses'] + ($user['User']['tks'] * 0.50) + $user['User']['decay'];
			$augSpread = $augWins - $augLosses;
			if ($augWins - $augLosses > 0 || $augWins - $augLosses === 0) {
				$percentage = $user['User']['wins'] / $user['User']['total_games'];
			} else {
				$percentage = $user['User']['losses'] / $user['User']['total_games'];
			}
			$rating = $percentage * $augSpread;
			$this->User->id = $player['user_id'];
			$this->User->saveField('rating', $rating);
		}
	}

	private function __updateStreaks($players = array())
	{
		foreach ($players as $player) {
			$user = $this->User->find('first', array(
				'conditions' => array(
					'User.id' => $player['user_id']
				)
			));
			if ($player['result'] === '1') {
				if ($user['User']['streak'] > 0 || $user['User']['streak'] == 0) {
					$streak = $user['User']['streak'] + 1;
				} else {
					$streak = 1;
				}
			}
			if ($player['result'] === '0') {
				if ($user['User']['streak'] < 0 || $user['User']['streak'] == 0) {
					$streak = $user['User']['streak'] - 1;
				} else {
					$streak = -1;
				}
			}
			$this->User->id = $player['user_id'];
			$this->User->saveField('streak', $streak);
		}
	}

}

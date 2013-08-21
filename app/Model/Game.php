<?php
App::uses('AppModel', 'Model');
/**
 * Game Model
 *
 * @property Player $Player
 */
class Game extends AppModel
{

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Player' => array(
			'className' => 'Player',
			'foreignKey' => 'game_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

/**
 * updateRatings method
 *
 * @return void
 */
	public function updateRatings($players = array())
	{
		foreach ($players as $player) {
			$user = $this->find('first', array(
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
			$this->id = $player['user_id'];
			$this->saveField('rating', $rating);
		}
	}

/**
 * updateStats method
 *
 * @return void
 */
	public function updateStats($players = array(), $action = null)
	{
		foreach ($players as $player) {
			if ($player['result'] === '0') {
				$this->id = $player['user_id'];
				$losses = $this->field('losses') + 1;
				$this->saveField('losses', $losses);
			}
		
			if ($player['result'] === '1') {
				$this->id = $player['user_id'];
				$wins = $this->field('wins') + 1;
				$this->saveField('wins', $wins);
			}
		
			if (isset($player['actor']) && $player['actor'] === true) {
				$this->id = $player['user_id'];
				$actions = $this->field($action . 's') + 1;
				$this->saveField($action . 's', $actions);
			}
		}
	}

/**
 * updateStreaks method
 *
 * @return void
 */
	public function updateStreaks($players = array())
	{
		foreach ($players as $player) {
			$user = $this->find('first', array(
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
		
			$this->id = $player['user_id'];
			$this->saveField('streak', $streak);
		}
	}

}

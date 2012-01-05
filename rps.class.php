<?php

class RPS {
	public $HANDS = array();
	private $_playerhand = 0;
	private $_computerhand = 0;
	
	public function __construct($rock = 'Rock', $paper = 'Paper', $scissor = 'Scissor') {
		$this->HANDS[0] = $rock;
		$this->HANDS[1] = $paper;
		$this->HANDS[2] = $scissor;
	}
	
	public function setPlayerHand($hand) {
		$this->_playerhand = $hand;
	}
	
	public function getPlayerHand() {
		return $this->_playerhand;
	}
	
	public function setComputerHand($hand = null) {
		if(!is_null($hand)){
			$this->_computerhand = $hand;
		} else {
			$this->_computerhand = $this->_getRandomHand();
		}
	}
	
	public function getComputerHand() {
		return $this->_computerhand;
	}
	
	public function _getRandomHand() {
		$hands = $this->HANDS;
		$hand = $hands[rand(0, count($hands) - 1)];
		return $hand;
	}
	
	// reutrn player bool
	// 1 win
	// 0 draw
	// -1 lose
	public function judge() {
		switch($this->_playerhand) {
			//Rock
			case $this->HANDS[0]:
				if($this->_computerhand == $this->HANDS[0]) {
					return 0;
				}
				if($this->_computerhand == $this->HANDS[1]) {
					return -1;
				}
				if($this->_computerhand == $this->HANDS[2]) {
					return 1;
				}
				break;
			//Paper
			case $this->HANDS[1]:
				if($this->_computerhand == $this->HANDS[0]) {
					return 1;
				}
				if($this->_computerhand == $this->HANDS[1]) {
					return 0;
				}
				if($this->_computerhand == $this->HANDS[2]) {
					return -1;
				}
				break;
			//Scissor
			case $this->HANDS[2]:
				if($this->_computerhand == $this->HANDS[0]) {
					return -1;
				}
				if($this->_computerhand == $this->HANDS[1]) {
					return 1;
				}
				if($this->_computerhand == $this->HANDS[2]) {
					return 0;
				}
				break;
		}
	}
}
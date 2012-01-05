<?php

require_once('rps.class.php');

function main() {
	start();
	while(1) {
		$line = input();
		if($line !== '0' && $line !== '1' && $line !== '2') {
			break;
		}
		
		$rps = new RPS('グー', 'パー', 'チョキ');
		$rps->setPlayerHand($rps->HANDS[$line]);
		$rps->setComputerHand();
		output($rps->getPlayerHand(), $rps->getComputerHand(), $rps->judge());
	}
	stop();
};

function start() {
	println('===============');
	println('PHPじゃんけん');
	println('===============');
	println();
}

function stop() {
	println('また遊んでね！(^_^)/~');
	println();
}

function input() {
	println('あなたの手を入力してね！');
	println('[0] グー');
	println('[1] パー');
	println('[2] チョキ');
	println('[他] 終了');
	print('>');
	return trim(fgets(STDIN));
}

function output($playerhand, $computerhand, $judge) {
	println('あなたの手:' . $playerhand);
	println('コンピュータの手:' . $computerhand);
	if($judge == 1) {
		println('かった');
		println();
	}
	if($judge == 0) {
		println('あいこ');
		println();
	}
	if($judge == -1) {
		println('まけた');
		println();
	}
}

function println($message = '', $color = null) {
	print($message.PHP_EOL);
}

main();
<?php

require_once('lib/lime.php');
require_once('rps.class.php');

$t = new lime_test();
$rps = new RPS();

//$t->diag('Stack Test');
$t->isa_ok($rps, 'RPS', 'RPSクラスのインスタンス化');

$t->can_ok($rps, 'setPlayerHand', 'setPlayerHandの存在');

$rps->setPlayerHand($rps->HANDS[0]);
$t->is($rps->getPlayerHand(), $rps->HANDS[0], 'setPlayerHandの利用1');
$rps->setPlayerHand($rps->HANDS[1]);
$t->is($rps->getPlayerHand(), $rps->HANDS[1], 'setPlayerHandの利用2');
$rps->setPlayerHand($rps->HANDS[2]);
$t->is($rps->getPlayerHand(), $rps->HANDS[2], 'setPlayerHandの利用3');

$t->can_ok($rps, 'setComputerHand', 'setComputerHandの存在');

$rps->setComputerHand();
$t->ok(in_array($rps->getComputerHand(), $rps->HANDS), 'setComputerHandの利用');

$t->can_ok($rps, 'judge', 'judgeの存在');

$rps->setPlayerHand($rps->HANDS[0]);
$rps->setComputerHand($rps->HANDS[0]);
$t->is($rps->judge(), 0,'judgeの利用-payer:rock computer:rock');
$rps->setPlayerHand($rps->HANDS[0]);
$rps->setComputerHand($rps->HANDS[1]);
$t->is($rps->judge(), -1,'judgeの利用-payer:rock computer:paper');
$rps->setPlayerHand($rps->HANDS[0]);
$rps->setComputerHand($rps->HANDS[2]);
$t->is($rps->judge(), 1,'judgeの利用-payer:rock computer:scissor');

$rps->setPlayerHand($rps->HANDS[1]);
$rps->setComputerHand($rps->HANDS[0]);
$t->is($rps->judge(), 1,'judgeの利用-payer:paper computer:rock');
$rps->setPlayerHand($rps->HANDS[1]);
$rps->setComputerHand($rps->HANDS[1]);
$t->is($rps->judge(), 0,'judgeの利用-payer:paper computer:paper');
$rps->setPlayerHand($rps->HANDS[1]);
$rps->setComputerHand($rps->HANDS[2]);
$t->is($rps->judge(), -1,'judgeの利用-payer:paper computer:scissor');

$rps->setPlayerHand($rps->HANDS[2]);
$rps->setComputerHand($rps->HANDS[0]);
$t->is($rps->judge(), -1,'judgeの利用-payer:scissor computer:rock');
$rps->setPlayerHand($rps->HANDS[2]);
$rps->setComputerHand($rps->HANDS[1]);
$t->is($rps->judge(), 1,'judgeの利用-payer:scissor computer:paper');
$rps->setPlayerHand($rps->HANDS[2]);
$rps->setComputerHand($rps->HANDS[2]);
$t->is($rps->judge(), 0,'judgeの利用-payer:scissor computer:scissor');
//$t->ok('isEmpty' == 'isEmpty1', 'isEmpty');
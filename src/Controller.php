<?php 
	namespace Chirkov402\coldhot\Controller;
    use function Chirkov402\coldhot\View\showGame;
    
    function startGame() {
        echo "Game started".PHP_EOL;
        showGame();
    }
?>
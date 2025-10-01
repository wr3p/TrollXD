<?php

namespace wr3p\trollxd\trolls;

use pocketmine\player\Player;
use wr3p\trollxd\Troll;

class FakeBan extends Troll{

	public function action(Player $victim, Player $troll): void{
		parent::action($victim, $troll);

		if($victim->isOnline()){
			$victim->kick($this->getDescription(), null, $this->getDescription());
		}
	}
}

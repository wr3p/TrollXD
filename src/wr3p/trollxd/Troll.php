<?php

namespace wr3p\trollxd;

use pocketmine\player\Player;
use wr3p\trollxd\manager\message\MessageContainer;
use wr3p\trollxd\manager\troll\TrollManager;

class Troll{

	private TrollManager $manager;

	private string $name;
	private string $key;
	private string $description;

	public function __construct(TrollManager $manager, string $name, string $key){
		$this->manager = $manager;
		$this->name = $name;
		$this->key = $key;
		$this->description = (new MessageContainer("DESCRIPTIONS_TROLL_" . $key, []))->getMessage();
	}

	public function getName(): string{
		return $this->name;
	}

	public function getKey(): string{
		return $this->key;
	}

	public function getDescription(): ?string{
		return $this->description;
	}

	public function getManager(): TrollManager{
		return $this->manager;
	}

	public function action(Player $victim, Player $troll): void{
		# send log etc
	}
}

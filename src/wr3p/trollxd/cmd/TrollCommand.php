<?php

namespace wr3p\trollxd\cmd;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use wr3p\trollxd\Loader;
use wr3p\trollxd\manager\troll\TrollManager;

class TrollCommand extends Command{

	private Loader $plugin;

	public function __construct(
		Loader $plugin
	){
		$this->plugin = $plugin;

		parent::__construct(
			"trollxd",
			"Troll command",
			"/troll <playerName>",
			["troll"]
		);

		$this->setPermission("trollxd.command.permission");
	}

	public function execute(CommandSender $sender, string $commandLabel, array $args): void{
		// TODO TrollCommand::execute(...)...
	}

	public function getOwningPlugin(): Loader{
		return $this->plugin;
	}
}

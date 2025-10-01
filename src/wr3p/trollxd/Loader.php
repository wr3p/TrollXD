<?php

namespace wr3p\trollxd;

use pocketmine\plugin\PluginBase;
use wr3p\trollxd\cmd\TrollCommand;
use wr3p\trollxd\manager\message\MessageManager;
use wr3p\trollxd\manager\troll\TrollManager;

class Loader extends PluginBase{

	private static ?self $instance = null;

	public function onLoad(): void{
		self::$instance = $this;
	}

	protected function onEnable(): void{
		# resources
		$this->saveDefaultConfig();
		$this->saveResource("messages.json");

		# managers
		new MessageManager($this);
		new TrollManager($this);

		# cmd
		$this->getServer()->getCommandMap()->register("trollxd", new TrollCommand($this));
	}

	protected function onDisable(): void{}

	public static function getInstance(): self{
		return self::$instance;
	}
}

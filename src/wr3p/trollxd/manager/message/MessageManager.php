<?php

namespace wr3p\trollxd\manager\message;

use pocketmine\utils\SingletonTrait;
use wr3p\trollxd\Loader;

class MessageManager{
	use SingletonTrait;

	private Loader $plugin;
	private array $messages;

	public function __construct(Loader $plugin){
		$this->plugin = $plugin;
		$this->load();
	}

	public function load(): void{
		$this->messages = json_decode(file_get_contents($this->plugin->getDataFolder() . "messages.json"), true);
		self::setInstance($this);
	}

	public function getAll(): array{
		return $this->messages;
	}

	public function get(MessageContainer $container): string{
		$key = $container->getKey();
		$message = $this->messages[$key] ?? "Message ($key) not found";

		foreach($container->getArgs() as $arg => $val){
			$message = str_replace("{" . $arg . "}", (string) $val, $message);
		}

		return $message;
	}
}

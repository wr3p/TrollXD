<?php

namespace wr3p\trollxd\manager\troll;

use pocketmine\utils\SingletonTrait;
use wr3p\trollxd\Loader;
use wr3p\trollxd\Troll;
use wr3p\trollxd\trolls\FakeBan;

class TrollManager{
	use SingletonTrait;

	const TROLL_FAKEBAN = "FAKEBAN";
	const TROLL_FAKEOP = "FAKEOP";
	const TROLL_ANTICHEAT = "ANTICHEAT";
	const TROLL_FLIP = "FLIP";

	private Loader $plugin;
	private array $trolls = [];

	public function __construct(Loader $plugin){
		$this->plugin = $plugin;
		$this->load();
	}

	public function load(): void{
		$this->trolls[self::TROLL_FAKEBAN] = new FakeBan($this, "Fake Ban", self::TROLL_FAKEBAN);
		self::setInstance($this);
	}

	public function getAll(): array{
		return $this->trolls;
	}

	public function get(string $key): ?Troll{
		return $this->trolls[$key] ?? null;
	}
}

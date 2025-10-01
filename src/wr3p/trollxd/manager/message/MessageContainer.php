<?php

namespace wr3p\trollxd\manager\message;

class MessageContainer{

	private string $key;
	private array $args;

	public function __construct(string $key, array $args){
		$this->key = $key;
		$this->args = $args;
	}

	public function __toString(): string{
		return $this->getMessage();
	}

	public function getMessage(): string{
		return MessageManager::getInstance()->get($this);
	}

	/**
	 * @return string
	 */
	public function getKey(): string{
		return $this->key;
	}

	/**
	 * @return array
	 */
	public function getArgs(): array{
		return $this->args;
	}
}

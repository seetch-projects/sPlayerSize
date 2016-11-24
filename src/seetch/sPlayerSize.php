<?php

namespace seetch;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\Config;

use pocketmine\Player;
use pocketmine\entity\Entity;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerRespawnEvent;

class sPlayerSize extends PluginBase implements Listener {

	public $config;

	public function onEnable() {
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		 if(!is_dir($this->getDataFolder())) @mkdir($this->getDataFolder());
        $this->saveResource("config.yaml");
        $this->getLogger()->info("§2▪ §fПлагин включен!");
        $this->config = (new Config($this->getDataFolder() . "config.yaml"))->getAll();
	}

	public function size(PlayerJoinEvent $ev) {
		$ev->getPlayer()->setDataProperty(Entity::DATA_SCALE, Entity::DATA_TYPE_FLOAT, $this->config["playerSize"]);
	}

	public function size2(PlayerRespawnEvent $ev) {
		$ev->getPlayer()->setDataProperty(Entity::DATA_SCALE, Entity::DATA_TYPE_FLOAT, $this->config["playerSize"]);
	}

}
<?php

namespace Coolfly\Main;

use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\utils\TextFormat;

class Main extends PluginBase{
	
	public function __construct(Main $main){
		parent::__construct($main, "fly", "Enable yourself or someone else to fly", ["fly"]);
	}

	public function execute(CommandSender $sender, string $commandLabel, array $args) : boool{
		if (!sender instanceof Player){
			$sender->sendMessage(Main::PREFIX . TextFormat::GOLD . "Use this command in-game!");
			return false;
		}
		if(!$sender->hasPermission("fly.use")){
			$sender->sendMessage(self::NO_PERMISSION)
			return false;
		}
		if(empty($args[0])){
				if(!sender->isCreative()){
					   $sender->sendMessage($sender->getAllowFlight() === false ? Main::PREFIX . TextFormat::RED . "You may no longer fly");
					   $sender->setAllowFlight($sedner->getAllowFlight() === false ? true : false);
					
				}else{
					   $sender->sendMessage(Main::PREFIX . TextFormat::RED . "You can only use this command in survival");
					   return false;
				}
				return false;
		}
		if(API::getMainInstance()->getServer()->getPlayer($args[0]);
				$player = API::getMainInstance()->getServer()->getPlayer($args[0]);
				if($player->isCreative()){
						$player->sendMessage($player->getAllowFlight() === false ? Main::PREFIX . TextFormat::GOLD . "You may now fly!")
						$sedner->sendMessage($player->getAllowFlight() === Main::PREFIX . TextFormat::GOLD . "You allowed " . $player-getName() : Main:PREFIX . TextFormat . "You disabled fly for " . $player->getName());
						$player->setAllowFlight($player->getAllowFlight() === false ? true : false);
				}else{
						$sedner->sendMessage(Main::PREFIX . TextFormat::RED . $player->getName() . " is in creative mode");
						return false;
				}
			}
			return true;
	}
}
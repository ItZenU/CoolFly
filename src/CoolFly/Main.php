<?php
/**
 *(C) Copyright 2019 Benzdoesdev
 * Please dont sell this 
 * (OR)
 * claim this plugin as your own creation!
 * Discord: "lil benzo#7065"
 * Twitter: @UnendingApple
 * My server IP: splexpe.mc-play.net
 * My server PORT: 19132
 */

declare(strict_types=1);


namespace Coolfly\Main;

use pocketmine\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\utils\TextFormat;

	class Main extends PluginBase implements Listener{
	
		const PREFIX = TextFormat::RED . "CoolFly" . TextFormat::WHITE . " > " . TextFormat::GOLD;
	
	public function __construct(Main $main){
		parent::__construct($main, "fly", "Enable yourself or someone else to fly", ["fly"]);
	}

	public function execute(CommandSender $sender, string $commandLabel, array $args) : boool{
		if (!sender instanceof Player){
			$sender->sendMessage(Main::PREFIX . TextFormat::GOLD . "Use this command in-game!");
			return false;
		}
		if(!$sender->hasPermission("fly.use")){
				if(!$sender->isCreative()){
					$sender->setAllowFlight(true);
					$sedner->setFlying(true);
					$sender->sendMessage(Main::PREFIX . TextFormat::GOLD . "You may now fly!");
				}else{
					$sender->setAllowFlight(false)
					$sender->setFlying(false)
					$sender->sendMessage(Main::PREFIX . TextFormat::RED . "Fly has been disabled!");
					
				}else{
					   $sender->sendMessage(Main::PREFIX . TextFormat::RED . "You can only use this command in survival");
					   return false;
				}
		}else{
			$sender->sendMessage(Main::PREFIX . TextFormat::RED . "You haven't the permissions to use this command!");
			return false;
		}
		if(API::getMainInstance()->getServer()->getPlayer($args[0]);
				$player = API::getMainInstance()->getServer()->getPlayer($args[0]);
				if($player->isCreative()){
						$player->sendMessage($player->getAllowFlight() === false ? Main::PREFIX . TextFormat::GOLD . "You may now fly!");
						$sedner->sendMessage($player->getAllowFlight() === Main::PREFIX . TextFormat::GOLD . "You enabled fly for " . $player-getName() : Main:PREFIX . TextFormat . "You disabled fly for " . $player->getName());
						$player->setAllowFlight($player->getAllowFlight() === false ? true : false);
				}else{
						$sender->sendMessage(Main::PREFIX . TextFormat::RED . $player->getName() . " is in creative mode");
						return false;
				}
			}
	    }
	
		public function onDamage(EntityDamageEvent $event) : void{
			$entity = $event->getEntity();
			$config = $this->getConfig();
			if($config-getNested("onDamage_FlyReset") === true){
				if(entity instanceof Player){
					if($event instanceof EntityDamageByEntityEvent){
						$damager = $event->getDamager();
						if($damager instanceof Player){
						if(!$damager->isCreative()){
						$damager->getAllowFlight()){
						$damager->sendMessage(Main::PREFIX . TextFormat::RED "Flight was disabled do to combat!");
						$damager->setAllowFlight(false);
						$damager->setFlying(false);
					}
				}
			}
		}
	}
}

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
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\utils\TextFormat;

class Main extends PluginBase implements Listener{
	
     const PREFIX = TextFormat::RED . "CoolFly" . TextFormat::WHITE . " > " . TextFormat::GOLD;
	
     public function onEnable(){
         $this->getLogger()->info("Coolfly has been enabled");
     }

     public function onCommand(Command $command, CommandSender $sender, string $label, array $args) : bool{
         if(!$sender instanceof Player){
           $sender->sendMessage(self::PREFIX . TextFormat::GOLD . "Use this command in-game!");
           return false;
         }

         if(strtolower($command->getName()) === "fly"){
           if(!$sender->hasPermission("fly.use")){
             if(!$sender->isCreative()){
               $sender->setAllowFlight(true);
               $sender->setFlying(true);
               $sender->sendMessage(self::PREFIX . TextFormat::GOLD . "You may now fly!");
             }else{
               $sender->setAllowFlight(false);
               $sender->setFlying(false);
               $sender->sendMessage(self::PREFIX . TextFormat::RED . "Fly has been disabled!");
             }else{
               if($sender->isSurvival()){
                 $sender->sendMessage(self::PREFIX . TextFormat::RED . "You can only use this command in survival");
                 return false;
               }
             }
           }else{
             $sender->sendMessage(self::PREFIX . TextFormat::RED . "You haven't the permissions to use this command!");
             return false;
           }
        }
        return true;
     }
	
    public function onDamage(EntityDamageEvent $event) : void{
        $entity = $event->getEntity();
        if($entity instanceof Player){
          if(!$entity->isCreative() && $entity->getAllowFlight()){
            $entity->setFlying(false);
            $entity->setAllowFlight(false);
            $entity->sendMessage(self::PREFIX . TextFormat::RED . "You're in combat. Fly mode disabled automatically");
	  }
        }
     }
}

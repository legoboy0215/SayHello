<?php

  namespace SayHello;
  
  use pocketmine\plugin\PluginBase;
  use pocketmine\utils\TextFormat as TF;
  use pocketmine\command\Command;
  use pocketmine\command\CommandSender;
  use pocketmine\Player;
  
  class Main extends PluginBase{
    
    public function onEnable() {
    }
    
    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args) {
      if($cmd->getName() === "hello") {
        if(!(isset($args[0])) {
          $sender->sendMessage(TF::RED . "Error: not enough args. Usage: /hello <player>");
          return true;
        }else{
          $sender_name = $sender->getName();
          $player = $this->getServer()->getPlayer($args[0]);
          if($player === null) {
            $sender->sendMessage(TF::RED . "Player " . $args[0] . " is not online.");
          }else{
            $player_name = $player->getName();
            $player->sendMessage(TF::YELLOW . $sender_name . " says hello to you!");
            $this->getServer()->broadcastMessage(TF::LIGHT_PURPLE . $sender_name . " said hello to " . $player_name . "!");
            $sender->sendMessage(TF::GREEN . "Success!");
            return true;
          }
        }
      }
    }
  }

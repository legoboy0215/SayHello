<?php
  namespace SayHello;
  use pocketmine\plugin\PluginBase;
  use pocketmine\event\Listener;
  use pocketmine\utils\TextFormat as TF;
  use pocketmine\command\Command;
  use pocketmine\command\CommandSender;
  use pocketmine\command\CommandExecutor;
  use pocketmine\Player;
  class Main extends PluginBase implements Listener {
    public function onEnable() {
      $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args) {
      if($cmd->getName() === "warn") {
        if(!(isset($args[0])) {
          $sender->sendMessage(TF::RED . "Error: not enough args. Usage: /hello <player>");
          return true;
        } else {
          $sender_name = $sender->getName();
          $player = $this->getServer()->getPlayer($args[0]);
          if($player === null) {
            $sender->sendMessage(TF::RED . "Player " . $player . " could not be found.");
          } else {
            $player_name = $player->getName();
            unset($args[0]);
            $reason = implode(" ", $args);
            $player->sendMessage(TF::YELLOW . " . $sender_name . " says hello to you!");
            $this->getServer()->broadcastMessage(TF::LIGHT_PURPLE . $sender_name . " said hello to " . $player_name . " "!");
            $sender->sendMessage(TF::GREEN . "Success");
            return true;
          }
        }
      }
    }
  }
?>

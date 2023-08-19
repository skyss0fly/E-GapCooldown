<?php

namespace skyss0fly\E-GapCooldown;

use pocketmine\{event\Listener, plugin\PluginBase, item\GoldenAppleEnchanted, event\player\PlayerItemUseEvent, event\player\PlayerItemConsumeEvent, inventory\PlayerInventory};

class Main extends PluginBase implements Listener {
private $cooldowns = [];
  
public function onLoad():void {
$this->saveDefaultConfig();
  
}
public function onConsume(PlayerItemConsumeEvent $consumer, GoldenAppleEnchanted $egap) {
 $cooldown = $this->getConfig()->get("Cooldown");
   $currentTime = time();
$item = $player->getInventory()->getItemInHand();
  if ($item === $egap){
    $this->cooldowns[$player->getName()] = $currentTime + $cooldown;
                if (isset($this->cooldowns[$player->getName()]) && $this->cooldowns[$player->getName()] > $currentTime) {
                    $remainingTime = $this->cooldowns[$player->getName()] - $currentTime;
                    $sender->sendMessage("§cError: still in timeout. Remaining time: " . $remainingTime . " seconds.");
                    return false;
                }
  }
  else {

    // noop

  }

}
}







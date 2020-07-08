<?php
namespace pvpproject\teampvp;

use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\Server;
use pocketmine\block\Block;
use pocketmine\event\block\{BlockBreakEvent, BlockPlaceEvent};
use pocketmine\utils\Config;
use pocketmine\level\Level;
use pocketmine\level\Position;
use pocketmine\math\Vector3;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\form\Form;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\inventory\InventoryPickupItemEvent;
use pocketmine\item\Item;
use pocketmine\event\player\PlayerDropItemEvent;
use pocketmine\entity\object\ItemEntity;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\scheduler\Task;
use pocketmine\event\player\PlayerChatEvent;

class Main extends PluginBase implements Listener
{

  private $config;
  private $config2;
  private $config3;

    public function onEnable()
    {
        $this->getLogger()->notice("----------------------");
        $this->getLogger()->notice("teampvp plugin is enable.");
        $this->getLogger()->notice("----------------------");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->config = new Config($this->getDataFolder() . "xyz.yml", Config::YAML);
        $this->config2 = new Config($this->getDataFolder() . "red.yml", Config::YAML);
        $this->config3 = new Config($this->getDataFolder() . "blue.yml", Config::YAML);
    



    }


      


    

    public function onDisable()
    {
      $this->config->save();
      $this->config2->save();
      $this->config3->save();


    }
}

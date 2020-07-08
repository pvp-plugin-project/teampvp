<?php
namespace pvpproject\teampvp;

use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
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
    
    public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool
    {

        if(!$sender instanceof Player){
          $sender->sendMessage("§cゲーム内で実行してください");
          return true;
        }

        $name = $sender->getName();

        switch($label){

          case 'teampvp':
          if (($args[0]) === 'join') 
          {
            $rand = mt_rand(1,2);
            if ($rand === '1') 
            {
              $this->config2->set($name);
              $sender->sendMessage("§l§e[TeamPVP]赤チームになりました!");
            }else{
              $this->config3->set($name);
              $sender->sendMessage("§l§e[TeamPVP]青チームになりました!");
            }
          }
          
           break;                    
                
        }

        return true;     
    }

      
      public function onquit(PlayerQuitEvent $event)
      {
      $player = $event->getPlayer();
      $name   = $event->getPlayer()->getName();
         if ($this->config2->exists($name)) 
         {
           $this->config2->remove($name);
           $this->config2->save();
           return true;
         }
         if ($this->config3->exists($name)) 
         {
           $this->config3->remove($name);
           $this->config3->save();
         }

      }


    

    public function onDisable()
    {
      $this->config->save();
      $this->config2->save();
      $this->config3->save();


    }
}

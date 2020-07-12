<?php
namespace pvpproject\teampvp\Task;

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

class gamestartTask extends Task
{
	private $owner;
	private $player;
	private $second;

}
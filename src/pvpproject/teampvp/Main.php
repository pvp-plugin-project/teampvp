<?php

namespace pvpproject\teampvp;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\math\Vector3;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener
{

	private $config;
	private $config2;
	private $config3;
	private $config4;

	public function onEnable()
	{
		$this->getLogger()->notice("----------------------");
		$this->getLogger()->notice("teampvp plugin is enable.");
		$this->getLogger()->notice("----------------------");
		$this->getServer()->getPluginManager()->registerEvents($this, $this);

		(new PlayerData($this));

	}

	public function onjoin(PlayerJoinEvent $event)
	{

	}

	public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool
	{

		if (!$sender instanceof Player) {
			$sender->sendMessage("§cゲーム内で実行してください");
			return true;
		}

		$name = $sender->getName();

		switch ($command->getName()) {

			case 'teampvp':
				if (!$this->config4->exists($name)) {


					if (($args[0]) === 'join') {
						$rand = mt_rand(1, 2);
						if (!PlayerData::get()->isplayer($name) === false) {
							if ($rand === 1) {
								PlayerData::get()->setteam($name, "red");
								$sender->sendMessage("§l§e[TeamPVP]赤チームになりました!");
								PlayerData::get()->save();
								return true;
							} elseif ($rand === 2) {
								PlayerData::get()->setteam($name, "blue");
								$sender->sendMessage("§l§e[TeamPVP]青チームになりました!");
								PlayerData::get()->save();
								return true;
							}
						} else {
							$sender->sendMessage("§4[エラー]あなたはすでに試合に参加しています。試合から退出したい場合は一度サーバーから退室し、再度お入りください。");
						}
						break;
					}
					return true;
				}
		}
	}

	public function onquit(PlayerQuitEvent $event)
	{
		$player = $event->getPlayer();
		$name = $player->getName();
		PlayerData::get()->removeteam($name);
		PlayerData::get()->save();
	}


	public function onDisable()
	{
		$this->config->save();
	}
}

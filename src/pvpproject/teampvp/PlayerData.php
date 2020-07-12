<?php


namespace pvpproject\teampvp;


use pocketmine\utils\Config;

class PlayerData
{
	private static $instance;

	public function __construct($plugin)
	{
		$this->playerdata = new Config($plugin->getDataFolder() . "PlayerData.yml", Config::YAML);
		$this->plugin = $plugin;
		self::$instance = $this;
	}

	public static function get(): self
	{
		return self::$instance;
	}

	public function register(string $name, string $team)
	{
		$this->playerdata->set("$name");
		$config = $this->playerdata->get("$name");
		$this->$config->set($name, [
			"team" => $team,
		]);
	}

	public function getteam(string $name)
	{
		$data = $this->playerdata->get($name);
		return $data["team"];
	}

	public function setteam(string $name, string $team)
	{
		$data = $this->playerdata->get($name);
		$data["team"] = $team;
		$this->playerdata->set($name, $team);
	}

	public function removeteam(string $name)
	{
		$this->playerdata->remove($name);
	}

	public function isplayer(string $name)
	{
		return $this->playerdata->exists($name);
	}

	public function save()
	{
		$this->playerdata->save();
	}
}


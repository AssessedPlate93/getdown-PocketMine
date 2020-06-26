<?php

declare(strict_types=1);

namespace getdown;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;

class getdown extends PluginBase implements Listener{

    /*** edit in propeties spawn protection to "-1" ***/
    public $config;
    public $prefix = "[ GetDown ]";
    public $commands[]; 
    public $arenas[];  
    public $mode = 0;
    public $messages; 
    public $setupModeAction = "";
    public $GetDownMapName;
    
    public function onEnable(){
        $this->getLogger()->info("Loading GetDown Plugin..");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->config = (new Config($this->getDataFolder() . "config.yml"));
        $this->loadArenas();
        $this->registerEvents();
        $this->registerCommands();
        $this->getLogger()->info("Loading GetDown Plugin..");
    }
    
    /*** TO-DO: Find Better Method for @mkdir ***/
    public function loadArenas(){
      @mkdir($this->getDataFolder());
        if(!file_exist($this->getDataFolder() . "config.yml")){
          $config = new Config($this->getDataFolder() . "config.yml", Config::YAML, [
            "Gametime" => 500,
            "Waittime" => 50,
            "PlayersPerGame" => 4,
            "FinalPosition" => 20
          ]);
        }
      if(!file_exists($this->getDataFolder() . "temp_match_data.json"));
          $temp = new Config($this->getDataFolder() . "temp_match_data.json", Config::JSON);
    }
}
    /*** TO-DO: Add Functions "LoadArenas-private, registerEvents-public, registerCommands-public" ***/
    
    
<?php

declare(strict_types=1);

namespace SmallkingDev\AlwaysDay;

use pocketmine\event\EventPriority;
use pocketmine\event\server\DataPacketSendEvent;
use pocketmine\network\mcpe\protocol\SetTimePacket;
use pocketmine\plugin\PluginBase;
use pocketmine\world\World;

final class Main extends PluginBase {

	public function onEnable() : void {
		$this->getServer()->getPluginManager()->registerEvent(DataPacketSendEvent::class, function(DataPacketSendEvent $event) : void {
			foreach ($event->getPackets() as $packet) {
				if ($packet instanceof SetTimePacket) {
					$packet->time = World::TIME_DAY;
				}
			}
		}, EventPriority::HIGHEST, $this);
	}
}

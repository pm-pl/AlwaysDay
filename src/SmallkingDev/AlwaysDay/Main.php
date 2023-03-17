<?php

declare(strict_types=1);

namespace SmallkingDev\AlwaysDay;

use muqsit\simplepackethandler\SimplePacketHandler;
use pocketmine\network\mcpe\NetworkSession;
use pocketmine\network\mcpe\protocol\SetTimePacket;
use pocketmine\plugin\PluginBase;
use pocketmine\world\World;

final class Main extends PluginBase {

	public function onEnable(): void {
		SimplePacketHandler::createInterceptor($this)
			->interceptOutgoing(function (SetTimePacket $packet, NetworkSession $target): bool {
				$packet->time = World::TIME_DAY;
				return true;
			});
	}
}

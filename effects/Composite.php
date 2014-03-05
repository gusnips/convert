<?php
namespace gusnips\convert\effects;

use gusnips\convert\Effect;

/**
 *
 * @author Gustavo Salomé <gustavonips@gmail.com>
 *
 */
class Composite extends Effect
{
	protected function command()
	{
		return "-tile -compose Hardlight";
	}
	protected function getCommandName()
	{
		$basePath=escapeshellarg($this->getAssetsPath().DIRECTORY_SEPARATOR.'texture_fabric.gif');
		return "composite {$basePath}";
	}
} 
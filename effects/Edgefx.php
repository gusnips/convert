<?php
namespace gusnips\convert\effects;

use gusnips\convert\Effect;

/**
 *
 * @author Gustavo Salomé <gustavonips@gmail.com>
 *
 */
class Edgefx extends Effect
{
	protected $template='{command} {options} {input} {output}  2>&1';
	protected function command()
	{
		return "-s 5 -m 100 -c overlay";
	}
	protected function getCommandName()
	{
		return $this->getScriptsPath().DIRECTORY_SEPARATOR."edgefx";
	}
} 
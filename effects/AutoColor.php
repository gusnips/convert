<?php
namespace gusnips\convert\effects;

use gusnips\convert\Effect;

/**
 *
 * @author Gustavo Salomé <gustavonips@gmail.com>
 *
 */
class AutoColor extends Effect
{
	protected $template='{command} {options} {input} {output}  2>&1';
	protected function command()
	{
		return "-m gamma -c separate";
	}
	protected function getCommandName()
	{
		return $this->getScriptsPath().DIRECTORY_SEPARATOR."autocolor";
	}
} 
<?php
namespace gusnips\convert\effects;

use gusnips\convert\Effect;

/**
 *
 * @author Gustavo Salomé <gustavonips@gmail.com>
 *
 */
class Splittone2 extends Effect
{
	protected $template='{command} {options} {input} {output}  2>&1';
	protected function command()
	{
		return "-sc gold -sa 30 -hc pink -ha 30 -m SH";
	}
	protected function getCommandName()
	{
		return $this->getScriptsPath().DIRECTORY_SEPARATOR."splittone1";
	}
} 
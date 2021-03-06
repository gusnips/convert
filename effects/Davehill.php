<?php
namespace gusnips\convert\effects;

use gusnips\convert\Effect;

/**
 *
 * @author Gustavo Salomé <gustavonips@gmail.com>
 *
 */
class Davehill extends Effect
{
	protected $template='{command} {options} {input} {output}  2>&1';
	protected function command()
	{
		return "";
	}
	protected function getCommandName()
	{
		return $this->getScriptsPath().DIRECTORY_SEPARATOR."davehilleffect";
	}
} 
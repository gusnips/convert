<?php
namespace gusnips\convert\effects;

use gusnips\convert\Effect;

/**
 *
 * @author Gustavo Salomé <gustavonips@gmail.com>
 *
 */
class Contrast extends Effect
{
	protected function command()
	{
		return "-sigmoidal-contrast 10x40%";
	}
} 
<?php
namespace gusnips\convert\effects;

use gusnips\convert\Effect;

/**
 *
 * @author Gustavo Salomé <gustavonips@gmail.com>
 *
 */
class Line extends Effect
{
	protected function command()
	{
		return "-colorspace gray \( +clone -blur 0x2 \) +swap -compose divide -composite -linear-stretch 5%x0%";
	}
} 
<?php
namespace gusnips\convert\effects;

use gusnips\convert\Effect;

/**
 * 
 * @author Gustavo Salomé
 *
 */
class Pencil extends Effect
{
	protected function command()
	{
		$pencil=escapeshellarg($this->getAssetsPath().DIRECTORY_SEPARATOR.'pencil_tile.gif');
		return "-colorspace gray \
			\( +clone -tile {$pencil} -draw \"color 0,0 reset\" \
			+clone +swap -compose color_dodge -composite \) \
			-fx 'u*.2+v*.8' ";
	}
} 
<?php
namespace gusnips\convert;
use Exception;
use yii;
use yii\base\Component;
use \Imagick;
class Convert extends Component
{
	public $compression=Imagick::COMPRESSION_JPEG;
	public $quality=85;
	public $format='png';
	
	/**
	 * 
	 * @param string $input path for the input file
	 * @param string $output path for the output file
	 * @param string $effect effect to convert. Choose one of the avaliables 
	 * @return boolean
	 */
	public function effect($input,$output,$effect)
	{
		$class=Effect::createEffect($effect,$input);
		return $class->convert($output);
	}
	
	/**
	 * 
	 * @param string $input path for the input file
	 * @param string $output path for the output file
	 * @param int $width new width for the image
	 * @param int $height new height for the image. Defaults to 0 which creates a proportional image  
	 * @return boolean wheter it was successful
	 */
	public function resize($input,$output,$width,$height=0)
	{
		$image = new Imagick($input);
		$image->setImageFormat($this->format);
		$image->setImageCompression($this->compression);
		$image->setImageCompressionQuality($this->quality);
		$image->resizeImage($width, $height, null, true);
		$return=$image->writeimage($output);
		$image->destroy();
		return $return;
	}
}
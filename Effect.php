<?php
namespace gusnips\convert;
use yii\base\Object;
use \Exception;

abstract class Effect extends Object
{
	private $_file;
	public static $effects=array(
		'contrast'=>'gusnips\convert\effects\Contrast',
		'vintage'=>'gusnips\convert\effects\Vintage',
		'vintage2'=>'gusnips\convert\effects\Vintage2',
		'vintage3'=>'gusnips\convert\effects\Vintage3',
		'autotone'=>'gusnips\convert\effects\AutoTone',
		'autocolor'=>'gusnips\convert\effects\AutoColor',
		'davehill'=>'gusnips\convert\effects\Davehill',
		'charcoal'=>'gusnips\convert\effects\Charcoal',
		'sketch'=>'gusnips\convert\effects\Sketch',
		'pencil'=>'gusnips\convert\effects\Pencil',
		'lines'=>'gusnips\convert\effects\Line',
		'edgefx'=>'gusnips\convert\effects\Edgefx',
		'composite'=>'gusnips\convert\effects\Composite',
		'splittone'=>'gusnips\convert\effects\Splittone',
		'splittone2'=>'gusnips\convert\effects\Splittone2',
	);
	public $lastResult;
	public $lastCommand;
	protected $template='{command} {input} {options} {output}  2>&1';
	
	abstract protected function command();
	
	public function __construct($file, $config=[])
	{
		$this->_file=$file;
		return parent::__construct($config);
	}
	public function getFile()
	{
		return $this->_file;
	}
	public function convert($output)
	{
		return $this->exec($this->command(),$output);
	}
	public static function createEffect($name,$file)
	{
		if(isset(self::$effects[$name]))
			$className=self::$effects[$name];
		elseif(file_exists(__DIR__.'/effects/'.ucfirst($name).'.php'))
			$className="gusnips\\convert\\effects\\".ucfirst($name);
		else
			throw new Exception('Invalid effect '.$name);
		/* @var $class Effect */
		$class=new $className($file);
		return $class;
	}

	protected function exec($cmd,$output)
	{	
		$input=escapeshellarg($this->getFile());
		$output=escapeshellarg($output);
		
		$cmd=strtr($this->template, array(
			'{command}'=>$this->getCommandName(),
			'{input}'=>$input,
			'{options}'=>$cmd,
			'{output}'=>$output,
		));
		$this->lastCommand=$cmd;
		$return=exec($cmd,$this->lastResult);
		return $return!==false;
	}
	
	protected function getAssetsPath()
	{
		return __DIR__.DIRECTORY_SEPARATOR.'assets';
	}
	protected function getScriptsPath()
	{
		return __DIR__.DIRECTORY_SEPARATOR.'scripts';
	}
	
	protected function getCommandName()
	{
		return 'convert';
	}
}
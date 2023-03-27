<?php
namespace GDO\Geo2Country\Method;

use GDO\Core\GDT;
use GDO\Core\Method;

final class TryApi extends Method
{

	public function execute(): GDT
	{
		return $this->templatePHP('try_api.php');
	}

}

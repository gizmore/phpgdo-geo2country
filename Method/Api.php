<?php
namespace GDO\Geo2Country\Method;

use GDO\Core\WithRateLimit;
use GDO\CountryCoordinates\Method\Detect;

/**
 * A wrapper for the detection api that does not require permissions.
 *
 * @author gizmore
 */
final class Api extends Detect
{

	use WithRateLimit;

	public function getPermission(): ?string
	{
		return null;
	}

}

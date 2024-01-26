<?php
namespace GDO\Geo2Country;

use GDO\Core\GDO_Module;
use GDO\Core\Method;
use GDO\Geo2Country\Method\Api;
use GDO\Geo2Country\Method\TryApi;
use GDO\UI\GDT_Link;
use GDO\UI\GDT_Page;

/**
 * Demo site for converting geoposition to country.
 *
 * @link https://geo2country.phpgdo.com/geo2country/tryapi
 *
 * @author gizmore
 * @version 7.0.2
 * @since 6.6.0
 */
final class Module_Geo2Country extends GDO_Module
{

	public int $priority = 100;

	public function isSiteModule(): bool { return true; }

    public function defaultMethod(): Method
    {
        return TryApi::make();
    }

	public function getDependencies(): array
	{
		return [
			'Account',
			'Admin',
			'Classic',
			'CountryCoordinates',
			'CSS',
			'FontAwesome',
			'Javascript',
			'Login',
			'News',
			'Perf',
			'Recovery',
			'Register',
		];
	}

	public function onLoadLanguage(): void
	{
		$this->loadLanguage('lang/geo2country');
	}

	public function onInitSidebar(): void
	{
        GDT_Page::instance()->topBar()->addField(
            GDT_Link::make()->href(href('Geo2Country', 'TryApi'))->text('sitename'));
		GDT_Page::instance()->rightBar()->addFieldFirst(
			GDT_Link::make('link_geo2ctry_try_api')->href(
				href('Geo2Country', 'TryApi')));
	}

}

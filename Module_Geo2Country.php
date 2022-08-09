<?php
namespace GDO\Geo2Country;

use GDO\Core\GDO_Module;
use GDO\UI\GDT_Link;
use GDO\UI\GDT_Page;

/**
 * Demo site for converting geoposition to country.
 * 
 * @link https://geo2country.gizmore.org
 * 
 * @author gizmore
 * @version 7.0.1
 * @since 6.6.0
 */
final class Module_Geo2Country extends GDO_Module
{
    public int $priority = 100;
    
    public function isSiteModule() : bool { return true; }
	
	public function getDependencies() : array
	{
	    return [
	    	'Admin',
	    	'Classic',
	    	'CountryCoordinates',
	    	'FontAwesome',
	    	'Login',
	    	'News',
	    	'Register',
	    	'Recovery',
	    ];
	}
    
    public function onLoadLanguage() : void
    {
    	$this->loadLanguage('lang/geo2country');
    }
    
    public function onInitSidebar() : void
    {
        GDT_Page::instance()->topBar()->addField(
            GDT_Link::make('link_geo2ctry_try_api')->href(
                href('Geo2Country', 'TryApi')));
    }
    
}

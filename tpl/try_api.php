<?php
namespace GDO\Geo2Country\tpl;
use GDO\UI\GDT_Panel;
use GDO\UI\GDT_Link;
use GDO\UI\GDT_Menu;
use GDO\UI\GDT_Button;

$example_href = href('Geo2Country', 'Api', "&p_lat=50.0&p_lng=10.0&_fmt=json");
$link = GDT_Link::make('geoapi_link_example')->href($example_href);

echo GDT_Panel::make()->title(t('geoapi_info_title'))->text('geoapi_info_text', [$link->render()])->render();

$menu = GDT_Menu::make()->addFields(
	GDT_Button::make('btn_your_location')->href(href('Geo2Country', 'ApiForm')),
);


echo GDT_Panel::make()->textRaw($menu->render())->render();

echo GDT_Panel::make()->text('geoapi_coming_soon')->render();

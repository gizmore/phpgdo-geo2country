<?php
namespace GDO\Geo2Country\Method;

use GDO\Form\GDT_Form;
use GDO\Form\MethodForm;
use GDO\Form\GDT_Submit;
use GDO\Form\GDT_AntiCSRF;
use GDO\Maps\GDT_Position;
use GDO\CountryCoordinates\Method\Detect;
use GDO\Core\GDT_Tuple;

/**
 * The Geo2Country API as a form to test.
 * @author gizmore
 * @version 7.0.1
 */
final class ApiForm extends MethodForm
{
	public function createForm(GDT_Form $form): void
	{
		$form->addFields(
			GDT_Position::make('p')->defaultCurrent(),
			GDT_AntiCSRF::make(),
		);
		$form->actions()->addField(GDT_Submit::make());
	}
	
	public function formValidated(GDT_Form $form)
	{
		$response = GDT_Tuple::make();
		$response->addField(Detect::make()->execute());
		$response->addField($this->renderPage());
		return $response;
	}

}

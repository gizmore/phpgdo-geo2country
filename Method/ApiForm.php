<?php
namespace GDO\Geo2Country\Method;

use GDO\Core\GDT;
use GDO\Core\GDT_Tuple;
use GDO\CountryCoordinates\Method\Detect;
use GDO\Form\GDT_AntiCSRF;
use GDO\Form\GDT_Form;
use GDO\Form\GDT_Submit;
use GDO\Form\MethodForm;
use GDO\Maps\GDT_Position;

/**
 * The Geo2Country API as a form to test.
 *
 * @version 7.0.1
 * @author gizmore
 */
final class ApiForm extends MethodForm
{

    public function isUserRequired(): bool
    {
        return false;
    }

	protected function createForm(GDT_Form $form): void
	{
		$form->addFields(
			GDT_Position::make('p')->initialCurrent()->notNull(),
			GDT_AntiCSRF::make(),
		);
		$form->actions()->addField(GDT_Submit::make());
	}

	public function formValidated(GDT_Form $form): GDT
	{
		$response = GDT_Tuple::make();
		$response->addField(Detect::make()->appliedInputs($this->getInputs())->execute());
		$response->addField($this->renderPage());
		return $response;
	}

}

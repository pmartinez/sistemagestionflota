<?php

/**
 * SgfPasajero form base class.
 *
 * @method SgfPasajero getObject() Returns the current form's model object
 *
 * @package    SGF
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseSgfPasajeroForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'nombre'    => new sfWidgetFormInputText(),
      'direccion' => new sfWidgetFormInputText(),
      'hora'      => new sfWidgetFormDateTime(),
      'zona_id'   => new sfWidgetFormPropelChoice(array('model' => 'Zona', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorPropelChoice(array('model' => 'SgfPasajero', 'column' => 'id', 'required' => false)),
      'nombre'    => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'direccion' => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'hora'      => new sfValidatorDateTime(array('required' => false)),
      'zona_id'   => new sfValidatorPropelChoice(array('model' => 'Zona', 'column' => 'id')),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'SgfPasajero', 'column' => array('nombre')))
    );

    $this->widgetSchema->setNameFormat('sgf_pasajero[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SgfPasajero';
  }


}

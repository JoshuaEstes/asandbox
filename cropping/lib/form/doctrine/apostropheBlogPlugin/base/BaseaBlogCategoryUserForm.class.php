<?php

/**
 * aBlogCategoryUser form base class.
 *
 * @method aBlogCategoryUser getObject() Returns the current form's model object
 *
 * @package    cropping
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseaBlogCategoryUserForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'blog_category_id' => new sfWidgetFormInputHidden(),
      'user_id'          => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'blog_category_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('blog_category_id')), 'empty_value' => $this->getObject()->get('blog_category_id'), 'required' => false)),
      'user_id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('user_id')), 'empty_value' => $this->getObject()->get('user_id'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('a_blog_category_user[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'aBlogCategoryUser';
  }

}

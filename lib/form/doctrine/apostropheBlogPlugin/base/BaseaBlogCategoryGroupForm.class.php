<?php

/**
 * aBlogCategoryGroup form base class.
 *
 * @method aBlogCategoryGroup getObject() Returns the current form's model object
 *
 * @package    asandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseaBlogCategoryGroupForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'blog_category_id' => new sfWidgetFormInputHidden(),
      'group_id'         => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'blog_category_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('blog_category_id')), 'empty_value' => $this->getObject()->get('blog_category_id'), 'required' => false)),
      'group_id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('group_id')), 'empty_value' => $this->getObject()->get('group_id'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('a_blog_category_group[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'aBlogCategoryGroup';
  }

}

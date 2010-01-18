<?php

/**
 * aPage filter form base class.
 *
 * @package    cmstest
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseaPageFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'slug'           => new sfWidgetFormFilterInput(),
      'template'       => new sfWidgetFormFilterInput(),
      'is_published'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'view_is_secure' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'archived'       => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'author_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Author'), 'add_empty' => true)),
      'deleter_id'     => new sfWidgetFormFilterInput(),
      'engine'         => new sfWidgetFormFilterInput(),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'lft'            => new sfWidgetFormFilterInput(),
      'rgt'            => new sfWidgetFormFilterInput(),
      'level'          => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'slug'           => new sfValidatorPass(array('required' => false)),
      'template'       => new sfValidatorPass(array('required' => false)),
      'is_published'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'view_is_secure' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'archived'       => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'author_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Author'), 'column' => 'id')),
      'deleter_id'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'engine'         => new sfValidatorPass(array('required' => false)),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'lft'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'rgt'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'level'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('a_page_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'aPage';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'slug'           => 'Text',
      'template'       => 'Text',
      'is_published'   => 'Boolean',
      'view_is_secure' => 'Boolean',
      'archived'       => 'Boolean',
      'author_id'      => 'ForeignKey',
      'deleter_id'     => 'Number',
      'engine'         => 'Text',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
      'lft'            => 'Number',
      'rgt'            => 'Number',
      'level'          => 'Number',
    );
  }
}

<?php

/**
 * aBlogItem filter form base class.
 *
 * @package    asandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseaBlogItemFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'author_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Author'), 'add_empty' => true)),
      'page_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Page'), 'add_empty' => true)),
      'title'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'slug_saved'      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'excerpt'         => new sfWidgetFormFilterInput(),
      'status'          => new sfWidgetFormChoice(array('choices' => array('' => '', 'draft' => 'draft', 'pending review' => 'pending review', 'published' => 'published'))),
      'allow_comments'  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'template'        => new sfWidgetFormFilterInput(),
      'published_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'type'            => new sfWidgetFormFilterInput(),
      'start_date'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'end_date'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'slug'            => new sfWidgetFormFilterInput(),
      'editors_list'    => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardUser')),
      'categories_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'aBlogCategory')),
    ));

    $this->setValidators(array(
      'author_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Author'), 'column' => 'id')),
      'page_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Page'), 'column' => 'id')),
      'title'           => new sfValidatorPass(array('required' => false)),
      'slug_saved'      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'excerpt'         => new sfValidatorPass(array('required' => false)),
      'status'          => new sfValidatorChoice(array('required' => false, 'choices' => array('draft' => 'draft', 'pending review' => 'pending review', 'published' => 'published'))),
      'allow_comments'  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'template'        => new sfValidatorPass(array('required' => false)),
      'published_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'type'            => new sfValidatorPass(array('required' => false)),
      'start_date'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'end_date'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'slug'            => new sfValidatorPass(array('required' => false)),
      'editors_list'    => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardUser', 'required' => false)),
      'categories_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'aBlogCategory', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('a_blog_item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addEditorsListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query->leftJoin('r.aBlogEditor aBlogEditor')
          ->andWhereIn('aBlogEditor.user_id', $values);
  }

  public function addCategoriesListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query->leftJoin('r.aBlogItemCategory aBlogItemCategory')
          ->andWhereIn('aBlogItemCategory.blog_category_id', $values);
  }

  public function getModelName()
  {
    return 'aBlogItem';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'author_id'       => 'ForeignKey',
      'page_id'         => 'ForeignKey',
      'title'           => 'Text',
      'slug_saved'      => 'Boolean',
      'excerpt'         => 'Text',
      'status'          => 'Enum',
      'allow_comments'  => 'Boolean',
      'template'        => 'Text',
      'published_at'    => 'Date',
      'type'            => 'Text',
      'start_date'      => 'Date',
      'end_date'        => 'Date',
      'created_at'      => 'Date',
      'updated_at'      => 'Date',
      'slug'            => 'Text',
      'editors_list'    => 'ManyKey',
      'categories_list' => 'ManyKey',
    );
  }
}

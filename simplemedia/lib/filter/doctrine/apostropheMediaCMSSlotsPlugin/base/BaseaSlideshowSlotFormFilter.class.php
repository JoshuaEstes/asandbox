<?php

/**
 * aSlideshowSlot filter form base class.
 *
 * @package    cmstest
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseaSlideshowSlotFormFilter extends aSlotFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('a_slideshow_slot_filters[%s]');
  }

  public function getModelName()
  {
    return 'aSlideshowSlot';
  }
}
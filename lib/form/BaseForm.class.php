<?php

/**
 * Base project form.
 * 
 * @package    symfony
 * @subpackage form
 * @author     Your name here 
 * @version    SVN: $Id: BaseForm.class.php 20147 2009-07-13 11:46:57Z FabianLange $
 */
class BaseForm extends sfFormSymfony
{
  public function useFields(array $fields = array(), $ordered = true, $hidden = true)
  {
    $hidden = array();

    foreach ($this as $name => $field)
    {
      if ($field->isHidden() && $hidden)
      {
        $hidden[] = $name;
      }
      else if (!in_array($name, $fields))
      {
        unset($this[$name]);
      }
    }

    if ($ordered)
    {
      $this->widgetSchema->setPositions(array_merge($fields, $hidden));
    }
  }
}

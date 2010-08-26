<?php

/**
 * BaseaMediaItemCategory
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $media_item_id
 * @property integer $media_category_id
 * @property aMediaItem $aMediaItem
 * @property aMediaCategory $aMediaCategory
 * 
 * @method integer            getMediaItemId()       Returns the current record's "media_item_id" value
 * @method integer            getMediaCategoryId()   Returns the current record's "media_category_id" value
 * @method aMediaItem         getAMediaItem()        Returns the current record's "aMediaItem" value
 * @method aMediaCategory     getAMediaCategory()    Returns the current record's "aMediaCategory" value
 * @method aMediaItemCategory setMediaItemId()       Sets the current record's "media_item_id" value
 * @method aMediaItemCategory setMediaCategoryId()   Sets the current record's "media_category_id" value
 * @method aMediaItemCategory setAMediaItem()        Sets the current record's "aMediaItem" value
 * @method aMediaItemCategory setAMediaCategory()    Sets the current record's "aMediaCategory" value
 * 
 * @package    content
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseaMediaItemCategory extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('a_media_item_category');
        $this->hasColumn('media_item_id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'length' => 4,
             ));
        $this->hasColumn('media_category_id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'length' => 4,
             ));

        $this->option('symfony', array(
             'form' => false,
             'filter' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('aMediaItem', array(
             'local' => 'media_item_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('aMediaCategory', array(
             'local' => 'media_category_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));
    }
}
<?php

/**
 * BaseaMediaItem
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property enum $type
 * @property string $service_url
 * @property string $format
 * @property integer $width
 * @property integer $height
 * @property string $embed
 * @property string $title
 * @property string $description
 * @property string $credit
 * @property integer $owner_id
 * @property boolean $view_is_secure
 * @property sfGuardUser $Owner
 * @property Doctrine_Collection $Slots
 * @property Doctrine_Collection $aSlotMediaItem
 * @property Doctrine_Collection $MediaCategories
 * @property Doctrine_Collection $aMediaItemCategory
 * 
 * @method integer             getId()                 Returns the current record's "id" value
 * @method enum                getType()               Returns the current record's "type" value
 * @method string              getServiceUrl()         Returns the current record's "service_url" value
 * @method string              getFormat()             Returns the current record's "format" value
 * @method integer             getWidth()              Returns the current record's "width" value
 * @method integer             getHeight()             Returns the current record's "height" value
 * @method string              getEmbed()              Returns the current record's "embed" value
 * @method string              getTitle()              Returns the current record's "title" value
 * @method string              getDescription()        Returns the current record's "description" value
 * @method string              getCredit()             Returns the current record's "credit" value
 * @method integer             getOwnerId()            Returns the current record's "owner_id" value
 * @method boolean             getViewIsSecure()       Returns the current record's "view_is_secure" value
 * @method sfGuardUser         getOwner()              Returns the current record's "Owner" value
 * @method Doctrine_Collection getSlots()              Returns the current record's "Slots" collection
 * @method Doctrine_Collection getASlotMediaItem()     Returns the current record's "aSlotMediaItem" collection
 * @method Doctrine_Collection getMediaCategories()    Returns the current record's "MediaCategories" collection
 * @method Doctrine_Collection getAMediaItemCategory() Returns the current record's "aMediaItemCategory" collection
 * @method aMediaItem          setId()                 Sets the current record's "id" value
 * @method aMediaItem          setType()               Sets the current record's "type" value
 * @method aMediaItem          setServiceUrl()         Sets the current record's "service_url" value
 * @method aMediaItem          setFormat()             Sets the current record's "format" value
 * @method aMediaItem          setWidth()              Sets the current record's "width" value
 * @method aMediaItem          setHeight()             Sets the current record's "height" value
 * @method aMediaItem          setEmbed()              Sets the current record's "embed" value
 * @method aMediaItem          setTitle()              Sets the current record's "title" value
 * @method aMediaItem          setDescription()        Sets the current record's "description" value
 * @method aMediaItem          setCredit()             Sets the current record's "credit" value
 * @method aMediaItem          setOwnerId()            Sets the current record's "owner_id" value
 * @method aMediaItem          setViewIsSecure()       Sets the current record's "view_is_secure" value
 * @method aMediaItem          setOwner()              Sets the current record's "Owner" value
 * @method aMediaItem          setSlots()              Sets the current record's "Slots" collection
 * @method aMediaItem          setASlotMediaItem()     Sets the current record's "aSlotMediaItem" collection
 * @method aMediaItem          setMediaCategories()    Sets the current record's "MediaCategories" collection
 * @method aMediaItem          setAMediaItemCategory() Sets the current record's "aMediaItemCategory" collection
 * 
 * @package    asandbox
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7380 2010-03-15 21:07:50Z jwage $
 */
abstract class BaseaMediaItem extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('a_media_item');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => '4',
             ));
        $this->hasColumn('type', 'enum', null, array(
             'type' => 'enum',
             'notnull' => true,
             'values' => 
             array(
              0 => 'image',
              1 => 'video',
              2 => 'audio',
              3 => 'pdf',
             ),
             ));
        $this->hasColumn('service_url', 'string', 200, array(
             'type' => 'string',
             'length' => '200',
             ));
        $this->hasColumn('format', 'string', 10, array(
             'type' => 'string',
             'length' => '10',
             ));
        $this->hasColumn('width', 'integer', 4, array(
             'type' => 'integer',
             'length' => '4',
             ));
        $this->hasColumn('height', 'integer', 4, array(
             'type' => 'integer',
             'length' => '4',
             ));
        $this->hasColumn('embed', 'string', 1000, array(
             'type' => 'string',
             'length' => '1000',
             ));
        $this->hasColumn('title', 'string', 200, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '200',
             ));
        $this->hasColumn('description', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('credit', 'string', 200, array(
             'type' => 'string',
             'length' => '200',
             ));
        $this->hasColumn('owner_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => '4',
             ));
        $this->hasColumn('view_is_secure', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => false,
             ));

        $this->option('type', 'INNODB');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser as Owner', array(
             'local' => 'owner_id',
             'foreign' => 'id',
             'onDelete' => 'set null'));

        $this->hasMany('aSlot as Slots', array(
             'refClass' => 'aSlotMediaItem',
             'local' => 'media_item_id',
             'foreign' => 'slot_id'));

        $this->hasMany('aSlotMediaItem', array(
             'local' => 'id',
             'foreign' => 'media_item_id'));

        $this->hasMany('aMediaCategory as MediaCategories', array(
             'refClass' => 'aMediaItemCategory',
             'local' => 'media_item_id',
             'foreign' => 'media_category_id'));

        $this->hasMany('aMediaItemCategory', array(
             'local' => 'id',
             'foreign' => 'media_item_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $taggable0 = new Taggable();
        $sluggable0 = new Doctrine_Template_Sluggable(array(
             'fields' => 
             array(
              0 => 'title',
             ),
             'unique' => true,
             'builder' => 'aMediaItemTable::slugify',
             ));
        $this->actAs($timestampable0);
        $this->actAs($taggable0);
        $this->actAs($sluggable0);
    }
}
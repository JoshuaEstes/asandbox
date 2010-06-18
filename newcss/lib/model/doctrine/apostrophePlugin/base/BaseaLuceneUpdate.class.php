<?php

/**
 * BaseaLuceneUpdate
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $page_id
 * @property string $culture
 * @property aPage $Page
 * 
 * @method integer       getPageId()  Returns the current record's "page_id" value
 * @method string        getCulture() Returns the current record's "culture" value
 * @method aPage         getPage()    Returns the current record's "Page" value
 * @method aLuceneUpdate setPageId()  Sets the current record's "page_id" value
 * @method aLuceneUpdate setCulture() Sets the current record's "culture" value
 * @method aLuceneUpdate setPage()    Sets the current record's "Page" value
 * 
 * @package    symfony
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseaLuceneUpdate extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('a_lucene_update');
        $this->hasColumn('page_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));
        $this->hasColumn('culture', 'string', 7, array(
             'type' => 'string',
             'length' => 7,
             ));


        $this->index('page_and_culture_index', array(
             'fields' => 
             array(
              0 => 'page_id',
              1 => 'culture',
             ),
             ));
        $this->option('symfony', array(
             'form' => false,
             'filter' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('aPage as Page', array(
             'local' => 'page_id',
             'foreign' => 'id',
             'onDelete' => 'cascade'));
    }
}
<?php


class aBlogCategoryGroupTable extends PluginaBlogCategoryGroupTable
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('aBlogCategoryGroup');
    }
}
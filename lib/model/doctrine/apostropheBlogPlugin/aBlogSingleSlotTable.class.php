<?php

/**
 * aBlogSingleSlotTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class aBlogSingleSlotTable extends PluginaBlogSingleSlotTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object aBlogSingleSlotTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('aBlogSingleSlot');
    }
}
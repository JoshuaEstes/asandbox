<?php

/**
 * aMediaItemTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class aMediaItemTable extends PluginaMediaItemTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object aMediaItemTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('aMediaItem');
    }
}
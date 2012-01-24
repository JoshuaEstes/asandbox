<?php

require_once dirname(__FILE__) . '/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration {

    static protected $zendLoaded = false;

    static public function registerZend() {
        if (self::$zendLoaded) {
            return;
        }

        set_include_path(sfConfig::get('sf_lib_dir') . '/vendor/zend/library' . PATH_SEPARATOR . get_include_path());
        require_once sfConfig::get('sf_lib_dir') . '/vendor/zend/library/Zend/Loader/Autoloader.php';
        Zend_Loader_Autoloader::getInstance();
        self::$zendLoaded = true;
    }

    public function setup() {
        // ORDER IS SIGNIFICANT. sfDoctrinePlugin logically comes first followed by sfDoctrineGuardPlugin.
        // apostrophePlugin must precede apostropheBlogPlugin.
        $this->enablePlugins(array(
          'sfDoctrinePlugin',
          'sfDoctrineGuardPlugin',
          'sfDoctrineActAsTaggablePlugin',
          'sfTaskExtraPlugin',
          'sfWebBrowserPlugin',
          'sfFeed2Plugin',
          'sfSyncContentPlugin',
          'apostrophePlugin',
          'apostropheBlogPlugin',
        ));

        ProjectConfiguration::registerZend();
    }

}

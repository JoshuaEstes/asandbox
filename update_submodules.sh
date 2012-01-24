#/bin/bash
cd plugins

cd sfDoctrineGuardPlugin/
git fetch origin
git checkout master
git pull origin master

cd ../sfDoctrineActAsTaggablePlugin
git fetch origin
git checkout master
git pull origin master

cd ../sfSyncContentPlugin/
git fetch origin
git checkout master
git pull origin master

cd ../sfTaskExtraPlugin/
git fetch origin
git checkout master
git pull origin master

cd ../apostrophePlugin/
git fetch origin
git checkout 1.5
git pull origin 1.5

cd ../apostropheBlogPlugin/
git fetch origin
git checkout 1.5
git pull origin 1.5

cd ../sfFeed2Plugin/
git fetch origin
git checkout master
git pull origin master

cd ../sfWebBrowserPlugin/
git fetch origin
git checkout master
git pull origin master

cd ../../lib/vendor/symfony
git fetch origin
git checkout 1.4
git pull origin 1.4

cd ../../../

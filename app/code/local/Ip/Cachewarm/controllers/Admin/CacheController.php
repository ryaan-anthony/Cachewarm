<?php

include("Mage/Adminhtml/controllers/CacheController.php");
class Ip_Cachewarm_Admin_CacheController extends Mage_Adminhtml_CacheController
{

    public function warmAction()
    {

        if(!$sitemaps = Mage::getModel('sitemap/sitemap')->getCollection()){

            $this->_getSession()->addError(Mage::helper('adminhtml')->__("No sitemaps have been found, please generate one now."));

            $this->_redirect('*/sitemap/index');

            return;

        }

        $results = array();

        foreach($sitemaps as $sitemap){

            $file = Mage::getBaseDir('base').$sitemap->getSitemapPath().$sitemap->getSitemapFilename();

            $results[] = $file;

        }
        Mage::helper('cachewarm')->setMaps($results);

        $this->_getSession()->addSuccess(Mage::helper('adminhtml')->__("The cachewarmer has been queued."));

        $this->_redirect('*/*');

    }

}
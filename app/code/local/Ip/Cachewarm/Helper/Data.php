<?php

class Ip_Cachewarm_Helper_Data extends Mage_Core_Helper_Abstract
{
    protected $config_path = 'ip/cachewarm/sitemaps';

    public function getMaps()
    {
        if($config = Mage::getStoreConfig($this->config_path)){
            return json_decode($config);
        }
        return false;
    }

    public function setMaps($data)
    {
        Mage::getConfig()->saveConfig($this->config_path, json_encode($data));
        Mage::getConfig()->reinit();
        Mage::app()->reinitStores();
    }

    public function unsMaps()
    {
        Mage::getConfig()->deleteConfig($this->config_path);
    }

}
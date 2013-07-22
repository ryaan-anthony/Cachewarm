<?php

class Ip_Cachewarm_Helper_Data extends Mage_Core_Helper_Abstract
{
    protected $config_path = 'ip/cachewarm/sitemaps';

    public function getMaps()
    {
        return json_decode(Mage::getStoreConfig($this->config_path));
    }

    public function setMaps($data)
    {
        Mage::getModel('core/config')->saveConfig($this->config_path, json_encode($data));
    }

    public function unsMaps()
    {
        Mage::getModel('core/config')->deleteConfig($this->config_path);
    }


}
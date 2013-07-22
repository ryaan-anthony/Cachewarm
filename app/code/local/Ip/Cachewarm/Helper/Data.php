<?php

class Ip_Cachewarm_Helper_Data extends Mage_Core_Helper_Abstract
{
    protected $config_path = 'ip/cachewarm/sitemaps';

    public function getMaps()
    {
        $read = Mage::getSingleton('core/resource')->getConnection('core_read');
        $result = $read->query("select value from core_config_data where path = '{$this->config_path}'");
        if($row = $result->fetch(PDO::FETCH_ASSOC)){
            return $row['value'];
        }
        return false;
    }

    public function setMaps($data)
    {
        $write = Mage::getSingleton('core/resource')->getConnection('core_write');
        $write->query(
            "insert into core_config_data (path, value) values (?, ?)",
            array($this->config_path, json_encode($data))
        );
    }

    public function unsMaps()
    {
        $write = Mage::getSingleton('core/resource')->getConnection('core_write');
        $write->query("delete from core_config_data where path = '{$this->config_path}'");
    }


}
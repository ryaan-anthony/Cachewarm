<?php

class Ip_Cachewarm_Block_Cache extends Mage_Adminhtml_Block_Cache
{
    public function __construct()
    {
        parent::__construct();
        $message = Mage::helper('core')->__('Warming the cache executes a site crawler which will target all Google Sitemaps. Are you sure you want to continue?');

        $options = array(
            'label'     => Mage::helper('core')->__('Warm the Cache'),
            'onclick'   => 'confirmSetLocation(\''.$message.'\', \'' . $this->getCacheWarmerUrl() .'\')',
            'class'     => 'delete',
        );
        if(Mage::helper('cachewarm')->getMaps()){
            $options = array_merge(
                $options,
                array(
                    'class'     => 'disabled',
                    'disabled' => true,
                    'title' => 'Cache Warming in Progress'
                )
            );
        }

        $this->_addButton('cache_warmer', $options);
    }

    /**
     * Get url for cache warmer
     */
    public function getCacheWarmerUrl()
    {
        return $this->getUrl('*/*/warm');
    }


}
<?php

class Ip_Cachewarm_Model_Crawler
{

    public function cron()
    {
        if($files = Mage::helper('cachewarm')->getMaps()){
            Mage::helper('cachewarm')->unsMaps();
            foreach($files as $file){
                if(file_exists($file)){
                    $xml = simplexml_load_file($file);
                    foreach($xml as $sectionName => $sectionData){
                        if($sectionName == "url"){
                            try{
                                $ch = curl_init();
                                curl_setopt($ch, CURLOPT_URL, (string)$sectionData->loc);
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                curl_exec($ch);
                                curl_close($ch);
                            } catch(Exception $e){
                                Mage::logException($e);
                            }
                        }
                    }
                }
            }
        }
    }

}
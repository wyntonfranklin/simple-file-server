<?php
/**
 * Created by PhpStorm.
 * User: shady
 * Date: 12/26/18
 * Time: 11:40 AM
 */
include("Helper.php");
include("Files.php");

class SfsApplication
{

    private $fm;
    private $settings;


    /**
     * SfsApplication constructor.
     */
    public function __construct()
    {
        $this->fm = new Files($this);
        $this->settings = include("config.php");
    }

    /**
     * @return mixed
     */
    public function getSettings()
    {
        return $this->settings;
    }



    /**
     * @return Files
     */
    public function getFm()
    {
        return $this->fm;
    }

    public function getBaseDir()
    {
        return $this->getSettingByKey("baseDir");
    }

    public function getBaseUrl()
    {
        return $this->getSettingByKey("baseUrl");
    }

    private function getSettingByKey($key)
    {
        $settings = $this->getSettings();
        return $settings[$key];
    }

    public function getAppName()
    {
        return $this->getSettingByKey("appName");
    }


}
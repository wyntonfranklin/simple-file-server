<?php
/**
 * Created by PhpStorm.
 * User: shady
 * Date: 12/26/18
 * Time: 11:40 AM
 */

class SfsApplication
{

    private $fm;
    private $settings;


    /**
     * SfsApplication constructor.
     */
    public function __construct()
    {
        $this->settings = include("config.php");
        require $this->settings["baseDir"] . '/../vendor/autoload.php';
        include("Helper.php");
        include("Files.php");
        $this->fm = new Files($this);;
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
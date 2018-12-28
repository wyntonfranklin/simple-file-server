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
    const COOKIE_NAME="sfshash";


    /**
     * SfsApplication constructor.
     */
    public function __construct()
    {
        $this->settings = include(__DIR__."/src/config.php");
        require $this->settings["baseDir"] . 'vendor/autoload.php';
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

    public function getUsers()
    {
        return $this->getSettingByKey("users");
    }

    public function verifyUser( $user )
    {
        $users = $this->getUsers();
        if(isset($users[$user])){
            return true;
        }
        return false;
    }

    public function getUser($name)
    {
        if($this->verifyUser($name)){
            return $this->getUsers()[$name];
        }
    }

    public function getUserName()
    {
        if(isset($_SESSION["username"])){
            return $_SESSION["username"];
        }else{
            return "Guest";
        }
    }

    public function getUserPassword($user)
    {
        $user = $this->getUsers()[$user];
        return $user["password"];
    }

    public function setCookie(){
        $sid = $this->startSession();
        $_POST['username'] = stripslashes($_POST['username']);
        $user = $this->getUser($_POST['username']);
        $this->addSessionParam("username", $_POST["username"]);
        $hour = time() + 3600;
        setcookie(self::COOKIE_NAME, $sid, $hour);
        //then redirect them to the members area
        $this->redirect("index.php");
    }

    public function redirect($file)
    {
        header("Location: {$file}");
    }

    public function validateCookie($hash)
    {
        if($this->startSession() === $hash){
            return true;
        }
        return false;
    }

    public function isLoggedIn()
    {
        if (isset($_COOKIE[self::COOKIE_NAME])) {
            return $this->validateCookie($_COOKIE[self::COOKIE_NAME]);
        }
        return false;
    }

    public function startSession()
    {
        if(!isset($_SESSION)){
            session_start();
        }
        return session_id();
    }

    public function addSessionParam($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function authenticate()
    {
        if(!$this->isLoggedIn()){
            die('You dont have permissions to use this file');
        }
    }

    public function logout(){
        setcookie(self::COOKIE_NAME, "", time()-3600);
        session_unset();
    }

    public function getJavaScriptSettings()
    {
        $settings = $this->getSettings();
        $publicSettings = [
            "baseUrl" => $settings["baseUrl"],
            "maxUploadSize" => $settings["files"]["maxUploadSize"],
        ];
        return "<div id='js-settings' data-value='".json_encode($publicSettings)."'></div>";
    }


}
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

    public function setCookie()
    {
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

    public function logout()
    {
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

    public function createRequiredFolders()
    {
        $this->createFolder(__DIR__ . '/upload');
        $this->createFolder(__DIR__ . '/db');
    }

    private function createFolder($path)
    {
        if(!file_exists($path)){
            mkdir($path,0777,true);
        }
    }

    public function getPost($key, $default)
    {
        if(isset($_POST[$key]) && !empty($_POST[$key])){
            return $_POST[$key];
        }
        return $default;
    }

    public function isInstalled()
    {
        return filter_var($this->getSettings()["installed"], FILTER_VALIDATE_BOOLEAN);
    }

    public function updateConfigFile()
    {
        $app = $this;
        $appName = $app->getPost("app-name","Simple File Server");
        $baseUrl = $app->getPost("base-url","");
        $maxSize= $app->getPost("max-file-size","5");
        $user = $app->getPost("primary-user","Admin");
        $password = $app->getPost("primary-user-password","password1234");
        $disableInstall = $app->getPost("disable-install",0);
        $template = file_get_contents(__DIR__. '/src/config-template.php');
        $updates = [
            "{app-name}" =>  $appName,
            "{base-url}" => $baseUrl,
            "{max-file-size}" => $maxSize,
            "{primary-user}" => $user,
            "{primary-user-password}" => $password,
        ];
        if($disableInstall==1){
            $updates["{installed}"]= "true";
        }else{
            $updates["{installed}"]= "false";
        }
        $template = $this->replaceSettings($updates, $template);
        file_put_contents(__DIR__. '/src/config.php', $template);
        $this->createRequiredFolders();
        $this->redirect("index.php");
    }

    private function replaceSettings($data, $settings)
    {
        foreach ($data as $key=>$value){
            $settings = str_replace($key,$value, $settings);
        };
        return $settings;
    }


}
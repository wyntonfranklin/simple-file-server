<?php
/**
 * Created by PhpStorm.
 * User: shady
 * Date: 12/26/18
 * Time: 9:31 AM
 */


class Files
{
    const FOLDER_NAME="upload";

    private $app;
    private $repo;
    /**
     * Files constructor.
     */
    public function __construct(SfsApplication $app)
    {
        $this->app = $app;
        $config = new \JamesMoss\Flywheel\Config($this->app->getBaseDir() . '/db');
        $this->repo = new \JamesMoss\Flywheel\Repository('files', $config);
    }

    /**
     * @return \JamesMoss\Flywheel\Repository
     */
    public function getRepo()
    {
        return $this->repo;
    }

    /**
     * @param \JamesMoss\Flywheel\Repository $repo
     */
    public function setRepo($repo)
    {
        $this->repo = $repo;
    }

    public function createFile($filename, $path, $url){
        $file = new \JamesMoss\Flywheel\Document(array(
            'name'     => $filename,
            'dateAdded' => date("Y-m-d h:i:s"),
            'path'      => $path,
            'url'       => $url,
            "user" => $this->app->getUserName()
        ));
        $this->saveFile($file);
    }

    public function saveFile( $file )
    {
        $this->getRepo()->store($file);
    }

    public function getAllFiles()
    {
        $files = $this->repo->query()
            ->orderBy('dateAdded DESC')
            ->execute();
        return $files;
    }


    public function getDatedFolder()
    {
        $year = date('Y');
        $day = date('m');
        $this->createCurrentFolder($year, $day);
        return $this->app->getBaseDir() . '/' . self::FOLDER_NAME . '/' . $year . '/' . $day;
    }

    public function getDatedUrl( $file )
    {
        $year = date('Y');
        $day = date('m');
        $baseUrl = $this->app->getBaseUrl();
        return $baseUrl . '/'
            . self::FOLDER_NAME . '/'
            . $year . '/' . $day . '/' . $file;
    }


    private function createCurrentFolder($year, $day)
    {
        $new_path = $this->createPath(array(self::FOLDER_NAME,$year, $day));
        if(!file_exists($new_path)){
            mkdir($new_path,0777,true);
        }
    }

    private function createPath($params)
    {
        $base = $_SERVER['DOCUMENT_ROOT'] . '/';
        $path ='';
        foreach($params as $folder ){
            $path .= $folder . '/';
        }
        echo $base .$path;
        return $base . $path;
    }

    public function randomName($num = 6)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
        $string = '';
        $max = strlen($characters) - 1;
        for ($i = 0; $i < $num; $i++) {
            $string .= $characters[mt_rand(0, $max)];
        }
        return $string;
    }

    public function getAllowedFiles()
    {
        $settings = $this->app->getSettings();
        return $settings["files"]["allowed"];
    }

    public function getMaxUploadFileSize()
    {
        $settings = $this->app->getSettings();
        return $settings["files"]["maxUploadSize"];
    }

}
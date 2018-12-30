# [Simple File Server](https://startbootstrap.com/template-overviews/grayscale/)

Simple file server is a quick and easy way to run a file server on you Linux machine. It uses an file database to index your uploads. Images and files are saved in month/year format. e.g 2018/12/image.png. You can create multiple users via a configuration path. 

## Preview

[![SFS ScreenShoot](https://wftutorials.files.wordpress.com/2018/12/sfs_screenshot.png)](https://wftutorials.files.wordpress.com/2018/12/sfs_screenshot.png)

**[View Live Preview](http://www.igestdevelopment.com/sfs/)**



## Download and Installation

To begin using the Simple File server you can do the following.
* Clone the repo to your server: `git clone https://github.com/wyntonfranklin/simple-file-server.git` or
* [Fork, Clone, or Download on GitHub](https://github.com/wyntonfranklin/simple-file-server.git)
* Rename the directory to something you like `mv simple-file-server sfs`
* Give you server access to the folders - `chmod -R 0775 sfs`
* Thats it!  - you should see the above image once you navigate to the correct folder on your server.



## Usage

### Basic Usage

After downloading, go the main directory where the application is located. You should see the screen with two options to login and install.

- Click the intstall button
- Add the required information ( app name, base url, default user )
- Save the configuration by clicking the submit button - you should be redirected to the main screen

**You have the option to disable the install.php file. Once you do this you will have to edit the configuration from your server. This is ideal and you should only use the install.php file once.**



## Features

Simple file server has some cool features.

- Create multiple users
- Login and logout
- Upload multiple files
- Search file listing
- View files by name, date
- Copy link to files and share with others



## Configuration

You can edit a few different options to manage how you file server operates. You can allows add users here. The configuration file is in the src folder.

**appName -**

This Descriptions what your application is shown as

**baseDir -**

This is the base directory of you applications

**baseUrl -**

This is the base url of your application

**installed -** True | false

If this is set to true the install.php file will no longer be accessible.

**orderBy -** name | date

This controls how the files are displayed.

#### Files Configuration

**maxUploadSize -** 

The default is set to 10. You can change this value. However you php.ini file will need to be adjusted accordingly.

**allowed -**

This is an array of key pairs of the allowed files. [ jpg, jpeg, gif, png, pdf]. You can add more. You will need to do this via the config file.

#### Users

This consists of an array with user information. The default user is admin and the password can seen below.

```
  "users" => [
        "admin" => [
            "password" => "password1234",
        ],
        // add other users here
    ]
```





## About

Simple file server is a quick and easy way to run a file server on you linux machine. Simple file users the following open software contributors.

* FontAwesome - https://fontawesome.com/
* Bootstrap - https://getbootstrap.com/
* Datatables - https://www.datatables.net/
* Dropzone - https://www.dropzonejs.com/
* Flywheel - https://github.com/jamesmoss/flywheel
* jQuery
* Manific - https://github.com/dimsemenov/Magnific-Popup
* BlackrockDigital - https://github.com/BlackrockDigital/startbootstrap-grayscale

- Colorlib - https://colorlib.com/wp/free-html5-contact-form-templates/


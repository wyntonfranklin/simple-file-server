<?php
/**
 * Created by PhpStorm.
 * User: shady
 * Date: 12/26/18
 * Time: 11:24 AM
 */
include("SfsApplication.php");
$app = new SfsApplication();
$app->authenticate();
$fm = $app->getFm();
?>
<?php foreach($fm->getAllFiles() as $file ): ?>
    <tr>
        <td><a target="_blank" href="<?php echo $file->url;?>">
                <?php echo $file->name;?></a></td>
        <td><?php echo $file->user;?></td>
        <td><?php echo Helper::dateTime($file->dateAdded);?></td>
        <td>
            <a id="copy" class="image-link" target="_blank" href="<?php echo $file->url;?>">
                <i class="fa fa-eye fa-fw"></i>
            </a>
            <a href="javascript:void(0);"
               class="copy-file"
               data-clipboard-target="#copy"
               data-clipboard-text="<?php echo $file->url;?>">
                <i class="fa fa-copy fa-fw"></i></a>&nbsp;
            <a data-id="<?php echo $file->getId();?>" href="javascript:void(0):" class="delete-file">
                <i class="fa fa-trash fa-fw"></i>
            </a>
        </td>
    </tr>
<?php endforeach; ?>

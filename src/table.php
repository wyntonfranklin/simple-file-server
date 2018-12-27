<?php
/**
 * Created by PhpStorm.
 * User: shady
 * Date: 12/26/18
 * Time: 11:24 AM
 */
include("SfsApplication.php");
$app = new SfsApplication();
$fm = $app->getFm();
?>
<?php foreach($fm->getAllFiles() as $file ): ?>
    <tr>
        <td><a target="_blank" href="<?php echo $file->url;?>">
                <?php echo $file->name;?></a></td>
        <td><?php echo $file->dateAdded;?></td>
        <td><i class="fa fa-copy fa-fw"></i>&nbsp;
            <a target="_blank" href="<?php echo $file->url;?>">
                <i class="fa fa-eye fa-fw"></i>
            </a>
        </td>
    </tr>
<?php endforeach; ?>

<?php
/**
 * Created by PhpStorm.
 * User: wilder5
 * Date: 30/10/17
 * Time: 12:28
 */

namespace Cataluna\Model;


class UploadManager extends EntityManager
{
    public function addMenuFilePT($tmpName, $fileExtension)
    {
        $uploadDir = __DIR__ . "/../../public/assets/images/upload/";
        $fileName = uniqid('image');
        $uploadFile = $uploadDir . $fileName;
        move_uploaded_file($tmpName, "$uploadFile");
    }

    public function delMenuFile($id, $dir)
    {
        unlink($dir . $id);
    }
}
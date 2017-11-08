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
    public function addMenuFilePT($tmpName, $fileExtension, $fileName)
    {
        $uploadDir = __DIR__ . "/../../public/assets/images/upload/";
        $uploadFile = $uploadDir . $fileName;
        move_uploaded_file($tmpName, "$uploadFile");
    }

    public function delMenuFile($id)
    {
        unlink($id);
    }
}
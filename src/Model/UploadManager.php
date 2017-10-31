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
        $uploadDir = __DIR__ . "/../../public/assets/upload/Menu/";
        $uploadFile = $uploadDir . 'Base_tomate' . $fileExtension;
        move_uploaded_file($tmpName, "$uploadFile");
    }

    public function addMenuFilePC($tmpName, $fileExtension)
    {
        $uploadDir = __DIR__ . "/../../public/assets/upload/Menu/";
        $uploadFile = $uploadDir . 'Base_creme' . $fileExtension;
        move_uploaded_file($tmpName, "$uploadFile");
    }

    public function delMenuFile($id)
    {
        var_dump($id);
        unlink($id);
    }
}
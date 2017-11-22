<?php
/**
 * Created by PhpStorm.
 * User: wilder5
 * Date: 30/10/17
 * Time: 12:07
 */

namespace Cataluna\Controller;

use Cataluna\Model\Upload;
use Cataluna\Model\UploadManager;

class AdminUploadController extends Controller
{
    const MAX_UPLOAD_SIZE = 8000000;

    public function addUploadPT()
    {
        $extensions = [
            'jpg',
            'JPG',
            'png',
            'jpeg',
        ];

        $uploadManager = new UploadManager();
        if (!empty($_POST['submit1'])) {
            if (!empty($_FILES['fichier']['name'][0] != '')) {
                for ($i = 0; $i < count($_FILES['fichier']['name']); $i++) {
                    if ($_FILES['fichier']['size'][$i] < self::MAX_UPLOAD_SIZE){
                        $tmpName = $_FILES['fichier']['tmp_name'][$i];
                        $fileExtension = pathinfo($_FILES['fichier']['name'][$i]);
                        if (in_array($fileExtension['extension'], $extensions)) {
                            $uploadManager->addMenuFilePT($tmpName, $fileExtension, $_FILES['fichier']['name'][$i]);
                            header('Location:admin.php?route=delUpload');
                        }
                    }
                }
            }
        }


        return $this->twig->render('Admin/uploadImg.html.twig');
    }


    public function deleteUpload()
    {
        $dir = __DIR__ . "/../../public/assets/images/upload/";
        $uploadManager = new UploadManager();

        if (!empty($_POST['delete'])) {
                $name = $_POST['idDelete'];
                $uploadManager->delMenuFile($name, $dir);
        }

        $files = [];
        $dir = __DIR__ . "/../../public/assets/images/upload/";
        if (!empty(scandir($dir))){
            foreach (scandir($dir) as $newFile) {
                if ($newFile != '.' && $newFile != '..') {
                    $files[] = $newFile;
                }
            }
        }

        return $this->twig->render('Admin/uploadImg.html.twig', [
            'files' => $files,
        ]);
    }
}
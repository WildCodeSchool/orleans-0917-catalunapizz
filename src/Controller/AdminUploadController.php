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
    public function addUploadPT()
    {
        $extensions = [
            'jpg',
            'png',
            'jpeg',
        ];

        $uploadManager = new UploadManager();
        if (!empty($_POST['submit1'])) {
            if (!empty($_FILES['fichier']['name'][0] != '')) {
                for ($i = 0; $i < count($_FILES['fichier']['name']); $i++) {
                    $tmpName = $_FILES['fichier']['tmp_name'][$i];
                    $fileExtension = pathinfo($_FILES['fichier']['name'][$i]);
                    $fileName = $_FILES['fichier']['name'][$i];
                    if (in_array ($fileExtension['extension'], $extensions)){
                        $uploadManager->addMenuFilePT($tmpName, $fileExtension, $fileName);
                        header('Location:admin.php?route=delUpload');
                    }
                }
            }
        }


        return $this->twig->render('Admin/uploadImg.html.twig');
    }


    public function deleteUpload()
    {
        $uploadManager = new UploadManager();

        if (!empty($_POST['delete'])) {
            $id = __DIR__ . "/../../public/assets/images/upload/" . $_POST['idDelete'];
            $uploadManager->delMenuFile($id);

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
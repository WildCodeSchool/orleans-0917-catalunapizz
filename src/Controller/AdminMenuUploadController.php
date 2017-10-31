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

class AdminMenuUploadController extends Controller
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
                    $fileExtension = strtolower(strrchr($_FILES['fichier']['name'][$i], '.'));
                    if (in_array(substr($fileExtension, 1), $extensions)){
                        $uploadManager->addMenuFilePT($tmpName, $fileExtension);
                    }
                }
            }
        }

        header('Location:index.php?route=uploadMenu');

        return $this->twig->render('Admin/uploadImg.html.twig', [
            'files' => $files,
        ]);
    }

    public function addUploadPC()
    {
        $extensions = [
            'jpg',
            'png',
            'jpeg',
        ];

        $uploadManager = new UploadManager();
        if (!empty($_POST['submit2'])) {
            if (!empty($_FILES['fichier']['name'][0] != '')) {
                for ($i = 0; $i < count($_FILES['fichier']['name']); $i++) {
                    $tmpName = $_FILES['fichier']['tmp_name'][$i];
                    $fileExtension = strtolower(strrchr($_FILES['fichier']['name'][$i], '.'));
                    if (in_array(substr($fileExtension, 1), $extensions)){
                        $uploadManager->addMenuFilePC($tmpName, $fileExtension);
                    }
                }
            }
        }


        header('Location:index.php?route=uploadMenu');

        return $this->twig->render('Admin/uploadImg.html.twig', [
            'files' => $files,
        ]);
    }

    public function deleteUpload()
    {
        $uploadManager = new UploadManager();

        if (!empty($_POST['delete'])) {
            $id = __DIR__ . "/../../public/assets/upload/Menu/" . $_POST['idDelete'];
            $uploadManager->delMenuFile($id);

        }
        $files = [];
        $dir = __DIR__ . "/../../public/assets/upload/Menu/";
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
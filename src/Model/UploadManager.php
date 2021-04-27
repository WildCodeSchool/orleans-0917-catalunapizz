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
    /**
     * Taille maximum du fichier à télécharger
     */
    const MAX_FILE_SIZE = 8000000;

    /**
     * Types mimes autorisés
     */
    const ALLOWED_EXTENSIONS = [
        'image/jpeg' => 'jpeg',
        'image/gif' => 'gif',
        'image/png' => 'png',
        'image/svg+xml' => 'svg',
    ];

    const UPLOAD_DIRECTORY = 'assets/images/upload/';

    /**
     * @var
     *
     * Le message d'erreur
     */
    private $errorMessage;

    /**
     * @return mixed
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    public function tryUpload($file) {
        $result = false;
        $fileName = $file['name'];
        $this->errorMessage = '';

        if ($file['error'] === 0) {
            $fileMimeType = $file['type'];
            // Vérification de l'extension du fichier
            $fileExtension = $this->isSupportedExtension($fileMimeType);

            if ($fileExtension == false) {
                $this->errorMessage = "Le format du fichier '$fileName' n'est pas supporté ($fileMimeType).";
                $result = false;
            } else {
                    $newFileName = 'img_' . uniqid() . '.' . $fileExtension;
                    if (!move_uploaded_file($file['tmp_name'], self::UPLOAD_DIRECTORY . $newFileName)) {
                        $this->errorMessage = "Erreur lors de l'envoi du fichier '$fileName'.";
                    } else {
                        $result = $newFileName;
                    }
            }
        } else {
            $this->errorMessage = $this->setUploadErrorMessage($file['error'], $fileName);
            $result = false;
        }

        return $result;
    }

    public function deleteImage($name)
    {
        $pathFileName = self::UPLOAD_DIRECTORY . $name;
        if (file_exists($pathFileName)){
            unlink($pathFileName);
        }
    }

    /**
     * @param $bytes
     * @param int $precision
     * @return string
     */
    private function bytesToSize1024($bytes, $precision = 2) : string
    {
        $unit = array('B','KB','MB');
        return @round($bytes / pow(1024, ($i = floor(log($bytes, 1024)))), $precision).' '.$unit[$i];
    }

    /**
     * Vérifie si le type mime du fichier est supporté
     * @param $mimeType
     * @return mixed
     */
    private function isSupportedExtension($mimeType)
    {
        $extension = false;
        if (array_key_exists($mimeType, self::ALLOWED_EXTENSIONS)) {
            $extension = self::ALLOWED_EXTENSIONS[$mimeType];
        }
        return $extension;
    }

    /**
     * Définie le message d'erreur de l'upload selon son code d'erreru renvoyé.
     */
    private function setUploadErrorMessage($errorCode, $fileName)
    {

        $message = '';
        switch ($errorCode) {
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                $friendlyMaxSize = $this->bytesToSize1024(self::MAX_FILE_SIZE, 1);
                $message = "Le fichier '$fileName' est trop grand il ne devrait pas dépasser $friendlyMaxSize";
                break;
            case UPLOAD_ERR_PARTIAL:
                $message = "Le fichier '$fileName' n'a été que partiellement téléchargé.";
                break;
            case UPLOAD_ERR_NO_FILE:
                $message = "Aucun fichier n'a été téléchargé.";
                break;
            case UPLOAD_ERR_NO_TMP_DIR:
                $message = "Le fichier '$fileName' ne peut pas être téléchargé car il manque un dossier temporaire sur le serveur.";
                break;
            case UPLOAD_ERR_CANT_WRITE:
                $message = "Impossible d'écrire le fichier '$fileName' sur le disque.";
                break;
            case UPLOAD_ERR_EXTENSION:
                $message = "Une extension PHP a arrêté le téléchargement du fichier '$fileName'.";
                break;
            default:
                $message = "Erreur inconnue lors du téléchargement du fichier '$fileName'.";
                break;
        }

        return $message;
    }
}

<?php

namespace App\Services;

class UploadHelper
{
    public function articleImageValidation(): bool
    {
        $error = $_FILES['article_image']['error'];
        $imgName = $_FILES['article_image']['name'];

        $imgEx = pathinfo($imgName, PATHINFO_EXTENSION);    
        $imgExLc = strtolower($imgEx);
		$allowedExs = array("jpg", "jpeg", "png"); 

        if ($error !== 0) {
            return false;
        }

        if (!in_array($imgExLc, $allowedExs)) {
            return false;
        }
        return true;
    }

    public function createArticleImgName(): string
    {
        $imgFullName = $_FILES['article_image']['name'];
        $imgName =  pathinfo($imgFullName, PATHINFO_FILENAME);
        $imgEx = pathinfo($imgFullName, PATHINFO_EXTENSION);    
        $imgExLc = strtolower($imgEx);
        $newImgName = uniqid($imgName . "-", true).'.'.$imgExLc;

        return $newImgName;
    }

    public function uploadImg(string $imgName): void
    {
        $imgTmpName = $_FILES['article_image']['tmp_name'];
        $img_upload_path = $_SERVER['DOCUMENT_ROOT'] . $GLOBALS['__BASE_PATH__']. 'images/uploads/articles/' . $imgName;
        move_uploaded_file($imgTmpName, $img_upload_path);
    }
}

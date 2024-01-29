<?php

namespace App\Controllers;

class Files extends BaseController
{
    public function view( $file ) {
        try {
            $PATH = getcwd();
            $myimage = file_get_contents( $PATH . '/public/uploads/' . $file);
            header('Content-Type: image/jpg');
            echo $myimage;
        } catch ( \Exception $e ) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        exit;
    }
}
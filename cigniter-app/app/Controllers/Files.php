<?php

namespace App\Controllers;

class Files extends BaseController
{
    public function view( $file ) {
        try {
            $myimage = file_get_contents( getcwd() . '/public/uploads/' . $file);
            header('Content-Type: */*');
            echo $myimage;
        } catch ( \Exception $e ) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        exit;
    }
}
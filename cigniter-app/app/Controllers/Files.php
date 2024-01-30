<?php

namespace App\Controllers;

class Files extends BaseController
{
    public function view( $file ) {
        $cave = $this->session->get("whichCave") ?? 'cave';
		$caveName = $cave == 'cave' ? 'cave' : 'laser';

        try {
            $myimage = file_get_contents( getcwd() . '/public/uploads/' . $caveName . '/' . $file);
            header('Content-Type: */*');
            echo $myimage;
        } catch ( \Exception $e ) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        exit;
    }
}
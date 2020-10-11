<?php

namespace Ezdev\Model;

use \Ezdev\DB\Sql;
use \Ezdev\Model;

class Store extends Model
{

    public static function listAll()
    {

        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_stores ORDER BY idstore");
        
    }

    public static function getStore($idstore)
    {

        $sql = new Sql();

        $return =  $sql->select("SELECT desstore FROM tb_stores WHERE idstore = :idstore", array(
            ":idstore"=>$idstore
        ));


        if(sizeof($return) >= 1){
            return $return[0]['desstore'];
        }else{
            return null;
        }
    }

    public function save()
    {

        $sql = new Sql();

        $results = $sql->select("CALL sp_stores_save(:idstore, :desstore, :desphoto)", array(
            ":idstore" => $this->getidstore(),
            ":desstore" => $this->getdesstore(),
            ":desphoto" => $this->getdesphoto()
        ));

        $this->setData($results[0]);

        //store::updateFile();

    }

    public function get($idstore)
    {

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_stores WHERE idstore = :idstore", array(
            ":idstore"=>$idstore
        ));

        $this->setData($results[0]);

    }

    public function delete()
    {
        
        $sql = new Sql();

        $sql->query("DELETE FROM tb_stores WHERE idstore = :idstore", [
            ":idstore"=>$this->getidstore()
        ]);

        //store::updateFile();

    }

    public function updateDesphoto()
    {
        
        $sql = new Sql();

        $sql->query("UPDATE tb_stores SET desphoto = :desphoto WHERE idstore = :idstore", [
            ":idstore"=>$this->getidstore(),
            ":desphoto"=>$this->getidstore().'.jpg'
        ]);

        //Category::updateFile();

    }

    public function setPhoto($file)
    {

        $extension = explode('.',$file['name']);
        $extension = end($extension);

        switch($extension){

            case "jpg":
            case "jpeg":
                $image = imagecreatefromjpeg($file["tmp_name"]);
            break;

            case "gif":
                $image = imagecreatefromgif($file["tmp_name"]);
            break;

            case "png":
                $image = imagecreatefrompng($file["tmp_name"]);
            break;

            case "webp":
                $image = imagecreatefromwebp($file["tmp_name"]);
            break;

        }

        $dist = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 
        "res" . DIRECTORY_SEPARATOR . 
        "site" . DIRECTORY_SEPARATOR . 
        "img" . DIRECTORY_SEPARATOR .
        "logo" . DIRECTORY_SEPARATOR .
        $this->getidstore() . ".jpg";

        $this->updateDesphoto();

        imagejpeg($image, $dist);

        imagedestroy($image);


    }


    public static function getPage($page = 1, $itemsPerPage = 12)
    {

        $start = ($page-1) * $itemsPerPage;

        $sql = new Sql();
        

        $results = $sql->select("SELECT SQL_CALC_FOUND_ROWS *
        FROM tb_stores ORDER BY desstore
		LIMIT $start, $itemsPerPage;");				

        $resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

        return [
            'data'=>$results,
            'total'=>(int)$resultTotal[0]["nrtotal"],
            'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
        ];

	}
	

	public static function getPageSearch($search, $page = 1, $itemsPerPage = 12)
    {

        $start = ($page-1) * $itemsPerPage;

        $sql = new Sql();

        $results = $sql->select("SELECT SQL_CALC_FOUND_ROWS *
        FROM tb_stores 
		WHERE desstore LIKE :search
		ORDER BY desstore
        LIMIT $start, $itemsPerPage;", [
			':search'=>'%'.$search.'%'
		]);

        $resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

        return [
            'data'=>$results,
            'total'=>(int)$resultTotal[0]["nrtotal"],
            'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
        ];

    }

}

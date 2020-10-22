<?php

namespace Ezdev\Model;

use \Ezdev\DB\Sql;
use \Ezdev\Model;

class Product extends Model
{

    public static function listAll()
    {

        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_products tab1
        INNER JOIN tb_productscategories tab2
        ON tab1.idproduct = tab2.idproduct
        WHERE tab2.idcategory != 1 ORDER by tab2.idcategory ASC");

    }

    public static function listPromotion()
    {

        $sql = new Sql();

        return $sql->select("SELECT tab1.*, tab2.idcategory FROM tb_products tab1
        INNER JOIN tb_productscategories tab2
        ON tab1.idproduct = tab2.idproduct
        WHERE idcategory = :idcategory", array(
            "idcategory"=>1
        ));
        
    }


    public function save()
    {

        $sql = new Sql();

        $results = $sql->select("CALL sp_products_save(:idproduct, :idstore, :desproduct, :description, :desunity, :vlprice, :desurl, :desphoto)", array(
            ":idproduct"=>$this->getidproduct(),
            ":idstore"=>$this->getidstore(),
            ":desproduct"=>$this->getdesproduct(),            
            ":description"=>$this->getdescription(),
            ":desunity"=>$this->getdesunity(),
            ":vlprice"=>$this->getvlprice(),
            ":desurl"=>$this->getdesurl(),
            ":desphoto"=>$this->getdesphoto()
        ));

        $this->setData($results[0]);


    }

    public function get($idproduct)
    {

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_products WHERE idproduct = :idproduct", array(
            ":idproduct"=>$idproduct
        ));

        $this->setData($results[0]);

    }

    public function delete()
    {
        
        $sql = new Sql();

        $sql->query("DELETE FROM tb_products WHERE idproduct = :idproduct", [
            ":idproduct"=>$this->getidproduct()
        ]);


    }


    public function getValues()
    {


        $values = parent::getValues();

        return $values;

    }

    public function updateDesphoto()
    {
        
        $sql = new Sql();

        $sql->query("UPDATE tb_products SET desphoto = :desphoto WHERE idproduct = :idproduct", [
            ":idproduct"=>$this->getidproduct(),
            ":desphoto"=>$this->getidproduct().'.jpg'
        ]);


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
        $this->getidproduct() . ".jpg";

        $this->updateDesphoto();

        imagejpeg($image, $dist);

        imagedestroy($image);


    }

    public function getFromURL($desurl)
    {

        $sql = new Sql();

        $rows = $sql->select("SELECT * FROM tb_products WHERE desurl = :desurl LIMIT 1", [
            ":desurl"=>$desurl
        ]);

        $this->setData($rows[0]);

    }

    public function getCategories()
    {

        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_categories a INNER JOIN tb_productscategories b ON a.idcategory = b.idcategory WHERE b.idproduct = :idproduct", [
            ':idproduct'=>$this->getidproduct()
        ]); 


    }

    public static function getPage($page = 1, $itemsPerPage = 12)
    {

        $start = ($page-1) * $itemsPerPage;

        $sql = new Sql();

        $results = $sql->select("SELECT SQL_CALC_FOUND_ROWS *
        FROM tb_products ORDER BY desproduct
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
        FROM tb_products
		WHERE desproduct LIKE :search
		ORDER BY desproduct
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

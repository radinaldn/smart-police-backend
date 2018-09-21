<?php
namespace app\api\modules\v1\controllers;

use Yii;
use app\models\User;
use yii\rest\Controller;
use yii\web\Response;

class LaporanController extends Controller
{

    public function actionGetAllMarkers(){
        Yii::$app->response->format = Response::FORMAT_XML;

        $response = null;

        if (Yii::$app->request->isGet){
            $sql = "SELECT tb_laporan.id_laporan, tb_laporan.id_pelapor, tb_pelapor.nama as nama_pelapor, tb_laporan.judul, tb_laporan.lat, tb_laporan.lng, tb_laporan.ket, tb_laporan.foto, tb_kategori.judul as kategori, tb_laporan.created_at, tb_laporan.updated_at
                    FROM tb_laporan INNER JOIN tb_pelapor, tb_kategori WHERE tb_laporan.id_pelapor = tb_pelapor.id_pelapor AND tb_laporan.id_kategori = tb_kategori.id_kategori ORDER BY id_laporan DESC";

            $response = Yii::$app->db->createCommand($sql)->queryAll();

            //$this->layout='mainxml';
			 // Parsing Karakter-Karakter Khusus
			 function parseToXML($htmlStr)
			 {
				  $xmlStr=str_replace('<','<',$htmlStr);
				  $xmlStr=str_replace('>','>',$xmlStr);
				  $xmlStr=str_replace('"','"',$xmlStr);
				  $xmlStr=str_replace("'","'",$xmlStr);
				  $xmlStr=str_replace("&",'&',$xmlStr);
				  return $xmlStr;
			 }
		 
			
		 
			 // Header File XML
			 header("Content-type: text/xml");
		 
			 // Parent node XML
			 echo '<markers>';
		 
			 // Iterasi baris, masing-masing menghasilkan node-node XML
			foreach($response as $db)
			{
				  // Menambahkan ke node dokumen XML
				  echo '<marker ';
				  echo 'id_laporan="' . parseToXML($db['id_laporan']) . '" ';
				  echo 'id_pelapor="' . parseToXML($db['id_pelapor']) . '" ';
                  echo 'nama_pelapor="' . parseToXML($db['nama_pelapor']) . '" ';
                  echo 'judul="' . parseToXML($db['judul']) . '" ';
                  echo 'lat="' . parseToXML($db['lat']) . '" ';
                  echo 'lng="' . parseToXML($db['lng']) . '" ';
                  echo 'ket="' . parseToXML($db['ket']) . '" ';
                  echo 'foto="' . parseToXML($db['foto']) . '" ';
                  echo 'kategori="' . parseToXML($db['kategori']) . '" ';
				  $date = date_create($db['created_at']); 
				  echo 'waktu="' . date_format($date, 'j F Y, \p\u\k\u\l G:i') . '" ';
				 
				  echo '/>';
			 }
		 
			 // Akhir File XML (tag penutup node)
			 echo '</markers>';
        }

       
    }

}
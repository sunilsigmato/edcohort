<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Common\Type;

class Spout {
    
    function create_reader($arr){
        require_once 'Spout/Autoloader/autoload.php';
        
        $reader = ReaderFactory::create(Type::XLSX); 
        
        $reader->open($arr["dir"].$arr['file']);
        
        $data=[];
        
        foreach ($reader->getSheetIterator() as $sh=>$sheet) {
            if($sh>1) break;
        
            foreach($sheet->getRowIterator() as $key=>$r) {
                 if($key==1) continue;
                 
                 if(trim($r[0])=="")continue; 
                 if($key>5001)
                 break;
                 $r["row_index"]=$key;
                 
                 $data[]=$r;
                             
            }
            
        
            
            
        }
        
        $reader->close();
        
        if($total=count($data)){
                $json_file=str_replace(".xlsx",'',$arr['file']);
                $fp = fopen($arr["dir"].$json_file.".json", 'w');
                fwrite($fp, json_encode($data));
                fclose($fp);
                unset($data);
                return array("error"=>0,"msg"=>"success","json"=>$arr["dir"].$json_file.".json","total"=>$total);
        }else{
               
               unlink($arr["dir"].$arr['file']);
               return array("error"=>1,"msg"=>"No product information found.");
        }    
        
    }
    
}
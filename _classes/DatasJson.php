<?php
// ########################################################################################
// BlackBox for Read and Write from/to Json File for Micro-Datas, Configuration and others
// Creator David Paris : david.paris.devweb@gmail.com
// -------------------------------------------
//
// $datas = new DatasJson();
// $datas->loadJsonToObject("directory/name_of_file.json");
// $datas->get("Property_Name");
// $datas->set("Property_name","value");
// $datas->writeObjectToJson("directory/hname_of_file.json");
//
// ########################################################################################

class DatasJson{
    
    private $datas ;
        
    private function check($propName){
        return (isset($this->datas->$propName)) ? true : false ;
    }
    
    public function loadJsonToObject($file){
        if(file_exists($file)){
            $this->datas = json_decode(file_get_contents($file),false);
            return true;
        }else{
            throw new Exception("File don't exist !!!");
            return false;
        }
    }
    
    public function writeObjectToJson($file){
        if(file_exists($file)){
            
            return (file_put_contents($file,json_encode($this->datas, JSON_UNESCAPED_UNICODE))) ? true : false ;
                
        }else{
            
            return false;
        }
    }
    
    public function get($propName){
        return ($this->check($propName)) ? $this->datas->$propName : false ;
    }
    
    public function set($propName,$value){
        if(empty($this->datas)){
            $this->datas = (Object)[];
        }
        
        return ($this->datas->$propName = $value) ? true : false ;
    }
    
    public function delete($propName){
        unset($this->datas->$propName);
    }
}

?>
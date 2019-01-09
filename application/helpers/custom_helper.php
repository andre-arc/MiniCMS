<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    
    
//Assets Helper    
//=======================================================================================================================================================
function get_asset($type, $url, $label='', $other='')
{
    switch($type){
        case "css" : $result = _get_css_asset($url);break;
        case "js"  : $result = _get_js_asset($url);break;
        case "img" : $result = _get_img_asset($url, $label, $other);break;    
    }
    
    return $result;
}

function get_other_asset($string){
    return $string;
}

function _get_css_asset($url){
    $result = "<link rel='stylesheet' href='".base_url("assets/".$url)."' rel='stylesheet' type='text/css'>";
    return $result;
}

 function _get_js_asset($url){
    $result = "<script type='text/javascript' src='".base_url("assets/".$url)."'></script>";
    return $result;
}

 function _get_img_asset($url, $label, $other){
    $result = "<img alt='".$label."' src='".base_url("assets/".$url)."' ".$other.">";
    return $result;
}


//Enkripsi Helper    
//=======================================================================================================================================================

function encrypt($string){
        $ci =& get_instance();
        $key = $ci->config->item('encryption_key');

        $iv = mcrypt_create_iv(
            mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC),
            MCRYPT_DEV_URANDOM
        );

        $encrypted = base64_encode(
            $iv .
            mcrypt_encrypt(
                MCRYPT_RIJNDAEL_128,
                hash('sha256', $key, true),
                $string,
                MCRYPT_MODE_CBC,
                $iv
            )
        );

        return $encrypted;
}

function decrypt($encrypted){
        $ci =& get_instance();
        $key = $ci->config->item('encryption_key');

        $data = base64_decode($encrypted);
        $iv = substr($data, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC));

        $decrypted = rtrim(
            mcrypt_decrypt(
                MCRYPT_RIJNDAEL_128,
                hash('sha256', $key, true),
                substr($data, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC)),
                MCRYPT_MODE_CBC,
                $iv
            ),
            "\0"
        );

        return $decrypted;
}

//Generator Helper    
//=======================================================================================================================================================

function generateID($table, $primary='id'){
    $ci=& get_instance();
    $ci->load->database();

    $id = rand(1,999);
    $query = $ci->db->query("select * from $table where $primary='$id'");
    if($query->num_rows >= 1){
        generateId();
    }
    else{return $id;}
}

function genSlug($text){
    
    // replace non letter or digits by -
  $text = preg_replace('~[^\pL\d]+~u', '-', $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, '-');

  // remove duplicate -
  $text = preg_replace('~-+~', '-', $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;
}

function generateMenu($data_menu){
    $result="";
    $data = $data_menu;
    if(!empty($data)){
        foreach($data as $d){
                if(!array_key_exists("children", $d)){
                   $result.='<li class="dd-item" data-label="'.$d->label.'" data-tipe="'.$d->tipe.'" data-link="'.$d->link.'"><div class="dd-handle">'.$d->label.' <span class="pull-right dd-nodrag"> | <a class="dark" href="#" onclick="removeList(this)"><i class="fa fa-close "></i></a></span></div></li>';
               }
            else{
              $result.='<li class="dd-item" data-label="'.$d->label.'" data-tipe="'.$d->tipe.'" data-link="'.$d->link.'"><div class="dd-handle">'.$d->label.' <span class="pull-right dd-nodrag"> | <a class="dark" href="#" onclick="removeList(this)"><i class="fa fa-close "></i></a></span></div>';
                        
                        $result .= '<ol class="dd-list">';
                        $result .= generateMenu($d->children);
                        $result .= '</ol>';
                        $result .= '</li>';
                }
            }
    }
    return $result;

    //return $id;
}

function genFrontMenu($data_menu, $config=NULL){
    $result="";
    $data = $data_menu;
    if(!empty($data)){
        foreach($data as $d){
                $link = $d->tipe == 'link' && $d->link != '/' ? $d->link : base_url($d->link);
            
                if(!array_key_exists("children", $d)){
                    
                   $result.= $config['menu_tag_open'];
                   $result.='<a href="'.$link.'">'.$d->label.'</a>';
                   $result.= $config['menu_tag_close'];   
               }
            else{
                
                   $result.= $config['menu_tag_open'];
                   $result.= '<a href="'.$link.'">'.$d->label.'</a>';
                       $result.= $config['submenu_tag_open'];
                       $result.= genFrontMenu($d->children, $config);
                       $result.= $config['submenu_tag_close'];
                   $result.= $config['menu_tag_close'];
                }
            }
    }
    return $result;
}


//alert Helper    
//======================================================================================================================================================

function alert($flag, $message){
    $ci=& get_instance();
    $data = array(
            'message' => $message,
            'flag' => $flag
            );
    return $ci->load->view('alert/alert', $data, true);
}

//Settings Helper    
//======================================================================================================================================================

function getParams($paramsName){
     $ci=& get_instance();
        $ci->load->database();

        $ci->db->from('setting');
    
        if($query = $ci->db->get()){
            foreach($query->result() as $r){
                if($r->setting_params == $paramsName){
                    $dataSetting[$r->setting_params] = $r->value;
                    break;
                }
            }
        }
    
        return $dataSetting[$paramsName];
    }

//Page View Helper    
//======================================================================================================================================================

function hits_counter($id){
    $ci=& get_instance();
    $query = $ci->db->query("update post set dibaca=dibaca+1 where id_berita='$id'");
        if ($query) {
            return true;
        }
        else return false;
    
    }

?>

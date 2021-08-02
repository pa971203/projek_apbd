<?php
// membuat format rupiah
	function rupiah($rupiah = null){
		$rp = "Rp. ".number_format($rupiah,2,",",".");
		return $rp;

	}

 	function random($length = 8){
			$data = 'ABCDEFGHIJKLMNOPQRSTU1234567890';
		    $string = '';
		    for($i = 0; $i < $length; $i++) {
		        $pos = rand(0, strlen($data)-1);
		        $string .= $data{$pos};
		    }
		    return $string;
			
		}

	function acak($str) {
            $kunci = '979a218e0632df2935317f98d47956c7';
            $hasil = '';
            for ($i = 0; $i < strlen($str); $i++) {
                $karakter = substr($str, $i, 1);
                $kuncikarakter = substr($kunci, ($i % strlen($kunci))-1, 1);
                $karakter = chr(ord($karakter)+ord($kuncikarakter));
                $hasil .= $karakter;
            }
            return urlencode(base64_encode($hasil));
        }
    function susun($str) {
            $str = base64_decode(urldecode($str));
            $hasil = '';
            $kunci = '979a218e0632df2935317f98d47956c7';
            for ($i = 0; $i < strlen($str); $i++) {
                $karakter = substr($str, $i, 1);
                $kuncikarakter = substr($kunci, ($i % strlen($kunci))-1, 1);
                $karakter = chr(ord($karakter)-ord($kuncikarakter));
                $hasil .= $karakter;
            }
            return $hasil;
        }
    function tgl($tgl){
        $tn = explode('/', $tgl);
        $tn = $tn[2].'-'.$tn[0].'-'.$tn[1];
        return $tr;
    }

function send_Email($email,$pesan){
		$config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'lapas3329@gmail.com',
            'smtp_pass' => 'Oktober1',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
           ];

           $CI =& get_instance();
	        // Load library email dan konfigurasinya
	        $CI->load->library('email', $config);

	        // Email dan nama pengirim
	        $CI->email->from('lapas3329@gmail.com', 'LAPAS CABANG RUTAN');

	        // Email penerima
	        $CI->email->to($email); // Ganti dengan email tujuan kamu

	        // Lampiran email, isi dengan url/path file
	        //$this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

	        // Subject email
	        $CI->email->subject('Informasi');

	        // Isi email
	        $CI->email->message($pesan);

	        // Tampilkan pesan sukses atau error
	        if ($CI->email->send()) {
	        	
	        } else {
	            //echo 'Error! email tidak dapat dikirim.';
	             echo $CI->email->print_debugger();
	        }
	}
	function api_json($url){
		$jsons = $url;

		$son = file_get_contents($jsons);
		return $son = json_decode($son);
	}

	function send_Telegram($key,$id_chat,$pesan){
		$pesan = urlencode();
		$token = "bot".$key;
		$chat_id = $id_chat;
		$proxy = "";
		//<ip_proxy>:<port>
		$url = "https://api.telegram.org/$token/sendMessage?parse_mode=markdown&chat_id=$chat_id&text=$pesan";

		$ch = curl_init();
			
		if($proxy==""){
			$optArray = array(
				CURLOPT_URL => $url,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_CAINFO => "C:\cacert.pem"	
			);
		}
		else{ 
			$optArray = array(
				CURLOPT_URL => $url,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_PROXY => "$proxy",
				CURLOPT_CAINFO => "C:\cacert.pem"	
			);	
		}
			
		curl_setopt_array($ch, $optArray);
		$result = curl_exec($ch);
			
		$err = curl_error($ch);
		curl_close($ch);	
			
		if($err<>"") echo "Error: $err";
		else echo "Pesan Terkirim";

	}

	function up($imges,$url){
			$config['upload_path']          = './'.$url; 
	        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|csv|txt|doc|docx|rar|zip|svg|xml|GIF|JPG|PNG|JPEG|PDF|DOC|XML|DOCX|xls|xlsx|CSV|TXT|SVG|mov|avi|flv|wmv|mp3|mp4';
	        $config['max_size']             = 500000;
			$config['overwrite']=TRUE;
			$config['encrypt_name'] = TRUE;
			$new_name = time();
			$config['file_name'] = $new_name;
			$CI =& get_instance();
	        $CI->load->library('upload', $config);
	        $CI->upload->initialize($config);
	        // ------------------------------------------
	       if ( ! $CI->upload->do_upload($imges)){
	           $error = array('error' => $CI->upload->display_errors());
	           var_dump($error);
	            //echo "Foto harus di upload paling tida satu";
			}else{
				$image = $CI->upload->data('file_name');
	            return  $image;
			}
 		}
 		function byteToImageSave($base64_image,$path){
	    	$image = $base64_image;
	    	$image = str_replace('data:image/jpeg;base64,','', $image);
	    	$image = base64_decode($image);
	    	$filename = 'image_'.time().'.jpg';
	    	$path = '/'.$path;
	    	file_put_contents(FCPATH.$path.$filename,$image);
	    	return $filename;
	    }

 		// format tanggal indonesia
 	function tgl_i($tanggal){
	$bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
	$split = explode('-', $tanggal);
	return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
}

	function enc($str){
	 $CI =& get_instance();
	 $CI->load->library('kripto');
	 return $CI->kripto->encript_kripto($str);

	}
	function desc($str){
	 $CI =& get_instance();
	 $CI->load->library('kripto');	
	 return $CI->kripto->descript_kripto($str);
	}
	

?>
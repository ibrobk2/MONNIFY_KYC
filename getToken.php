<?php
// class MonnifyClient {
//     const API_TOKEN_URL = 'https://api.monnify.com/auth/token';

//     public function getToken() {
//         $curl = curl_init();
//         $params = array(
//             // CURLOPT_SSL_VERIFYPEER => false,
//             CURLOPT_URL => self::API_TOKEN_URL,
//             CURLOPT_RETURNTRANSFER => true,
//             CURLOPT_MAXREDIRS => 10,
//             CURLOPT_TIMEOUT => 30,
//             CURLOPT_POST => 1,
//             CURLOPT_NOBODY => false,
//             CURLOPT_HTTPHEADER => array(
//                 "cache-control: no-cache",
//                 "content-type: application/x-www-form-urlencoded",
//                 "accept: *",
//                 "accept-encoding: gzip, deflate",
//             ),
//             CURLOPT_POSTFIELDS => http_build_query(array(
//                 'username' => 'saulawaia@gmail.com', // Replace with your actual username
//                 'password' => 'Bakori@22', // Replace with your actual password
//                 'grant_type' => 'password',
//             )),
//         );

//         curl_setopt_array($curl, $params);
//         $response = curl_exec($curl);
//         $err = curl_error($curl);
//         curl_close($curl);

//         if ($err) {
//             echo "cURL Error #01: " . $err;
//         } else {
//             $response = json_decode($response, true);
//             if (array_key_exists("access_token", $response)) {
//                 return $response["access_token"];
//             }
//             if (array_key_exists("error", $response)) {
//                 echo $response["error_description"];
//             } else {
//                 echo "cURL Error #02: Something went wrong! Please contact admin.";
//             }
//         }
//     }
// }

// // Usage example
// $monnifyClient = new MonnifyClient();
// $accessToken = $monnifyClient->getToken();
// echo "Access Token: " . $accessToken;


DEFINE ('API_KEY', 'MK_PROD_TTUMX5T7CT');
DEFINE ('SECRET', 'H2V7WPHMH6U2Y7YS517DG3ZDHHJ3FKPD');

class Monnify {
	    protected $authH; 
	    protected $accessToken;
	    
	    // this function is called everytime this class is instantiated		
        public function __construct( ){

            try{
                $auth = $this->authH = base64_encode(API_KEY.":".SECRET);
                
               // var_dump($auth);
                
			    $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_SSL_VERIFYPEER => false,
                    CURLOPT_URL => 'https://api.monnify.com/api/v1/auth/login/',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',

                    ));
                    curl_setopt($curl, CURLOPT_HTTPHEADER, array(

                    "Authorization: Bearer $auth"

                    ));
                     $response = json_decode(curl_exec($curl), true);
                     var_dump($response) ;
                     curl_close($curl);
                    //Assign accessToken to var
                    $access_token = $this->accessToken = $response['responseBody']['accessToken'];
            }catch(Exception $e){
                throw new Exception($e->getMessage());   
            }			
			
        }
    }
   
?>

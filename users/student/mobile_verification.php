<?php
if (!(isset($_REQUEST["mobile"]) && $_REQUEST["mobile"])) die("Mobile number not provided");
require_once("../../config.php");

$mobile = $_REQUEST["mobile"];

class SmsIR_VerificationCode
{
    protected function getAPIVerificationCodeUrl() {
        return "api/VerificationCode";
    }

    protected function getAPIUltraFastSendUrl() {
        return "api/UltraFastSend";
    }

    protected function getApiTokenUrl() {
        return "api/Token";
    }

    public function __construct($APIKey, $SecretKey, $APIURL) {
        $this->APIKey = $APIKey;
        $this->SecretKey = $SecretKey;
        $this->APIURL = $APIURL;
    }

    public function ultraFastSend($data) {
        $token = $this->_getToken($this->APIKey, $this->SecretKey);
        if ($token != false) {
            $postData = $data;

            $url = $this->APIURL.$this->getAPIUltraFastSendUrl();
            $UltraFastSend = $this->_execute($postData, $url, $token);

            $object = json_decode($UltraFastSend);

            $result = false;
            if (is_object($object)) {
                $result = $object->Message;
            } else {
                $result = false;
            }
        } else {
            $result = false;
        }
        return $result;
    }

    public function verificationCode($Code, $MobileNumber) {
        $token = $this->_getToken($this->APIKey, $this->SecretKey);
        if ($token != false) {
            $postData = array(
                'Code' => $Code,
                'MobileNumber' => $MobileNumber,
            );

            $url = $this->APIURL.$this->getAPIVerificationCodeUrl();
            $VerificationCode = $this->_execute($postData, $url, $token);
            $object = json_decode($VerificationCode);

            $result = false;
            if (is_object($object)) {
                $result = $object->Message;
            } else {
                $result = false;
            }

        } else {
            $result = false;
        }
        return $result;
    }

    private function _getToken() {
        $postData = array(
            'UserApiKey' => $this->APIKey,
            'SecretKey' => $this->SecretKey,
            'System' => 'php_rest_v_2_0'
        );
        $postString = json_encode($postData);

        $ch = curl_init($this->APIURL.$this->getApiTokenUrl());
        curl_setopt(
            $ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json'
            )
        );
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);

        $result = curl_exec($ch);
        curl_close($ch);

        $response = json_decode($result);

        $resp = false;
        $IsSuccessful = '';
        $TokenKey = '';
        if (is_object($response)) {
            $IsSuccessful = $response->IsSuccessful;
            if ($IsSuccessful == true) {
                $TokenKey = $response->TokenKey;
                $resp = $TokenKey;
            } else {
                $resp = false;
            }
        }
        return $resp;
    }

    private function _execute($postData, $url, $token) {
        $postString = json_encode($postData);
        $ch = curl_init($url);
        curl_setopt(
            $ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'x-sms-ir-secure-token: '.$token
            )
        );
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);

        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }
}

try {
    date_default_timezone_set("Asia/Tehran");

    $APIKey = "1d34f5a16f82e4cf0cf5358";
    $SecretKey = "ytjhngf464ter";
    $APIURL = "https://ws.sms.ir/";
    $Code = rand(10000,99999);
    $_SESSION["verify_code"] = $Code;
    $MobileNumber = $mobile;
    $TemplateId = "20117";

    $SmsIR_VerificationCode = new SmsIR_VerificationCode($APIKey, $SecretKey, $APIURL);

    $data = array(
        "ParameterArray" => array(
            array(
                "Parameter" => "VerificationCode",
                "ParameterValue" => $Code
            )
        ),
        "Mobile" => $MobileNumber,
        "TemplateId" => $TemplateId
    );
    
    $VerificationCode = $SmsIR_VerificationCode->ultraFastSend($data);
    // $VerificationCode = $SmsIR_VerificationCode->verificationCode($Code, $MobileNumber);

} catch (Exeption $e) {
    echo 'Error VerificationCode : '.$e->getMessage();
}

?> 
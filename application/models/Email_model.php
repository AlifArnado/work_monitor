<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Email_model extends CI_Model {

     public function send_mail_create_project($email,$subject,$msg) {
          $api_key="key-2ac15eea72d1e17f4b215b17a9d4db47";
          $domain ="mg.oranyelab.com";
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
          curl_setopt($ch, CURLOPT_USERPWD, 'api:'.$api_key);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
          curl_setopt($ch, CURLOPT_URL, 'https://api.mailgun.net/v3/'.$domain.'/messages');
          curl_setopt($ch, CURLOPT_POSTFIELDS, array(
           'from' => 'Woku <notif_woku@oranyelab.com>',
           'to' => $email,
           'subject' => $subject,
           'html' => $msg
          ));
          $result = curl_exec($ch);
          curl_close($ch);
          return $result;
    }

    public function send_mail_create_pending_project($email,$subject,$msg) {
          $api_key="key-2ac15eea72d1e17f4b215b17a9d4db47";
          $domain ="mg.oranyelab.com";
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
          curl_setopt($ch, CURLOPT_USERPWD, 'api:'.$api_key);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
          curl_setopt($ch, CURLOPT_URL, 'https://api.mailgun.net/v3/'.$domain.'/messages');
          curl_setopt($ch, CURLOPT_POSTFIELDS, array(
           'from' => 'Woku <notif_woku@oranyelab.com>',
           'to' => $email,
           'subject' => $subject,
           'html' => $msg
          ));
          $result = curl_exec($ch);
          curl_close($ch);
          return $result;
    }

    function send_sms_staf($no_tujuan,$pesan_sms) {
        $url = "http://reguler.sms-notifikasi.com/apps/smsapi.php?";
        $curlHandle = curl_init();
        curl_setopt($curlHandle, CURLOPT_URL, $url);
        curl_setopt($curlHandle, CURLOPT_POSTFIELDS, 'userkey=am83i1s27e46211b&passkey=cj41dj48g7nf36an&nohp='.$no_tujuan.'&pesan='.urlencode($pesan_sms));
        curl_setopt($curlHandle, CURLOPT_HEADER, 0);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
        curl_setopt($curlHandle, CURLOPT_POST, 1);
        $results = curl_exec($curlHandle);
        curl_close($curlHandle);
        return $result;
    }


    function send_sms_ae($no_tujuan,$pesan_sms) {
        $url = "http://reguler.sms-notifikasi.com/apps/smsapi.php?";
        $curlHandle = curl_init();
        curl_setopt($curlHandle, CURLOPT_URL, $url);
        curl_setopt($curlHandle, CURLOPT_POSTFIELDS, 'userkey=am83i1s27e46211b&passkey=cj41dj48g7nf36an&nohp='.$no_tujuan.'&pesan='.urlencode($pesan_sms));
        curl_setopt($curlHandle, CURLOPT_HEADER, 0);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
        curl_setopt($curlHandle, CURLOPT_POST, 1);
        $results = curl_exec($curlHandle);
        curl_close($curlHandle);
        return $results;
    }


}

/* End of file Sendemail_model.php */
/* Location: ./application/models/Sendemail_model.php */

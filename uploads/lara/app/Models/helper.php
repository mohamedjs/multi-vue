<?php
// get all Unread contact us
use App\Models\Notification;
use App\Models\User;
function contact_unread(){
  return \DB::table('contact_us')->where('read',0)->count();
}

function demand_unread(){
  return \DB::table('demand_user')->where('user_id',\Auth::id())->count();
}

function notification($user_ids,$message,$url = Null,$type,$message_type=null,$request_id)
{
  foreach ($user_ids as $key => $value) {
    $notification = Notification::create([
      'user_id'     => $value,
      'message'    => $message,
      'url'        => $url??'',
      'type'       => $message_type,
      'demand_id' => $request_id,
      'seen' => 0
    ]);
  }
  if($type == 'mobile'){
    $users_token = User::whereIn('id',$user_ids)->pluck('device_token');
    send($users_token , $message , 'message');
  }
}

//send notifcation to mobile
function send($tokens, $msg ,$type)
{

    $fields =
      [
          "registration_ids" => $tokens,
          "priority" => 10,
          'notification' => ['body' =>  $msg , 'title' => 'Insurance'],
          'vibrate' => 1,
          'sound' => 'default'
      ];

    $headers = array
        (
          'accept: application/json',
          'Content-Type: application/json',
          'Authorization: key=' .
          'AIzaSyDKdz_-AAc_m9bcKNxr8qfhvsFXatypNVo'
        );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    $result = curl_exec($ch);
    //var_dump($result);
    if ($result === FALSE) {
        die('Curl failed: ' . curl_error($ch));
    }
    curl_close($ch);
    return $result;
}

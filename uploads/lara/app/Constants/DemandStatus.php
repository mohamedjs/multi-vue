<?php


namespace App\Constants;


final class DemandStatus
{
    const Approval       = 1;
    const Charging       = 2;
    const AnswerRequest  = 3;
    const ReceiveRequest = 4;
    const Reject         = 5;

    /**
     * @return array
     */
    public static function getList($lang = 'en')
    {
        if($lang == 'ar'){
          return [
              self::Approval => "قيد انتظار قبول الطلب",
              self::Charging => "قيد انتظار تحصيل التكلفة",
              self::AnswerRequest => "قيد انتظار استلام جواب الطلب",
              self::ReceiveRequest => "تم اتسلام جواب الطلب",
              self::Reject => "طلب مرفو",
          ];
        }
        return [
            self::Approval => "Waiting for approval",
            self::Charging => "Waiting charging",
            self::AnswerRequest => "Waiting receipt of the answer to the request",
            self::ReceiveRequest => "The answer to the request was received",
            self::Reject => "Request rejected",
        ];
    }

    /**
     * @param $key
     * @return mixed|string
     */
    public static function getLabel($key,$lang = 'en')
    {
        return array_key_exists($key, self::getList($lang)) ? self::getList($lang)[$key] : "";
    }
}

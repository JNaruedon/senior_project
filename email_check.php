ไฟล์ check.php
<?php

   function isValid(session) {
      // ตรวจสอบให้แน่ใจว่ากำหนด session แล้ว

   }

   function sanitize(input) {
      // return CLEAN input คืนค่าว่างไปยัง input
      // ดำเนินการต่อไป
   }

   // ตรวจสอบให้แน่ใจว่า sesson ถูกต้องแล้ว
   // ไม่ต้องการตรวจสอบคำร้องขออื่นๆ!
   if (!isValid(session)) { exit; }

   $method = sanitize($_POST['method']);

   switch ($method) {
      case 'checkAlerts' :
         // ตรวจสอบกับฐานข้อมูลว่าอ่านแล้วหรือยัง
         // ดำเนินการต่อ

         $response = ['friendRequests' => $num_friend_requests,
                      'messages' => $num_unread_messages ];

         return json_encode( $response );
         exit;

      case 'someOtherMethodIfRequired' :
         // ...
         exit;
   }
?>

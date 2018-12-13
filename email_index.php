ไฟล์ Index.php
<?php
$(function() { // on document ready

function updateAlerts() {
   $.ajax({
      url : "email_check.php",
      type : "POST",
      data : {
         method : 'checkAlerts'
      },
      success : function(data, textStatus, XMLHttpRequest) {
         var response = $.parseJSON(data);

         // การแจ้งเตือนล่าสุด!
         if (response.friendRequests > 0) {
            // นับจำนวนล่าสุดที่ยังไม่ได้อ่าน
            $('#unreadFriendRequestsNum').show().text(response.friendRequests);
         }
         else {
            // ซ่อนจำนวนล่าสุดที่ได้มีการเปิดอ่านแล้ว
            $('#unreadFriendRequestsNum').hide();
         }

         // สามารถเพิ่มฟังก์ชั่นที่จำเป็น สำหรับข้อความที่ยังไม่ได้อ่าน
      }
   });
   setTimeout('updateAlerts()', 15000); // Every 15 seconds.
}

});
?>

<?php if (!defined('IN_PHPBB')) exit; ?>Subject: phpBB ติดตั้งเรียบร้อยแล้ว

ขอแสดงความยินดี

คุณได้ทำการติดตั้ง phpBB เสร็จเรียบร้อยแล้ว

กรุณาอย่าทำรหัสผ่านหาย ซึ่งรหัสผ่านนี้ได้ถูกเข้ารหัสไว้ในฐานข้อมูล และไม่สามารถส่งให้คุณได้
อย่างไรก็ตาม ถ้าคุณลืมรหัสผ่าน คุณสามารถขอรหัสผ่านอันใหม่ได้

----------------------------
Username: <?php echo (isset($this->_rootref['USERNAME'])) ? $this->_rootref['USERNAME'] : ''; ?>


Board URL: <?php echo (isset($this->_rootref['U_BOARD'])) ? $this->_rootref['U_BOARD'] : ''; ?>

----------------------------

คุณสามารถอ่านรายละเอียดเพิ่มเติมได้ที่โฟลเดอร์ docs และ support page ของ phpBB.com - http://www.phpbb.com/support/
เพื่อให้บอร์ดของคุณปลอดภัยที่สุด คุณควรจะหมั่นอัปเกรดเว็บบอร์ดให้เป็นเวอร์ชันล่าสุดอยู่เสมอ 
ติดตามข่าวการอัพเกรด phpbb3 ภาษาไทยได้ที่ http://www.phpbbthailand.com
คุณควรจะสมัครสมาชิกที่ลิงค์ด้านบน เพื่อรับการแจ้งเตือนเมื่อมีเว็บบอร์ดเวอร์ชันใหม่ออกมา 

<?php echo (isset($this->_rootref['EMAIL_SIG'])) ? $this->_rootref['EMAIL_SIG'] : ''; ?>
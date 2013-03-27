<?php if (!defined('IN_PHPBB')) exit; ?>Subject: Post approved - "<?php echo (isset($this->_rootref['POST_SUBJECT'])) ? $this->_rootref['POST_SUBJECT'] : ''; ?>"

ถึงคุณ <?php echo (isset($this->_rootref['USERNAME'])) ? $this->_rootref['USERNAME'] : ''; ?>


คุณได้รับการแจ้งเตือนนี้ เพราะข้อความของคุณ "<?php echo (isset($this->_rootref['POST_SUBJECT'])) ? $this->_rootref['POST_SUBJECT'] : ''; ?>" ที่เว็บ "<?php echo (isset($this->_rootref['SITENAME'])) ? $this->_rootref['SITENAME'] : ''; ?>"
ได้รับการรับรองจากผู้ดูแลบอร์ดเรียบร้อยแล้ว

คลิกที่ลิงค์ด้านล่างนี้ เพื่อดูข้อความ:
<?php echo (isset($this->_rootref['U_VIEW_POST'])) ? $this->_rootref['U_VIEW_POST'] : ''; ?>


คลิกที่ลิงค์ด้านล่างนี้ เพื่อดูหัวข้อ:
<?php echo (isset($this->_rootref['U_VIEW_TOPIC'])) ? $this->_rootref['U_VIEW_TOPIC'] : ''; ?>


<?php echo (isset($this->_rootref['EMAIL_SIG'])) ? $this->_rootref['EMAIL_SIG'] : ''; ?>
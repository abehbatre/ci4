<div class="footer-left">
    Made with ❤️ <?= date('Y') ?> By <a href="https://github.com/abehbatre" target="_blank"><?= getenv('AUTHOR_NAME') ?></a>
</div>
<div class="footer-right">
    Version <?= getenv('APP_VERSION') ?> | Loggined as 
    <b><font color="primary">
     <?php
        if(in_groups('admin')) {
            echo 'Administrator'; 
        } elseif(in_groups('teacher')) {
            echo 'Teacher'; 
        } elseif(in_groups('student')) {
            echo 'Student';
        } else {
            echo 'Unknown';
        }
     ?>
     </font>
     </b>
</div>
<article>

<?php foreach ($messages as $message_item): ?>

        <h3><?php echo $message_item['subject']; ?></h3>
        <div class="main">
                <?php echo $message_item['text']; ?>
        </div>
        <p><a href="<?php echo site_url('messages/'.$message_item['slug']); ?>">View Message</a></p>

         <p><a href="<?php echo site_url('my/admin/dbadmin/'.$message_item['id']); ?>">Delete Message</a></p>

<?php endforeach; ?>
</article>
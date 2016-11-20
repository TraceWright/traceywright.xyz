<h2><?php echo $title; ?></h2>
<article>

<?php foreach ($messages as $message_item): ?>

	<?php if ($message_item['display'] == True): ?>

        <h3><?php echo $message_item['subject']; ?></h3>
        <div class="main">
                <?php echo $message_item['text']; ?>
                <br>
                <?php echo $message_item['name']; ?>
        </div>
        <p><a href="<?php echo site_url('messages/'.$message_item['slug']); ?>">View Message</a></p>

<?php endif; ?>
<?php endforeach; ?>
</article>

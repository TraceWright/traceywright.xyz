<?php echo validation_errors(); ?>

<?php echo form_open('messages/create'); ?>

<script src='https://www.google.com/recaptcha/api.js'></script>

<article>

<h3> Contact</h3>

	<p>
		
	Complete the following fields to leave a message. Your message will display on the wall of the <a href="http://traceywright.xyz/messages">messages</a> page of this site. Feedback and suggestions are most welcome. Be sure to provide a return email address or phone number in the message if you would like a response.

	</p>

	<p>
		
		Alternatively, I'm reachable via my <a href="https://www.linkedin.com/in/tracey-wright-591b1661">LinkedIn profile</a>. Given that I'm approaching the end of my Master's of IT I'm particularly interested in graduate software development roles. If you have an employment or experience opportunity that may be suitable please do get in touch.

	</p>

    <label for="subject">Subject</label>
    <input type="input" name="subject" /><br />

    <label for="name">Name</label>
    <input type="input" name="name" /><br />

    <label for="text">Message</label>
    <textarea name="text"></textarea>

    <br>

    <div class="g-recaptcha" data-sitekey="6LdZqAoUAAAAAEvnjHWyE3SZAd5jpxDQeUAH1jpw"></div>

    <br>

    <input type="submit" name="submit" value="Send" />

</article>

</form>
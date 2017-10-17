<br><br><br><br><br><br><br><br><br>


<script type="text/javascript" src="<?php echo CONTACT_JS_PATH ?>contact.js"></script>




<div class="container">
<form id="contact">

<label for="name" id="name_label">Name *</label>
<label class="error" for="name" id="name_error">this field is required</label>
<br /> <input type="text" name="name" id="name" value="" class="text-input" placeholder="How should I call you?" />


<br />
<label for="email" id="email_label">E-Mail *</label>
<label class="error" for="email" id="email_error">this field is required</label>
<label class="error" for="email" id="email_invalid_error">please insert a valid email</label>
<br /> <input type="email" name="email" id="email" value="" class="text-input" placeholder="How can I reach you?" />


<br />
<label for="message">Message *</label>
<label class="error" for="message" id="message_error">this field is required</label>
<br /> <textarea name="message" id="message" rows="8" class="text-input" placeholder="What would you like to tell me?"></textarea>


<br />
<input name="submit" id="submit" value="Send me Mail!" type="submit" class="subbutton">

</form>
</div> <!-- /container -->

<?php $this->layout('view::layout.html.php');?>
<form method="post">
    <label for="receiver">Receiver</label>
    <br>
    <input type="text" id="receiver" name="receiver">
    <br>
    <label for="subject">Subject</label>
    <br>
    <input type="text" id="subject" name="subject">
    <br>
    <label for="message">Message</label>
    <br>
    <textarea name="message" id="message" cols="30" rows="10"></textarea>
    <br>
    <input type="submit" value="Send">
</form>

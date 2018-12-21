<form contact-form>
  <fieldset id="cf-success" class="cf-hide">
    <label>Message sent! Thank you for reaching out to Corey Matzat Photography.</label>
  </fieldset>

  <fieldset>
    <label id="cf-name-error" for="name" class="cf-error cf-hide"></label>
    <input id="cf-name" class="cf-input" type="text" name="name" placeholder="Name" tabindex="1" autofocus>
  </fieldset>

  <fieldset>
    <label id="cf-email-error" for="email" class="cf-error cf-hide"></label>
    <input id="cf-email" class="cf-input" type="email" name="email" placeholder="Email address" tabindex="2">
  </fieldset>

  <fieldset>
    <label id="cf-message-error" for="message" class="cf-error cf-hide"></label>
    <textarea id="cf-message" class="cf-input" type="text" name="message" placeholder="Your message here..." tabindex="3"></textarea>
  </fieldset>

  <fieldset>
    <button type="submit" class="hollow-button" tabindex="4">Send Message</button>
  </fieldset>
</form>
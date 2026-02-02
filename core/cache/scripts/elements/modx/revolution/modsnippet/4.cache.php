<?php  return 'ob_start();

include(\'config-details.php\');
include(\'assets/classes/EmailSender.php\');

$errors = [];
$successMessage = \'\';
$errorMessage = \'\';

$name = $email = $phone = $message = \'\';
$recaptcha_response = \'\';

// Handle form submission
if ($_SERVER[\'REQUEST_METHOD\'] === \'POST\') {

    $name    = test_input($_POST[\'name\'] ?? \'\');
    $email   = test_input($_POST[\'email\'] ?? \'\');
    $phone   = preg_replace(\'/\\D+/\', \'\', $_POST[\'phone\'] ?? \'\');
    $message = test_input($_POST[\'message\'] ?? \'\');
    $recaptcha_response = $_POST[\'recaptchaResponse\'] ?? \'\';

    if (!verifyRecaptcha($recaptcha_response)) {
        $errors[\'recaptcha\'] = "reCAPTCHA validation failed.";
    }

    if (empty($name)) {
        $errors[\'name\'] = "Name is required";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[\'email\'] = "Enter a valid email address";
    }

    if (empty($phone)) {
        $errors[\'phone\'] = "Contact number is required";
    }

    if (empty($message)) {
        $errors[\'message\'] = "Message is required";
    }

    if (empty($errors)) {
        $emailSender = new EmailSender();
        $emailTo = SMTP_USERNAME;
        $emailSubject = \'Contact Form Message\';

        $emailContent = "
            <table cellpadding=\'6\'>
                <tr><td><b>Name</b></td><td>{$name}</td></tr>
                <tr><td><b>Email</b></td><td>{$email}</td></tr>
                <tr><td><b>Phone</b></td><td>{$phone}</td></tr>
                <tr><td><b>Message</b></td><td>".nl2br($message)."</td></tr>
            </table>
        ";

        if ($emailSender->sendEmail($emailTo, $emailSubject, $emailContent)) {
            $successMessage = "Your message has been sent successfully!";
            $name = $email = $phone = $message = \'\';
        } else {
            $errorMessage = "Sorry, there was an issue sending your message.";
        }
    }
}
?>

<div class="row">

    <!-- Success / Error Messages -->
    <div class="col-12">
        <?php if (!empty($successMessage)): ?>
            <div class="alert alert-success alert-dismissible fade show text-center">
                <?= $successMessage ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php elseif (!empty($errorMessage)): ?>
            <div class="alert alert-danger alert-dismissible fade show text-center">
                <?= $errorMessage ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
    </div>

    <!-- Name -->
    <div class="col-12 my-3">
        <label class="form-label">Name<span class="text-danger">*</span></label>
        <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($name) ?>">
        <?php if (!empty($errors[\'name\'])): ?>
            <small class="text-danger"><?= $errors[\'name\'] ?></small>
        <?php endif; ?>
    </div>

    <!-- Email -->
    <div class="col-md-6 my-3">
        <label class="form-label">Email<span class="text-danger">*</span></label>
        <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($email) ?>">
        <?php if (!empty($errors[\'email\'])): ?>
            <small class="text-danger"><?= $errors[\'email\'] ?></small>
        <?php endif; ?>
    </div>

    <!-- Phone -->
    <div class="col-md-6 my-3">
        <label class="form-label">Phone<span class="text-danger">*</span></label>
        <input type="tel" name="phone" class="form-control" value="<?= htmlspecialchars($phone) ?>">
        <?php if (!empty($errors[\'phone\'])): ?>
            <small class="text-danger"><?= $errors[\'phone\'] ?></small>
        <?php endif; ?>
    </div>

    <!-- Message -->
    <div class="col-12 my-3">
        <label class="form-label">Message<span class="text-danger">*</span></label>
        <textarea name="message" rows="5" class="form-control"><?= htmlspecialchars($message) ?></textarea>
        <?php if (!empty($errors[\'message\'])): ?>
            <small class="text-danger"><?= $errors[\'message\'] ?></small>
        <?php endif; ?>
    </div>

    <!-- reCAPTCHA -->
    <input type="hidden" name="recaptchaResponse" id="recaptchaResponse">
    <?php if (!empty($errors[\'recaptcha\'])): ?>
        <div class="col-12">
            <small class="text-danger"><?= $errors[\'recaptcha\'] ?></small>
        </div>
    <?php endif; ?>

    <!-- Submit -->
    <div class="col-12 mt-4">
        <input type="submit" name="submit" value="Send Message">
    </div>
</div>



<!-- Google reCAPTCHA -->
<script src="https://www.google.com/recaptcha/api.js?render=<?= GOOGLE_RECAPTCHA_SITE_KEY ?>"></script>
<script>
    grecaptcha.ready(function() {
        grecaptcha.execute(\'<?= GOOGLE_RECAPTCHA_SITE_KEY ?>\', {action: \'submit\'}).then(function(token) {
            document.getElementById(\'recaptchaResponse\').value = token;
        });
    });
</script>


<?php
return ob_get_clean();
return;
';
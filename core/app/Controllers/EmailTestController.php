<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use CodeIgniter\Email\Email;

class EmailTestController extends Controller
{
    public string $fromEmail;
    public string $fromName;
    public string $recipients = 'amit@lopamudracreative.com';

    public function __construct()
    {
        $this->fromEmail = getenv('MAIL_FROM_ADDRESS');
        $this->fromName  = getenv('MAIL_FROM_NAME');
    }

    public function sendEmail()
    {
        $email = \Config\Services::email();

        $email->setFrom($this->fromEmail, $this->fromName);
        $email->setTo($this->recipients); // change this!
        $email->setSubject('Test Email from CodeIgniter');
        $email->setMessage('<h2>This is a test email sent using CodeIgniter and SMTP.</h2>');

        if ($email->send()) {
            return '✅ Email sent successfully!';
        } else {
            return '❌ Failed to send email: <pre>' . print_r($email->printDebugger(['headers']), true) . '</pre>';
        }
    }
}
<?php

    /**
     * Mail class that can be used to send emails throught the website. Includes email templates features, etc
     * 
     * @author Joshua Kissoon
     * @since 20130808
     * @updated 20140615 
     */
    class EMail
    {

        private $recipients = array();
        public $sender, $subject, $message;

        /**
         * Constructor of the email class doing nothing. 
         */
        function __construct()
        {
            return $this;
        }

        /**
         * Adds a recipient to the email
         * 
         * @param $recipient The email address of the recipient
         */
        public function addRecipient($recipient)
        {
            $this->recipients[] = $recipient;
            return $this;
        }

        /**
         * Sets the sender of the email
         * 
         * @param $sender The email address of the sender
         */
        public function setSender($sender)
        {
            $this->sender = $sender;
            return $this;
        }

        /**
         * Sets the message to be sent
         * 
         * @param $message
         */
        public function setMessage($message)
        {
            $this->message = $message;
            return $this;
        }

        /**
         * Sets the subject of the email
         * 
         * @param $subject
         */
        public function setSubject($subject)
        {
            $this->subject = $subject;
            return $this;
        }

        /**
         * Composes the email, adds the necessary headers and sends the email
         */
        public function sendMail()
        {
            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= "From: $this->sender" . "\r\n";
            $recipients = implode(", ", $this->recipients);
            mail($recipients, $this->subject, $this->message, $headers);
        }

        /**
         * A quick single-method call that composes and sends an email at once
         * 
         * @param $recipient A Recipient to send the email to
         * @param $subject
         * @param $message
         * @param $from
         */
        public static function quickMail($recipient, $subject, $message, $from)
        {
            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= "From: $from" . "\r\n";
            mail($recipient, $subject, $message, $headers);
        }

        /*         * *********************************************************************
         * Manage E-mail Templates
         *     
         * @author Sandeep Gantait
         * @since 20140731
         * ********************************************************************* */

        /**
         * Returns the main message of the email
         * 
         * @return Html
         */
        public function getEmailHeaderFooter($body)
        {
            /* get header */
            $tpl = new Template(SiteConfig::templatesPath() . "views/email/email-header");
            $header = $tpl->parse();
            /* get footer */
            $tpl1 = new Template(SiteConfig::templatesPath() . "views/email/email-footer");
            /* get social widget links */
            $facebook = StaticPage::getSocialWidget(1);
            $twitter = StaticPage::getSocialWidget(2);
            $google = StaticPage::getSocialWidget(3);
            $tpl1->facebook = valid($facebook) ? $facebook : "";
            $tpl1->twitter = valid($twitter) ? $twitter : "";
            $tpl1->google = valid($google) ? $google : "";
            JPath::fullUrl("");

            $footer = $tpl1->parse();
            /* combine both header and footer, and puts the main body between them */
            /* Body of the email */
            $this->message = $header . $body . $footer;
            /* get email full template */
            $main = new Template(SiteConfig::templatesPath() . "views/email/email");
            $main->header = $header;
            $main->body = $body;
            $main->footer = $footer;
            return $main->parse();
        }

        public function emailRegisterationSuccessful()
        {
            $tpl = new Template(SiteConfig::templatesPath() . "views/email/registration-success");
            $body = $tpl->parse();
            return $this->getEmailHeaderFooter($body);
        }

        public function emailVerify($link, $email)
        {
            $tpl = new Template(SiteConfig::templatesPath() . "views/email/verify-email");
            $tpl->link = $link;
            $tpl->name = $email;
            $body = $tpl->parse();
            return $this->getEmailHeaderFooter($body);
        }

        public function emailVerifySuccess()
        {
            $tpl = new Template(SiteConfig::templatesPath() . "views/email/verify-email-success");
            $body = $tpl->parse();
            return $this->getEmailHeaderFooter($body);
        }

        public function emailForgotPassword($link, $email)
        {
            $tpl = new Template(SiteConfig::templatesPath() . "views/email/forgot-password");
            $tpl->link = $link;
            $tpl->name = $email;
            $body = $tpl->parse();
            return $this->getEmailHeaderFooter($body);
        }

        public function emailPasswordChangeSuccess($link, $email)
        {
            $tpl = new Template(SiteConfig::templatesPath() . "views/email/password-change-success");
            $tpl->link = $link;
            $tpl->name = $email;
            $body = $tpl->parse();
            return $this->getEmailHeaderFooter($body);
        }

        public function emailNewOffer()
        {
            $tpl = new Template(SiteConfig::templatesPath() . "views/email/new-offer");
            $body = $tpl->parse();
            return $this->getEmailHeaderFooter($body);
        }

        public function emailOrderInfo()
        {
            $tpl = new Template(SiteConfig::templatesPath() . "views/email/order-info");
            $body = $tpl->parse();
            return $this->getEmailHeaderFooter($body);
        }

    }
    
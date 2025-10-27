<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    /**
     * Expéditeur par défaut
     */
    public string $fromEmail  = '';
    public string $fromName   = '';
    public string $recipients = '';

    /**
     * Agent utilisateur
     */
    public string $userAgent = 'CodeIgniter 4 Mailer';

    /**
     * Protocole d’envoi : mail | sendmail | smtp
     */
    public string $protocol = 'smtp';

    /**
     * Chemin de Sendmail (si utilisé)
     */
    public string $mailPath = '/usr/sbin/sendmail';

    /**
     * Configuration SMTP
     */
    public string $SMTPHost = '';
    public string $SMTPUser = '';
    public string $SMTPPass = '';
    public int    $SMTPPort = 587;
    public int    $SMTPTimeout = 10;
    public bool   $SMTPKeepAlive = false;
    public string $SMTPCrypto = 'tls'; // tls ou ssl

    /**
     * Formatage du message
     */
    public bool   $wordWrap = true;
    public int    $wrapChars = 76;
    public string $mailType = 'html'; // html ou text
    public string $charset  = 'UTF-8';
    public bool   $validate = true;
    public int    $priority = 3;
    public string $CRLF = "\r\n";
    public string $newline = "\r\n";

    /**
     * Mode BCC & accusés
     */
    public bool $BCCBatchMode = false;
    public int  $BCCBatchSize = 200;
    public bool $DSN = false;

    /**
     * Constructeur : charge les valeurs depuis le .env
     */
    public function __construct()
    {
        parent::__construct();

        $this->fromEmail  = env('email.fromEmail', 'no-reply@rcltv.net');
        $this->fromName   = env('email.fromName', 'RCL TV');
        $this->protocol   = env('email.protocol', 'smtp');
        $this->SMTPHost   = env('email.SMTPHost', 'smtp.rcltv.net');
        $this->SMTPUser   = env('email.SMTPUser', '');
        $this->SMTPPass   = env('email.SMTPPass', '');
        $this->SMTPPort   = (int) env('email.SMTPPort', 587);
        $this->SMTPCrypto = env('email.SMTPCrypto', 'tls');
        $this->mailType   = env('email.mailType', 'html');
        $this->charset    = env('email.charset', 'UTF-8');
    }
}

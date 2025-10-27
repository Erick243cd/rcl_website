<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ContactModel;
use App\Models\CoordonneeModel;

class Contacts extends BaseController

{
    protected ContactModel $contactModel;
    protected CoordonneeModel $coordonneeModel;

    public function __construct()
    {
        $this->contactModel = new ContactModel();
        $this->coordonneeModel = new CoordonneeModel();
    }
    public function index()
    {
        //
    }

    public function submit()
    {
        $adminInfoData = $this->coordonneeModel->asObject()->first();

        if ($this->request->is('post')) {
            $data = [
                'email' => htmlentities($this->request->getPost('email')),
                'subject' => htmlentities($this->request->getPost('subject')),
                'message' => htmlentities($this->request->getPost('message')),
                'created_at' => date('Y-m-d H:i:s'),
            ];

            if ($this->contactModel->insert($data)) {
                session()->setFlashData("success", "Votre message a été envoyé avec succès. Nous vous contacterons bientôt !");
                $this->sendEmailNotification($data, $adminInfoData);
                return redirect()->to('/contact');
            } else {
                session()->setFlashData("error", "Une erreur s'est produite lors de l'envoi de votre message. Veuillez réessayer.");
                return redirect()->to('/contact');
            }
        }
    }

    private function sendEmailNotification(array $data, object $admin): void
    {
        $email = service('email');

        $email->setTo($admin->email)
            ->setSubject('Nouveau message de contact reçu')
            ->setMessage(
                sprintf(
                    "Vous avez reçu un nouveau message de contact :\n\n" .
                        "Email : %s\n" .
                        "Sujet : %s\n" .
                        "Message :\n%s\n",
                    esc($data['email']),
                    esc($data['subject']),
                    esc($data['message'])
                )
            );

        if (! $email->send()) {
            log_message('error', 'Échec de l’envoi de l’email : ' . $email->printDebugger(['headers', 'subject']));
        }
    }
}

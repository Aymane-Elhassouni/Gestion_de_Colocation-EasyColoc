<?php

// Crée un système de notification. Il doit y avoir une interface Notifiable 
// avec une méthode envoyer() qui retourne une chaîne. Crée deux classes EmailNotification 
// et SmsNotification qui implémentent Notifiable. Ensuite crée NotificationService qui contient
//  une liste de notifications (Notifiable[]). Il doit avoir une méthode ajouter(Notifiable $n) 
//  et une méthode envoyerTout() 
// qui parcourt la liste et affiche le résultat de envoyer() pour chaque notification.

interface  Notifiable{
    public function envoyer();
}

class SmsNotification implements Notifiable{
    public function envoyer(){
        return 'sms';
    }
}

class EmailNotification implements Notifiable{
   public function envoyer(){
        return 'email';
    }
}

class NotificationService{
    private array $notifiable = [];

    public function ajouter(Notifiable $n){
       $this->notifiable[] = $n;
    }
    public function envoyerTout(){
       foreach($this->notifiable as $n){
        echo $n->envoyer();
       }
    }
}

$ns = new NotificationService();
$ns->ajouter(new EmailNotification());
$ns->envoyerTout();
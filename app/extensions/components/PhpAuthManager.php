<?php

class PhpAuthManager extends CPhpAuthManager{
    public function init(){
        // Èåğàğõèş ğîëåé ğàñïîëîæèì â ôàéëå auth.php â äèğåêòîğèè config ïğèëîæåíèÿ
        if($this->authFile===null){
            $this->authFile=Yii::getPathOfAlias('application.config.auth').'.php';
        }
 
        parent::init();
 
        // Äëÿ ãîñòåé ó íàñ è òàê ğîëü ïî óìîë÷àíèş guest.
        if(!Yii::app()->user->isGuest){
            // Ñâÿçûâàåì ğîëü, çàäàííóş â ÁÄ ñ èäåíòèôèêàòîğîì ïîëüçîâàòåëÿ,
            // âîçâğàùàåìûì UserIdentity.getId().
            $this->assign(Yii::app()->user->role, Yii::app()->user->id);
        }
    }
}
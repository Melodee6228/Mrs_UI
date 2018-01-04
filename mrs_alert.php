<?php
namespace app\MrsUI;

use std, gui, framework, app;

class mrs_alert
{
    public function Mrs_alert_show($title,$txt,$Animation_show)
    {
        //Mrs_alert
        $form = new UXForm();
        $form->centerOnScreen();//Оцентровать по середине
        $form->modality = 'APPLICATION_MODAL';
        $form->layout->size = [448,304];
        $form->style = 'TRANSPARENT';
        $form->layout->backgroundColor = 'transparent';
        $form->transparent = true;
        $form->title = $title;
        //end settings
        $background = new UXRectangle();
        $background->size = [400,256];
        $background->position = [24,24];
        $background->fillColor = 'white';
        $background->focusTraversable = false;
        //buttonMove
        $move = new UXMaterialButton();
        $move->position = [24,24];
        $move->size = [400,32];
        $move->focusTraversable = false;
        $move->text = $title;
        //buttonApply
        $buttonApply = new UXMaterialButton();
        $buttonApply->position = [384,24];
        $buttonApply->size = [32,32];
        $buttonApply->focusTraversable = false;
        $buttonApply->backgroundColor = '#ccffcc';
        $buttonApply->text = 'Ok';
        //text
        $text = new UXLabel();
        $text->position = [24,56];
        $text->size = [400,224];
        $text->text = $txt;
        $text->alignment = 'TOP_LEFT';
        $text->wrapText = true;
        //shadow(background)
        $Shadow = new DropShadowEffectBehaviour();
        $Shadow->apply($background);//Add background
        //shadow(move)
        $ShadowMove = new DropShadowEffectBehaviour();
        $ShadowMove->apply($move);//Add move
        //shadow(Text)
        $ShadowText = new DropShadowEffectBehaviour();
        $ShadowText->apply($text);//Add move
        //moveEffect
        $move_ = new DraggingFormBehaviour();
        $move_->opacityEnabled = true;
        $move_->apply($move);
        //Event
        $buttonApply->on('click', function () use ($form) {
            $form->hide();
        });
        //add component
        $form->add($background);
        $form->add($move);
        $form->add($buttonApply);
        $form->add($text);
        //showing
        if($Animation_show == true)
        {
            $time = 2000;
            $form->opacity = 0; // делаем её прозрачной
            Animation::fadeIn($form, $time);
        }
        $form->showAndWait();
    }
}
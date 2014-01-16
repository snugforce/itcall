<?php
    $mas = array();
    foreach($comments as $comment):
        $mas[$comment->id] = array(
            'image' => 'holder.js/64x64',
            'heading' => TbHtml::b($comment->user->name). ', '.
                date( "d.m.y H:i", $comment->create_time).', '.
                TbHtml::code($comment->status->name),
            'content' => TbHtml::lead(nl2br(CHtml::encode($comment->txt))),
        );
    endforeach;
    echo TbHtml::mediaList($mas);
?>
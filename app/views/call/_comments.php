<?php
    $mas = array();
    foreach($comments as $comment):
        $image = $comment->user->avatar;
        if ($image == ''){
            $image = '/img/users/noimage.png';
        }
        $mas[$comment->id] = array(
            'image' => $image,
            'heading' => TbHtml::b($comment->user->name). ', '.
                date( "d.m.y H:i", $comment->create_time).', '.
                TbHtml::code($comment->status->name),
            'content' => TbHtml::lead(nl2br(CHtml::encode($comment->txt))),
            'class' => 'comment',
        );
    endforeach;
    echo TbHtml::mediaList($mas);
?>
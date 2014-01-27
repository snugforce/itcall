<?php
    $mas = array();
    foreach($comments as $comment):
        $image = $comment->user->avatar;
        if ($image == ''){
            $image = '/img/users/noimage.png';
        }
        $mas[$comment->id] = array(
            'image' => $image,
            'heading' => TbHtml::small(TbHtml::b($comment->user->name). ', '.
                date( "d.m.y H:i", $comment->create_time).', '.
                TbHtml::code($comment->status->name)),
            'content' => nl2br(CHtml::encode($comment->txt)),
            'class' => 'comment',
        );
    endforeach;
    //echo TbHtml::mediaList($mas);
    echo '<ul class="media-list">';
    foreach($mas as $m):
        echo '<li class="comment media">';
        echo '<a href="#" class="pull-left">';
        echo '<img class="media-object img-circle" src="'.$m['image'].'" alt=""></a>';
        echo '<div class="media-body">';
        echo '<div class="media-heading">'.$m['heading'].'</div>'.$m['content'].'</div>';
        echo '</li>';
    endforeach;
    echo '</ul>';
?>
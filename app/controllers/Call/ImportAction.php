<?php
class ImportAction extends CAction
{
 public function run()
    {
        $tickets=Tickets::model()->findAll();
        echo "test2";
        foreach($tickets as $ticket){
            //$ticket = new Tickets();
            $call = new Call();
            $call->name = $ticket->fio;
            echo $call->name;
            switch ($ticket->corp){
                case '�':
                    $call->group_id=1;
                    break;
                case '�':
                    $call->group_id=2;
                    break;
                case '�':
                    $call->group_id=3;
                    break;
            }
            switch ($ticket->title){
                case '�������':
                    $call->category_id=1;
                    break;
                case '��������� ����':
                    $call->category_id=2;
                    break;
                case '�������':
                    $call->category_id=3;
                    break;
                case '����':
                    $call->category_id=4;
                    break;
                case '����������� �����������':
                    $call->category_id=5;
                    break;
                case '������':
                    $call->category_id=6;
                    break;
            }
            $call->ip = $ticket->ip;
            $call->txt = $ticket->comment;
            $call->office = $ticket->cab;
            $a = date_parse_from_format('Y:n:j H:i:s', $ticket->date);
            $timestamp = mktime($a['hour'], $a['minute'], $a['second'], $a['month'], $a['day'], $a['year']);
            $call->create_time = $timestamp;
            $a = date_parse_from_format('Y:n:j H:i:s', $ticket->edit_date);
            $timestamp = mktime($a['hour'], $a['minute'], $a['second'], $a['month'], $a['day'], $a['year']);
            $call->update_time = $timestamp;
            switch ($ticket->status){
                case '�� ���������':
                    $call->status_id=1;
                    break;
                case '���������':
                    $call->status_id=2;
                    break;
            }
            $call->save();
            $cm = new Comment();
            $cm->call_id = $call->id;
            $cm->user_id = 2;
            $cm->create_time = $call->update_time;
            $cm->status_id = $call->status_id;
            $cm->txt = $ticket->ps;
            $cm->save();
        }
    }
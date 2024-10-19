<?php
/**
 * Created by PhpStorm.
 * User: miliscript
 * Date: 2/26/2020
 * Time: 5:57 PM
 */

namespace App\LibraryFunctions;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;


class EmailSender
{
    public function sendTestEmail()
    {
        $data = array('toaddress'=>"md.saidur.rah5@gmail.com");
        Mail::send('email-views.email', $data, function($message)use($data) {
            $message->to('md.saidur.rah5@gmail.com')
                ->subject("Email System Testing Email OK");
        });
        return  "Basic Email Sent. Check your inbox.";
    }

    public function testEmail($address)
    {
        $data = array('toaddress'=>$address);
        Mail::send('email', $data, function($message)use($data) {
            $message->to('md.saidur.rah5@gmail.com')
                ->subject("Email System Testing Email OK");
        });
        return  "Basic Email Sent. Check your inbox.";
    }

    public function sendTextEmail($mailview, $toAddress, $subject, $emailBody)
    {
        $data['toaddress'] = $toAddress;
        $data['subject'] = $subject;
        $data['password'] = $emailBody;

        Mail::send($mailview, $data, function($message)use($data) {
            $message->to($data['toaddress'])
                ->subject($data['subject']);
        });
        return  true;
    }


    public function sendEmailNoAttachment($mailview,$toClient, $ccClient,$emailSubject,$emailBody, $emailBodyTitle)
    {
        $data["title"] = $emailBodyTitle;
        $data["body"] = $emailBody;
        $data["toaddress"] = $toClient;
        $data["ccaddress"] = $ccClient;
        $data["subject"] = $emailSubject;

        Mail::send($mailview, $data, function($message)use($data) {
            $message->to($data["toaddress"])
                ->cc($data["ccaddress"])
                ->subject($data["subject"]);
        });
        return true;
    }


    public function sendEmailtoPublisher($mailview, $toClient,$subject,$emailBody, $detaillink  )
    {
        $data["subject"] = $subject;
        $data["body"] = $emailBody;
        $data["detaillink"] = $detaillink;
        $data["toaddress"] = $toClient;

        Mail::send($mailview, $data, function($message)use($data) {
            $message->to($data["toaddress"])
                ->subject($data["subject"]);
        });
        return true;
    }




    public function sendEmailWithAttachment($mailview, $toClient, $ccClient, Request $req, $attfileName)
    {
        $data["emailBodyTitle"] = $req->messageTitle;
        $data["subject"] = $req->emailSubject;
        $data["body"] = $req->emailBody;
        $data["detaillink"] = $req->detaillink;
        $data["meetingId"] = $req->meetinglink;

        $data["eventTitle"]=$req->eventTitle;
        $data["hostingDate"]=$req->event_hosting_date;
        $data["hostingDept"]=$req->eventHost;
        $data["startTime"] =$req->startTime;
        $data["endTime"] =$req->endTime;

        $data["creatorName"] =$req->creatorName;
        $data["creatorDesignation"] =$req->creatorDesignation;
        $data["creatordepartment"] =$req->creatordepartment;

        $data["toaddress"] = $toClient;
        $data["ccaddress"] = $ccClient;


        $files =$attfileName;
        Mail::send($mailview, $data, function($message)use($data,$files) {
            $message->to($data["toaddress"])
                ->cc($data["ccaddress"])
                ->subject($data["subject"]);
            foreach ($files as $file){
                $message->attach($file);
            }
        });
        return true;
    }



}

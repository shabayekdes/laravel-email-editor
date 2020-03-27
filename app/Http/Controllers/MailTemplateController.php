<?php

namespace App\Http\Controllers;

use App\Mail\SendInvoice;
use App\Models\MailTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $templates = MailTemplate::all();

        return response()->json(['templates' => $templates]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(MailTemplate $template)
    {
        return response()
            ->json([
                'template' => $template,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function send(Request $request)
    {
        $request->validate([
            'email_to' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);

        $data = [
            'subject' => $this->replaceVariables($request->subject),
            'message' => $this->replaceVariables($request->message)
        ];

        // return Mail::to($request->email_to)
        //     ->send(new SendInvoice($data));

        // debug
        return new SendInvoice($data);
    }

    protected function replaceVariables($message)
    {
        $items = $this->getReplaceable();

        foreach ($items as $key => $value) {
            $message = str_replace($key, $value, $message);
        }

        return $message;
    }

    protected function getReplaceable()
    {
        return [
            '{number}' => 'INV/2018/1002',
            '{business_name}' => 'John Doe Inc',
            '{customer}' => 'Jane Doe',
            '{amount}' => '$850.00',
            '{due_date}' => 'May 25th 2018',
            '{payment_link}' => 'https://example.com/payment-link'
        ];
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\EmailTemplate;
use App\Models\EmailTemplateLang;
use App\Models\UserEmailTemplate;
use App\Models\Utility;
use Illuminate\Http\Request;

class EmailTemplateController extends Controller
{

    public function index()
    {
        $EmailTemplates = EmailTemplate::all();

        return view('admin.users.setting', compact('EmailTemplates'));  
    }

    public function create()
    {
        return view('email_templates.create');
    }

    public function store(Request $request)
    {
        $usr = \Auth::user();

        $validator = \Validator::make(
            $request->all(), [
                                'name' => 'required',
                            ]
        );

        if($validator->fails())
        {
            $messages = $validator->getMessageBag();

            return redirect()->back()->with('error', $messages->first());
        }

        $EmailTemplate             = new EmailTemplate();
        $EmailTemplate->name       = $request->name;
        $EmailTemplate->slug       = strtolower(str_replace(' ', '_', $request->name));
        $EmailTemplate->from       = env('APP_NAME');
        $EmailTemplate->created_by = $usr->id;
        $EmailTemplate->save();

        return redirect()->route('email_template.index')->with('success', __('Email Template successfully created.'));  
    }


    public function show(EmailTemplate $emailTemplate)
    {
        //
    }


    public function edit(EmailTemplate $emailTemplate)
    {
        //
    }

    public function update(Request $request,$id)
    {
        $validator = \Validator::make(
            $request->all(), [
                               'from' => 'required',
                               'subject' => 'required',
                               'content' => 'required',
                           ]
        );

        if($validator->fails())
        {
            $messages = $validator->getMessageBag();
            return redirect()->back()->with('error', $messages->first());
        }

        $emailTemplate       = EmailTemplate::where('id',$id)->first();
        $emailTemplate->from = $request->from;
        $emailTemplate->save();

        $emailLangTemplate = EmailTemplateLang::where('parent_id', '=', $id)->where('lang', '=', $request->lang)->first();
        
        // if record not found then create new record else update it.
        if(empty($emailLangTemplate))
        {
            $emailLangTemplate            = new EmailTemplateLang();
            $emailLangTemplate->parent_id = $id;
            $emailLangTemplate->lang      = $request['lang'];
            $emailLangTemplate->subject   = $request['subject'];
            $emailLangTemplate->content   = $request['content'];
            $emailLangTemplate->save();
        }
        else
        {
            $emailLangTemplate->subject = $request['subject'];
            $emailLangTemplate->content = $request['content'];
            $emailLangTemplate->save();
        }

        return redirect()->route(
            'manage.email.language', [
                                       $emailTemplate->id,
                                       $request->lang,
                                   ]
        )->with('success', __('Email Template successfully updated.'));
    }

    public function destroy(EmailTemplate $emailTemplate)
    {
        //
    }

    // Used For View Email Template Language Wise
    public function manageEmailLang($id, $lang = 'en')
    {    
        $languages         = Utility::languages();
        $emailTemplate = EmailTemplate::where('id', '=', $id)->first();
        $EmailTemplates = EmailTemplate::all();
        // $currEmailTempLang = EmailTemplateLang::where('lang', $lang)->first();
        $currEmailTempLang = EmailTemplateLang::where('parent_id', '=', $id)->where('lang', $lang)->first();
        if(!isset($currEmailTempLang) || empty($currEmailTempLang))
        {
            $currEmailTempLang       = EmailTemplateLang::where('parent_id', '=', $id)->where('lang', 'en')->first();
        
            $currEmailTempLang->lang = $lang;
        }

        return view('email_templates.show', compact('emailTemplate', 'languages', 'currEmailTempLang','EmailTemplates')); 
    }

    // Used For Store Email Template Language Wise
    public function storeEmailLang(Request $request, $id)
    {
        $validator = \Validator::make(
            $request->all(), [
                                'subject' => 'required',
                                'content' => 'required',
                            ]
        );

        if($validator->fails())
        {
            $messages = $validator->getMessageBag();

            return redirect()->back()->with('error', $messages->first());
        }

        $emailLangTemplate = EmailTemplateLang::where('parent_id', '=', $id)->where('lang', '=', $request->lang)->first();
        // if record not found then create new record else update it.
        if(empty($emailLangTemplate))
        {
            $emailLangTemplate            = new EmailTemplateLang();
            $emailLangTemplate->parent_id = $id;
            $emailLangTemplate->lang      = $request['lang'];
            $emailLangTemplate->subject   = $request['subject'];
            $emailLangTemplate->content   = $request['content'];
            $emailLangTemplate->save();
        }
        else
        {
            $emailLangTemplate->subject = $request['subject'];
            $emailLangTemplate->content = $request['content'];
            $emailLangTemplate->save();
        }

        return redirect()->route(
            'manage.email.language', [
                                        $id,
                                        $request->lang,
                                    ]
        )->with('success', __('Email Template Detail successfully updated.'));
        
    }

    // Used For Update Status owner Wise.
    
    public function updateStatus(Request $request, $id)
    {
        $usr = \Auth::user();  
        $user_email = UserEmailTemplate::where('id', '=', $id)->where('user_id', '=', $usr->id)->first();
        
        if(!empty($user_email))
        {
            if($request->status == 1)
            {
                $user_email->is_active = 0;
            }
            else
            {
                $user_email->is_active = 1;
            }

            $user_email->save();

            return response()->json(
                [
                    'is_success' => true,
                    'success' => __('Status successfully updated!'),
                ], 200
            );
            
        }
    }
    
}

<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\AddPageRequest;
use App\Models\Contact;


class UserController extends Controller
{
    public function index(): string
    {
        return 'hello';
    }

    public function update(Request $req)
    {

    }

    public function store(ContactRequest $req)
    {
        $contact = new Contact();
        $contact->name = $req->input('name');
        $contact->email = $req->input('email');
        $contact->password = $req->input('password');
        $contact->password_confirmation = $req->input('password_confirmation');
        $contact->save();

        return redirect()->route('ok')->with('success', "Data has been added");
    }


    public function addPage(AddPageRequest $req)
    {
        $page = new Page();
        if ($req->hasFile('file')) {
            $file = $req->file('file');
            $path = $file->store('files');
            $link = 'storage/' . $path;
            $title = $req->input('title');
            $keywords = $req->input('keywords');
            $text = $req->input('text');
            $page->create(['file' => $link,
                'title' => $title,
                'keywords' => $keywords,
                'text' => $text]);
        } else {
            $page->title = $req->input('title');
            $page->keywords = $req->input('keywords');
            $page->text = $req->input('text');
            $page->save();
        }
        return redirect()->route('ok')->with('success', "Data has been added");
    }
}

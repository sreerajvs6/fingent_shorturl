<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
use Illuminate\Http\Request;
use App\Lib\Generate;
use App\Traits\Base62EncodingTrait;

class URLShortnerController extends Controller
{
    use Base62EncodingTrait;

    public function index()
    {
        return view('shorturl');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
           'link' => 'required|url'
        ]);

        $long_url= $request->link;

        $urlexist = ShortUrl::where('long_url',$long_url)->first();

        if(empty($urlexist))
        {

        //$generate = new Generate();
        $short_url = $this->base62encode();
        $short_url = 'http://fing.tny/'.$short_url;

        $newurl = new ShortUrl();
        $newurl->long_url= $long_url;
        $newurl->short_url= $short_url;
        $newurl->save();

        }
        else
        {
            $short_url = $urlexist->short_url;
        }
        return redirect('generateshortlink')
             ->with('success', $short_url);
    }

    public function loadCheckPage()
    {
        return view('checkurl');
    }

    public function checkLink(Request $request)
    {

        $validated = $request->validate([
            'link' => 'required|url'
         ]);

        $link = $request->link;

        $urlexist = ShortUrl::where('short_url',$link)->first();

        if(!empty($urlexist))
        {
            return redirect($urlexist->long_url);
        }
        else
        {
            return redirect('checklink')
                ->with('error','Invalid URL');
        }
    }




}

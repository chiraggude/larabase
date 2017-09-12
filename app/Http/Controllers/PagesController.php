<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Feedback;

class PagesController extends Controller {

	public function home()
	{
		return view('pages.home');
	}


    public function getFeedback()
    {
        return view('pages.feedback');
    }


    public function saveFeedback()
    {
        $validator = Feedback::validate($data = Input::all());
        if ($validator->fails())
        {
            return Response::json(['valid'=> false, 'errors' => $validator->errors()]);
        }
        Feedback::create($data);
        return Response::json(['valid'=> true,'message' => Lang::get('larabase.feedback_submitted')]);
        Event::fire('feedback.submitted', [$data]);
    }


    public function about()
    {
        return view('pages.about');
    }


    public function faqs()
    {
        return view('pages.faqs');
    }


    public function terms()
    {
        return view('pages.terms');
    }


    public function privacy()
    {
        return view('pages.privacy');
    }

}

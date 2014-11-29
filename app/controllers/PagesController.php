<?php

class PagesController extends \BaseController {

	public function home()
	{
		return View::make('pages.home');
	}


    public function feedback()
    {
        return View::make('pages.feedback');
    }


    public function saveFeedback()
    {
        $validator = Feedback::validate($data = Input::all());
        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        Feedback::create($data);
        Event::fire('feedback.submitted', array($data));
        return Redirect::back()->withSuccess(Lang::get('larabase.feedback_submitted'));
    }


    public function about()
    {
        return View::make('pages.about');
    }


    public function faqs()
    {
        return View::make('pages.faqs');
    }


    public function terms()
    {
        return View::make('pages.terms');
    }


    public function privacy()
    {
        return View::make('pages.privacy');
    }

}

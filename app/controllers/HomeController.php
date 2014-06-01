<?php

class HomeController extends BaseController {

	public function home()
	{
		return View::make('home');
	}

    public function feedbackShow()
    {
        return View::make('pages.feedback');
    }

    public function feedbackSave()
    {
        $data = Input::all();
        $validator = Feedback::validate($data);
        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        Feedback::create($data);
        Event::fire('feedback.submitted', array($data));
        return Redirect::back()->withSuccess('Thanks for your feedback. We will be in touch soon!');
    }

    public function about()
    {
        return View::make('pages.about');
    }

    public function faqs()
    {
        return View::make('pages.faqs');
    }

}

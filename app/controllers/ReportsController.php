<?php

class ReportsController extends \BaseController {

	/**
	 * Display a listing of reports
	 *
	 */
	public function index()
	{
		$reports = Report::paginate(5);

		return View::make('reports.index', compact('reports'));
	}

	/**
	 * Show the form for creating a new report
	 *
	 */
	public function create()
	{
		return View::make('reports.create');
	}

	/**
	 * Store a newly created report in storage.
	 *
	 */
	public function store()
	{
        $data = Input::all();

        $validator = Report::validate($data);

        if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		Report::create($data);
        $event = Event::fire('report.created', array($data));
		return Redirect::route('reports.index')->withSuccess('Report created');
	}

	/**
	 * Display the specified report.
	 *
	 */
	public function show($id)
	{
		$report = Report::findOrFail($id);

		return View::make('reports.show', compact('report'));
	}

	/**
	 * Show the form for editing the specified report.
	 *
	 */
	public function edit($id)
	{
		$report = Report::find($id);

		return View::make('reports.edit', compact('report'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 */
	public function update($id)
	{
		$report = Report::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Report::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$report->update($data);

		return Redirect::route('reports.index')->withInfo('Report Updated');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 */
	public function destroy($id)
	{
		Report::destroy($id);

		return Redirect::route('reports.index')->withWarning('Report Deleted');
	}

}
<?php

use Acme\Transformers\LessonTransformer;

class LessonsController extends ApiController {

	/**
	 * @var Acme\Transformers\LessonTransformer
	 */
	protected $lessonTransformer;

	function __construct(LessonTransformer $lessonTransformer)
	{
		$this->lessonTransformer = $lessonTransformer;

		$this->beforeFilter('auth.basic', ['on' => 'post']);
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$limit = Input::get('limit') ?: 3;
		$lessons = Lesson::paginate($limit);

		return $this->respondWithPagination($lessons, [
			'data' => $this->lessonTransformer->transformCollection($lessons->all())
		]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if(!Input::get('title') or !Input::get('body'))
		{
			return $this->respondUnprocessableEntity('Parameters failed validation for a lesson.');
		}

		Lesson::create(Input::all());

		return $this->respondCreated('Lesson successfully created.');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$lesson = Lesson::find($id);

		if(!$lesson)
		{
			return $this->respondNotFound('Lesson does not exist.');
		}

		return $this->respond([
			'data' => $this->lessonTransformer->transform($lesson)
		]);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}

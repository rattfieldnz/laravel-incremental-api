<?php

use Acme\Transformers\TagTransformer;

class TagsController extends ApiController {

	protected $tagTransformer;

	function __construct(TagTransformer $tagTransformer)
	{
		$this->tagTransformer = $tagTransformer;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @param $lessonId
	 * @return mixed
     */
	public function index($lessonId = null)
	{
		return $this->getTags($lessonId);
	}

	/**
	 * @param $lessonId
	 * @return mixed
	 */
	public function getTags($lessonId)
	{
		$tags = $lessonId ? Lesson::findOrFail($lessonId)->tags : Tag::all();

		return $this->respond([
			'data' => $this->tagTransformer->transformCollection($tags->all())
		]);
	}


}

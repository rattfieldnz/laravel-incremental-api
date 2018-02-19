<?php
/**
 * Created by PhpStorm.
 * User: robattfield
 * Date: 10-Feb-2015
 * Time: 21:20
 */

use Illuminate\Http\Response as IlluminateResponse;
use Illuminate\Pagination\Paginator;

/**
 * Class ApiController
 */
class ApiController extends BaseController{

    /**
     * @var int Status Code.
     */
    protected $statusCode = 200;

    /**
     * Getter method to return stored status code.
     *
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Setter method to set status code.
     * It is returning current object
     * for chaining purposes.
     *
     * @param mixed $statusCode
     * @return current object.
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * Function to return an unauthorized response.
     *
     * @param string $message
     * @return mixed
     */
    public function respondUnauthorizedError($message = 'Unauthorized!')
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_UNAUTHORIZED)->respondWithError($message);
    }

    /**
     * Function to return forbidden error response.
     * @param string $message
     * @return mixed
     */
    public function respondForbiddenError($message = 'Forbidden!')
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_FORBIDDEN)->respondWithError($message);
    }

    /**
     * Function to return a Not Found response.
     *
     * @param string $message
     * @return mixed
     */
    public function respondNotFound($message = 'Not Found')
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_NOT_FOUND)->respondWithError($message);
    }

    /**
     * Function to return an internal error response.
     *
     * @param string $message
     * @return mixed
     */
    public function respondInternalError($message = 'Internal Error!')
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_INTERNAL_SERVER_ERROR)->respondWithError($message);
    }


    /**
     * Function to return a service unavailable response.
     *
     * @param string $message
     * @return mixed
     */
    public function respondServiceUnavailable($message = "Service Unavailable!")
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_SERVICE_UNAVAILABLE)->respondWithError($message);
    }


    /**
     * Function to return a generic response.
     *
     * @param $data Data to be used in response.
     * @param array $headers Headers to b used in response.
     * @return mixed Return the response.
     */
    public function respond($data, $headers = [])
    {
        return response()->json($data, $this->getStatusCode(), $headers);
    }


    /**
     * Function to return an error response.
     *
     * @param $message
     * @return mixed
     */
    public function respondWithError($message)
    {
        return $this->respond([
            'error' => [
                'message' => $message,
                'status_code' => $this->getStatusCode()
            ]
        ]);
    }


    /**
     * @param $message
     * @return mixed
     */
    protected function respondCreated($message)
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_CREATED)
            ->respond([
                'message' => $message
            ]);
    }


    /**
     * @param $message
     * @return mixed
     */
    protected function respondUnprocessableEntity($message)
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_UNPROCESSABLE_ENTITY)
            ->respond([
                'message' => $message
            ]);
    }

    /**
     * @param Paginator $lessons
     * @param $data
     * @return mixed
     */
    protected function respondWithPagination(Paginator $lessons, $data)
    {

        $data = array_merge($data, [
            'paginator' => [
                'total_count' => $lessons->getTotal(),
                'total_pages' => ceil($lessons->getTotal() / $lessons->getPerPage()),
                'current_page' => $lessons->getCurrentPage(),
                'limit' => $lessons->getPerPage()
            ]
        ]);

        return $this->respond($data);
    }
}

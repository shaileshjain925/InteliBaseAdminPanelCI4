<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Traits\CommonTraits;
use ApiResponseStatusCode;
use App\Models\FunctionModel;
use Exception;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    use CommonTraits;
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var list<string>
     */
    protected $helpers = ['commonfunction', 'project'];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        //--------------------------------------------------------------------
        // Preload any models, libraries, etc, here.
        //--------------------------------------------------------------------
        // E.g.: $this->session = \Config\Services::session();
        $session = \Config\Services::session();
        $language = \Config\Services::language();
        $language->setLocale($session->lang);
    }

    protected function api_get(FunctionModel $modelInstance)
    {
        try {
            $requestedData = (array) getRequestData($this->request, 'ARRAY') ?? [];
            $validation = \Config\Services::validation();
            // Define validation rules
            $validation->setRules([
                $modelInstance->getPrimaryKey() => 'required',
            ]);
            // Run validation
            if ($validation->run($requestedData) === false) {
                return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::VALIDATION_FAILED, 'Validation Failed', [], $validation->getErrors());
            }
            $result = $modelInstance->RecordGet($requestedData[$modelInstance->getPrimaryKey()]);
            return formatApiAutoResponse($this->request, $this->response, $result);
        } catch (Exception $e) {
            return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
        }
    }
    protected function api_list(FunctionModel $modelInstance)
    {
        try {
            $filter = getRequestData($this->request, 'ARRAY') ?? [];
            $result = $modelInstance->RecordList($filter);
            return formatApiAutoResponse($this->request, $this->response, $result);
        } catch (Exception $e) {
            return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
        }
    }
    protected function api_create(FunctionModel $modelInstance, &$returnResultInArray = [])
    {
        try {
            $requestData = getRequestData($this->request, 'ARRAY') ?? [];
            $result = $modelInstance->RecordCreate($requestData);
            $returnResultInArray = $result;
            return formatApiAutoResponse($this->request, $this->response, $result);
        } catch (Exception $e) {
            return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
        }
    }

    protected function api_update(FunctionModel $modelInstance, &$returnResultInArray = [])
    {
        try {
            $requestData = getRequestData($this->request, 'ARRAY') ?? [];
            $result = $modelInstance->RecordUpdate($requestData, $requestData[$modelInstance->getPrimaryKey()]);
            $returnResultInArray = $result;
            return formatApiAutoResponse($this->request, $this->response, $result);
        } catch (Exception $e) {
            return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
        }
    }
    protected function api_delete(FunctionModel $modelInstance, &$returnResultInArray = [])
    {
        try {
            $requestData = getRequestData($this->request, 'ARRAY') ?? [];
            $validation = \Config\Services::validation();
            // Define validation rules
            $validation->setRules([
                $modelInstance->getPrimaryKey() => 'required',
            ]);
            // Run validation
            if ($validation->run($requestData) === false) {
                return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::VALIDATION_FAILED, 'Validation Failed', [], $validation->getErrors());
            }
            $result = $modelInstance->RecordDelete($requestData[$modelInstance->getPrimaryKey()]);
            $returnResultInArray = $result;
            return formatApiAutoResponse($this->request, $this->response, $result);
        } catch (Exception $e) {
            return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
        }
    }
    protected function createLog(string $log_type, string $log_menu_code, string $log_message, string $table_name = null, string|int $record_id = null, array $log_data = null)
    {
        $data = [
            "log_type" => $log_type,
            "log_menu_code" => $log_menu_code,
            "log_message" => $log_message,
            "table_name" => $table_name,
            "record_id" => $record_id,
            "user_id" => $_SESSION['user_id'],
            "log_json_data" => (!empty($log_data)) ? json_encode($log_data) : ""
        ];
        return $this->get_logs_model(false)->RecordCreate($data);
    }
}

<?php
/**
 * WebhooksApi
 * PHP version 5
 *
 * @category Class
 * @package  SendinBlue\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * SendinBlue API
 *
 * SendinBlue provide a RESTFul API that can be used with any languages. With this API, you will be able to :   - Manage your campaigns and get the statistics   - Manage your contacts   - Send transactional Emails and SMS   - and much more...  You can download our wrappers at https://github.com/orgs/sendinblue  **Possible responses**   | Code | Message |   | :-------------: | ------------- |   | 200  | OK. Successful Request  |   | 201  | OK. Successful Creation |   | 202  | OK. Request accepted |   | 204  | OK. Successful Update/Deletion  |   | 400  | Error. Bad Request  |   | 401  | Error. Authentication Needed  |   | 402  | Error. Not enough credit, plan upgrade needed  |   | 403  | Error. Permission denied  |   | 404  | Error. Object does not exist |   | 405  | Error. Method not allowed  |
 *
 * OpenAPI spec version: 3.0.0
 * Contact: contact@sendinblue.com
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 *
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace SendinBlue\Client\Api;

use \SendinBlue\Client\ApiClient;
use \SendinBlue\Client\ApiException;
use \SendinBlue\Client\Configuration;
use \SendinBlue\Client\ObjectSerializer;

/**
 * WebhooksApi Class Doc Comment
 *
 * @category Class
 * @package  SendinBlue\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class WebhooksApi
{
    /**
     * API Client
     *
     * @var \SendinBlue\Client\ApiClient instance of the ApiClient
     */
    protected $apiClient;

    /**
     * Constructor
     *
     * @param \SendinBlue\Client\ApiClient|null $apiClient The api client to use
     */
    public function __construct(\SendinBlue\Client\ApiClient $apiClient = null)
    {
        if ($apiClient === null) {
            $apiClient = new ApiClient();
        }

        $this->apiClient = $apiClient;
    }

    /**
     * Get API client
     *
     * @return \SendinBlue\Client\ApiClient get the API client
     */
    public function getApiClient()
    {
        return $this->apiClient;
    }

    /**
     * Set the API client
     *
     * @param \SendinBlue\Client\ApiClient $apiClient set the API client
     *
     * @return WebhooksApi
     */
    public function setApiClient(\SendinBlue\Client\ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
        return $this;
    }

    /**
     * Operation createWebhook
     *
     * Create a webhook
     *
     * @param \SendinBlue\Client\Model\CreateWebhook $createWebhook Values to create a webhook (required)
     * @throws \SendinBlue\Client\ApiException on non-2xx response
     * @return \SendinBlue\Client\Model\CreateModel
     */
    public function createWebhook($createWebhook)
    {
        list($response) = $this->createWebhookWithHttpInfo($createWebhook);
        return $response;
    }

    /**
     * Operation createWebhookWithHttpInfo
     *
     * Create a webhook
     *
     * @param \SendinBlue\Client\Model\CreateWebhook $createWebhook Values to create a webhook (required)
     * @throws \SendinBlue\Client\ApiException on non-2xx response
     * @return array of \SendinBlue\Client\Model\CreateModel, HTTP status code, HTTP response headers (array of strings)
     */
    public function createWebhookWithHttpInfo($createWebhook)
    {
        // verify the required parameter 'createWebhook' is set
        if ($createWebhook === null) {
            throw new \InvalidArgumentException('Missing the required parameter $createWebhook when calling createWebhook');
        }
        // parse inputs
        $resourcePath = "/webhooks";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json']);

        // body params
        $_tempBody = null;
        if (isset($createWebhook)) {
            $_tempBody = $createWebhook;
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // this endpoint requires API key authentication
        $apiKey = $this->apiClient->getApiKeyWithPrefix('api-key');
        if (strlen($apiKey) !== 0) {
            $headerParams['api-key'] = $apiKey;
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'POST',
                $queryParams,
                $httpBody,
                $headerParams,
                '\SendinBlue\Client\Model\CreateModel',
                '/webhooks'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\SendinBlue\Client\Model\CreateModel', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 201:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\SendinBlue\Client\Model\CreateModel', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\SendinBlue\Client\Model\ErrorModel', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation deleteWebhook
     *
     * Delete a webhook
     *
     * @param int $webhookId Id of the webhook (required)
     * @throws \SendinBlue\Client\ApiException on non-2xx response
     * @return void
     */
    public function deleteWebhook($webhookId)
    {
        list($response) = $this->deleteWebhookWithHttpInfo($webhookId);
        return $response;
    }

    /**
     * Operation deleteWebhookWithHttpInfo
     *
     * Delete a webhook
     *
     * @param int $webhookId Id of the webhook (required)
     * @throws \SendinBlue\Client\ApiException on non-2xx response
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteWebhookWithHttpInfo($webhookId)
    {
        // verify the required parameter 'webhookId' is set
        if ($webhookId === null) {
            throw new \InvalidArgumentException('Missing the required parameter $webhookId when calling deleteWebhook');
        }
        // parse inputs
        $resourcePath = "/webhooks/{webhookId}";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json']);

        // path params
        if ($webhookId !== null) {
            $resourcePath = str_replace(
                "{" . "webhookId" . "}",
                $this->apiClient->getSerializer()->toPathValue($webhookId),
                $resourcePath
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // this endpoint requires API key authentication
        $apiKey = $this->apiClient->getApiKeyWithPrefix('api-key');
        if (strlen($apiKey) !== 0) {
            $headerParams['api-key'] = $apiKey;
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'DELETE',
                $queryParams,
                $httpBody,
                $headerParams,
                null,
                '/webhooks/{webhookId}'
            );

            return [null, $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 400:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\SendinBlue\Client\Model\ErrorModel', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\SendinBlue\Client\Model\ErrorModel', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation getWebhook
     *
     * Get a webhook details
     *
     * @param int $webhookId Id of the webhook (required)
     * @throws \SendinBlue\Client\ApiException on non-2xx response
     * @return \SendinBlue\Client\Model\GetWebhook
     */
    public function getWebhook($webhookId)
    {
        list($response) = $this->getWebhookWithHttpInfo($webhookId);
        return $response;
    }

    /**
     * Operation getWebhookWithHttpInfo
     *
     * Get a webhook details
     *
     * @param int $webhookId Id of the webhook (required)
     * @throws \SendinBlue\Client\ApiException on non-2xx response
     * @return array of \SendinBlue\Client\Model\GetWebhook, HTTP status code, HTTP response headers (array of strings)
     */
    public function getWebhookWithHttpInfo($webhookId)
    {
        // verify the required parameter 'webhookId' is set
        if ($webhookId === null) {
            throw new \InvalidArgumentException('Missing the required parameter $webhookId when calling getWebhook');
        }
        // parse inputs
        $resourcePath = "/webhooks/{webhookId}";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json']);

        // path params
        if ($webhookId !== null) {
            $resourcePath = str_replace(
                "{" . "webhookId" . "}",
                $this->apiClient->getSerializer()->toPathValue($webhookId),
                $resourcePath
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // this endpoint requires API key authentication
        $apiKey = $this->apiClient->getApiKeyWithPrefix('api-key');
        if (strlen($apiKey) !== 0) {
            $headerParams['api-key'] = $apiKey;
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'GET',
                $queryParams,
                $httpBody,
                $headerParams,
                '\SendinBlue\Client\Model\GetWebhook',
                '/webhooks/{webhookId}'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\SendinBlue\Client\Model\GetWebhook', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\SendinBlue\Client\Model\GetWebhook', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\SendinBlue\Client\Model\ErrorModel', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\SendinBlue\Client\Model\ErrorModel', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation getWebhooks
     *
     * Get all webhooks
     *
     * @param string $type Filter on webhook type (optional, default to transactional)
     * @throws \SendinBlue\Client\ApiException on non-2xx response
     * @return \SendinBlue\Client\Model\GetWebhooks
     */
    public function getWebhooks($type = 'transactional')
    {
        list($response) = $this->getWebhooksWithHttpInfo($type);
        return $response;
    }

    /**
     * Operation getWebhooksWithHttpInfo
     *
     * Get all webhooks
     *
     * @param string $type Filter on webhook type (optional, default to transactional)
     * @throws \SendinBlue\Client\ApiException on non-2xx response
     * @return array of \SendinBlue\Client\Model\GetWebhooks, HTTP status code, HTTP response headers (array of strings)
     */
    public function getWebhooksWithHttpInfo($type = 'transactional')
    {
        // parse inputs
        $resourcePath = "/webhooks";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json']);

        // query params
        if ($type !== null) {
            $queryParams['type'] = $this->apiClient->getSerializer()->toQueryValue($type);
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // this endpoint requires API key authentication
        $apiKey = $this->apiClient->getApiKeyWithPrefix('api-key');
        if (strlen($apiKey) !== 0) {
            $headerParams['api-key'] = $apiKey;
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'GET',
                $queryParams,
                $httpBody,
                $headerParams,
                '\SendinBlue\Client\Model\GetWebhooks',
                '/webhooks'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\SendinBlue\Client\Model\GetWebhooks', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\SendinBlue\Client\Model\GetWebhooks', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\SendinBlue\Client\Model\ErrorModel', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation updateWebhook
     *
     * Update a webhook
     *
     * @param int $webhookId Id of the webhook (required)
     * @param \SendinBlue\Client\Model\UpdateWebhook $updateWebhook Values to update a webhook (required)
     * @throws \SendinBlue\Client\ApiException on non-2xx response
     * @return void
     */
    public function updateWebhook($webhookId, $updateWebhook)
    {
        list($response) = $this->updateWebhookWithHttpInfo($webhookId, $updateWebhook);
        return $response;
    }

    /**
     * Operation updateWebhookWithHttpInfo
     *
     * Update a webhook
     *
     * @param int $webhookId Id of the webhook (required)
     * @param \SendinBlue\Client\Model\UpdateWebhook $updateWebhook Values to update a webhook (required)
     * @throws \SendinBlue\Client\ApiException on non-2xx response
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function updateWebhookWithHttpInfo($webhookId, $updateWebhook)
    {
        // verify the required parameter 'webhookId' is set
        if ($webhookId === null) {
            throw new \InvalidArgumentException('Missing the required parameter $webhookId when calling updateWebhook');
        }
        // verify the required parameter 'updateWebhook' is set
        if ($updateWebhook === null) {
            throw new \InvalidArgumentException('Missing the required parameter $updateWebhook when calling updateWebhook');
        }
        // parse inputs
        $resourcePath = "/webhooks/{webhookId}";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json']);

        // path params
        if ($webhookId !== null) {
            $resourcePath = str_replace(
                "{" . "webhookId" . "}",
                $this->apiClient->getSerializer()->toPathValue($webhookId),
                $resourcePath
            );
        }
        // body params
        $_tempBody = null;
        if (isset($updateWebhook)) {
            $_tempBody = $updateWebhook;
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // this endpoint requires API key authentication
        $apiKey = $this->apiClient->getApiKeyWithPrefix('api-key');
        if (strlen($apiKey) !== 0) {
            $headerParams['api-key'] = $apiKey;
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'PUT',
                $queryParams,
                $httpBody,
                $headerParams,
                null,
                '/webhooks/{webhookId}'
            );

            return [null, $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 400:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\SendinBlue\Client\Model\ErrorModel', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\SendinBlue\Client\Model\ErrorModel', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }
}
<?php

namespace Zhylon\MegapiClient;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\PendingRequest;
use Zhylon\MegapiClient\Exceptions\InvalidApiEndpointException;

class MegApiClient
{
    private PendingRequest $http;

    /**
     * @var array<\Zhylon\MegapiClient\MegApiEndpoint>
     */
    protected array $endpoints = [];

    public function __construct(protected array $config = [])
    {
        $this->http = Http::acceptJson()
            ->withUserAgent(config('app.name'))
            ->withoutVerifying()
            ->withToken(config('services.megapi.key'));
    }

    public function http(): PendingRequest
    {
        return $this->http;
    }

    public function register(MegApiEndpoint $endpoint, ?string $alias = null): self
    {
        $this->endpoints[$alias ?? Str::snake(class_basename($endpoint))] = $endpoint;

        return $this;
    }

    public function __call($method, $parameters)
    {
        if (! isset($this->endpoints[$method])) {
            throw new InvalidApiEndpointException('Invalid API endpoint: '.$method);
        }

        return $this->endpoints[$method]->handle($this, ...$parameters);
    }
}

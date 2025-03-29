<?php

namespace Zhylon\MegapiClient;

interface MegApiEndpoint
{
    public function handle(MegApiClient $client, ...$parameters): mixed;
}

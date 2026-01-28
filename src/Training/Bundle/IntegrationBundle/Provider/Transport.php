<?php

namespace Training\Bundle\IntegrationBundle\Provider;

use Oro\Bundle\IntegrationBundle\Provider\Rest\Exception\RestException;
use Oro\Bundle\IntegrationBundle\Provider\Rest\Transport\AbstractRestTransport;
use Symfony\Component\HttpFoundation\ParameterBag;
use Training\Bundle\IntegrationBundle\Entity\UserNamingSettings;
use Training\Bundle\IntegrationBundle\Form\UserNamingFormType;

class Transport extends AbstractRestTransport
{
    protected function getClientBaseUrl(ParameterBag $parameterBag)
    {
        return $parameterBag->get('url');
    }

    protected function getClientOptions(ParameterBag $parameterBag)
    {
        return [];
    }

    public function getLabel()
    {
        return 'training.transport.label';
    }

    public function getSettingsFormType()
    {
        return UserNamingFormType::class;
    }

    public function getSettingsEntityFQCN()
    {
        return UserNamingSettings::class;
    }

    public function getNamingTypes(): array
    {
        $response = $this->client->get($this->settings->get('url'));

        if (!$response->isSuccessful()) {
            throw RestException::createFromResponse(
                $response,
                sprintf('Unable to load user naming types')
            );
        }
        try {
            return $response->json();
        } catch (\Exception $exception) {
            throw RestException::createFromResponse($response, 'Unable to decode JSON response', $exception);
        }
    }
}

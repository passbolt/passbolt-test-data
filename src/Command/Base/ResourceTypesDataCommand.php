<?php
/**
 * Passbolt ~ Open source password manager for teams
 * Copyright (c) Passbolt SA (https://www.passbolt.com)
 *
 * Licensed under GNU Affero General Public License version 3 of the or any later version.
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Passbolt SA (https://www.passbolt.com)
 * @license       https://opensource.org/licenses/AGPL-3.0 AGPL License
 * @link          https://www.passbolt.com Passbolt(tm)
 * @since         2.0.0
 */
namespace PassboltTestData\Command\Base;

use App\Utility\UuidFactory;
use PassboltTestData\Lib\DataCommand;

class ResourceTypesDataCommand extends DataCommand
{
    public $entityName = 'ResourceTypes';

    /**
     * Get the roles data
     *
     * @return array
     */
    public function getData()
    {
        return [
            [
                'id' => UuidFactory::uuid('resource-types.id.password-string'),
                'slug' => 'password-string',
                'name' => 'Simple password',
                'description' => 'The original passbolt resource type, where the secret is a non empty string.',
                'definition' => json_encode([
                    "resource" => [
                        "type" => "object",
                        "required" => [
                            "name"
                        ],
                        "properties" => [
                            "name" => [
                                "type" => "string",
                                "maxLength" => 64
                            ],
                            "username" => [
                                "anyOf" => [[
                                    "type" => "string",
                                    "maxLength" => 64
                                ], [
                                    "type" => "null"
                                ]]
                            ],
                            "uri" => [
                                "anyOf" => [[
                                    "type" => "string",
                                    "maxLength" => 1024
                                ], [
                                    "type" => "null"
                                ]]
                            ],
                            "description" => [
                                "anyOf" => [[
                                    "type" => "string",
                                    "maxLength" => 10000
                                ], [
                                    "type" => "null"
                                ]]
                            ],
                        ]
                    ],
                    "secret" => [
                        "type" => "string",
                        "maxLength" => 4096
                    ],
                ]),
                'created' => date("Y-m-d H:i:s"),
                'modified' => date("Y-m-d H:i:s"),
            ],
            [
                'id' => UuidFactory::uuid('resource-types.id.password-and-description'),
                'slug' => 'password-and-description',
                'name' => 'Password with description',
                'description' => 'A resource with the password and the description encrypted.',
                'definition' => json_encode([
                    "resource" => [
                        "type" => "object",
                        "required" => [
                            "name"
                        ],
                        "properties" => [
                            "name" => [
                                "type" => "string",
                                "maxLength" => 64
                            ],
                            "username" => [
                                "anyOf" => [[
                                    "type" => "string",
                                    "maxLength" => 64
                                ], [
                                    "type" => "null"
                                ]]
                            ],
                            "uri" => [
                                "anyOf" => [[
                                    "type" => "string",
                                    "maxLength" => 1024
                                ], [
                                    "type" => "null"
                                ]]
                            ],
                        ]
                    ],
                    "secret" => [
                        "type" => "object",
                        "required" => [
                            "password"
                        ],
                        "properties" => [
                            "password" => [
                                "type" => "string",
                                "maxLength" => 4096
                            ],
                            "description" => [
                                "anyOf" => [[
                                    "type" => "string",
                                    "maxLength" => 10000
                                ], [
                                    "type" => "null"
                                ]]
                            ],
                        ],
                    ],
                ]),
                'created' => date("Y-m-d H:i:s"),
                'modified' => date("Y-m-d H:i:s"),
            ]
        ];
    }
}

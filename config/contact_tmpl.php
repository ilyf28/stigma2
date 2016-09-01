<?php

return [
    "contact_name" => [
        "display_name" => 'contact_name',
        "description" =>'contact_name',
        "required" => true,
        "data_type" => "string"
    ],
    "host_notifications_enabled" => [
        "display_name" => 'host_notifications_enabled',
        "description" => '[0/1]',
        "required" => true,
        "data_type" => "string"
    ],
    "service_notifications_enabled" => [
        "display_name" => 'service_notifications_enabled',
        "description" => '[0/1]',
        "required" => true,
        "data_type" => "string"
    ],
    "host_notification_period" => [
        "display_name" => 'host_notification_period',
        "description" =>'timeperiod_name',
        "required" => true,
        "data_type" => "enum_timeperiod"
    ],
    "service_notification_period" => [
        "display_name" => 'service_notification_period',
        "description" =>'timeperiod_name',
        "required" => true,
        "data_type" => "enum_timeperiod"
    ],
    "host_notification_options" => [
        "display_name" => 'host_notification_options',
        "description" => '[d,u,r,f,s,n]',
        "required" => true,
        "data_type" => "string"
    ],
    "service_notification_options" => [
        "display_name" => 'service_notification_options',
        "description" => '[w,u,c,r,f,s,n]',
        "required" => true,
        "data_type" => "string"
    ],
    "host_notification_commands" => [
        "display_name" => 'host_notification_commands',
        "description" =>'command_name',
        "required" => true,
        "data_type" => "enum_host_command"
    ],
    "service_notification_commands" => [
        "display_name" => 'service_notification_commands',
        "description" =>'command_name',
        "required" => true,
        "data_type" => "enum_service_command"
    ],
    "alias" => [
        "display_name" => 'alias',
        "description" =>'alias',
        "required" => false,
        "data_type" => "string"
    ],
    "contactgroups" => [
        "display_name" => 'contactgroups',
        "description" =>'contactgroup_names',
        "required" => false,
        "data_type" => "string"
    ],
    "minimum_value" => [
        "display_name" => 'minimum_value',
        "description" =>'#',
        "required" => false,
        "data_type" => "string"
    ],
    "email" => [
        "display_name" => 'email',
        "description" =>'email_address',
        "required" => false,
        "data_type" => "string"
    ],
    "pager" => [
        "display_name" => 'pager',
        "description" =>'pager_number or pager_email_gateway',
        "required" => false,
        "data_type" => "string"
    ],
    "address1" => [
        "display_name" => 'address1',
        "description" =>'additional_contact_address',
        "required" => false,
        "data_type" => "string"
    ],
    "address2" => [
        "display_name" => 'address2',
        "description" =>'additional_contact_address',
        "required" => false,
        "data_type" => "string"
    ],
    "address3" => [
        "display_name" => 'address3',
        "description" =>'additional_contact_address',
        "required" => false,
        "data_type" => "string"
    ],
    "address4" => [
        "display_name" => 'address4',
        "description" =>'additional_contact_address',
        "required" => false,
        "data_type" => "string"
    ],
    "address5" => [
        "display_name" => 'address5',
        "description" =>'additional_contact_address',
        "required" => false,
        "data_type" => "string"
    ],
    "can_submit_commands" => [
        "display_name" => 'can_submit_commands',
        "description" => '[0/1]',
        "required" => false,
        "data_type" => "string"
    ],
    "retain_status_information" => [
        "display_name" => 'retain_status_information',
        "description" => '[0/1]',
        "required" => false,
        "data_type" => "string"
    ],
    "retain_nonstatus_information" => [
        "display_name" => 'retain_nonstatus_information',
        "description" => '[0/1]',
        "required" => false,
        "data_type" => "string"
    ]

];

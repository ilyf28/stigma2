<?php

return [
    "host_name" => [
        "display_name" => 'host_name',
        "description" => 'host_name',
        "required" => true,
        "data_type" => "enum_host"
    ],
    "service_description" => [
        "display_name" => 'service_description',
        "description" => 'service_description',
        "required" => true,
        "data_type" => "string"
    ],
    "check_command" => [
        "display_name" => 'check_command',
        "description" => 'command_name',
        "required" => true,
        "data_type" => "enum_command"
    ],
    "max_check_attempts" => [
        "display_name" => 'max_check_attempts',
        "description" => '#',
        "required" => true,
        "data_type" => "string"
    ],
    "check_interval" => [
        "display_name" => 'check_interval',
        "description" => '#',
        "required" => true,
        "data_type" => "string"
    ],
    "retry_interval" => [
        "display_name" => 'retry_interval',
        "description" => '#',
        "required" => true,
        "data_type" => "string"
    ],
    "check_period" => [
        "display_name" => 'check_period',
        "description" => 'timeperiod_name',
        "required" => true,
        "data_type" => "enum_timeperiod"
    ],
    "notification_interval" => [
        "display_name" => 'notification_interval',
        "description" => '#',
        "required" => true,
        "data_type" => "string"
    ],
    "notification_period" => [
        "display_name" => 'notification_period',
        "description" => 'timeperiod_name',
        "required" => true,
        "data_type" => "enum_timeperiod"
    ],
    "contacts" => [
        "display_name" => 'contacts',
        "description" => 'contacts',
        "required" => true,
        "data_type" => "enum_contact"
    ],
    "contact_groups" => [
        "display_name" => 'contact_groups',
        "description" => 'contact_groups',
        "required" => true,
        "data_type" => "string"
    ],
    "_graphiteprefix" => [
        "display_name" => '_graphiteprefix', 
        "description" => '',
        "required" => false,
        "data_type" => "string"
    ],
    "hostgroup_name" => [
        "display_name" => 'hostgroup_name',
        "description" => 'hostgroup_name',
        "required" => false,
        "data_type" => "string"
    ],
    "display_name" => [
        "display_name" => 'display_name',
        "description" => 'display_name',
        "required" => false,
        "data_type" => "string"
    ],
    "parents" => [
        "display_name" => 'parents',
        "description" => 'service_descriptions',
        "required" => false,
        "data_type" => "string"
    ],
    "hourly_value" => [
        "display_name" => 'hourly_value',
        "description" => '#',
        "required" => false,
        "data_type" => "string"
    ],
    "servicegroups" => [
        "display_name" => 'servicegroups',
        "description" => 'servicegroup_names',
        "required" => false,
        "data_type" => "string"
    ],
    "is_volatile" => [
        "display_name" => 'is_volatile',
        "description" => '[0/1]',
        "required" => false,
        "data_type" => "string"
    ],
    "initial_state" => [
        "display_name" => 'initial_state',
        "description" => '[o,w,u,c]',
        "required" => false,
        "data_type" => "string"
    ],
    "active_checks_enabled" => [
        "display_name" => 'active_checks_enabled',
        "description" => '[0/1]',
        "required" => false,
        "data_type" => "string"
    ],
    "passive_checks_enabled" => [
        "display_name" => 'passive_checks_enabled',
        "description" => '[0/1]',
        "required" => false,
        "data_type" => "string"
    ],
    "obsess_over_service" => [
        "display_name" => 'obsess_over_service',
        "description" => '|obsess  [0/1]',
        "required" => false,
        "data_type" => "string"
    ],
    "check_freshness" => [
        "display_name" => 'check_freshness',
        "description" => '[0/1]',
        "required" => false,
        "data_type" => "string"
    ],
    "freshness_threshold" => [
        "display_name" => 'freshness_threshold',
        "description" => '#',
        "required" => false,
        "data_type" => "string"
    ],
    "event_handler" => [
        "display_name" => 'event_handler',
        "description" => 'command_name',
        "required" => false,
        "data_type" => "string"
    ],
    "event_handler_enabled" => [
        "display_name" => 'event_handler_enabled',
        "description" => '[0/1]',
        "required" => false,
        "data_type" => "string"
    ],
    "low_flap_threshold" => [
        "display_name" => 'low_flap_threshold',
        "description" => '#',
        "required" => false,
        "data_type" => "string"
    ],
    "high_flap_threshold" => [
        "display_name" => 'high_flap_threshold',
        "description" => '#',
        "required" => false,
        "data_type" => "string"
    ],
    "flap_detection_enabled" => [
        "display_name" => 'flap_detection_enabled',
        "description" => '[0/1]',
        "required" => false,
        "data_type" => "string"
    ],
    "flap_detection_options" => [
        "display_name" => 'flap_detection_options',
        "description" => '[o,w,c,u]',
        "required" => false,
        "data_type" => "string"
    ],
    "process_perf_data" => [
        "display_name" => 'process_perf_data',
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
    ],
    "first_notification_delay" => [
        "display_name" => 'first_notification_delay',
        "description" => '#',
        "required" => false,
        "data_type" => "string"
    ],
    "notification_options" => [
        "display_name" => 'notification_options',
        "description" => '[w,u,c,r,f,s]',
        "required" => false,
        "data_type" => "string"
    ],
    "notifications_enabled" => [
        "display_name" => 'notifications_enabled',
        "description" => '[0/1]',
        "required" => false,
        "data_type" => "string"
    ],
    "stalking_options" => [
        "display_name" => 'stalking_options',
        "description" => '[o,w,u,c]',
        "required" => false,
        "data_type" => "string"
    ],
    "notes" => [
        "display_name" => 'notes',
        "description" => 'note_string',
        "required" => false,
        "data_type" => "string"
    ],
    "notes_url" => [
        "display_name" => 'notes_url',
        "description" => 'url',
        "required" => false,
        "data_type" => "string"
    ],
    "action_url" => [
        "display_name" => 'action_url',
        "description" => 'url',
        "required" => false,
        "data_type" => "string"
    ],
    "icon_image" => [
        "display_name" => 'icon_image',
        "description" => 'image_file',
        "required" => false,
        "data_type" => "string"
    ],
    "icon_image_alt" => [
        "display_name" => 'icon_image_alt',
        "description" => 'alt_string',
        "required" => false,
        "data_type" => "string"
    ]
];

<?php
/*
 *
 */
return [

    "host_name" => [
        "display_name" => 'HOST NAME' ,
        "description" => '',
        "required" => true,
        "data_type" => "string"
    ],

    "hostgroup_name" => [
        "display_name" => 'HOSTGROUP NAME' ,
        "description" => '',
        "required" => false,
        "data_type" => "string"
    ],

    "service_description" => [
        "display_name" => 'SERVICE DESCRIPTION' ,
        "description" => '',
        "required" => true,
        "data_type" => "string"
    ],

    "display_name" => [
        "display_name" => 'DISPLAY NAME' ,
        "description" => '',
        "required" => false,
        "data_type" => "string"
    ],

    "parents" => [
        "display_name" => 'PARENTS' ,
        "description" => '',
        "required" => false,
        "data_type" => "string"
    ],

    "hourly_value" => [
        "display_name" => 'HOURLY VALUE' ,
        "description" => '',
        "required" => false,
        "data_type" => "integer"
    ],

    "servicegroups" => [
        "display_name" => 'SERVICEGROUPS' ,
        "description" => '',
        "required" => false,
        "data_type" => "string"
    ],

    "is_volatile" => [
        "display_name" => 'IS VOLATILE' ,
        "description" => '',
        "required" => false,
        "data_type" => "enum",
        "values" => [
            "disable" => 0,
            "enable" => 1
        ]
    ],

    "check_command" => [
        "display_name" => 'CHECK COMMAND' ,
        "description" => '',
        "required" => true,
        "data_type" => "string"
    ],

    "initial_state" => [
        "display_name" => 'INITIAL STATE' ,
        "description" => '',
        "required" => false,
        "data_type" => "enum" ,
        "values" => [
            "O" => 'o',
            "W" => 'w',
            "U" => 'u',
            "C" => 'c'
        ]
    ],

    "max_check_attempts" => [
        "display_name" => 'MAX CHECK ATTEMPTS' ,
        "description" => '',
        "required" => true,
        "data_type" => "integer"
    ],

    "check_interval" => [
        "display_name" => 'CHECK INTERVAL' ,
        "description" => '',
        "required" => true,
        "data_type" => "integer"
    ],

    "retry_interval" => [
        "display_name" => 'RETRY INTERVAL' ,
        "description" => '',
        "required" => true,
        "data_type" => "integer"
    ],

    "active_checks_enabled" => [
        "display_name" => 'ACTIVE CHECKS ENABLED' ,
        "description" => '',
        "required" => false,
        "data_type" => "enum",
        "values" => [
            "disable" => 0,
            "enable" => 1
        ]
    ],

    "passive_checks_enabled" => [
        "display_name" => 'PASSIVE CHECKS ENABLED' ,
        "description" => '',
        "required" => false,
        "data_type" => "enum",
        "values" => [
            "disable" => 0,
            "enable" => 1
        ]
    ],

    "check_period" => [
        "display_name" => 'CHECK PERIOD' ,
        "description" => '',
        "required" => true,
        "data_type" => "string"
    ],

    "obsess_over_service|obsess" => [
        "display_name" => 'OBSESS OVER SERVICE' ,
        "description" => '',
        "required" => false,
        "data_type" => "enum",
        "values" => [
            "disable" => 0,
            "enable" => 1
        ]
    ],

    "check_freshness" => [
        "display_name" => 'CHECK FRESHNESS' ,
        "description" => '',
        "required" => false,
        "data_type" => "enum",
        "values" => [
            "disable" => 0,
            "enable" => 1
        ]
    ],

    "freshness_threshold" => [
        "display_name" => 'FRESHNESS THRESHOLD' ,
        "description" => '',
        "required" => false,
        "data_type" => "integer"
    ],

    "event_handler" => [
        "display_name" => 'EVENT HANDLER' ,
        "description" => '',
        "required" => false,
        "data_type" => "string"
    ],

    "event_handler_enabled" => [
        "display_name" => 'EVENT HANDLER ENABLED' ,
        "description" => '',
        "required" => false,
        "data_type" => "enum",
        "values" => [
            "disable" => 0,
            "enable" => 1
        ]
    ],

    "low_flap_threshold" => [
        "display_name" => 'LOW FLAP THRESHOLD' ,
        "description" => '',
        "required" => false,
        "data_type" => "integer"
    ],

    "high_flap_threshold" => [
        "display_name" => 'HIGH FLAP THRESHOLD' ,
        "description" => '',
        "required" => false,
        "data_type" => "integer"
    ],

    "flap_detection_enabled" => [
        "display_name" => 'FLAP DETECTION ENABLED' ,
        "description" => '',
        "required" => false,
        "data_type" => "enum",
        "values" => [
            "disable" => 0,
            "enable" => 1
        ]
    ],

    "flap_detection_options" => [
        "display_name" => 'FLAP DETECTION OPTIONS' ,
        "description" => '',
        "required" => false,
        "data_type" => "enum" ,
        "values" => [
            "O" => 'o',
            "W" => 'w',
            "U" => 'u',
            "C" => 'c'
        ]
    ],

    "process_perf_data" => [
        "display_name" => 'PROCESS PERF DATA' ,
        "description" => '',
        "required" => false,
        "data_type" => "enum",
        "values" => [
            "disable" => 0,
            "enable" => 1
        ]
    ],

    "retain_status_information" => [
        "display_name" => 'RETAIN STATUS INFORMATION' ,
        "description" => '',
        "required" => false,
        "data_type" => "enum",
        "values" => [
            "disable" => 0,
            "enable" => 1
        ]
    ],

    "retain_nonstatus_information" => [
        "display_name" => 'RETAIN NONSTATUS INFORMATION' ,
        "description" => '',
        "required" => false,
        "data_type" => "enum",
        "values" => [
            "disable" => 0,
            "enable" => 1
        ]
    ],

    "notification_interval" => [
        "display_name" => 'NOTIFICATION INTERVAL' ,
        "description" => '',
        "required" => true,
        "data_type" => "integer"
    ],

    "first_notification_delay" => [
        "display_name" => 'FIRST NOTIFICATION DELAY' ,
        "description" => '',
        "required" => false,
        "data_type" => "integer"
    ],

    "notification_period" => [
        "display_name" => 'NOTIFICATION PERIOD' ,
        "description" => '',
        "required" => true,
        "data_type" => "string"
    ],

    "notification_options" => [
        "display_name" => 'NOTIFICATION OPTIONS' ,
        "description" => '',
        "required" => false,
        "data_type" => "enum" ,
        "values" => [
            "W" => 'w',
            "U" => 'u',
            "C" => 'c',
            "R" => 'r',
            "F" => 'f',
            "S" => 's'
        ]
    ],

    "notifications_enabled" => [
        "display_name" => 'NOTIFICATIONS ENABLED' ,
        "description" => '',
        "required" => false,
        "data_type" => "enum",
        "values" => [
            "disable" => 0,
            "enable" => 1
        ]
    ],

    "contacts" => [
        "display_name" => 'CONTACTS' ,
        "description" => '',
        "required" => true,
        "data_type" => "string"
    ],

    "contact_groups" => [
        "display_name" => 'CONTACT GROUPS' ,
        "description" => '',
        "required" => true,
        "data_type" => "string"
    ],

    "stalking_options" => [
        "display_name" => 'STALKING OPTIONS' ,
        "description" => '',
        "required" => false,
        "data_type" => "enum" ,
        "values" => [
            "O" => 'o',
            "W" => 'w',
            "U" => 'u',
            "C" => 'c'
        ]
    ],

    "notes" => [
        "display_name" => 'NOTES' ,
        "description" => '',
        "required" => false,
        "data_type" => "string"
    ],

    "notes_url" => [
        "display_name" => 'NOTES URL' ,
        "description" => '',
        "required" => false,
        "data_type" => "string"
    ],

    "action_url" => [
        "display_name" => 'ACTION URL' ,
        "description" => '',
        "required" => false,
        "data_type" => "string"
    ],

    "icon_image" => [
        "display_name" => 'ICON IMAGE' ,
        "description" => '',
        "required" => false,
        "data_type" => "string"
    ],

    "icon_image_alt" => [
        "display_name" => 'ICON IMAGE ALT' ,
        "description" => '',
        "required" => false,
        "data_type" => "string"
    ]

];

?>
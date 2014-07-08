<?php
namespace APKParser;

# @link: http://developer.android.com/reference/android/os/Build.VERSION_CODES.html
# @link: http://developer.android.com/guide/topics/manifest/uses-sdk-element.html#ApiLevels
const ANDROID_API_BASE     = 1;
const ANDROID_API_BASE_1_1 = 2;
const ANDROID_API_CUPCAKE = 3;
const ANDROID_API_DONUT = 4;
const ANDROID_API_ECLAIR     = 5;
const ANDROID_API_ECLAIR_0_1 = 6;
const ANDROID_API_ECLAIR_MR1 = 7;
const ANDROID_API_FROYO = 8;
const ANDROID_API_GINGERBREAD     = 9;
const ANDROID_API_GINGERBREAD_MR1 = 10;
const ANDROID_API_HONEYCOMB     = 11;
const ANDROID_API_HONEYCOMB_MR1 = 12;
const ANDROID_API_HONEYCOMB_MR2 = 13;
const ANDROID_API_ICE_CREAM_SANDWICH     = 14;
const ANDROID_API_ICE_CREAM_SANDWICH_MR1 = 15;
const ANDROID_API_ICE_JELLY_BEAN     = 16;
const ANDROID_API_ICE_JELLY_BEAN_MR1 = 17;
const ANDROID_API_ICE_JELLY_BEAN_MR2 = 18;
const ANDROID_API_KITKAT = 19;
const ANDROID_API_KITKAT_WATCH = 20;


class Platform {
    public static $levels = array(
        0 => array("<placeholder>"),
        ANDROID_API_BASE     => array("1.0"),
        ANDROID_API_BASE_1_1 => array("1.1"),
        ANDROID_API_CUPCAKE => array("1.5"),
        ANDROID_API_DONUT => array("1.6"),
        ANDROID_API_ECLAIR     => array("2.0"),
        ANDROID_API_ECLAIR_0_1 => array("2.0.1"),
        ANDROID_API_ECLAIR_MR1 => array("2.1.x"),
        ANDROID_API_FROYO => array("2.2.x"),
        ANDROID_API_GINGERBREAD     => array("2.3", "2.3.1", "2.3.2"),
        ANDROID_API_GINGERBREAD_MR1 => array("2.3.3", "2.3.4"),
        ANDROID_API_HONEYCOMB     => array("3.0.x"),
        ANDROID_API_HONEYCOMB_MR1 => array("3.1.x"),
        ANDROID_API_HONEYCOMB_MR2 => array("3.2"),
        ANDROID_API_ICE_CREAM_SANDWICH     => array("4.0", "4.0.1", "4.0.2"),
        ANDROID_API_ICE_CREAM_SANDWICH_MR1 => array("4.0.3", "4.0.4"),
        ANDROID_API_ICE_JELLY_BEAN     => array("4.1", "4.1.1"),
        ANDROID_API_ICE_JELLY_BEAN_MR1 => array("4.2", "4.2.2"),
        ANDROID_API_ICE_JELLY_BEAN_MR2 => array("4.3"),
        ANDROID_API_KITKAT => array("4.4"),
        ANDROID_API_KITKAT_WATCH => array("4.4W"),
    );
}


class PermissionList {
    public static $groups = array(
        "other.1NO_GROUP" => array(
            "pos" => -1,
            "label" => "Other",
            "description" => false,
        ),
        "other.2EXTERNAL" => array(
            "pos" => -1,
            "label" => "External/Custom",
            "description" => false,
        ),

        "android.permission-group.SUPERUSER" => array(
            "pos" => 1,
            "label" => "Superuser",
            "description" => false,
        ),

        "android.permission-group.COST_MONEY" => array(
            "label" => "Services that cost you money",
            "description" => "Do things that can cost you money.",
        ),
        "android.permission-group.MESSAGES" => array(
            "label" => "Your messages",
            "description" => "Read and write your SMS, email, and other messages.",
        ),
        "android.permission-group.SOCIAL_INFO" => array(
            "label" => "Your social information",
            "description" => "Direct access to information about your contacts and social connections.",
        ),
        "android.permission-group.PERSONAL_INFO" => array(
            "label" => "Your personal information",
            "description" => "Direct access to information about you, stored in on your contact card.",
        ),
        "android.permission-group.CALENDAR" => array(
            "label" => "Calendar",
            "description" => "Direct access to calendar and events.",
        ),
        "android.permission-group.USER_DICTIONARY" => array(
            "label" => "Read User Dictionary",
            "description" => "Read words in user dictionary.",
        ),
        "android.permission-group.WRITE_USER_DICTIONARY" => array(
            "label" => "Write User Dictionary",
            "description" => "Add words to the user dictionary.",
        ),
        "android.permission-group.BOOKMARKS" => array(
            "label" => "Bookmarks and History",
            "description" => "Direct access to bookmarks and browser history.",
        ),
        "android.permission-group.DEVICE_ALARMS" => array(
            "label" => "Alarm",
            "description" => "Set the alarm clock.",
        ),
        "android.permission-group.VOICEMAIL" => array(
            "label" => "Voicemail",
            "description" => "Direct access to voicemail.",
        ),
        "android.permission-group.ACCESSIBILITY_FEATURES" => array(
            "label" => "Accessibility features",
            "description" => "Features that assistive technology can request.",
        ),
        "android.permission-group.LOCATION" => array(
            "label" => "Your location",
            "description" => "Monitor your physical location.",
        ),
        "android.permission-group.NETWORK" => array(
            "label" => "Network communication",
            "description" => "Access various network features.",
        ),
        "android.permission-group.BLUETOOTH_NETWORK" => array(
            "label" => "Bluetooth",
            "description" => "Access devices and networks through Bluetooth.",
        ),
        "android.permission-group.ACCOUNTS" => array(
            "label" => "Your accounts",
            "description" => "Access the available accounts.",
        ),
        "android.permission-group.AFFECTS_BATTERY" => array(
            "label" => "Affects Battery",
            "description" => "Use features that can quickly drain battery.",
        ),
        "android.permission-group.AUDIO_SETTINGS" => array(
            "label" => "Audio Settings",
            "description" => "Change audio settings.",
        ),
        "android.permission-group.HARDWARE_CONTROLS" => array(
            "label" => "Hardware controls",
            "description" => "Direct access to hardware on the handset.",
        ),
        "android.permission-group.MICROPHONE" => array(
            "label" => "Microphone",
            "description" => "Direct access to the microphone to record audio.",
        ),
        "android.permission-group.CAMERA" => array(
            "label" => "Camera",
            "description" => "Direct access to camera for image or video capture.",
        ),
        "android.permission-group.PHONE_CALLS" => array(
            "label" => "Phone calls",
            "description" => "Monitor, record, and process phone calls.",
        ),
        "android.permission-group.STORAGE" => array(
            "label" => "Storage",
            "description" => "Access the SD card.",
        ),
        "android.permission-group.SCREENLOCK" => array(
            "label" => "Lock screen",
            "description" => "Ability to affect behavior of the lock screen on your device.",
        ),
        "android.permission-group.APP_INFO" => array(
            "label" => "Your applications information",
            "description" => "Ability to affect behavior of other applications on your device.",
        ),
        "android.permission-group.DISPLAY" => array(
            "label" => "Other Application UI",
            "description" => "Effect the UI of other applications.",
        ),
        "android.permission-group.WALLPAPER" => array(
            "label" => "Wallpaper",
            "description" => "Change the device wallpaper settings.",
        ),
        "android.permission-group.SYSTEM_CLOCK" => array(
            "label" => "Clock",
            "description" => "Change the device time or timezone.",
        ),
        "android.permission-group.STATUS_BAR" => array(
            "label" => "Status Bar",
            "description" => "Change the device status bar settings.",
        ),
        "android.permission-group.SYNC_SETTINGS" => array(
            "label" => "Sync Settings",
            "description" => "Access to the sync settings.",
        ),
        "android.permission-group.SYSTEM_TOOLS" => array(
            "label" => "System tools",
            "description" => "Lower-level access and control of the system.",
        ),
        "android.permission-group.DEVELOPMENT_TOOLS" => array(
            "label" => "Development tools",
            "description" => "Features only needed for app developers.",
        ),
        "android.permission-group.SECURITY" => array(
            "label" => "Security",
            "description" => "Permissions related to device security information.",
        ),
    );


    public static $internal = array(
        "android.permission.SEND_SMS" => array(
            "group" => "android.permission-group.MESSAGES",

            "level" => 1,
            "label" => "send SMS messages",
            "description" => "Allows the app to send SMS messages. This may result in unexpected charges. Malicious apps may cost you money by sending messages without your confirmation.",
        ),
        "android.permission.SEND_MOCK_SMS" => array(
            "group" => "android.permission-group.MESSAGES",

            "level" => 1,
            "label" => "Send mock SMS messages",
            "description" => "Allows the app to send mock SMS messages. This allows an app send SMS to trusted applications. Malicious apps could send messages continuously, blocking the device notification system and disrupting the user.",
        ),
        "android.permission.SEND_RESPOND_VIA_MESSAGE" => array(
            "group" => "android.permission-group.MESSAGES",

            "level" => 3,
            "label" => "send respond-via-message events",
            "description" => "Allows the app to send requests to other messaging apps to handle respond-via-message events for incoming calls.",
        ),
        "android.permission.RECEIVE_SMS" => array(
            "group" => "android.permission-group.MESSAGES",

            "level" => 1,
            "label" => "receive text messages (SMS)",
            "description" => "Allows the app to receive and process SMS messages. This means the app could monitor or delete messages sent to your device without showing them to you.",
        ),
        "android.permission.RECEIVE_MMS" => array(
            "group" => "android.permission-group.MESSAGES",

            "level" => 1,
            "label" => "receive text messages (MMS)",
            "description" => "Allows the app to receive and process MMS messages. This means the app could monitor or delete messages sent to your device without showing them to you.",
        ),
        "android.permission.RECEIVE_EMERGENCY_BROADCAST" => array(
            "group" => "android.permission-group.MESSAGES",

            "level" => 3,
            "label" => "receive emergency broadcasts",
            "description" => "Allows the app to receive and process emergency broadcast messages. This permission is only available to system apps.",
        ),
        "android.permission.READ_CELL_BROADCASTS" => array(
            "group" => "android.permission-group.MESSAGES",

            "level" => 1,
            "label" => "read cell broadcast messages",
            "description" => "Allows the app to read cell broadcast messages received by your device. Cell broadcast alerts are delivered in some locations to warn you of emergency situations. Malicious apps may interfere with the performance or operation of your device when an emergency cell broadcast is received.",
        ),
        "android.permission.READ_SMS" => array(
            "group" => "android.permission-group.MESSAGES",

            "level" => 1,
            "label" => "read your text messages (SMS or MMS)",
            "description" => "Allows the app to read SMS messages stored on your phone or SIM card. This allows the app to read all SMS messages, regardless of content or confidentiality.",
        ),
        "android.permission.WRITE_SMS" => array(
            "group" => "android.permission-group.MESSAGES",

            "level" => 1,
            "label" => "edit your text messages (SMS or MMS)",
            "description" => "Allows the app to write to SMS messages stored on your phone or SIM card. Malicious apps may delete your messages.",
        ),
        "android.permission.RECEIVE_WAP_PUSH" => array(
            "group" => "android.permission-group.MESSAGES",

            "level" => 1,
            "label" => "receive text messages (WAP)",
            "description" => "Allows the app to receive and process WAP messages.  This permission includes the ability to monitor or delete messages sent to you without showing them to you.",
        ),
        "android.permission.READ_CONTACTS" => array(
            "group" => "android.permission-group.SOCIAL_INFO",

            "level" => 1,
            "label" => "read your contacts",
            "description" => "Allows the app to read data about your contacts stored on your phone, including the frequency with which youve called, emailed, or communicated in other ways with specific individuals. This permission allows apps to save your contact data, and malicious apps may share contact data without your knowledge.",
        ),
        "android.permission.WRITE_CONTACTS" => array(
            "group" => "android.permission-group.SOCIAL_INFO",

            "level" => 1,
            "label" => "modify your contacts",
            "description" => "Allows the app to modify the data about your contacts stored on your phone, including the frequency with which youve called, emailed, or communicated in other ways with specific contacts. This permission allows apps to delete contact data.",
        ),
        "android.permission.BIND_DIRECTORY_SEARCH" => array(
            "group" => "android.permission-group.PERSONAL_INFO",

            "level" => 3,
            "label" => false,
            "description" => false,
        ),
        "android.permission.READ_CALL_LOG" => array(
            "group" => "android.permission-group.SOCIAL_INFO",

            "level" => 1,
            "label" => "read call log",
            "description" => "Allows the app to read your phones call log, including data about incoming and outgoing calls. This permission allows apps to save your call log data, and malicious apps may share call log data without your knowledge.",
        ),
        "android.permission.WRITE_CALL_LOG" => array(
            "group" => "android.permission-group.SOCIAL_INFO",

            "level" => 1,
            "label" => "write call log",
            "description" => "Allows the app to modify your phones call log, including data about incoming and outgoing calls. Malicious apps may use this to erase or modify your call log.",
        ),
        "android.permission.READ_SOCIAL_STREAM" => array(
            "group" => "android.permission-group.SOCIAL_INFO",

            "level" => 1,
            "label" => "read your social stream",
            "description" => "Allows the app to access and sync social updates from you and your friends. Be careful when sharing information -- this allows the app to read communications between you and your friends on social networks, regardless of confidentiality. Note: this permission may not be enforced on all social networks.",
        ),
        "android.permission.WRITE_SOCIAL_STREAM" => array(
            "group" => "android.permission-group.SOCIAL_INFO",

            "level" => 1,
            "label" => "write to your social stream",
            "description" => "Allows the app to display social updates from your friends.  Be careful when sharing information -- this allows the app to produce messages that may appear to come from a friend. Note: this permission may not be enforced on all social networks.",
        ),
        "android.permission.READ_PROFILE" => array(
            "group" => "android.permission-group.PERSONAL_INFO",

            "level" => 1,
            "label" => "read your own contact card",
            "description" => "Allows the app to read personal profile information stored on your device, such as your name and contact information. This means the app can identify you and may send your profile information to others.",
        ),
        "android.permission.WRITE_PROFILE" => array(
            "group" => "android.permission-group.PERSONAL_INFO",

            "level" => 1,
            "label" => "modify your own contact card",
            "description" => "Allows the app to change or add to personal profile information stored on your device, such as your name and contact information.  This means the app can identify you and may send your profile information to others.",
        ),
        "android.permission.READ_CALENDAR" => array(
            "group" => "android.permission-group.PERSONAL_INFO",

            "level" => 1,
            "label" => "read calendar events plus confidential information",
            "description" => "Allows the app to read all calendar events stored on your phone, including those of friends or co-workers. This may allow the app to share or save your calendar data, regardless of confidentiality or sensitivity.",
        ),
        "android.permission.WRITE_CALENDAR" => array(
            "group" => "android.permission-group.PERSONAL_INFO",

            "level" => 1,
            "label" => "add or modify calendar events and send email to guests without owners knowledge",
            "description" => "Allows the app to add, remove, change events that you can modify on your phone, including those of friends or co-workers. This may allow the app to send messages that appear to come from calendar owners, or modify events without the owners knowledge.",
        ),
        "android.permission.READ_USER_DICTIONARY" => array(
            "group" => "android.permission-group.USER_DICTIONARY",

            "level" => 1,
            "label" => "read terms you added to the dictionary",
            "description" => "Allows the app to read all words, names and phrases that the user may have stored in the user dictionary.",
        ),
        "android.permission.WRITE_USER_DICTIONARY" => array(
            "group" => "android.permission-group.WRITE_USER_DICTIONARY",

            "level" => 0,
            "label" => "add words to user-defined dictionary",
            "description" => "Allows the app to write new words into the user dictionary.",
        ),
        "com.android.browser.permission.READ_HISTORY_BOOKMARKS" => array(
            "group" => "android.permission-group.BOOKMARKS",

            "level" => 1,
            "label" => "read your Web bookmarks and history",
            "description" => "Allows the app to read the history of all URLs that the Browser has visited, and all of the Browsers bookmarks. Note: this permission may not be enforced by third-party browsers or other applications with web browsing capabilities.",
        ),
        "com.android.browser.permission.WRITE_HISTORY_BOOKMARKS" => array(
            "group" => "android.permission-group.BOOKMARKS",

            "level" => 1,
            "label" => "write web bookmarks and history",
            "description" => "Allows the app to modify the Browsers history or bookmarks stored on your phone. This may allow the app to erase or modify Browser data.  Note: this permission may note be enforced by third-party browsers or other applications with web browsing capabilities.",
        ),
        "com.android.alarm.permission.SET_ALARM" => array(
            "group" => "android.permission-group.DEVICE_ALARMS",

            "level" => 0,
            "label" => "set an alarm",
            "description" => "Allows the app to set an alarm in an installed alarm clock app. Some alarm clock apps may not implement this feature.",
        ),
        "com.android.voicemail.permission.ADD_VOICEMAIL" => array(
            "group" => "android.permission-group.VOICEMAIL",

            "level" => 1,
            "label" => "add voicemail",
            "description" => "Allows the app to add messages to your voicemail inbox.",
        ),
        "android.permission.ACCESS_FINE_LOCATION" => array(
            "group" => "android.permission-group.LOCATION",

            "level" => 1,
            "label" => "precise location (GPS and network-based)",
            "description" => "Allows the app to get your precise location using the Global Positioning System (GPS) or network location sources such as cell towers and Wi-Fi. These location services must be turned on and available to your device for the app to use them. Apps may use this to determine where you are, and may consume additional battery power.",
        ),
        "android.permission.ACCESS_COARSE_LOCATION" => array(
            "group" => "android.permission-group.LOCATION",

            "level" => 1,
            "label" => "approximate location (network-based)",
            "description" => "Allows the app to get your approximate location. This location is derived by location services using network location sources such as cell towers and Wi-Fi. These location services must be turned on and available to your device for the app to use them. Apps may use this to determine approximately where you are.",
        ),
        "android.permission.ACCESS_MOCK_LOCATION" => array(
            "group" => "android.permission-group.SYSTEM_TOOLS",

            "level" => 1,
            "label" => "mock location sources for testing",
            "description" => "Create mock location sources for testing or install a new location provider.  This allows the app to override the location and/or status returned by other location sources such as GPS or location providers.",
        ),
        "android.permission.ACCESS_LOCATION_EXTRA_COMMANDS" => array(
            "group" => "android.permission-group.SYSTEM_TOOLS",

            "level" => 0,
            "label" => "access extra location provider commands",
            "description" => "Allows the app to access extra location provider commands.  This may allow the app to to interfere with the operation of the GPS or other location sources.",
        ),
        "android.permission.INSTALL_LOCATION_PROVIDER" => array(
            "group" => "other.1NO_GROUP",

            "level" => 3,
            "label" => "permission to install a location provider",
            "description" => "Create mock location sources for testing or install a new location provider.  This allows the app to override the location and/or status returned by other location sources such as GPS or location providers.",
        ),
        "android.permission.LOCATION_HARDWARE" => array(
            "group" => "android.permission-group.LOCATION",

            "level" => 3,
            "label" => false,
            "description" => false,
        ),
        "android.permission.INTERNET" => array(
            "group" => "android.permission-group.NETWORK",

            "level" => 1,
            "label" => "full network access",
            "description" => "Allows the app to create network sockets and use custom network protocols. The browser and other applications provide means to send data to the internet, so this permission is not required to send data to the internet.",
        ),
        "android.permission.ACCESS_NETWORK_STATE" => array(
            "group" => "android.permission-group.NETWORK",

            "level" => 0,
            "label" => "view network connections",
            "description" => "Allows the app to view information about network connections such as which networks exist and are connected.",
        ),
        "android.permission.ACCESS_WIFI_STATE" => array(
            "group" => "android.permission-group.NETWORK",

            "level" => 0,
            "label" => "view Wi-Fi connections",
            "description" => "Allows the app to view information about Wi-Fi networking, such as whether Wi-Fi is enabled and name of connected Wi-Fi devices.",
        ),
        "android.permission.CHANGE_WIFI_STATE" => array(
            "group" => "android.permission-group.NETWORK",

            "level" => 1,
            "label" => "connect and disconnect from Wi-Fi",
            "description" => "Allows the app to connect to and disconnect from Wi-Fi access points and to make changes to device configuration for Wi-Fi networks.",
        ),
        "android.permission.ACCESS_WIMAX_STATE" => array(
            "group" => "android.permission-group.NETWORK",

            "level" => 0,
            "label" => "connect and disconnect from WiMAX",
            "description" => "Allows the app to determine whether WiMAX is enabled and information about any WiMAX networks that are connected. ",
        ),
        "android.permission.CHANGE_WIMAX_STATE" => array(
            "group" => "android.permission-group.NETWORK",

            "level" => 1,
            "label" => "Change WiMAX state",
            "description" => "Allows the app to connect the phone to and disconnect the phone from WiMAX networks.",
        ),
        "android.permission.BLUETOOTH" => array(
            "group" => "android.permission-group.BLUETOOTH_NETWORK",

            "level" => 1,
            "label" => "pair with Bluetooth devices",
            "description" => "Allows the app to view the configuration of the Bluetooth on the phone, and to make and accept connections with paired devices.",
        ),
        "android.permission.BLUETOOTH_ADMIN" => array(
            "group" => "android.permission-group.BLUETOOTH_NETWORK",

            "level" => 1,
            "label" => "access Bluetooth settings",
            "description" => "Allows the app to configure the local Bluetooth phone, and to discover and pair with remote devices.",
        ),
        "android.permission.BLUETOOTH_PRIVILEGED" => array(
            "group" => "android.permission-group.BLUETOOTH_NETWORK",

            "level" => 3,
            "label" => "allow Bluetooth pairing by Application",
            "description" => "Allows the app to pair with remote devices without user interaction.",
        ),
        "android.permission.BLUETOOTH_STACK" => array(
            "group" => "android.permission-group.SYSTEM_TOOLS",

            "level" => 2,
            "label" => false,
            "description" => false,
        ),
        "android.permission.NFC" => array(
            "group" => "android.permission-group.NETWORK",

            "level" => 1,
            "label" => "control Near Field Communication",
            "description" => "Allows the app to communicate with Near Field Communication (NFC) tags, cards, and readers.",
        ),
        "android.permission.CONNECTIVITY_INTERNAL" => array(
            "group" => "android.permission-group.NETWORK",

            "level" => 3,
            "label" => false,
            "description" => false,
        ),
        "android.permission.RECEIVE_DATA_ACTIVITY_CHANGE" => array(
            "group" => "android.permission-group.NETWORK",

            "level" => 3,
            "label" => false,
            "description" => false,
        ),
        "android.permission.LOOP_RADIO" => array(
            "group" => "android.permission-group.NETWORK",

            "level" => 3,
            "label" => false,
            "description" => false,
        ),
        "android.permission.GET_ACCOUNTS" => array(
            "group" => "android.permission-group.ACCOUNTS",

            "level" => 0,
            "label" => "find accounts on the device",
            "description" => "Allows the app to get the list of accounts known by the phone.  This may include any accounts created by applications you have installed.",
        ),
        "android.permission.AUTHENTICATE_ACCOUNTS" => array(
            "group" => "android.permission-group.ACCOUNTS",

            "level" => 1,
            "label" => "create accounts and set passwords",
            "description" => "Allows the app to use the account authenticator capabilities of the AccountManager, including creating accounts and getting and setting their passwords.",
        ),
        "android.permission.USE_CREDENTIALS" => array(
            "group" => "android.permission-group.ACCOUNTS",

            "level" => 1,
            "label" => "use accounts on the device",
            "description" => "Allows the app to request authentication tokens.",
        ),
        "android.permission.MANAGE_ACCOUNTS" => array(
            "group" => "android.permission-group.ACCOUNTS",

            "level" => 1,
            "label" => "add or remove accounts",
            "description" => "Allows the app to perform operations like adding and removing accounts, and deleting their password.",
        ),
        "android.permission.ACCOUNT_MANAGER" => array(
            "group" => "android.permission-group.ACCOUNTS",

            "level" => 2,
            "label" => "act as the AccountManagerService",
            "description" => "Allows the app to make calls to AccountAuthenticators.",
        ),
        "android.permission.CHANGE_WIFI_MULTICAST_STATE" => array(
            "group" => "android.permission-group.AFFECTS_BATTERY",

            "level" => 1,
            "label" => "allow Wi-Fi Multicast reception",
            "description" => "Allows the app to receive packets sent to all devices on a Wi-Fi network using multicast addresses, not just your phone.  It uses more power than the non-multicast mode.",
        ),
        "android.permission.PREVENT_POWER_KEY" => array(
            "group" => "android.permission-group.HARDWARE_CONTROLS",

            "level" => 1,
            "label" => "prevent power key",
            "description" => "Allows the app to override the power key",
        ),
        "android.permission.VIBRATE" => array(
            "group" => "android.permission-group.AFFECTS_BATTERY",

            "level" => 0,
            "label" => "control vibration",
            "description" => "Allows the app to control the vibrator.",
        ),
        "android.permission.FLASHLIGHT" => array(
            "group" => "android.permission-group.AFFECTS_BATTERY",

            "level" => 0,
            "label" => "control flashlight",
            "description" => "Allows the app to control the flashlight.",
        ),
        "android.permission.WAKE_LOCK" => array(
            "group" => "android.permission-group.AFFECTS_BATTERY",

            "level" => 0,
            "label" => "prevent phone from sleeping",
            "description" => "Allows the app to prevent the phone from going to sleep.",
        ),
        "android.permission.TRANSMIT_IR" => array(
            "group" => "android.permission-group.AFFECTS_BATTERY",

            "level" => 0,
            "label" => "transmit infrared",
            "description" => "Allows the app to use the phones infrared transmitter.",
        ),
        "android.permission.MODIFY_AUDIO_SETTINGS" => array(
            "group" => "android.permission-group.AUDIO_SETTINGS",

            "level" => 0,
            "label" => "change your audio settings",
            "description" => "Allows the app to modify global audio settings such as volume and which speaker is used for output.",
        ),
        "android.permission.MANAGE_USB" => array(
            "group" => "android.permission-group.HARDWARE_CONTROLS",

            "level" => 3,
            "label" => "manage preferences and permissions for USB devices",
            "description" => "Allows the app to manage preferences and permissions for USB devices.",
        ),
        "android.permission.ACCESS_MTP" => array(
            "group" => "android.permission-group.HARDWARE_CONTROLS",

            "level" => 3,
            "label" => "implement MTP protocol",
            "description" => "Allows access to the kernel MTP driver to implement the MTP USB protocol.",
        ),
        "android.permission.HARDWARE_TEST" => array(
            "group" => "android.permission-group.HARDWARE_CONTROLS",

            "level" => 2,
            "label" => "test hardware",
            "description" => "Allows the app to control various peripherals for the purpose of hardware testing.",
        ),
        "android.permission.NET_ADMIN" => array(
            "group" => "android.permission-group.SYSTEM_TOOLS",

            "level" => 2,
            "label" => false,
            "description" => false,
        ),
        "android.permission.REMOTE_AUDIO_PLAYBACK" => array(
            "group" => "android.permission-group.SYSTEM_TOOLS",

            "level" => 2,
            "label" => false,
            "description" => false,
        ),
        "android.permission.RECORD_AUDIO" => array(
            "group" => "android.permission-group.MICROPHONE",

            "level" => 1,
            "label" => "record audio",
            "description" => "Allows the app to record audio with the microphone.  This permission allows the app to record audio at any time without your confirmation.",
        ),
        "android.permission.CAMERA" => array(
            "group" => "android.permission-group.CAMERA",

            "level" => 1,
            "label" => "take pictures and videos",
            "description" => "Allows the app to take pictures and videos with the camera.  This permission allows the app to use the camera at any time without your confirmation.",
        ),
        "android.permission.CAMERA_DISABLE_TRANSMIT_LED" => array(
            "group" => "android.permission-group.CAMERA",

            "level" => 3,
            "label" => "disable transmit indicator LED when camera is in use",
            "description" => "Allows a pre-installed system application to disable the camera use indicator LED.",
        ),
        "android.permission.PROCESS_OUTGOING_CALLS" => array(
            "group" => "android.permission-group.PHONE_CALLS",

            "level" => 1,
            "label" => "reroute outgoing calls",
            "description" => "Allows the app to see the number being dialed during an outgoing call with the option to redirect the call to a different number or abort the call altogether.",
        ),
        "android.permission.MODIFY_PHONE_STATE" => array(
            "group" => "android.permission-group.PHONE_CALLS",

            "level" => 3,
            "label" => "modify phone state",
            "description" => "Allows the app to control the phone features of the device. An app with this permission can switch networks, turn the phone radio on and off and the like without ever notifying you.",
        ),
        "android.permission.READ_PHONE_STATE" => array(
            "group" => "android.permission-group.PHONE_CALLS",

            "level" => 1,
            "label" => "read phone status and identity",
            "description" => "Allows the app to access the phone features of the device.  This permission allows the app to determine the phone number and device IDs, whether a call is active, and the remote number connected by a call.",
        ),
        "android.permission.READ_PRIVILEGED_PHONE_STATE" => array(
            "group" => "android.permission-group.PHONE_CALLS",

            "level" => 3,
            "label" => false,
            "description" => false,
        ),
        "android.permission.CALL_PHONE" => array(
            "group" => "android.permission-group.PHONE_CALLS",

            "level" => 1,
            "label" => "directly call phone numbers",
            "description" => "Allows the app to call phone numbers without your intervention. This may result in unexpected charges or calls. Note that this doesnt allow the app to call emergency numbers. Malicious apps may cost you money by making calls without your confirmation.",
        ),
        "android.permission.USE_SIP" => array(
            "group" => "android.permission-group.PHONE_CALLS",

            "level" => 1,
            "label" => "make/receive Internet calls",
            "description" => "Allows the app to use the SIP service to make/receive Internet calls.",
        ),
        "android.permission.BIND_CALL_SERVICE" => array(
            "group" => "android.permission-group.PHONE_CALLS",

            "level" => 3,
            "label" => "interact with in-call screen",
            "description" => "Allows the app to control when and how the user sees the in-call screen.",
        ),
        "android.permission.READ_EXTERNAL_STORAGE" => array(
            "group" => "android.permission-group.STORAGE",

            "level" => 0,
            "label" => "read the contents of your SD card",
            "description" => "Allows the app to read the contents of your SD card.",
        ),
        "android.permission.WRITE_EXTERNAL_STORAGE" => array(
            "group" => "android.permission-group.STORAGE",

            "level" => 1,
            "label" => "modify or delete the contents of your SD card",
            "description" => "Allows the app to write to the SD card.",
        ),
        "android.permission.WRITE_MEDIA_STORAGE" => array(
            "group" => "android.permission-group.STORAGE",

            "level" => 3,
            "label" => "modify/delete internal media storage contents",
            "description" => "Allows the app to modify the contents of the internal media storage.",
        ),
        "android.permission.MANAGE_DOCUMENTS" => array(
            "group" => "android.permission-group.STORAGE",

            "level" => 2,
            "label" => "manage document storage",
            "description" => "Allows the app to manage document storage.",
        ),
        "android.permission.DISABLE_KEYGUARD" => array(
            "group" => "android.permission-group.SCREENLOCK",

            "level" => 1,
            "label" => "disable your screen lock",
            "description" => "Allows the app to disable the keylock and any associated password security.  For example, the phone disables the keylock when receiving an incoming phone call, then re-enables the keylock when the call is finished.",
        ),
        "android.permission.GET_TASKS" => array(
            "group" => "android.permission-group.APP_INFO",

            "level" => 1,
            "label" => "retrieve running apps",
            "description" => "Allows the app to retrieve information about currently and recently running tasks.  This may allow the app to discover information about which applications are used on the device.",
        ),
        "android.permission.INTERACT_ACROSS_USERS" => array(
            "group" => "android.permission-group.SYSTEM_TOOLS",

            "level" => 3,
            "label" => "interact across users",
            "description" => "Allows the app to perform actions across different users on the device.  Malicious apps may use this to violate the protection between users.",
        ),
        "android.permission.INTERACT_ACROSS_USERS_FULL" => array(
            "group" => "android.permission-group.SYSTEM_TOOLS",

            "level" => 2,
            "label" => "full license to interact across users",
            "description" => "Allows all possible interactions across users.",
        ),
        "android.permission.MANAGE_USERS" => array(
            "group" => "android.permission-group.SYSTEM_TOOLS",

            "level" => 3,
            "label" => "manage users",
            "description" => "Allows apps to manage users on the device, including query, creation and deletion.",
        ),
        "android.permission.GET_DETAILED_TASKS" => array(
            "group" => "android.permission-group.SYSTEM_TOOLS",

            "level" => 2,
            "label" => "retrieve details of running apps",
            "description" => "Allows the app to retrieve detailed information about currently and recently running tasks. Malicious apps may discover private information about other apps.",
        ),
        "android.permission.REORDER_TASKS" => array(
            "group" => "android.permission-group.APP_INFO",

            "level" => 0,
            "label" => "reorder running apps",
            "description" => "Allows the app to move tasks to the foreground and background.  The app may do this without your input.",
        ),
        "android.permission.REMOVE_TASKS" => array(
            "group" => "android.permission-group.APP_INFO",

            "level" => 2,
            "label" => "stop running apps",
            "description" => "Allows the app to remove tasks and kill their apps. Malicious apps may disrupt the behavior of other apps.",
        ),
        "android.permission.MANAGE_ACTIVITY_STACKS" => array(
            "group" => "android.permission-group.APP_INFO",

            "level" => 2,
            "label" => "manage activity stacks",
            "description" => "Allows the app to add, remove, and modify the activity stacks in which other apps run.  Malicious apps may disrupt the behavior of other apps.",
        ),
        "android.permission.START_ANY_ACTIVITY" => array(
            "group" => "android.permission-group.SYSTEM_TOOLS",

            "level" => 2,
            "label" => "start any activity",
            "description" => "Allows the app to start any activity, regardless of permission protection or exported state.",
        ),
        "android.permission.RESTART_PACKAGES" => array(
            "group" => "android.permission-group.APP_INFO",

            "level" => 0,
            "label" => "close other apps",
            "description" => "Allows the app to end background processes of other apps.  This may cause other apps to stop running.",
        ),
        "android.permission.KILL_BACKGROUND_PROCESSES" => array(
            "group" => "android.permission-group.APP_INFO",

            "level" => 0,
            "label" => "close other apps",
            "description" => "Allows the app to end background processes of other apps.  This may cause other apps to stop running.",
        ),
        "android.permission.SYSTEM_ALERT_WINDOW" => array(
            "group" => "android.permission-group.DISPLAY",

            "level" => 1,
            "label" => "draw over other apps",
            "description" => "Allows the app to draw on top of other applications or parts of the user interface.  They may interfere with your use of the interface in any application, or change what you think you are seeing in other applications.",
        ),
        "android.permission.SET_WALLPAPER" => array(
            "group" => "android.permission-group.WALLPAPER",

            "level" => 0,
            "label" => "set wallpaper",
            "description" => "Allows the app to set the system wallpaper.",
        ),
        "android.permission.SET_KEYGUARD_WALLPAPER" => array(
            "group" => "android.permission-group.WALLPAPER",

            "level" => 0,
            "label" => "set keyguard wallpaper",
            "description" => "Allows an app to change the lock screen wallpaper.",
        ),
        "android.permission.SET_WALLPAPER_HINTS" => array(
            "group" => "android.permission-group.WALLPAPER",

            "level" => 0,
            "label" => "adjust your wallpaper size",
            "description" => "Allows the app to set the system wallpaper size hints.",
        ),
        "android.permission.SET_TIME" => array(
            "group" => "other.1NO_GROUP",

            "level" => 3,
            "label" => "set time",
            "description" => "Allows the app to change the phones clock time.",
        ),
        "android.permission.SET_TIME_ZONE" => array(
            "group" => "android.permission-group.SYSTEM_CLOCK",

            "level" => 0,
            "label" => "set time zone",
            "description" => "Allows the app to change the phones time zone.",
        ),
        "android.permission.EXPAND_STATUS_BAR" => array(
            "group" => "android.permission-group.STATUS_BAR",

            "level" => 0,
            "label" => "expand/collapse status bar",
            "description" => "Allows the app to expand or collapse the status bar.",
        ),
        "com.android.launcher.permission.INSTALL_SHORTCUT" => array(
            "group" => "android.permission-group.SYSTEM_TOOLS",

            "level" => 1,
            "label" => "install shortcuts",
            "description" => "Allows an application to add Homescreen shortcuts without user intervention.",
        ),
        "com.android.launcher.permission.UNINSTALL_SHORTCUT" => array(
            "group" => "android.permission-group.SYSTEM_TOOLS",

            "level" => 1,
            "label" => "uninstall shortcuts",
            "description" => "Allows the application to remove Homescreen shortcuts without user intervention.",
        ),
        "android.permission.READ_SYNC_SETTINGS" => array(
            "group" => "android.permission-group.SYNC_SETTINGS",

            "level" => 0,
            "label" => "read sync settings",
            "description" => "Allows the app to read the sync settings for an account. For example, this can determine whether the People app is synced with an account.",
        ),
        "android.permission.WRITE_SYNC_SETTINGS" => array(
            "group" => "android.permission-group.SYNC_SETTINGS",

            "level" => 0,
            "label" => "toggle sync on and off",
            "description" => "Allows an app to modify the sync settings for an account.  For example, this can be used to enable sync of the People app with an account.",
        ),
        "android.permission.READ_SYNC_STATS" => array(
            "group" => "android.permission-group.SYNC_SETTINGS",

            "level" => 0,
            "label" => "read sync statistics",
            "description" => "Allows an app to read the sync stats for an account, including the history of sync events and how much data is synced. ",
        ),
        "android.permission.SET_SCREEN_COMPATIBILITY" => array(
            "group" => "android.permission-group.SYSTEM_TOOLS",

            "level" => 2,
            "label" => "set screen compatibility",
            "description" => "Allows the app to control the screen compatibility mode of other applications.  Malicious applications may break the behavior of other applications.",
        ),
        "android.permission.ACCESS_ALL_EXTERNAL_STORAGE" => array(
            "group" => "android.permission-group.DEVELOPMENT_TOOLS",

            "level" => 2,
            "label" => "access external storage of all users",
            "description" => "Allows the app to access external storage for all users.",
        ),
        "android.permission.CHANGE_CONFIGURATION" => array(
            "group" => "android.permission-group.DEVELOPMENT_TOOLS",

            "level" => 3,
            "label" => "change system display settings",
            "description" => "Allows the app to change the current configuration, such as the locale or overall font size.",
        ),
        "android.permission.WRITE_SETTINGS" => array(
            "group" => "android.permission-group.SYSTEM_TOOLS",

            "level" => 1,
            "label" => "modify system settings",
            "description" => "Allows the app to modify the systems settings data. Malicious apps may corrupt your systems configuration.",
        ),
        "android.permission.WRITE_GSERVICES" => array(
            "group" => "other.1NO_GROUP",

            "level" => 3,
            "label" => "modify the Google services map",
            "description" => "Allows the app to modify the Google services map.  Not for use by normal apps.",
        ),
        "android.permission.FORCE_STOP_PACKAGES" => array(
            "group" => "android.permission-group.SYSTEM_TOOLS",

            "level" => 3,
            "label" => "force stop other apps",
            "description" => "Allows the app to forcibly stop other apps.",
        ),
        "android.permission.RETRIEVE_WINDOW_CONTENT" => array(
            "group" => "android.permission-group.PERSONAL_INFO",

            "level" => 3,
            "label" => "retrieve screen content",
            "description" => "Allows the app to retrieve the content of the active window. Malicious apps may retrieve the entire window content and examine all its text except passwords.",
        ),
        "android.permission.SET_ANIMATION_SCALE" => array(
            "group" => "android.permission-group.SYSTEM_TOOLS",

            "level" => 3,
            "label" => "modify global animation speed",
            "description" => "Allows the app to change the global animation speed (faster or slower animations) at any time.",
        ),
        "android.permission.PERSISTENT_ACTIVITY" => array(
            "group" => "android.permission-group.APP_INFO",

            "level" => 0,
            "label" => "make app always run",
            "description" => "Allows the app to make parts of itself persistent in memory.  This can limit memory available to other apps slowing down the phone.",
        ),
        "android.permission.GET_PACKAGE_SIZE" => array(
            "group" => "android.permission-group.SYSTEM_TOOLS",

            "level" => 0,
            "label" => "measure app storage space",
            "description" => "Allows the app to retrieve its code, data, and cache sizes",
        ),
        "android.permission.SET_PREFERRED_APPLICATIONS" => array(
            "group" => "android.permission-group.SYSTEM_TOOLS",

            "level" => 2,
            "label" => "set preferred apps",
            "description" => "Allows the app to modify your preferred apps. Malicious apps may silently change the apps that are run, spoofing your existing apps to collect private data from you.",
        ),
        "android.permission.RECEIVE_BOOT_COMPLETED" => array(
            "group" => "android.permission-group.APP_INFO",

            "level" => 0,
            "label" => "run at startup",
            "description" => "Allows the app to have itself started as soon as the system has finished booting. This can make it take longer to start the phone and allow the app to slow down the overall phone by always running.",
        ),
        "android.permission.BROADCAST_STICKY" => array(
            "group" => "android.permission-group.SYSTEM_TOOLS",

            "level" => 0,
            "label" => "send sticky broadcast",
            "description" => "Allows the app to send sticky broadcasts, which remain after the broadcast ends. Excessive use may make the phone slow or unstable by causing it to use too much memory.",
        ),
        "android.permission.MOUNT_UNMOUNT_FILESYSTEMS" => array(
            "group" => "android.permission-group.SYSTEM_TOOLS",

            "level" => 3,
            "label" => "access SD Card filesystem",
            "description" => "Allows the app to mount and unmount filesystems for removable storage.",
        ),
        "android.permission.MOUNT_FORMAT_FILESYSTEMS" => array(
            "group" => "android.permission-group.SYSTEM_TOOLS",

            "level" => 3,
            "label" => "erase SD Card",
            "description" => "Allows the app to format removable storage.",
        ),
        "android.permission.ASEC_ACCESS" => array(
            "group" => "android.permission-group.SYSTEM_TOOLS",

            "level" => 2,
            "label" => "get information on internal storage",
            "description" => "Allows the app to get information on internal storage.",
        ),
        "android.permission.ASEC_CREATE" => array(
            "group" => "android.permission-group.SYSTEM_TOOLS",

            "level" => 2,
            "label" => "create internal storage",
            "description" => "Allows the app to create internal storage.",
        ),
        "android.permission.ASEC_DESTROY" => array(
            "group" => "android.permission-group.SYSTEM_TOOLS",

            "level" => 2,
            "label" => "destroy internal storage",
            "description" => "Allows the app to destroy internal storage.",
        ),
        "android.permission.ASEC_MOUNT_UNMOUNT" => array(
            "group" => "android.permission-group.SYSTEM_TOOLS",

            "level" => 2,
            "label" => "mount/unmount internal storage",
            "description" => "Allows the app to mount/unmount internal storage.",
        ),
        "android.permission.ASEC_RENAME" => array(
            "group" => "android.permission-group.SYSTEM_TOOLS",

            "level" => 2,
            "label" => "rename internal storage",
            "description" => "Allows the app to rename internal storage.",
        ),
        "android.permission.WRITE_APN_SETTINGS" => array(
            "group" => "android.permission-group.SYSTEM_TOOLS",

            "level" => 3,
            "label" => "change/intercept network settings and traffic",
            "description" => "Allows the app to change network settings and to intercept and inspect all network traffic, for example to change the proxy and port of any APN. Malicious apps may monitor, redirect, or modify network packets without your knowledge.",
        ),
        "android.permission.SUBSCRIBED_FEEDS_READ" => array(
            "group" => "android.permission-group.SYSTEM_TOOLS",

            "level" => 0,
            "label" => "read subscribed feeds",
            "description" => "Allows the app to get details about the currently synced feeds.",
        ),
        "android.permission.SUBSCRIBED_FEEDS_WRITE" => array(
            "group" => "android.permission-group.SYSTEM_TOOLS",

            "level" => 1,
            "label" => "write subscribed feeds",
            "description" => "Allows the app to modify your currently synced feeds. Malicious apps may change your synced feeds.",
        ),
        "android.permission.CHANGE_NETWORK_STATE" => array(
            "group" => "android.permission-group.NETWORK",

            "level" => 0,
            "label" => "change network connectivity",
            "description" => "Allows the app to change the state of network connectivity.",
        ),
        "android.permission.CLEAR_APP_CACHE" => array(
            "group" => "android.permission-group.SYSTEM_TOOLS",

            "level" => 1,
            "label" => "delete all app cache data",
            "description" => "Allows the app to free phone storage by deleting files in the cache directories of other applications.  This may cause other applications to start up more slowly as they need to re-retrieve their data.",
        ),
        "android.permission.ALLOW_ANY_CODEC_FOR_PLAYBACK" => array(
            "group" => "other.1NO_GROUP",

            "level" => 3,
            "label" => "use any media decoder for playback",
            "description" => "Allows the app to use any installed media decoder to decode for playback.",
        ),
        "android.permission.MANAGE_CA_CERTIFICATES" => array(
            "group" => "other.1NO_GROUP",

            "level" => 3,
            "label" => "manage trusted credentials",
            "description" => "Allows the app to install and uninstall CA certificates as trusted credentials.",
        ),
        "android.permission.WRITE_SECURE_SETTINGS" => array(
            "group" => "android.permission-group.DEVELOPMENT_TOOLS",

            "level" => 3,
            "label" => "modify secure system settings",
            "description" => "Allows the app to modify the systems secure settings data. Not for use by normal apps.",
        ),
        "android.permission.DUMP" => array(
            "group" => "android.permission-group.DEVELOPMENT_TOOLS",

            "level" => 3,
            "label" => "retrieve system internal state",
            "description" => "Allows the app to retrieve internal state of the system. Malicious apps may retrieve a wide variety of private and secure information that they should never normally need.",
        ),
        "android.permission.READ_LOGS" => array(
            "group" => "android.permission-group.DEVELOPMENT_TOOLS",

            "level" => 3,
            "label" => "read sensitive log data",
            "description" => "Allows the app to read from the systems various log files.  This allows it to discover general information about what you are doing with the phone, potentially including personal or private information.",
        ),
        "android.permission.SET_DEBUG_APP" => array(
            "group" => "android.permission-group.DEVELOPMENT_TOOLS",

            "level" => 3,
            "label" => "enable app debugging",
            "description" => "Allows the app to turn on debugging for another app. Malicious apps may use this to kill other apps.",
        ),
        "android.permission.SET_PROCESS_LIMIT" => array(
            "group" => "android.permission-group.DEVELOPMENT_TOOLS",

            "level" => 3,
            "label" => "limit number of running processes",
            "description" => "Allows the app to control the maximum number of processes that will run. Never needed for normal apps.",
        ),
        "android.permission.SET_ALWAYS_FINISH" => array(
            "group" => "android.permission-group.DEVELOPMENT_TOOLS",

            "level" => 3,
            "label" => "force background apps to close",
            "description" => "Allows the app to control whether activities are always finished as soon as they go to the background. Never needed for normal apps.",
        ),
        "android.permission.SIGNAL_PERSISTENT_PROCESSES" => array(
            "group" => "android.permission-group.DEVELOPMENT_TOOLS",

            "level" => 3,
            "label" => "send Linux signals to apps",
            "description" => "Allows the app to request that the supplied signal be sent to all persistent processes.",
        ),
        "android.permission.DIAGNOSTIC" => array(
            "group" => "android.permission-group.SYSTEM_TOOLS",

            "level" => 2,
            "label" => "read/write to resources owned by diag",
            "description" => "Allows the app to read and write to any resource owned by the diag group; for example, files in /dev. This could potentially affect system stability and security. This should be ONLY be used for hardware-specific diagnostics by the manufacturer or operator.",
        ),
        "android.permission.STATUS_BAR" => array(
            "group" => "other.1NO_GROUP",

            "level" => 3,
            "label" => "disable or modify status bar",
            "description" => "Allows the app to disable the status bar or add and remove system icons.",
        ),
        "android.permission.STATUS_BAR_SERVICE" => array(
            "group" => "other.1NO_GROUP",

            "level" => 2,
            "label" => "status bar",
            "description" => "Allows the app to be the status bar.",
        ),
        "android.permission.FORCE_BACK" => array(
            "group" => "other.1NO_GROUP",

            "level" => 2,
            "label" => "force app to close",
            "description" => "Allows the app to force any activity that is in the foreground to close and go back. Should never be needed for normal apps.",
        ),
        "android.permission.UPDATE_DEVICE_STATS" => array(
            "group" => "other.1NO_GROUP",

            "level" => 3,
            "label" => "modify battery statistics",
            "description" => "Allows the app to modify collected battery statistics. Not for use by normal apps.",
        ),
        "android.permission.GET_APP_OPS_STATS" => array(
            "group" => "android.permission-group.SYSTEM_TOOLS",

            "level" => 3,
            "label" => "retrieve app ops statistics",
            "description" => "Allows the app to retrieve collected application operation statistics. Not for use by normal apps.",
        ),
        "android.permission.UPDATE_APP_OPS_STATS" => array(
            "group" => "other.1NO_GROUP",

            "level" => 3,
            "label" => "modify app ops statistics",
            "description" => "Allows the app to modify collected application operation statistics. Not for use by normal apps.",
        ),
        "android.permission.INTERNAL_SYSTEM_WINDOW" => array(
            "group" => "other.1NO_GROUP",

            "level" => 2,
            "label" => "display unauthorized windows",
            "description" => "Allows the app to create windows that are intended to be used by the internal system user interface. Not for use by normal apps.",
        ),
        "android.permission.MANAGE_APP_TOKENS" => array(
            "group" => "other.1NO_GROUP",

            "level" => 2,
            "label" => "manage app tokens",
            "description" => "Allows the app to create and manage their own tokens, bypassing their normal Z-ordering. Should never be needed for normal apps.",
        ),
        "android.permission.FREEZE_SCREEN" => array(
            "group" => "other.1NO_GROUP",

            "level" => 2,
            "label" => "freeze screen",
            "description" => "Allows the application to temporarily freeze the screen for a full-screen transition.",
        ),
        "android.permission.INJECT_EVENTS" => array(
            "group" => "other.1NO_GROUP",

            "level" => 2,
            "label" => "press keys and control buttons",
            "description" => "Allows the app to deliver its own input events (key presses, etc.) to other apps. Malicious apps may use this to take over the phone.",
        ),
        "android.permission.FILTER_EVENTS" => array(
            "group" => "other.1NO_GROUP",

            "level" => 2,
            "label" => "filter events",
            "description" => "Allows an application to register an input filter which filters the stream of all user events before they are dispatched. Malicious app may control the system UI whtout user intervention.",
        ),
        "android.permission.RETRIEVE_WINDOW_INFO" => array(
            "group" => "other.1NO_GROUP",

            "level" => 2,
            "label" => "retrieve window info",
            "description" => "Allows an application to retrieve information about the the windows from the window manager. Malicious apps may retrieve information that is intended for internal system usage.",
        ),
        "android.permission.TEMPORARY_ENABLE_ACCESSIBILITY" => array(
            "group" => "other.1NO_GROUP",

            "level" => 2,
            "label" => "temporary enable accessibility",
            "description" => "Allows an application to temporarily enable accessibility on the device. Malicious apps may enable accessibility without user consent.",
        ),
        "android.permission.MAGNIFY_DISPLAY" => array(
            "group" => "other.1NO_GROUP",

            "level" => 2,
            "label" => "magnify display",
            "description" => "Allows an application to magnify the content of a display. Malicious apps may transform the display content in a way that renders the device unusable.",
        ),
        "android.permission.SET_ACTIVITY_WATCHER" => array(
            "group" => "other.1NO_GROUP",

            "level" => 2,
            "label" => "monitor and control all app launching",
            "description" => "Allows the app to monitor and control how the system launches activities. Malicious apps may completely compromise the system. This permission is only needed for development, never for normal use.",
        ),
        "android.permission.SHUTDOWN" => array(
            "group" => "other.1NO_GROUP",

            "level" => 3,
            "label" => "partial shutdown",
            "description" => "Puts the activity manager into a shutdown state.  Does not perform a complete shutdown.",
        ),
        "android.permission.STOP_APP_SWITCHES" => array(
            "group" => "other.1NO_GROUP",

            "level" => 3,
            "label" => "prevent app switches",
            "description" => "Prevents the user from switching to another app.",
        ),
        "android.permission.GET_TOP_ACTIVITY_INFO" => array(
            "group" => "other.1NO_GROUP",

            "level" => 2,
            "label" => "get current app info",
            "description" => "Allows the holder to retrieve private information about the current application in the foreground of the screen.",
        ),
        "android.permission.READ_INPUT_STATE" => array(
            "group" => "other.1NO_GROUP",

            "level" => 2,
            "label" => "record what you type and actions you take",
            "description" => "Allows the app to watch the keys you press even when interacting with another app (such as typing a password). Should never be needed for normal apps.",
        ),
        "android.permission.BIND_INPUT_METHOD" => array(
            "group" => "other.1NO_GROUP",

            "level" => 2,
            "label" => "bind to an input method",
            "description" => "Allows the holder to bind to the top-level interface of an input method. Should never be needed for normal apps.",
        ),
        "android.permission.BIND_ACCESSIBILITY_SERVICE" => array(
            "group" => "other.1NO_GROUP",

            "level" => 2,
            "label" => "bind to an accessibility service",
            "description" => "Allows the holder to bind to the top-level interface of an accessibility service. Should never be needed for normal apps.",
        ),
        "android.permission.BIND_PRINT_SERVICE" => array(
            "group" => "other.1NO_GROUP",

            "level" => 2,
            "label" => "bind to a print service",
            "description" => "Allows the holder to bind to the top-level interface of a print service. Should never be needed for normal apps.",
        ),
        "android.permission.BIND_NFC_SERVICE" => array(
            "group" => "other.1NO_GROUP",

            "level" => 2,
            "label" => "bind to NFC service",
            "description" => "Allows the holder to bind to applications that are emulating NFC cards. Should never be needed for normal apps.",
        ),
        "android.permission.BIND_PRINT_SPOOLER_SERVICE" => array(
            "group" => "other.1NO_GROUP",

            "level" => 2,
            "label" => "bind to a print spooler service",
            "description" => "Allows the holder to bind to the top-level interface of a print spooler service. Should never be needed for normal apps.",
        ),
        "android.permission.BIND_TEXT_SERVICE" => array(
            "group" => "other.1NO_GROUP",

            "level" => 2,
            "label" => "bind to a text service",
            "description" => "Allows the holder to bind to the top-level interface of a text service(e.g. SpellCheckerService). Should never be needed for normal apps.",
        ),
        "android.permission.BIND_VPN_SERVICE" => array(
            "group" => "other.1NO_GROUP",

            "level" => 2,
            "label" => "bind to a VPN service",
            "description" => "Allows the holder to bind to the top-level interface of a Vpn service. Should never be needed for normal apps.",
        ),
        "android.permission.BIND_WALLPAPER" => array(
            "group" => "other.1NO_GROUP",

            "level" => 3,
            "label" => "bind to a wallpaper",
            "description" => "Allows the holder to bind to the top-level interface of a wallpaper. Should never be needed for normal apps.",
        ),
        "android.permission.BIND_REMOTE_DISPLAY" => array(
            "group" => "other.1NO_GROUP",

            "level" => 2,
            "label" => "bind to a remote display",
            "description" => "Allows the holder to bind to the top-level interface of a remote display. Should never be needed for normal apps.",
        ),
        "android.permission.BIND_DEVICE_ADMIN" => array(
            "group" => "other.1NO_GROUP",

            "level" => 2,
            "label" => "interact with a device admin",
            "description" => "Allows the holder to send intents to a device administrator. Should never be needed for normal apps.",
        ),
        "android.permission.MANAGE_DEVICE_ADMINS" => array(
            "group" => "other.1NO_GROUP",

            "level" => 3,
            "label" => "add or remove a device admin",
            "description" => "Allows the holder to add or remove active device administrators. Should never be needed for normal apps.",
        ),
        "android.permission.SET_ORIENTATION" => array(
            "group" => "other.1NO_GROUP",

            "level" => 2,
            "label" => "change screen orientation",
            "description" => "Allows the app to change the rotation of the screen at any time. Should never be needed for normal apps.",
        ),
        "android.permission.SET_POINTER_SPEED" => array(
            "group" => "other.1NO_GROUP",

            "level" => 2,
            "label" => "change pointer speed",
            "description" => "Allows the app to change the mouse or trackpad pointer speed at any time. Should never be needed for normal apps.",
        ),
        "android.permission.SET_KEYBOARD_LAYOUT" => array(
            "group" => "other.1NO_GROUP",

            "level" => 2,
            "label" => "change keyboard layout",
            "description" => "Allows the app to change the keyboard layout. Should never be needed for normal apps.",
        ),
        "android.permission.INSTALL_PACKAGES" => array(
            "group" => "other.1NO_GROUP",

            "level" => 3,
            "label" => "directly install apps",
            "description" => "Allows the app to install new or updated Android packages. Malicious apps may use this to add new apps with arbitrarily powerful permissions.",
        ),
        "android.permission.CLEAR_APP_USER_DATA" => array(
            "group" => "other.1NO_GROUP",

            "level" => 2,
            "label" => "delete other apps data",
            "description" => "Allows the app to clear user data.",
        ),
        "android.permission.DELETE_CACHE_FILES" => array(
            "group" => "other.1NO_GROUP",

            "level" => 3,
            "label" => "delete other apps caches",
            "description" => "Allows the app to delete cache files.",
        ),
        "android.permission.DELETE_PACKAGES" => array(
            "group" => "other.1NO_GROUP",

            "level" => 3,
            "label" => "delete apps",
            "description" => "Allows the app to delete Android packages. Malicious apps may use this to delete important apps.",
        ),
        "android.permission.MOVE_PACKAGE" => array(
            "group" => "other.1NO_GROUP",

            "level" => 3,
            "label" => "move app resources",
            "description" => "Allows the app to move app resources from internal to external media and vice versa.",
        ),
        "android.permission.CHANGE_COMPONENT_ENABLED_STATE" => array(
            "group" => "other.1NO_GROUP",

            "level" => 3,
            "label" => "enable or disable app components",
            "description" => "Allows the app to change whether a component of another app is enabled or not. Malicious apps may use this to disable important phone capabilities. Care must be used with this permission, as it is possible to get app components into an unusable, inconsistent, or unstable state. ",
        ),
        "android.permission.GRANT_REVOKE_PERMISSIONS" => array(
            "group" => "other.1NO_GROUP",

            "level" => 2,
            "label" => "grant or revoke permissions",
            "description" => "Allows an application to grant or revoke specific permissions for it or other applications.  Malicious applications may use this to access features you have not granted them. ",
        ),
        "android.permission.ACCESS_SURFACE_FLINGER" => array(
            "group" => "other.1NO_GROUP",

            "level" => 2,
            "label" => "access SurfaceFlinger",
            "description" => "Allows the app to use SurfaceFlinger low-level features.",
        ),
        "android.permission.READ_FRAME_BUFFER" => array(
            "group" => "other.1NO_GROUP",

            "level" => 3,
            "label" => "read frame buffer",
            "description" => "Allows the app to read the content of the frame buffer.",
        ),
        "android.permission.CONFIGURE_WIFI_DISPLAY" => array(
            "group" => "other.1NO_GROUP",

            "level" => 2,
            "label" => "configure Wifi displays",
            "description" => "Allows the app to configure and connect to Wifi displays.",
        ),
        "android.permission.CONTROL_WIFI_DISPLAY" => array(
            "group" => "other.1NO_GROUP",

            "level" => 2,
            "label" => "control Wifi displays",
            "description" => "Allows the app to control low-level features of Wifi displays.",
        ),
        "android.permission.CAPTURE_AUDIO_OUTPUT" => array(
            "group" => "other.1NO_GROUP",

            "level" => 3,
            "label" => "capture audio output",
            "description" => "Allows the app to capture and redirect audio output.",
        ),
        "android.permission.CAPTURE_AUDIO_HOTWORD" => array(
            "group" => "other.1NO_GROUP",

            "level" => 3,
            "label" => "Hotword detection",
            "description" => "Allows the app to capture audio for Hotword detection. The capture can happen in the background but does not prevent other audio capture (e.g. Camcorder).",
        ),
        "android.permission.CAPTURE_VIDEO_OUTPUT" => array(
            "group" => "other.1NO_GROUP",

            "level" => 3,
            "label" => "capture video output",
            "description" => "Allows the app to capture and redirect video output.",
        ),
        "android.permission.CAPTURE_SECURE_VIDEO_OUTPUT" => array(
            "group" => "other.1NO_GROUP",

            "level" => 3,
            "label" => "capture secure video output",
            "description" => "Allows the app to capture and redirect secure video output.",
        ),
        "android.permission.MEDIA_CONTENT_CONTROL" => array(
            "group" => "other.1NO_GROUP",

            "level" => 3,
            "label" => "control media playback and metadata access",
            "description" => "Allows the app to control media playback and access the media information (title, author...).",
        ),
        "android.permission.BRICK" => array(
            "group" => "other.1NO_GROUP",

            "level" => 2,
            "label" => "permanently disable phone",
            "description" => "Allows the app to disable the entire phone permanently. This is very dangerous.",
        ),
        "android.permission.REBOOT" => array(
            "group" => "other.1NO_GROUP",

            "level" => 3,
            "label" => "force phone reboot",
            "description" => "Allows the app to force the phone to reboot.",
        ),
        "android.permission.DEVICE_POWER" => array(
            "group" => "other.1NO_GROUP",

            "level" => 2,
            "label" => "power phone on or off",
            "description" => "Allows the app to turn the phone on or off.",
        ),
        "android.permission.NET_TUNNELING" => array(
            "group" => "android.permission-group.SYSTEM_TOOLS",

            "level" => 2,
            "label" => false,
            "description" => false,
        ),
        "android.permission.FACTORY_TEST" => array(
            "group" => "other.1NO_GROUP",

            "level" => 2,
            "label" => "run in factory test mode",
            "description" => "Run as a low-level manufacturer test, allowing complete access to the phone hardware. Only available when a phone is running in manufacturer test mode.",
        ),
        "android.permission.BROADCAST_PACKAGE_REMOVED" => array(
            "group" => "android.permission-group.SYSTEM_TOOLS",

            "level" => 2,
            "label" => "send package removed broadcast",
            "description" => "Allows the app to broadcast a notification that an app package has been removed. Malicious apps may use this to kill any other running app.",
        ),
        "android.permission.INTERCEPT_SMS" => array(
            "group" => "android.permission-group.MESSAGES",

            "level" => 2,
            "label" => "intercept outgoing SMS",
            "description" => "Allows the app to intercept an outgoing SMS. Malicious apps may use this to prevent outgoing SMS messages.",
        ),
        "android.permission.BROADCAST_SMS" => array(
            "group" => "android.permission-group.MESSAGES",

            "level" => 2,
            "label" => "send SMS-received broadcast",
            "description" => "Allows the app to broadcast a notification that an SMS message has been received. Malicious apps may use this to forge incoming SMS messages.",
        ),
        "android.permission.BROADCAST_WAP_PUSH" => array(
            "group" => "android.permission-group.MESSAGES",

            "level" => 2,
            "label" => "send WAP-PUSH-received broadcast",
            "description" => "Allows the app to broadcast a notification that a WAP PUSH message has been received. Malicious apps may use this to forge MMS message receipt or to silently replace the content of any webpage with malicious variants.",
        ),
        "android.permission.MASTER_CLEAR" => array(
            "group" => "other.1NO_GROUP",

            "level" => 3,
            "label" => "reset system to factory defaults",
            "description" => "Allows the app to completely reset the system to its factory settings, erasing all data, configuration, and installed apps.",
        ),
        "android.permission.CALL_PRIVILEGED" => array(
            "group" => "other.1NO_GROUP",

            "level" => 3,
            "label" => "directly call any phone numbers",
            "description" => "Allows the app to call any phone number, including emergency numbers, without your intervention. Malicious apps may place unnecessary and illegal calls to emergency services.",
        ),
        "android.permission.PERFORM_CDMA_PROVISIONING" => array(
            "group" => "other.1NO_GROUP",

            "level" => 3,
            "label" => "directly start CDMA phone setup",
            "description" => "Allows the app to start CDMA provisioning. Malicious apps may unnecessarily start CDMA provisioning.",
        ),
        "android.permission.CONTROL_LOCATION_UPDATES" => array(
            "group" => "other.1NO_GROUP",

            "level" => 3,
            "label" => "control location update notifications",
            "description" => "Allows the app to enable/disable location update notifications from the radio.  Not for use by normal apps.",
        ),
        "android.permission.ACCESS_CHECKIN_PROPERTIES" => array(
            "group" => "other.1NO_GROUP",

            "level" => 3,
            "label" => "access checkin properties",
            "description" => "Allows the app read/write access to properties uploaded by the checkin service.  Not for use by normal apps.",
        ),
        "android.permission.PACKAGE_USAGE_STATS" => array(
            "group" => "other.1NO_GROUP",

            "level" => 3,
            "label" => "update component usage statistics",
            "description" => "Allows the app to modify collected component usage statistics. Not for use by normal apps.",
        ),
        "android.permission.BATTERY_STATS" => array(
            "group" => "android.permission-group.SYSTEM_TOOLS",

            "level" => 3,
            "label" => "read battery statistics",
            "description" => "Allows an application to read the current low-level battery use data.  May allow the application to find out detailed information about which apps you use.",
        ),
        "android.permission.RESET_BATTERY_STATS" => array(
            "group" => "android.permission-group.SYSTEM_TOOLS",

            "level" => 3,
            "label" => "reset battery statistics",
            "description" => "Allows an application to reset the current low-level battery use data.",
        ),
        "android.permission.BACKUP" => array(
            "group" => "other.1NO_GROUP",

            "level" => 3,
            "label" => "control system backup and restore",
            "description" => "Allows the app to control the systems backup and restore mechanism.  Not for use by normal apps.",
        ),
        "android.permission.CONFIRM_FULL_BACKUP" => array(
            "group" => "other.1NO_GROUP",

            "level" => 2,
            "label" => "confirm a full backup or restore operation",
            "description" => "Allows the app to launch the full backup confirmation UI.  Not to be used by any app.",
        ),
        "android.permission.BIND_REMOTEVIEWS" => array(
            "group" => "other.1NO_GROUP",

            "level" => 3,
            "label" => "bind to a widget service",
            "description" => "Allows the holder to bind to the top-level interface of a widget service. Should never be needed for normal apps.",
        ),
        "android.permission.BIND_APPWIDGET" => array(
            "group" => "android.permission-group.PERSONAL_INFO",

            "level" => 3,
            "label" => "choose widgets",
            "description" => "Allows the app to tell the system which widgets can be used by which app. An app with this permission can give access to personal data to other apps. Not for use by normal apps.",
        ),
        "android.permission.BIND_KEYGUARD_APPWIDGET" => array(
            "group" => "android.permission-group.PERSONAL_INFO",

            "level" => 3,
            "label" => false,
            "description" => false,
        ),
        "android.permission.MODIFY_APPWIDGET_BIND_PERMISSIONS" => array(
            "group" => "android.permission-group.SYSTEM_TOOLS",

            "level" => 3,
            "label" => false,
            "description" => false,
        ),
        "android.permission.CHANGE_BACKGROUND_DATA_SETTING" => array(
            "group" => "android.permission-group.SYSTEM_TOOLS",

            "level" => 2,
            "label" => "change background data usage setting",
            "description" => "Allows the app to change the background data usage setting.",
        ),
        "android.permission.GLOBAL_SEARCH" => array(
            "group" => "android.permission-group.SYSTEM_TOOLS",

            "level" => 3,
            "label" => false,
            "description" => false,
        ),
        "android.permission.GLOBAL_SEARCH_CONTROL" => array(
            "group" => "android.permission-group.SYSTEM_TOOLS",

            "level" => 2,
            "label" => false,
            "description" => false,
        ),
        "android.permission.SET_WALLPAPER_COMPONENT" => array(
            "group" => "android.permission-group.SYSTEM_TOOLS",

            "level" => 3,
            "label" => false,
            "description" => false,
        ),
        "android.permission.READ_DREAM_STATE" => array(
            "group" => "android.permission-group.SYSTEM_TOOLS",

            "level" => 2,
            "label" => false,
            "description" => false,
        ),
        "android.permission.WRITE_DREAM_STATE" => array(
            "group" => "android.permission-group.SYSTEM_TOOLS",

            "level" => 2,
            "label" => false,
            "description" => false,
        ),
        "android.permission.ACCESS_CACHE_FILESYSTEM" => array(
            "group" => "other.1NO_GROUP",

            "level" => 3,
            "label" => "access the cache filesystem",
            "description" => "Allows the app to read and write the cache filesystem.",
        ),
        "android.permission.COPY_PROTECTED_DATA" => array(
            "group" => "other.1NO_GROUP",

            "level" => 2,
            "label" => "copy content",
            "description" => "copy content",
        ),
        "android.permission.CRYPT_KEEPER" => array(
            "group" => "other.1NO_GROUP",

            "level" => 3,
            "label" => false,
            "description" => false,
        ),
        "android.permission.READ_NETWORK_USAGE_HISTORY" => array(
            "group" => "other.1NO_GROUP",

            "level" => 3,
            "label" => "read historical network usage",
            "description" => "Allows the app to read historical network usage for specific networks and apps.",
        ),
        "android.permission.MANAGE_NETWORK_POLICY" => array(
            "group" => "other.1NO_GROUP",

            "level" => 2,
            "label" => "manage network policy",
            "description" => "Allows the app to manage network policies and define app-specific rules.",
        ),
        "android.permission.MODIFY_NETWORK_ACCOUNTING" => array(
            "group" => "other.1NO_GROUP",

            "level" => 3,
            "label" => "modify network usage accounting",
            "description" => "Allows the app to modify how network usage is accounted against apps. Not for use by normal apps.",
        ),
        "android.permission.MARK_NETWORK_SOCKET" => array(
            "group" => "other.1NO_GROUP",

            "level" => 3,
            "label" => "modify socket marks",
            "description" => "Allows the app to modify socket marks for routing",
        ),
        "android.intent.category.MASTER_CLEAR.permission.C2D_MESSAGE" => array(
            "group" => "other.1NO_GROUP",

            "level" => 2,
            "label" => false,
            "description" => false,
        ),
        "android.permission.PACKAGE_VERIFICATION_AGENT" => array(
            "group" => "other.1NO_GROUP",

            "level" => 3,
            "label" => "verify packages",
            "description" => "Allows the app to verify a package is installable.",
        ),
        "android.permission.BIND_PACKAGE_VERIFIER" => array(
            "group" => "other.1NO_GROUP",

            "level" => 2,
            "label" => "bind to a package verifier",
            "description" => "Allows the holder to make requests of package verifiers. Should never be needed for normal apps.",
        ),
        "android.permission.SERIAL_PORT" => array(
            "group" => "other.1NO_GROUP",

            "level" => 3,
            "label" => "access serial ports",
            "description" => "Allows the holder to access serial ports using the SerialManager API.",
        ),
        "android.permission.ACCESS_CONTENT_PROVIDERS_EXTERNALLY" => array(
            "group" => "other.1NO_GROUP",

            "level" => 2,
            "label" => "access content providers externally",
            "description" => "Allows the holder to access content providers from the shell. Should never be needed for normal apps.",
        ),
        "android.permission.UPDATE_LOCK" => array(
            "group" => "other.1NO_GROUP",

            "level" => 2,
            "label" => "discourage automatic device updates",
            "description" => "Allows the holder to offer information to the system about when would be a good time for a noninteractive reboot to upgrade the device.",
        ),
        "android.permission.ACCESS_NOTIFICATIONS" => array(
            "group" => "other.1NO_GROUP",

            "level" => 3,
            "label" => "access notifications",
            "description" => "Allows the app to retrieve, examine, and clear notifications, including those posted by other apps.",
        ),
        "android.permission.ACCESS_KEYGUARD_SECURE_STORAGE" => array(
            "group" => "other.1NO_GROUP",

            "level" => 2,
            "label" => "Access keyguard secure storage",
            "description" => "Allows an application to access keguard secure storage.",
        ),
        "android.permission.CONTROL_KEYGUARD" => array(
            "group" => "other.1NO_GROUP",

            "level" => 2,
            "label" => "Control displaying and hiding keyguard",
            "description" => "Allows an application to control keguard.",
        ),
        "android.permission.BIND_NOTIFICATION_LISTENER_SERVICE" => array(
            "group" => "other.1NO_GROUP",

            "level" => 2,
            "label" => "bind to a notification listener service",
            "description" => "Allows the holder to bind to the top-level interface of a notification listener service. Should never be needed for normal apps.",
        ),
        "android.permission.INVOKE_CARRIER_SETUP" => array(
            "group" => "other.1NO_GROUP",

            "level" => 3,
            "label" => "invoke the carrier-provided configuration app",
            "description" => "Allows the holder to invoke the carrier-provided configuration app. Should never be needed for normal apps.",
        ),
        "android.permission.ACCESS_NETWORK_CONDITIONS" => array(
            "group" => "other.1NO_GROUP",

            "level" => 3,
            "label" => "listen for observations on network conditions",
            "description" => "Allows an application to listen for observations on network conditions. Should never be needed for normal apps.",
        ),
        "android.permission.READ_PHONE_BLACKLIST" => array(
            "group" => "android.permission-group.SECURITY",

            "level" => 3,
            "label" => "read phone blacklist",
            "description" => "Allows an app to read information about phone numbers that are blocked for incoming calls or messages.",
        ),
        "android.permission.CHANGE_PHONE_BLACKLIST" => array(
            "group" => "android.permission-group.SECURITY",

            "level" => 3,
            "label" => "change phone blacklist",
            "description" => "Allows an app to change the phone numbers that are blocked for incoming calls or messages.",
        ),
        "android.permission.ACCESS_THEME_MANAGER" => array(
            "group" => "other.1NO_GROUP",

            "level" => 2,
            "label" => "access theme service",
            "description" => "Allows an app to access the theme service. Should never be needed for normal apps.",
        ),
        "android.permission.READ_THEMES" => array(
            "group" => "other.1NO_GROUP",

            "level" => 0,
            "label" => "read your theme info",
            "description" => "Allows the app to read your themes and determine which theme you have applied.",
        ),
        "android.permission.WRITE_THEMES" => array(
            "group" => "other.1NO_GROUP",

            "level" => 2,
            "label" => "modify your themes",
            "description" => "Allows the app to insert new themes and modify which theme you have applied.",
        ),
        "android.permission.HARDWARE_ABSTRACTION_ACCESS" => array(
            "group" => "other.1NO_GROUP",

            "level" => 2,
            "label" => "use hardware framework",
            "description" => "Allows an app access to the CM hardware framework.",
        ),
    );


    public static $external = array(
        "android.permission.ACCESS_SUPERUSER" => array(
            "group" => "android.permission-group.SUPERUSER",

            "level" => 3,
            "label" => "full permissions to all device features and storage",
            "description" => "Superuser grants full access to all device features and storage, including the secure and sensitive hardware elements of your device. This permission is potentially dangerous.",
        ),
    );
}

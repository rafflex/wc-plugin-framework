<?php
/**
 * WooCommerce Payment Gateway Framework
 *
 * This source file is subject to the GNU General Public License v3.0
 * that is bundled with this package in the file license.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.html
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@skyverge.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade the plugin to newer
 * versions in the future. If you wish to customize the plugin for your
 * needs please refer to http://www.skyverge.com
 *
 * @package   SkyVerge/WooCommerce/Payment-Gateway/Transactions
 * @author    SkyVerge
 * @copyright Copyright (c) 2013-2016, SkyVerge, Inc.
 * @license   http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License v3.0
 */

defined( 'ABSPATH' ) or exit;

if ( ! class_exists( 'SV_WC_Payment_Gateway_Payment_Transaction' ) ) :


/**
 * The base payment transaction class.
 *
 * @since 4.7.0-dev
 */
abstract class SV_WC_Payment_Gateway_Payment_Transaction extends SV_WC_Payment_Gateway_Transaction {


	/** @var the attached payment method */
	protected $payment_method = null;


	/**
	 * Gets the payment method object.
	 *
	 * @since 4.7.0-dev
	 *
	 * @return \SV_WC_Payment_Gateway_Transaction_Payment_Method|null
	 */
	public function get_payment_method() {

		return $this->payment_method;
	}


	/**
	 * Sets the payment method object.
	 *
	 * @since 4.7.0-dev
	 *
	 * @param \SV_WC_Payment_Gateway_Transaction_Payment_Method $payment_method payment method object
	 */
	public function set_payment_method( SV_WC_Payment_Gateway_Transaction_Payment_Method $payment_method ) {

		$this->payment_method = $payment_method;

		$this->get_payment_method()->set_transaction( $this );
	}


	/* CRUD methods ***********************************************************/


	public function save() {

		parent::save();

		$this->get_payment_method()->save( $this->get_order_id() );
	}


}

endif;
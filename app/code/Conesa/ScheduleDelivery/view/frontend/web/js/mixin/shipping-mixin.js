/**
 * Conesa/ScheduleDelivery/view/frontend/web/js/mixin/shipping-mixin.js
 */
define([
    'jquery',
    'Magento_Checkout/js/model/quote'
], function ($, quote) {
    'use strict';

    return function (target) {
        return target.extend({
            /**
             * Sobreescribimos la función setShippingInformation para añadir nuestros datos.
             */
            setShippingInformation: function () {
                if (this.validateShippingInformation()) {
                    var shippingAddress = quote.shippingAddress();
                    if (shippingAddress) {
                        // Obtenemos los datos de nuestro componente y los añadimos al objeto de la dirección de envío
                        var scheduleDate = $('#schedule_delivery_date').val();
                        var scheduleTime = $('#schedule_delivery_time_slot').val();
                        
                        // Usamos extension_attributes para pasar datos custom
                        if (shippingAddress.extension_attributes === undefined) {
                            shippingAddress.extension_attributes = {};
                        }

                        shippingAddress.extension_attributes.schedule_delivery_date = scheduleDate;
                        shippingAddress.extension_attributes.schedule_delivery_time_slot = scheduleTime;
                    }
                    this._super();
                }
            }
        });
    };
});
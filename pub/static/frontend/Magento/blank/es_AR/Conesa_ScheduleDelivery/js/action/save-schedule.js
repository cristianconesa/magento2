/**
 * Conesa/ScheduleDelivery/view/frontend/web/js/action/save-schedule.js
 */
define(
    [
        'Magento_Checkout/js/model/quote',
        'Magento_Checkout/js/model/url-builder',
        'mage/storage',
        'Magento_Checkout/js/model/error-processor',
        'Magento_Customer/js/model/customer'
    ],
    function (quote, urlBuilder, storage, errorProcessor, customer) {
        'use strict';

        return function (payload) {
            var serviceUrl;

            if (customer.isLoggedIn()) {
                serviceUrl = urlBuilder.createUrl('/carts/mine/set-schedule-delivery', {});
            } else {
                serviceUrl = urlBuilder.createUrl('/guest-carts/:cartId/set-schedule-delivery', {
                    cartId: quote.getQuoteId()
                });
            }

            return storage.post(
                serviceUrl,
                JSON.stringify({scheduleData: payload})
            ).fail(
                function (response) {
                    errorProcessor.process(response);
                }
            );
        };
    }
);

/**
 * Conesa/ScheduleDelivery/view/frontend/requirejs-config.js
 */
var config = {
    map: {
        '*': {
            'Conesa_ScheduleDelivery/js/action/save-schedule': 'Conesa_ScheduleDelivery/js/action/save-schedule'
        }
    },
    config: {
        mixins: {
            'Magento_Checkout/js/view/shipping': {
                'Conesa_ScheduleDelivery/js/mixin/shipping-mixin': true
            }
        }
    },
    deps: [
        "jquery/ui"
    ]
};
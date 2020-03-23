jQuery( document ).ready(function( jQuery ) {
   "use strict"
/*-----------------------------------------------------------------------------------*/
/*    CUBE PORTFOLIO
/*-----------------------------------------------------------------------------------*/
jQuery('#js-grid-agency').cubeportfolio({
        filters: '#js-filters-agency',
        loadMore: '#js-loadMore-agency',
        loadMoreAction: 'click',
        layoutMode: 'grid',
        defaultFilter: '*',
        animationType: 'slideLeft',
        gapHorizontal: 0,
        gapVertical: 0,
        gridAdjustment: '',
		displayType: 'lazyLoading',
        displayTypeSpeed: 10,
        caption: 'zoom',
        // singlePage popup
        singlePageDelegate: '.cbp-singlePage',
        singlePageDeeplinking: true,
        singlePageStickyNavigation: true,
        singlePageCounter: '<div class="cbp-popup-singlePage-counter">{{current}} of {{total}}</div>',
        singlePageCallback: function(url, element) {
            // to update singlePage content use the following method: this.updateSinglePage(yourContent)
            var t = this;
            jQuery.ajax({
                url: url,
                type: 'GET',
                dataType: 'html',
                timeout: 100
            })
                .done(function(result) {
                    t.updateSinglePage(result);
                })
                .fail(function() {
                    t.updateSinglePage('AJAX Error! Please refresh the page!');
                });
        }
    });
/*-----------------------------------------------------------------------------------*/

/*		CUBE PORTFOLIO

/*-----------------------------------------------------------------------------------*/

jQuery('#js-grid-awesome-work').cubeportfolio({
        filters: '#js-filters-awesome-work',
        loadMore: '#js-loadMore-awesome-work',
        loadMoreAction: 'click',
        layoutMode: 'grid',
        defaultFilter: '*',
        animationType: 'quicksand',
        gapHorizontal: 0,
        gapVertical: 0,
        gridAdjustment: '',
        caption: 'zoom',
        displayType: 'lazyLoading',
        displayTypeSpeed: 400,
        // singlePage popup
        singlePageDelegate: '.cbp-singlePage',
        singlePageDeeplinking: true,
        singlePageStickyNavigation: true,
        singlePageCounter: '<div class="cbp-popup-singlePage-counter">{{current}} of {{total}}</div>',
        singlePageCallback: function(url, element) {
            // to update singlePage content use the following method: this.updateSinglePage(yourContent)
            var t = this;
            jQuery.ajax({
                url: url,
                type: 'GET',
                dataType: 'html',
                timeout: 10000
            })
                .done(function(result) {
                    t.updateSinglePage(result);
                })
                .fail(function() {
                    t.updateSinglePage('AJAX Error! Please refresh the page!');
                });
        }
    });
});
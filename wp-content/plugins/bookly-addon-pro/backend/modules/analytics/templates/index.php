<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
use Bookly\Backend\Components;
use Bookly\Lib\Utils\Common;
use Bookly\Lib\Utils\DateTime;
?>
<div id="bookly-tbs" class="wrap">
    <div class="bookly-tbs-body">
        <div class="page-header text-right clearfix">
            <div class="bookly-page-title">
                <?php _e( 'Analytics', 'bookly' ) ?>
            </div>
            <?php Components\Support\Buttons::render( $self::pageSlug() ) ?>
        </div>
        <div class="panel panel-default bookly-main">
            <div class="panel-body">
                <div class="row">
                    <div class="form-inline bookly-margin-bottom-lg text-right">
                        <div class="form-group">
                            <button type="button" class="btn btn-default bookly-btn-block-xs" data-toggle="modal" data-target="#bookly-export-dialog"><i class="glyphicon glyphicon-export"></i> <?php _e( 'Export to CSV', 'bookly' ) ?></button>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-default bookly-btn-block-xs" data-toggle="modal" data-target="#bookly-print-dialog"><i class="glyphicon glyphicon-print"></i> <?php _e( 'Print', 'bookly' ) ?></button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-lg-3">
                        <div class="bookly-margin-bottom-lg bookly-relative">
                            <button type="button" class="btn btn-block btn-default" id="bookly-filter-date" data-date="<?php echo date( 'Y-m-d', strtotime( 'first day of' ) ) ?> - <?php echo date( 'Y-m-d', strtotime( 'last day of' ) ) ?>">
                                <i class="dashicons dashicons-calendar-alt"></i>
                                <span><?php echo DateTime::formatDate( 'first day of this month' ) ?> - <?php echo DateTime::formatDate( 'last day of this month' ) ?></span>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-2">
                        <div class="form-group">
                            <ul id="bookly-js-filter-staff"
                                data-txt-select-all="<?php esc_attr_e( 'All staff', 'bookly' ) ?>"
                                data-txt-all-selected="<?php esc_attr_e( 'All staff', 'bookly' ) ?>"
                                data-txt-nothing-selected="<?php esc_attr_e( 'No staff selected', 'bookly' ) ?>"
                            >
                                <?php foreach ( $dropdown_data['staff'] as $category_id => $category ): ?>
                                    <li<?php if ( ! $category_id ) : ?> data-flatten-if-single<?php endif ?>><?php echo esc_html( $category['name'] ) ?>
                                        <ul>
                                            <?php foreach ( $category['items'] as $staff ) : ?>
                                                <li data-value="<?php echo $staff['id'] ?>" data-selected="1">
                                                    <?php echo esc_html( $staff['full_name'] ) ?>
                                                </li>
                                            <?php endforeach ?>
                                        </ul>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix visible-md-block"></div>
                    <div class="col-md-4 col-lg-2">
                        <div class="form-group">
                            <ul id="bookly-js-filter-services"
                                data-icon-class="glyphicon glyphicon-tag"
                                data-txt-select-all="<?php esc_attr_e( 'All services', 'bookly' ) ?>"
                                data-txt-all-selected="<?php esc_attr_e( 'All services', 'bookly' ) ?>"
                                data-txt-nothing-selected="<?php esc_attr_e( 'No service selected', 'bookly' ) ?>"
                            >
                                <li data-value="0" data-selected="1">
                                    <?php esc_html_e( 'Custom', 'bookly' ) ?>
                                </li>
                                <?php foreach ( $dropdown_data['service'] as $category_id => $category ): ?>
                                    <li<?php if ( ! $category_id ) : ?> data-flatten-if-single<?php endif ?>><?php echo esc_html( $category['name'] ) ?>
                                        <ul>
                                            <?php foreach ( $category['items'] as $service ) : ?>
                                                <li data-value="<?php echo $service['id'] ?>" data-selected="1">
                                                    <?php echo esc_html( $service['title'] ) ?>
                                                </li>
                                            <?php endforeach ?>
                                        </ul>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <table id="bookly-analytics-table" class="table table-striped" width="100%">
                    <thead>
                        <tr>
                            <th rowspan="2"><?php echo esc_html( Common::getTranslatedOption( 'bookly_l10n_label_employee' ) ) ?></th>
                            <th rowspan="2"><?php echo esc_html( Common::getTranslatedOption( 'bookly_l10n_label_service' ) ) ?></th>
                            <th colspan="5"><?php esc_html_e( 'Visits', 'bookly' ) ?></th>
                            <th colspan="2"><?php esc_html_e( 'Customers', 'bookly' ) ?></th>
                            <th colspan="2"><?php esc_html_e( 'Payments', 'bookly' ) ?></th>
                        </tr>
                        <tr>
                            <th><?php esc_html_e( 'Sessions', 'bookly' ) ?></th>
                            <th><?php esc_html_e( 'Approved', 'bookly' ) ?></th>
                            <th><?php esc_html_e( 'Pending', 'bookly' ) ?></th>
                            <th><?php esc_html_e( 'Rejected', 'bookly' ) ?></th>
                            <th><?php esc_html_e( 'Cancelled', 'bookly' ) ?></th>
                            <th><?php esc_html_e( 'Customers', 'bookly' ) ?></th>
                            <th><?php esc_html_e( 'New Customers', 'bookly' ) ?></th>
                            <th><?php esc_html_e( 'Total', 'bookly' ) ?></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th colspan="2"><?php esc_html_e( 'Total', 'bookly' ) ?>:</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>

                <div class="form-group bookly-margin-top-xlg">
                    <h4><?php esc_html_e( 'Visits', 'bookly' ) ?></h4>
                    <ul>
                        <li><?php esc_html_e( 'Sessions - number of completed and/or planned service sessions.', 'bookly' ) ?></li>
                        <li><?php esc_html_e( 'Approved - number of visitors of sessions with Approved status during the selected period.', 'bookly' ) ?></li>
                        <li><?php esc_html_e( 'Pending - number of visitors of sessions with Pending status during the selected period.', 'bookly' ) ?></li>
                        <li><?php esc_html_e( 'Rejected - number of visitors of sessions with Rejected status during the selected period.', 'bookly' ) ?></li>
                        <li><?php esc_html_e( 'Cancelled - number of visitors of sessions with Cancelled status during the selected period.', 'bookly' ) ?></li>
                    </ul>
                </div>
                <div class="form-group">
                    <h4><?php esc_html_e( 'Customers', 'bookly' ) ?></h4>
                    <ul>
                        <li><?php esc_html_e( 'Customers - number of unique customers who made bookings during the selected period.', 'bookly' ) ?></li>
                        <li><?php esc_html_e( 'New customers - number of new customers added to the database during the selected period.', 'bookly' ) ?></li>
                    </ul>
                </div>
                <div class="form-group">
                    <h4><?php esc_html_e( 'Payments', 'bookly' ) ?></h4>
                    <ul>
                        <li><?php esc_html_e( 'Total - approximate cost of appointments with Approved and Pending statuses, calculated on the basis of the price list. Appointments that are paid through the front-end and have Pending payment status are included in brackets.', 'bookly' ) ?></li>
                    </ul>
                </div>
            </div>
        </div>

        <?php include '_export_dialog.php' ?>
        <?php include '_print_dialog.php' ?>

    </div>
</div>

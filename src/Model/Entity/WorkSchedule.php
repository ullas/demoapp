<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * WorkSchedule Entity
 *
 * @property int $id
 * @property string $ws_name
 * @property bool $flex_request_allowed
 * @property string $country
 * @property float $hours_day
 * @property float $hours_week
 * @property float $hours_month
 * @property float $hours_year
 * @property float $days_week
 * @property float $ws_days
 * @property string $model
 * @property \Cake\I18n\Time $start_date
 * @property float $day1_planhours
 * @property float $day2_planhours
 * @property float $day3_planhours
 * @property float $day4_planhours
 * @property float $day5_planhours
 * @property float $day7_planhours
 * @property float $day_n_hours
 * @property string $employee
 * @property string $time_rec_variant_1
 * @property string $category
 * @property float $day
 * @property \Cake\I18n\Time $start_time
 * @property \Cake\I18n\Time $end_time
 * @property string $shift_class
 * @property float $planned_hours
 * @property \Cake\I18n\Time $planned_hours_minutes
 * @property string $day_model
 * @property string $time_rec_variant_2
 * @property string $search_field
 * @property \Cake\I18n\Time $starting_date
 * @property string $period_model
 * @property string $time_rec_variant_3
 * @property string $ws_code
 */
class WorkSchedule extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}

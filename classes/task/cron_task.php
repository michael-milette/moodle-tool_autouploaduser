<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * A scheduled task to add/update users from CSV file.
 *
 * @package    tool
 * @subpackage autouploaduser
 * @copyright  2018 TNG Consulting Inc. <www.tngconsulting.ca>
 * @author     Michael Milette
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace tool_messageinbound\task;

defined('MOODLE_INTERNAL') || die();

/**
 * A scheduled task to add/update users from CSV file.
 *
 * @copyright  2018 TNG Consulting Inc. <www.tngconsulting.ca>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class cron_task extends \core\task\scheduled_task {

    /**
     * Get a descriptive name for this task (shown to admins).
     *
     * @return string
     */
    public function get_name() {
        return get_string('taskupload', 'tool_autouploaduser');
    }

    /**
     * Execute the main Inbound Message pickup task.
     */
    public function execute() {
        $manager = new \tool_autouploaduser\manager();
        return $manager->autoupload_users();
    }
}

<?php

class Track_model extends CI_Model
{
    // fungsi untuk insert track history
    public function insertTrackHistory()
    {
        $data = [
            'os' => getOS(),
            'browser' => getBrowser(),
            'ip' => getUserIP(),
            'url' => getUrl(),
            'created_at' => time(),
        ];
        return $this->db->insert('track', $data);
    }

    // count total all visitor
    public function getCountAllVisitors(){
        return $this->db->count_all('track');
    }

    // get Visitor this month
    public function getVisitorsThisMonth(){                
        $query = "SELECT *, FROM_UNIXTIME(created_at, '%Y-%m-%d') as date FROM track WHERE MONTH(FROM_UNIXTIME(created_at, '%Y-%m-%d')) = MONTH(CURRENT_DATE)";        

        return $this->db->query($query)->result_array();
    }

    // get visitors this week
    public function getVisitorsThisWeek(){
        $previous_week = time() - 60 * 60 * 24 * 7;
        $query = "SELECT COUNT(id_track) as visitor_per_day, DATE_FORMAT(date_created, '%d %M') as date FROM track WHERE created_at > $previous_week GROUP BY(DATE(date_created)) ORDER BY id_track DESC LIMIT 7";

        return array_reverse($this->db->query($query)->result_array());
    }

    // get browser visitors
    public function getBrowsersUsers(){
        $this->db->select('COUNT(browser) AS browser_count, browser');
        $this->db->from('track');
        $this->db->group_by('browser');
        $this->db->order_by('browser', 'ASC');

        return $this->db->get()->result_array();
    }

    // get os visitors
    public function getOsUsers(){
        $this->db->select('COUNT(os) AS os_count, os');
        $this->db->from('track');
        $this->db->group_by('os');
        $this->db->order_by('os', 'ASC');

        return $this->db->get()->result_array();
    }
}